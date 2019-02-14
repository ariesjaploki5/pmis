<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ppmp extends Model
{
    protected $table = 'j10.pams_ppmps';
    protected $primaryKey = '[id]';
    public $timestamps = false;
    protected $fillable = [
        'type', 'user_id', 'status'
    ];

    public function pap_codes()
    {
        return $this->hasMany('App\Model\Pap_code', 'j10.pams_pap_code_pmo', 'pmo_id', 'pap_code_id');
    }

    public function ict_supplies()
    {
        return $this->hasMany('App\Model\PPMP\IctSupply');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
