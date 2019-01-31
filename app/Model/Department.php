<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'dex.departments';

    public $timestamps = false;

    protected $fillable = [
        'description', 'division_id'
    ];

    public function division()
    {
    	return $this->belongsTO('App\Model\Division');
    }
}
