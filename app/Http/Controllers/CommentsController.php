<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Job $job)
    {

    	//Validation rules
    	$this->validate(request(), [
    		'body' => 'required|min:10'
    	]);

    	//Create a comment that is associated with a job and save it.
    	Comment::create([
    		'body'    => request('body'),
    		'user_id' => '1',
    		'job_id'  => $job->id
    	]);

    	//Redirect
    	return back();
    }
}
