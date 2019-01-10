<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $appends = ['conversation_count'];
    protected $fillable=['subject','company_id','department_id','status','end_conv','operator_id'];
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /*public function getConversationCountAttribute()
    {
        $department_id=\Auth::user()->departments()->get();
        $conversations=Conversation::where([['status',0],['end_conv',0]])->orWhere(['status',1],['department_id',$department_id])->get();
        return count($conversations);
    }*/

    static public function ConversationCount()
    {
        $operator_id = \Auth::user()->id;
        $company_id = \Auth::user()->company_id;
        $company = Company::where('id', $company_id)->first();
        $department = \Auth::user()->departments()->get(array('id'));
        foreach ($department as $departments){
            $ids[]=$departments->id;
        }
         if(isset($ids)){
        $conversations = Conversation::whereIn('department_id',$ids)->where([['status', 0], ['end_conv', 0], ['company_token', $company->token]])->orWhere([['operator_id', $operator_id], ['end_conv', 0]])->get();
                return count($conversations);

                }else{
                     return 0;
                }
    }
}
