<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Deactivate;

class AccountController extends Controller
{

	public function index()
    {

    	$user = Auth::user();

	    return view('account/index', compact('user'));

    }

    public function update(Request $request)
    {

       //Validation rules
        $this->validate(request(), [
            'avatar-img'  => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:1000',
        ]);

        //Update existing avatar from PATCH data and save it to database
        $user = Auth::user();

        $user->image_path = request()->file('avatar-img')->store('avatars');

        $user->save();

        session()->flash('message', 'Avatar was updated.');
        $request->flash();

        //Redicrect back to account page
        return redirect('account');

    }

    public function deactivate(Request $request)
    {

    	//Validation rules
        $this->validate(request(), [
            'status'  => 'required|max:1',
        ]);

        //Update user status from PATCH data and save it to database
        $user = Auth::user();

        $user->status = request('status');

        $user->save();

        session()->flash('message', 'Account was deactivated.');
        $request->flash();

        $name = $user->name;
        $admins = User::all()->where('role', 'Administrator');

        Mail::to($user)->send(new Deactivate($name, $admins));

        //Logout and redicrect to login screen
        Auth::logout();
        return redirect('login');

    }

}
