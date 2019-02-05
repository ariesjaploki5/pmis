<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'hospital_e.j10.pams_users';
    public $timestamps = false;

    protected $fillable = [
        'username', 'password', 'access_level_id', 'employee_id'
    ];

    protected $hidden = [
        'password',
    ];

    public function access_level()
    {
        return $this->belongsTo('App\Model\Access_level');
    }

    public function employee()
    {
        return $this->belongsTo('App/Model/Employee', 'employee_id', 'employeeid');
    }

     public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    
}
