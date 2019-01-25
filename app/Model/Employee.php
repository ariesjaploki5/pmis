<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_id', 'user_id', 'department_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function department()
    {
    	return $this->hasOne('App\Model\Department');
    }
}
