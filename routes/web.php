<?php

use App\Job;

// Auth

// Authentication Routes...
Auth::routes();


// Summary
Route::get('/', 'SummaryController@index');

Route::get('/home', 'SummaryController@index');


// Jobs
Route::get('/jobs', 'JobsController@active');

Route::get('/jobs/active', function() {
	return redirect('/jobs');
});

Route::get('/jobs/inactive', 'JobsController@inactive');

Route::get('/jobs/closed', 'JobsController@closed');

Route::get('/jobs/{job}', 'JobsController@show')->where('job', '[0-9]+');

Route::get('/jobs/create', 'JobsController@create');

Route::post('/jobs', 'JobsController@store');

Route::get('jobs/edit/{job}', 'JobsController@edit')->where('job', '[0-9]+');

Route::patch('/jobs/{job}', 'JobsController@update')->where('job', '[0-9]+');

Route::delete('/jobs/delete/{job}', 'JobsController@delete')->where('job', '[0-9]+');


// Details
Route::patch('/edit/details/{detail}', 'DetailsController@update')->where('detail', '[0-9]+');


//Comments

Route::post('/jobs/{job}/comments', 'CommentsController@store');

Route::patch('/edit/comment/{comment}', 'CommentsController@update')->where('comment', '[0-9]+');

Route::delete('/delete/comment/{comment}', 'CommentsController@delete')->where('comment', '[0-9]+');


//Schedule
Route::get('/schedule', 'ScheduleController@index');

//Tools
Route::get('/tools', 'ToolsController@index');


//Trophies
Route::get('/trophies', 'TrophiesController@index');

Route::post('/trophies', 'TrophiesController@store');

Route::patch('edit/trophy/{trophy}', 'TrophiesController@update')->where('trophy', '[0-9]+');

Route::delete('/delete/trophy/{trophy}', 'TrophiesController@delete')->where('trophy', '[0-9]+');


//Account
Route::get('/account', 'AccountController@index');

Route::patch('edit/avatar/{user}', 'AccountController@update')->where('user', '[0-9]+');

Route::patch('deactivate/{user}', 'AccountController@deactivate')->where('user', '[0-9]+');


//Administrate
Route::get('/admin', 'AdminController@index');

Route::get('/phpinfo', function () {
    phpinfo();
});






