<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrophiesController extends Controller
{
    
    public function index()
    {

	    return view('trophies/index');

    }

    public function create()
    {

	    return view('trophies/create');

    }

    public function edit()
    {

	    return view('trophies/edit');

    }

}
