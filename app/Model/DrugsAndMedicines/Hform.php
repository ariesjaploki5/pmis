<?php

namespace App\Model\DrugsAndMedicines;

use Illuminate\Database\Eloquent\Model;

class Hform extends Model
{
    protected $table = 'hospital.dbo.hdruggrp';
    protected $primaryKey = '[formcode]';
    public $timestamps = false;

    protected $fillable = [
        'formcode'
    ];
}
