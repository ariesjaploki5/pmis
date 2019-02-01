<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    protected $table = 'j10.heads';
    public $timestamps = false;

    protected $fillable = [
        'employeeid', 'division_id',
    ];


    public function division()
    {
    	return $this->belongsTo('App\Model\Division');
    }
}
