<?php

namespace App\Http\Controllers;

use App\Job;
use App\Event;
use Carbon\Carbon;

use App\GuzzleHttp\Exception\GuzzleException;
use App\GuzzleHttp\Client;

class SummaryController extends Controller
{
    
	public function index()
    {

        // Jobs
    	$deadlines = Job::isNotClosed()->whereDate('deadline', Carbon::today())->get();

    	$activities = Job::isActivity()->get();

    	$jobsTotal = Job::all()->count();

    	$jobsNotClosedTotal = Job::isNotClosed()->count();

    	$jobsCounted = Job::selectRaw('
    		SUM(IF(category = "active", 1, 0)) AS active, 
    		SUM(IF(category = "inactive", 1, 0)) AS inactive, 
    		SUM(IF(status = "quoting", 1, 0)) AS quoting, 
    		SUM(IF(status = "planning", 1, 0)) AS planning, 
    		SUM(IF(status = "in progress", 1, 0)) AS in_progress, 
    		SUM(IF(status = "billing", 1, 0)) AS billing, 
    		SUM(IF(type = "prediction", 1, 0)) AS prediction, 
    		SUM(IF(type = "survey", 1, 0)) AS survey, 
    		SUM(IF(type = "validation", 1, 0)) AS validation, 
    		SUM(IF(type = "troubleshoot", 1, 0)) AS troubleshoot, 
    		SUM(IF(type = "combination", 1, 0)) AS combination, 
    		SUM(IF(type = "other", 1, 0)) AS other')
    	->where('category', '!=', 'closed')
    	->get();

        // Events
        $events = Event::events();

        $subcalendars = Event::subcalendars();

        // View
	    return view('index', compact('deadlines', 'events', 'subcalendars', 'activities', 'jobsTotal', 'jobsNotClosedTotal', 'jobsCounted'));

    }

}
