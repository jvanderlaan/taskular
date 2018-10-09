<?php

namespace App\Http\Controllers;

use App\Job;
use App\Card;

class JobsController extends Controller
{
    
    public function active()
    {

		$jobs = Job::isActive()->withCount('comments')->get();

	    return view('jobs/active', compact('jobs'));

    }

    public function inactive()
    {

		$jobs = Job::isInactive()->get();

	    return view('jobs/inactive', compact('jobs'));

    }

    public function closed()
    {

		$jobs = Job::isClosed()->get();

	    return view('jobs/closed', compact('jobs'));

    }

    public function show(Job $job) //route model binding
    {

		// $job = Job::find($id);

        $cards = Card::cards();
        $lists = Card::lists();

        // return $lists;

	    return view('jobs/job', compact('job', 'cards', 'lists'));

    }

    public function create()
    {

		return view('jobs/create');

    }

    public function update()
    {

		return view('jobs/edit');

    }

    public function store()
    {

    	//Validation rules
    	$this->validate(request(), [
    		'job-number'  => 'required|digits:4|unique:jobs,job_number',
    		'customer'    => 'required|max:20',
    		'description' => 'required|max:30',
    		'job-type'    => 'required',
    		'job-status'  => 'required',
    		'assigned-to' => 'required',
    		'deadline'    => 'required',
    	]);

    	//Create new job from POST data and save it to database
    	Job::create([
    		'user_id'     => '1',
    		'job_number'  => request('job-number'),
    		'customer'    => request('customer'),
    		'description' => request('description'),
    		'type'        => request('job-type'),
    		'status'      => request('job-status'),
    		'assigned_to' => request('assigned-to'),
    		'deadline'    => request('deadline'),
    		'category'    => 'Active',
    	]);

    	//Redicrect back to jobs page
    	return redirect('/jobs');

    }

    // public function destroy()
    // {

		

    // }
}
