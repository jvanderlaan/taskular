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
		return $query->where('category', 'Inactive')->orderBy('updated_at', 'desc');
	}

	public function scopeIsClosed($query)
	{
		return $query->where('category', 'Closed')->orderBy('updated_at', 'desc');
	}

	public function scopeIsNotClosed($query)
	{
		return $query->where('category', 'Active')->orWhere('category', 'Inactive');
	}

	public function scopeIsActivity($query)
	{
		return $query->take(9)->orderBy('updated_at', 'desc');
	}

	public function scopeIsLatest($query)
	{
		return $query->take(1)->latest();
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

	//Job relationship
	public function detail()
	{
		return $this->hasOne(Detail::class);
	}

}
