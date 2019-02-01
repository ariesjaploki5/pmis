<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase_order extends Model
{
    protected $table = 'dex.pams_purchase_orders';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'status',
    ];

    public function purchase_requests()
    {
        return $this->hasMany('App\Model\Purchase_request');
    }
}
