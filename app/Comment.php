<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	//Set what items cannot be mass assigned
	protected $guarded = [];

	//User relationship
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    //Job relationship
    public function job()
    {
    	return $this->belongsTo(Job::class);
    }
}
