<?php

namespace App\Model\DrugsAndMedicines;

use Illuminate\Database\Eloquent\Model;

class Hroute extends Model
{
    protected $table = 'hospital.dbo.hroute';
    protected $primaryKey = '[rtecode]';

    protected $fillable = [
        'rtecode', 'rtedesc', 'rtestat', 'rtelock', 'updsw', 'datemod'
    ];

    public function hdmhdrs()
    {
        return $this->hasMany('App\Model\DrugsAndMedicines\Hdmhdr', 'rtecode', 'rtecode');
    }
}
