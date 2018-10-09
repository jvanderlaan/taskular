<?php

use App\Job;

// Auth

Auth::routes();

// Summary

Route::get('/', 'SummaryController@index');

// Jobs

Route::get('/jobs', 'JobsController@active');

Route::get('/jobs/inactive', 'JobsController@inactive');

Route::get('/jobs/closed', 'JobsController@closed');

Route::get('/jobs/{job}', 'JobsController@show')->where('job', '[0-9]+');

Route::get('/jobs/create', 'JobsController@create');

Route::get('/jobs/edit', 'JobsController@update');

Route::post('/jobs', 'JobsController@store');

Route::post('/jobs/{job}/comments', 'CommentsController@store');

// Route::get('/jobs/delete', 'JobsController@delete');


//Schedule

Route::get('/schedule', 'ScheduleController@index');

//Tools

Route::get('/tools', 'ToolsController@index');

//Trophies

Route::get('/trophies', 'TrophiesController@index');

Route::get('/trophies/create', 'TrophiesController@create');

Route::get('/trophies/edit', 'TrophiesController@edit');

//Account

Route::get('/account', 'AccountController@index');

//Administrate

Route::get('/admin', 'AdminController@index');






