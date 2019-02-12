<?php

namespace App\Model\DrugsAndMedicines;

use Illuminate\Database\Eloquent\Model;

class Hdmhdr extends Model
{
    protected $table = 'hospital.dbo.hdmhdr';
    protected $primaryKey = ['dmdcomb', 'dmdctr'];
   

    
}
