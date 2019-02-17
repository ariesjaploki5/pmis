<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrugsAndMedicines extends Model
{
    protected $table = 'hospital.dbo.hdmhdr';
    public $timestamps = false;

    protected $fillable = [
        'dmdcomb', 'dmdctr', 'dmdnost', 'strecode', 'formcode', 'rtecode', 'dmdpndf', 'dmdstat', 'dmdlock', 'dmdupsw', 
        'dmddtmd', 'brandname', 'atcode', 'dmdnnostp', 'dmdclaimno', 'techspec', 'grpcode', 'dmdrem', 'dmdrxot', 'dmdclmuom',
        'dmdstco', 'dmdedl', 'lbscode', 'stockbal', 'baldteasof', 'begbal', 'hprodid', 'reorderlvl', 'totamt'
    ];

    public function scopeDams($query)
    {
        $query->join('hospital.dbo.hdruggrp as hdruggrp', 'hdmhdr.grpcode', '=', 'hdruggrp.grpcode')
        ->join('hospital.dbo.hgen as hgen', 'hdruggrp.gencode', '=', 'hgen.gencode')
        ->join('hospital.dbo.hform as hform', 'hdmhdr.formcode', '=', 'hform.formcode')
        ->leftjoin('hospital.dbo.hroute as hroute', 'hdmhdr.rtecode', '=', 'hroute.rtecode')
        ->leftjoin('hospital.dbo.hstre as stre', 'hdmhdr.strecode', '=', 'stre.strecode');
    }

    public function scopeSearch($query, $search)
    {
        $query->dams()->where('gendesc', 'like', $search . '%');
    }

    
}
