<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillable = [
        'pap_id', 'account_code_id', 'descriptions'
    ];

    public function Pap_code()
    {
    	return $this->hasOne('App\Model\Pap_code');
    }

    public function Account_code()
    {
    	return $this->hasOne('App\Model\Account_code');
    }
}
