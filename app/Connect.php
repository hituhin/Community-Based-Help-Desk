<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connect extends Model
{
    protected $guarded = [];


    public function requestBy()
	{
		return $this->belongsTo('App\User', 'request_by');
	}

	public function requestTo()
	{
		return $this->belongsTo('App\User', 'request_to');
	}
    
}
