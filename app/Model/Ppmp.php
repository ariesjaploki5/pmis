<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ppmp extends Model
{
    protected $table = 'j10.pams_ppmp';
    public $timestamps = false;
    protected $fillable = [
        'code', 'item_description', ''
    ];

    public function pap_codes()
    {
        return $this->hasMany('App\Model\Pap_code', 'j10.pams_pap_code_pmo', 'pmo_id', 'pap_code_id');
    }
}
