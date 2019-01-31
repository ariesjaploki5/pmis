<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase_request extends Model
{
    
    public $timestamps = false;

    protected $fillable = [
        'purpose', 'date', 'status', 'purchase_order_id'
    ];
    
    public function request_items()
    {
        return $this->belongsToMany('App\Model\Request_item');
    }
}
