<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Unit_of_issue extends Model
{
    protected $fillable = [
        'descriptions',
    ];

    public function request_items()
    {
        return $this->belongsToMany('App\Model\Request_item');
    }
}
