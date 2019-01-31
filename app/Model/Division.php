<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'dex.divisions';
    public $timestamps = false;
    
    protected $fillable = [
        'description',
    ];

    public function departments()
    {
    	return $this->hasMany('App\Model\Department');
    }
}
