<?php

namespace App\Model\DrugsAndMedicines;

use Illuminate\Database\Eloquent\Model;

class Hform extends Model
{
    protected $table = 'hospital.dbo.hdruggrp';
    protected $primaryKey = '[grpcode]';
    public $timestamps = false;

    protected $fillable = [
        
    ];
}
