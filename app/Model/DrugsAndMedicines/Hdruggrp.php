<?php

namespace App\Model\DrugsAndMedicines;

use Illuminate\Database\Eloquent\Model;

class Hdruggrp extends Model
{
    protected $table = 'hospital.dbo.hdruggrp';
    protected $primaryKey = '[grpcode]';
    public $timestamps = false;

    protected $fillable = [
        'grpcode', 'grpstat', 'grplock', 'grpdtmd', 'dmcode', 'dms1key', 'dms2key', 'dms3key', 'dms4key', 'gencode'
    ];
    
    public function hgen()
    {
        return $this->belongsTo('App\Model\DrugsAndMedicines\Hgen', 'gencode', 'gencode');
    }

    public function hdmhdrs()
    {
        return $this->hasMany('App\Model\DrugsAndMedicines\Hdmhdr', 'grpcode', 'grpcode');
    }

    
}
