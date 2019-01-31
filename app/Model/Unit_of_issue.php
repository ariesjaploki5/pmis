<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Unit_of_issue extends Model
{

    public $timestamps = false;
    
    protected $fillable = [
        'description',
    ];

    public function request_items()
    {
        return $this->belongsToMany('App\Model\Request_item');
    }
}
