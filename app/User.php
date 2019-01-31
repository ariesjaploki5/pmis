<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'dbo.user_acc';
    protected $primaryKey = 'employeeid';


    protected $hidden = [
        'user_pass',
    ];

     public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function employee()
    {
        return $this->hasOne('App/Model/Employee');
    }
}
