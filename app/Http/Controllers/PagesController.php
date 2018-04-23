<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Event;
use App\Uploads;
use DB;
use Storage;

class PagesController extends Controller
{
    public function index() {
        //Display events of the month
        $event = Event::whereMonth('date', '=', date('m'))->paginate(3);
        $sport_events = Event::where('category','=', 'Sport')->paginate(3);
        $popular = Event::orderBy('event_likes','desc')->paginate(3);
        $new_events = Event::orderBy('date','asc')->paginate(3);
        return view('pages.index')->with('events',$event)->with('sportEvents',$sport_events)->with('popularEvents',$popular)->with('newestEvents',$new_events);
    }

    public function about() {
        $title = "About Us";
        return view('pages.about')->with('title',$title);

    }

    public function events() {
        $title = "All ";
        $event = Event::paginate(10);

        return view('pages.events')->with('events', $event)->with('title',$title);
    }


    public function show($id) {
        $event = Event::find($id);
        $image = Uploads::find($event);

        $user_info = User::find($event);
        $user_email = $user_info[0]->email;


        return view('pages.show')->with('event',$event)->with('images',$image)->with('user_email',$user_email);
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

    public function search() {
        $search = \Request::get('search');  //the param of URI
        $title = "";
        $event = Event::where('event_name', 'like', '%'.$search.'%')
            ->orderBy('event_name','asc')
            ->orWhere('organiser', 'like', '%'.$search.'%')
            ->paginate(20);
        return view('pages.events')->with('events', $event)->with('title',$title);
    }

    public function contact_organiser($id) {
         $event = Event::find($id);
        return view('pages.contactForm')->with('events',$event);

    }

    public function newest_events() {
        //display most recent event
        $title = "Upcoming ";
        $event = Event::orderBy('date','asc')->paginate(20);
        return view('pages.events')->with('events', $event)->with('title',$title);

    }
    public function oldest_events() {
        //display most recent event
        $title = "Future ";
        $event = Event::orderBy('date','desc')->paginate(20);
        return view('pages.events')->with('events', $event)->with('title',$title);

    }

    public function most_liked_events() {
        //display most recent event
        $title = "Most Liked ";
        $event = Event::orderBy('event_likes','desc')->paginate(20);
        return view('pages.events')->with('events', $event)->with('title',$title);

    }
    public function least_liked_events() {
        //display most recent event
        $title = "Most Liked ";
        $event = Event::orderBy('event_likes','asc')->paginate(20);
        return view('pages.events')->with('events', $event)->with('title',$title);

    }


    public function sort_by_name_asc() {
        //display most recent event
        $title = "";
        $event = Event::orderBy('event_name','asc')->paginate(20);
        return view('pages.events')->with('events', $event)->with('title',$title);

    }
    public function sort_by_name_desc() {
        //display most recent event
        $title = "";
        $event = Event::orderBy('event_name','desc')->paginate(20);
        return view('pages.events')->with('events', $event)->with('title',$title);

    }

    public function send(Request $request) {
        $this->validate($request, ['name'=>'required',
            'surname' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Mail::send('email.send', ['name' => $name, 'email' => $email, 'query' => $query], function($message){

            $message->from('examplefrom@gmail.com', 'Example');

            $message->to('Exampleto@gmail.com');
        });

        return view('pages.about');
    }

    public function like_event($id) {
        $events = Event::find($id);
        $events->event_likes = $events->event_likes + 1;
        $events->save();
        return redirect()->back()->with('success','Event successfully Liked');

    }
}
