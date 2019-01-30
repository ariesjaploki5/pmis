<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'code', 
        'description', 
        'total_quantity', 
        'account_code',
        'pap_code_id',
    ];

    public function request_items()
    {
        return $this->belongsToMany('App\Model\Request_item');
    }

    public function pap_code()
    {
        return $this->hasOne('App\Model\Pap_code');
    }
}
