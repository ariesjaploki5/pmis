<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'dex.pams_items';
    public $timestamps = false;
    protected $fillable = [
        'code', 
        'description', 
        'total_quantity', 
        'cost',
        'account_code',
        'pap_code_id',
        'unit_id',
    ];

    public function request_items()
    {
        return $this->belongsToMany('App\Model\Request_item');
    }

    public function pap_code()
    {
        return $this->belongsTo('App\Model\Pap_code');
    }

    public function unit()
    {
        return $this->belongsTo('App\Model\Unit');
    }
}
