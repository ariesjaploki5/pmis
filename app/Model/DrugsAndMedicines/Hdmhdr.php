<?php

namespace App\Model\DrugsAndMedicines;

use Illuminate\Database\Eloquent\Model;

class Hdmhdr extends Model
{
    protected $table = 'hospital.dbo.hdmhdr';
    public $timestamps = false;

    protected $fillable = [
        'dmdcomb', 'dmdctr', 'dmdnost', 'strecode', 'formcode', 'rtecode', 'dmdpndf', 'dmdstat', 'dmdlock', 'dmdupsw', 
        'dmddtmd', 'brandname', 'atcode', 'dmdnnostp', 'dmdclaimno', 'techspec', 'grpcode', 'dmdrem', 'dmdrxot', 'dmdclmuom',
        'dmdstco', 'dmdedl', 'lbscode', 'stockbal', 'baldteasof', 'begbal', 'hprodid', 'reorderlvl', 'totamt'
    ];

    public function hdruggrp()
    {
        return $this->belongsTo('App\Model\DrugsAndMedicines\Hdruggrp', 'grpcode', 'grpcode');
    }

    public function hstre()
    {
        return $this->belongsTo('App\Model\DrugsAndMedicines\Hstre', 'strecode', 'strecode');
    }

    public function hroute()
    {
        return $this->belongsTo('App\Model\DrugsAndMedicines\Hroute', 'rtecode', 'rtecode');
    }
}
