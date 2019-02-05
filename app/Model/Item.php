<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'j10.pams_items';
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

    public function purchase_requests()
    {
        return $this->belongsToMany('App\Model\Purchase_request', 'dex.pams_item_purchase_request', 'item_id', 'purchase_request_item')->withPivot('total_cost', 'quantity');
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
