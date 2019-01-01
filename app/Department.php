<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','description','company_id'
    ];

    public function operators()
    {
        return $this->belongsToMany(Operator::class,'department_operators');
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
}
