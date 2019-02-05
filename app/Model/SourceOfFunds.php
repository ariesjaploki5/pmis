<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SourceOfFunds extends Model
{
    protected $table = 'j10.pams_source_of_funds';
    public $timestamps = false;
    protected $fillable = [
        'description',
    ];

    public function pap_codes()
    {
        return $this->hasMany('App\Model\Pap_code', 'j10.pams_pap_source_of_funds', 'source_of_fund_id', 'pap_code_id');
    }
}
