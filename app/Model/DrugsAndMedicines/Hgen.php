<?php

namespace App\Model\DrugsAndMedicines;

use Illuminate\Database\Eloquent\Model;

class Hgen extends Model
{
    protected $table = 'hospital.dbo.hgen';
    protected $primaryKey = '[gencode]';
    public $timestamps = false;

    protected $fillable = [
        'gencode', 'gendesc', 'genstat', 'genlock', 'updsw', 'datemod'
    ];

    public function hdruggrps()
    {
        return $this->hasMany('App\Model\DrugsAndMedicines\Hdruggrp', 'gencode', 'gencode');
    }
}
