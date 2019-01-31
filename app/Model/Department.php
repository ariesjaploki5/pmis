<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'dex.departments';

    protected $fillable = [
        'description', 'division_id'
    ];

    public function division()
    {
    	return $this->hasOne('App\Model\Division');
    }
}
