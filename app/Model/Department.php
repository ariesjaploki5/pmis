<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'j10.departments';

    protected $fillable = [
        'description', 'division_id'
    ];

    public function division()
    {
    	return $this->belongsTO('App\Model\Division');
    }

}
