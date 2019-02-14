<?php

namespace App\Model\DrugsAndMedicines;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    
    protected $table = 'hospital_e.j10.pams_cart as cart';



    public function user()
    {
        return $this->belongsTo('App/User');
    }

    public function scopeHdmhdrs($query, $user_id) {
        return $query->join('hospital.dbo.hdmhdr as hdmhdr', function($join)
        {
            $join->on('hdmhdr.dmdcomb', '=', 'cart.dmdcomb');
            $join->on('hdmhdr.dmdctr', '=', 'cart.dmdctr');
           
        })->join('hospital_e.j10.pams_ppmps as ppmp', 'cart.ppmp_id', '=', 'ppmp.id')
        ->join('hospital.dbo.hdruggrp as hdruggrp', 'hdmhdr.grpcode', '=', 'hdruggrp.grpcode')
        ->join('hospital.dbo.hgen as hgen', 'hdruggrp.gencode', '=', 'hgen.gencode')
        ->join('hospital.dbo.hform as hform', 'hdmhdr.formcode', '=', 'hform.formcode')
        ->leftjoin('hospital.dbo.hroute as hroute', 'hdmhdr.rtecode', '=', 'hroute.rtecode')
        ->leftjoin('hospital.dbo.hstre as stre', 'hdmhdr.strecode', '=', 'stre.strecode')
        ->orderBy('gendesc')
        ->orderBy('stredesc')
        ->where('dmdstat', 'A')
        ->where('grpstat', 'A')
        ->where('genstat', 'A')
        ->where('rtestat', 'A')
        ->where('formstat', 'A')->where('ppmp.user_id', '=', $user_id);

    }
}
