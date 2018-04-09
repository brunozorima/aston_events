<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use DB;

class PagesController extends Controller
{
    public function index() {
        //Display events of the month
        $event = Event::whereMonth('date', '=', date('m'))->paginate(5);
        return view('pages.index')->with('events',$event);
    }

    public function about() {
        $title = "About Us";
        return view('pages.about')->with('title',$title);

    }

    public function events() {
        $title = "";
        $event = Event::paginate(10);
        return view('pages.events')->with('events', $event)->with('title',$title);

    }


    public function show($id) {
        $event = Event::find($id);
        return view('pages.show')->with('event',$event);
    }

    public function sport_events() {
        $title = "Sport";
        $event = Event::where('category','=', 'Sport')->paginate(5);
        return view('pages.events')->with('events',$event)->with('title',$title);
    }

    public function culture_events() {
        $title = "Culture";
        $event = Event::where('category','=', 'Culture')->paginate(5);
        return view('pages.events')->with('events',$event)->with('title',$title);
    }

    public function music_events() {
        $title = "Music";
        $event = Event::where('category','=', 'Music')->paginate(5);;
        return view('pages.events')->with('events',$event)->with('title',$title);
    }

    public function other_events() {
        $title = "Other";
        $event = Event::where('category','=', 'Other')->paginate(5);;
        return view('pages.events')->with('events',$event)->with('title',$title);
    }
    public function tests() {
        return view('pages.dropdown');
    }

    public function search() {
        $title = "";
        $search = \Request::get('search');  //the param of URI
        $event = Event::where('event_name', 'like', '%'.$search.'%')
            ->orderBy('event_name')
            ->paginate(20);
        return view('pages.events')->with('events', $event)->with('title',$title);
    }
}
