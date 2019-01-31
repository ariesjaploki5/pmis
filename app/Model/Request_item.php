<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Request_item extends Model
{
    

    public $timestamps = false;
    
    protected $fillable = [
        'request_quantity', 'item_id', 'unit_of_issue_id', 'purchase_request_id'
    ];

    public function items()
    {
        return $this->belongsToMany('App\Model\Item');
    }

    public function unit_of_issues()
    {
        return $this->belongsToMany('App\Model\Unit_of_issue');
    }

    public function purchase_requests()
    {
        return $this->belongsToMany('App\Model\Purchase_request');
    }
}
