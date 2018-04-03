<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class PagesController extends Controller
{
    public function index() {
        $title = "Welcome To Aston Event";
        return view('pages.index')->with('title',$title);
    }

    public function about() {
        $title = "About Us";
        return view('pages.about')->with('title',$title);
    }

    public function events() {
//        $event = Event::all();
        $event = Event::paginate(5);
        return view('pages.events')->with('events', $event);
    }

    public function show($id) {
        $event = Event::find($id);
        return view('pages.show')->with('event',$event);
    }
}
