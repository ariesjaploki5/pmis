<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ModeOfProcurement extends Model
{
    protected $table = 'j10.pams_mode_of_procurements';
    public $timestamps = false;
    protected $fillable = [
        'description',
    ];

    public function pap_codes()
    {
        return $this->hasMany('App\Model\Pap_code', 'j10.pams_mode_of_procurement_pap_code', 'mode_of_procurement_id', 'pap_code_id');
    }
}
