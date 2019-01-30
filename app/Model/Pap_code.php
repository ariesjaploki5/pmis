<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pap_code extends Model
{
    protected $fillable = [
        'code', 'description'
    ];

    public function items()
    {
        return $this->belongsToMany('App\Model\Item');
    }
}
