<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'dbo.hpersonal';
    protected $primaryKey = 'employeeid';
    public $incrementing = false;
    public $timestamps = false;

}
