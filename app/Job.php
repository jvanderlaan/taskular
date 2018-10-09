<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

	//Allows carbon to mutate deadline dates
	protected $dates = ['deadline'];

	//Set what items cannot be mass assigned
	protected $guarded = [];


	//Query Scopes
	public function scopeIsActive($query)
	{
		return $query->where('category', 'Active')->orderBy('deadline', 'asc');
	}

	public function scopeIsInactive($query)
	{
		return $query->where('category', 'Inactive')->orderBy('deadline', 'asc');
	}

	public function scopeIsClosed($query)
	{
		return $query->where('category', 'Closed')->orderBy('deadline', 'asc');
	}

	public function scopeIsNotClosed($query)
	{
		return $query->where('category', 'Active')->orWhere('category', 'Inactive');
	}

	public function scopeIsActivity($query)
	{
		return $query->take(8)->orderBy('updated_at', 'desc');
	}

	//User relationship
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	//Comment relationship
	public function comments()
	{
		return $this->hasMany(Comment::class)->orderBy('updated_at', 'desc');
	}

}
