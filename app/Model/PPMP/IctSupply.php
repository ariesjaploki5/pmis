<?php

namespace App\Model\PPMP;

use Illuminate\Database\Eloquent\Model;

class IctSupply extends Model
{
    protected $table = 'j10.pams_ppmp_ict_supplies';
    public $timestamps = false;
    protected $fillable = [
        'description', 'specification', 'cost_per_unit', 'quantity', 'estimated_cost', 'status', 'ppmp_id'
    ];

    

    public function ppmp()
    {
        return $this->belongsTo('App\Ppmp');
    }


}
