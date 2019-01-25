<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'descriptions',
    ];

    public function departments()
    {
    	return $this->hasMany('App\Model\Department');
    }
}
