<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Access_level extends Model
{
    protected $table = 'j10.pams_access_levels';
    public $timestamps = false;
    protected $fillable = [
        'description',
    ];

    public function users()
    {
        return $this->hasMany('App\Users');
    }
}
