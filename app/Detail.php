<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{

	//Set what items cannot be mass assigned
	protected $guarded = [];
	
	//User relationship
    public function job()
    {
    	return $this->belongsTo(Job::class);
    }
}
