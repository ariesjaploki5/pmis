<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    protected $fillable = [
        'employee_id', 'division_id',
    ];

    public function employee()
    {
    	return $this->hasOne('App\Model\Employee');
    }

    public function division()
    {
    	return $this->hasOne('App\Model\Division');
    }
}
