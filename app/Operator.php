<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Company;
class Operator extends Authenticatable
{
    use Notifiable;
    /*public  $birth_day_p;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','password','company_id','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function departments()
    {
        return $this->belongsToMany(Department::class,'department_operators');
    }

 /*   public function getCountAttribute()
    {
        return Department::where([['product_id',$this->id],['status',1]])->avg('rating');
    }
*/


}
