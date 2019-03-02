<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\User;
use App\Job;
use App\Comment;
use App\Mail\CommentCreated;

class CommentsController extends Controller
{
    public function store(Job $job)
    {

    	//Validation rules
    	$this->validate(request(), [
    		'body' => 'required|min:10'
    	]);

    	//Create a comment that is associated with a job and save it.
    	$comment = Comment::create([
    		'body'    => request('body'),
    		'user_id' => Auth::user()->id,
    		'job_id'  => $job->id
    	]);

        session()->flash('message', 'Comment was created.');

        //Send an email to the user to which the job has been assigned        
        $recipients = User::all()->where('name', '=', $job->assigned_to);

        Mail::to($recipients)->send(new CommentCreated($job, $comment, $recipients));

    	//Redirect
    	return back();
    }

    public function update(Comment $comment)
    {

        //Validation rules
        $this->validate(request(), [
            'body' => 'required|min:10'
        ]);

        //Update existing comment from PATCH data and save it to database
        $comment = Comment::find($comment->id);

        $comment->body = request('body');
        $comment->user_id = Auth::user()->id;
        // $comment->job_id = '';

        $comment->save();

        session()->flash('message', 'Comment was updated.');

        //Redicrect back to the job view
        return back();

    }

    public function delete(Comment $comment)
    {

        $comment = Comment::find($comment->id);

        $comment->delete();

        session()->flash('message', 'Comment was deleted.');

        //Redicrect back to the job view
        return back();

    }

}
