<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\User;
use App\Job;
use App\Card;
use App\Detail;
use App\Mail\JobUpdated;
use App\Mail\JobCreated;

class JobsController extends Controller
{
	
	public function active()
	{

		$users = User::all();

		$jobs = Job::isActive()->withCount('comments')->get();

		$customers = $jobs->unique('customer')->sortBy('customer');

		$customers->values()->all();

		$latest = Job::isLatest()->get();

		return view('jobs/active', compact('jobs', 'customers', 'users', 'latest'));

	}

	public function inactive()
	{

		$users = User::all();

		$jobs = Job::isInactive()->get();

		$customers = $jobs->unique('customer')->sortBy('customer');

		$customers->values()->all();

		return view('jobs/inactive', compact('jobs', 'customers', 'users'));

	}

	public function closed()
	{

		$users = User::all();

		$jobs = Job::isClosed()->get();

		$customers = $jobs->unique('customer')->sortBy('customer');

		$customers->values()->all();

		return view('jobs/closed', compact('jobs', 'customers', 'users'));

	}

	public function show(Job $job) //route model binding
	{

		$details = Detail::firstOrCreate([
			'job_id' => $job->id,
		]);

		$users = User::all();
		$cards = Card::cards();
		$lists = Card::lists();

		return view('jobs/job', compact('job', 'details', 'cards', 'lists', 'users'));

	}

	public function create()
	{

		$users = User::all();

		return view('jobs/create', compact('users'));

	}

	public function edit(Job $job)
	{

		$users = User::all();

		return view('jobs/edit', compact('job', 'users'));

	}

	public function store()
	{

		//Validation rules
		$this->validate(request(), [
			'job-number'     => 'required|digits:4|unique:jobs,job_number',
			'customer'       => 'required|max:20',
			'description'    => 'required|max:40',
			'job-type'       => 'required',
			'job-status'     => 'required',
			'assigned-to'    => 'required',
			'purchase-order' => 'required',
			'deadline'       => 'required',
		]);

		//Create new job from POST data and save it to database
		$job = Job::create([
			'user_id'        => Auth::user()->id,
			'job_number'     => request('job-number'),
			'customer'       => request('customer'),
			'description'    => request('description'),
			'type'           => request('job-type'),
			'status'         => request('job-status'),
			'assigned_to'    => request('assigned-to'),
			'purchase_order' => request('purchase-order'),
			'deadline'       => request('deadline'),
			'category'       => 'Active',
		]);

		session()->flash('message', 'Job was created.');

		//Send an email to the user to which the job has been assigned
		$assignee = request('assigned-to');
		
		$recipients = User::all()->where('name', '=', $assignee);

		Mail::to($recipients)->send(new JobCreated($job, $recipients));

		//Redicrect back to jobs page
		return redirect('jobs');

	}

	public function update(Job $job, Request $request)
	{

		//Validation rules
		$this->validate(request(), [
			'job-number'     => 'required|digits:4',
			'customer'       => 'required|max:20',
			'description'    => 'required|max:40',
			'job-type'       => 'required',
			'job-status'     => 'required',
			'assigned-to'    => 'required',
			'purchase-order' => 'required',
			'deadline'       => 'required',
			'category'       => 'required',
		]);

		//Update existing job from PATCH data and save it to database
		$job = Job::find($job->id);

		$job->user_id = Auth::user()->id;
		$job->customer = request('customer');
		$job->description = request('description');
		$job->type = request('job-type');
		$job->status = request('job-status');
		$job->assigned_to = request('assigned-to');
		$job->purchase_order = request('purchase-order');
		$job->deadline = request('deadline');
		$job->category = request('category');

		$job->save();

		session()->flash('message', 'Job was updated.');
		$request->flash();

		//Send an email to the user to which the job has been assigned
		$recipients = User::all()->where('name', '=', $job->assigned_to);

		Mail::to($recipients)->send(new JobUpdated($job, $recipients));

		//Redicrect back to the edited job view
		return redirect()->action(
			'JobsController@show', ['job' => $job]
		);
	}

	public function delete(Job $job)
	{

		$job->delete($job->id);

		session()->flash('message', 'Job was deleted.');

		return redirect('jobs');

	}
}
