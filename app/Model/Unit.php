<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'dex.pams_units';
    public $timestamps = false;
    protected $fillable = [
        'description',
    ];

    public function items()
    {
        return $this->hasMany('App\Model\Item');
    }
}
