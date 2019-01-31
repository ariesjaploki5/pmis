<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'dbo.hpersonal';
    protected $primaryKey = 'employeeid';
    public $incrementing = false;
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function department()
    {
    	return $this->hasOne('App\Model\Department');
    }
}
