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
}
