<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pap_code extends Model
{
    protected $fillable = [
        'code', 'description', 'category_id'
    ];

    public function items()
    {
        return $this->belongsToMany('App\Model\Item');
    }

    public function category()
    {
        return $this->hasOne('App\Model\Category');
    }
}
