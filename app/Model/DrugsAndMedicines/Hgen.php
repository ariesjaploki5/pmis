<?php

namespace App\Model\DrugsAndMedicines;

use Illuminate\Database\Eloquent\Model;

class Hgen extends Model
{
    protected $table = 'hospital.dbo.hgen';
    protected $primaryKey = 'gencode';
    public $timestamps = false;


    public function hdmhdrs()
    {
        return $this->belongsToMany('App\Model\DrugsAndMedicine\Hdmhdrs');
    }
}
