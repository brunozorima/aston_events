<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use Illuminate\Support\Facades\Storage;
class eventsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $event = Event::all();
////        $event = Event::paginate(1);
//        return view('events.dashboard')->with('events', $event);

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('events.dashboard')->with('events',$user->event);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //creates an event
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['event_name' => 'required',
                'category' => 'required',
                'description' => 'required',
                'date' => 'required',
                'organiser' => 'required',
                'start_at' => 'required',
                'end_at' => 'required',
                'contact' => 'required',
                'location' => 'required',
                'cover_image' => 'image|nullable|max:1999']
        );

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $events = New Event([
            'event_name'    => $request->get('event_name'),
            'category'    => $request->get('category'),
            'description'    => $request->get('description'),
            'organiser'    => $request->get('organiser'),
            'date'    => $request->get('date'),
            'start_at'    => $request->get('start_at'),
            'end_at'    => $request->get('end_at'),
            'contact'    => $request->get('contact'),
            'location'    => $request->get('location'),
        ]);
        $events->cover_image = $fileNameToStore;
        $events->user_id = auth()->user()->id;
        $events->save();
        return redirect('/event')->with('success','Event successfully added');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show')->with('events',$event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        //checks for the correct user
        if(auth()->user()->id !== $event->user_id) {
            return redirect('/event')->with('error','Unauthorized Page');
        }

        return view('events.edit')->with('events',$event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['event_name' => 'required',
                'category' => 'required',
                'description' => 'required',
                'date' => 'required',
                'start_at' => 'required',
                'end_at' => 'required',
                'contact' => 'required',
                'location' => 'required',
                'cover_image' => 'image|nullable|max:1999']
        );

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $events = Event::find($id);
        $events->event_name = $request->get('event_name');
        $events->category  = $request->get('category');
        $events->description = $request->get('description');
        $events->date = $request->get('date');
        $events->start_at = $request->get('start_at');
        $events->end_at = $request->get('end_at');
        $events->contact = $request->get('contact');
        $events->location = $request->get('location');

        if($request->hasFile('cover_image')){
            if ($events->cover_image != 'noimage.jpg') {
                Storage::delete('public/cover_images/' . $events->cover_image);
            }
            $events->cover_image = $fileNameToStore;
        }
        $events->save();
        return redirect('/event')->with('success','Event successfully Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events = Event::find($id);

        //checks for the correct user
        if(auth()->user()->id !== $events->user_id) {
            return redirect('/event')->with('error','Unauthorized Page');
        }


        if($events->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$events->cover_image);
        }


        $events->delete();
        return redirect('/event')->with('success','Event Removed');
    }

}
