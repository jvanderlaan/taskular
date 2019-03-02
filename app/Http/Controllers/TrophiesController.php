<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Trophy;
use Illuminate\Http\Request;

class TrophiesController extends Controller
{
    
    public function index()
    {

        $users = User::all();

        $trophies = Trophy::isAll()->get();

        return view('trophies/index', compact('trophies', 'users'));

    }

    public function store()
    {

       //Validation rules
        $this->validate(request(), [
            'name'        => 'required|max:30|unique:trophies',
            'description' => 'required|max:255',
            'trophy-img'  => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:1000',
            'holder1'     => 'nullable',
            'holder2'     => 'nullable',
            'holder3'     => 'nullable',
            'category'    => 'required',
        ]);

        //Create new job from POST data and save it to database
        Trophy::create([
            'user_id'     => Auth::user()->id,
            'name'        => request('name'),
            'description' => request('description'),
            'image_path'  => request()->file('trophy-img')->store('trophies'),
            'holder1'     => request('holder1'),
            'holder2'     => request('holder2'),
            'holder3'     => request('holder3'),
            'category'    => request('category'),
        ]);

        session()->flash('message', 'Trophy was created.');

        //Redicrect back to trophies page
        return redirect('trophies');

    }

    public function update(Trophy $trophy, Request $request)
    {

       //Validation rules
        $this->validate(request(), [
            'name'        => 'required|max:30',
            'description' => 'required|max:255',
            'trophy-img'  => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:1000',
            'holder1'     => 'nullable',
            'holder2'     => 'nullable',
            'holder3'     => 'nullable',
            'category'    => 'required',
        ]);

        //Update existing trophy from PATCH data and save it to database
        $trophy = Trophy::find($trophy->id);

        $trophy->user_id     = Auth::user()->id;
        $trophy->name        = request('name');
        $trophy->description = request('description');
        $trophy->image_path  = request()->file('trophy-img')->store('trophies');
        $trophy->holder1     = request('holder1');
        $trophy->holder2     = request('holder2');
        $trophy->holder3     = request('holder3');
        $trophy->category    = request('category');

        $trophy->save();

        session()->flash('message', 'Trophy was updated.');
        $request->flash();

        //Redicrect back to trophies page
        return redirect('trophies');

    }

    public function delete(Trophy $trophy)
    {

        $trophy->delete($trophy->id);

        session()->flash('message', 'Trophy was deleted.');

        return redirect('trophies');

    }

}
