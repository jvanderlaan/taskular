<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job;
use App\Detail;

class DetailsController extends Controller
{
	public function update(Detail $detail, Request $request)
	{

		//Validation rules
		$this->validate(request(), [
			'job-id'            => 'required',
			'site-address'      => 'nullable|max:255',
			'primary-contact'   => 'nullable|max:255',
			'secondary-contact' => 'nullable|max:255',
			'requested-by'      => 'nullable|max:255',
			'project-directory' => 'nullable|max:255',
			'field-package'     => 'nullable|max:255',
			'notes'             => 'nullable|max:2000',
		]);

		//Update existing detail from PATCH data and save it to database
		$detail = Detail::find($detail->id);

		$detail->user_id = Auth::user()->id;
		$detail->job_id = request('job-id');
		$detail->site_address = request('site-address');
		$detail->primary_contact = request('primary-contact');
		$detail->secondary_contact = request('secondary-contact');
		$detail->requested_by = request('requested-by');
		$detail->project_directory = request('project-directory');
		$detail->field_package = request('field-package');
		$detail->notes = request('notes');

		$detail->save();

		session()->flash('message', 'Job details were updated.');
		$request->flash();

		//Redicrect back to the edited job view
		return redirect()->action(
			'JobsController@show', ['job' => $detail->job_id]
		);

	}
}
