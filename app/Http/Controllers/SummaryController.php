<?php

namespace App\Http\Controllers;

use App\Job;
use App\Comment;
use App\Event;
use Carbon\Carbon;

use App\GuzzleHttp\Exception\GuzzleException;
use App\GuzzleHttp\Client;

class SummaryController extends Controller
{
    
	public function index()
    {

    	$deadlines = Job::isNotClosed()->whereDate('deadline', Carbon::today())->get();

    	// $activities = Job::isActivity()->get();

        $jobs = Job::all();

        $comments = Comment::all();

        $activities = $jobs->merge($comments)->sortByDesc('updated_at')->take(9);

    	$jobsTotal = Job::all()->count();

    	$jobsNotClosedTotal = Job::isNotClosed()->count();

    	$jobsCounted = Job::selectRaw('
    		SUM(IF(category = "active", 1, 0)) AS active, 
    		SUM(IF(category = "inactive", 1, 0)) AS inactive, 
    		SUM(IF(status = "quoting", 1, 0)) AS quoting, 
    		SUM(IF(status = "planning", 1, 0)) AS planning, 
    		SUM(IF(status = "in progress", 1, 0)) AS in_progress, 
    		SUM(IF(status = "delivered", 1, 0)) AS delivered,
            SUM(IF(status = "approved", 1, 0)) AS approved,
            SUM(IF(status = "billed", 1, 0)) AS billed, 
    		SUM(IF(type = "prediction survey", 1, 0)) AS prediction_survey, 
    		SUM(IF(type = "site survey", 1, 0)) AS site_survey, 
    		SUM(IF(type = "validation survey", 1, 0)) AS validation_survey, 
    		SUM(IF(type = "troubleshoot", 1, 0)) AS troubleshoot, 
    		SUM(IF(type = "combination", 1, 0)) AS combination, 
    		SUM(IF(type = "other", 1, 0)) AS other')
    	->where('category', '!=', 'closed')
    	->get();

        // Events
        $events = Event::events();

        $subcalendars = Event::subcalendars();

        // View
	    return view('index', compact('deadlines', 'events', 'subcalendars', 'activities', 'jobsTotal', 'jobsNotClosedTotal', 'jobsCounted', 'message'));

    }

}
