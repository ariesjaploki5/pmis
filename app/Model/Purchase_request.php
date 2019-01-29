<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase_request extends Model
{
    //
    protected $fillable = [
        'purpose', 'date', 'status',
    ];

    public function request_items()
    {
        return $this->belongsToMany('App\Model\Request_item');
    }
}
