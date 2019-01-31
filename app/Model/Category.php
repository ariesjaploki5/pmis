<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'description',
    ];

    public function pap_code()
    {
    	return $this->belongsToMany('App\Model\Pap_code');
    }
}