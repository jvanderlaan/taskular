<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trophy extends Model
{
	//Set what items cannot be mass assigned
	protected $guarded = [];


	//Query Scopes
	public function scopeIsAll($query)
	{
		return $query->orderBy('name', 'asc');
	}
}
