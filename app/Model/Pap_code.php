<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pap_code extends Model
{
    protected $table = 'j10.pams_pap_codes';
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

    public function pmos()
    {
        return $this->hasMany('App\Model\Pmo', 'j10.pams_pap_code_pmo', 'pap_code_id', 'pmo_id');
    }

    public function mode_of_procurements()
    {
        return $this->hasMany('App\Model\ModeOfProcurement', 'j10.pams_pap_code_mode_of_procurement', 'pap_code_id', 'mode_of_procurement_id');
    }

    public function source_of_funds()
    {
        return $this->hasMany('App\Model\SourceOfFunds', 'j10.pams_pap_code_source_of_funds', 'pap_code_id', 'source_of_funds_id');
    }
}
