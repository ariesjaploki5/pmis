<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    protected $table = 'j10.pams_purchase_requests';
    public $timestamps = false;

    protected $fillable = [
        'purpose', 'created_at', 'purchase_order_id', 'employeeid',
    ];
    
    public function purchase_order()
    {
        return $this->belongsTo('App\Model\PurchaseOrder');
    }

    public function items()
    {
        return $this->belongsToMany('App\Model\Item', 'j10.pams_item_purchase_request', 'purchase_request_id', 'item_id')->withPivot('total_cost', 'quantity');
    }
}
