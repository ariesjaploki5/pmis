<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pmo extends Model
{
    protected $table = 'j10.pams_pmos';
    public $timestamps = false;
    protected $fillable = [
        'description',
    ];

    public function pap_codes()
    {
        return $this->hasMany('App\Model\Pap_code', 'j10.pams_pap_code_pmo', 'pmo_id', 'pap_code_id');
    }

}
