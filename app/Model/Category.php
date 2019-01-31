<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'dex.pams_categories';

    public $timestamps = false;
    
    protected $fillable = [
        'description',
    ];

    public function pap_codes()
    {
    	return $this->hasMany('App\Model\Pap_code');
    }
}
