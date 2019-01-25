<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Request_item extends Model
{
    protected $fillable = [
        'qunatity', 'stock_no', 'purpose', 'date', 'unit_of_issue_id', 'supply_id'
    ];

    public function unit_of_issue()
    {
    	return $this->hasOne('App\Model\Unit_of_issue');
    }

    public function supply()
    {
    	return $this->hasOne('App\Model\Supply');
    }
}
