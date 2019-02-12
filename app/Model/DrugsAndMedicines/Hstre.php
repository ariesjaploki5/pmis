<?php

namespace App\Model\DrugsAndMedicines;

use Illuminate\Database\Eloquent\Model;

class Hstre extends Model
{
    protected $table = 'hospital.dbo.hstre';
    protected $primaryKey = '[strecode]';

    protected $fillable = [
        'strecode', 'stredesc', 'strestat', 'strelock', 'updsw', 'datemod'
    ];

    public function hdmhdrs()
    {
        return $this->hasMany('App\Model\DrugsAndMedicines\Hdmhdr', 'strecode', 'strecode');
    }
}
