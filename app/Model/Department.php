<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'descriptions', 'division_id'
    ];

    public function division()
    {
    	return $this->hasOne('App\Model\Division');
    }
}
