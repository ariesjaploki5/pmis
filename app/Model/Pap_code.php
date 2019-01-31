<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pap_code extends Model
{
    protected $table = 'dex.pams_pap_codes';
    public $timestamps = false;
    protected $fillable = [
        'code', 'description', 'category_id'
    ];

    public function items()
    {
        return $this->hasMany('App\Model\Item');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }
}
