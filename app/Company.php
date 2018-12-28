<?php

namespace App;
use App\Operator;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard='company';
    protected $fillable = [
        'name', 'email', 'password','username','web','tel','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Opertors()
    {
        return $this->hasMany(Operator::class);
    }
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
}
