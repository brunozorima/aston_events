<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $user_id = auth()->user()->id;
//        $user = User::find($user_id);
//        return view('events.dashboard')->with('events',$user->event);

    }

    public function destroy($id)
    {
        //destroy a user

        //find the user in a database and assign it to user_id
        $user_id = auth()->user()->id;

        $user = User::find($user_id);
        $event = Event::find($user_id);

        //checks for the correct user
        if($user_id!== Auth::user()->id ) {
            return redirect('/events')->with('error','Unauthorized Page');
        }

    }


}
