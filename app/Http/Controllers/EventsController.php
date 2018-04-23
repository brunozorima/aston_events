<?php

namespace App\Http\Controllers;

use App\Uploads;
use Illuminate\Http\Request;
use App\Event;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
//use Image;
use Intervention\Image\ImageManagerStatic as Image;
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
        //find the user in a database and assign it to user_id
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
        //validates the entered data before doing any manipulation with the data
        $this->validate($request, ['event_name' => 'required',
                'category' => 'required',
                'description' => 'required',
                'date' => 'required',
                'organiser' => 'required',
                'start_at' => 'required',
                'end_at' => 'required',
                'contact' => 'required',
                'location' => 'required',
                'postcode' => 'required',
                'county' => 'required',
                'cover_image[]' => 'sometime|image[]'
                ]
        );
        $events = New Event([
            'event_name' => $request->get('event_name'),
            'description' => $request->get('description'),
            'organiser' => $request->get('organiser'),
            'date' => $request->get('date'),
            'start_at' => $request->get('start_at'),
            'end_at' => $request->get('end_at'),
            'contact' => $request->get('contact'),
            'location' => $request->get('location'),
            'postcode' => $request->get('postcode'),
            'county' => $request->get('county'),
        ]);

        $events->category = Input::get('category');
        $events->user_id = auth()->user()->id;
        $events->save();


        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            $files = $request->file('cover_image');
            foreach ($files as $file){

               $filenameWithExt = $file->getClientOriginalName();
               $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
               $extension = $file->getClientOriginalExtension();
               $fileSize = $file->getClientSize();
               $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                $path = $file->storeAs('public/cover_images', $fileNameToStore);

                $upload = New Uploads;
                $upload->image_name = $fileNameToStore;
                $upload->image_size = $fileSize;
                $upload->user_id = auth()->user()->id;
                $upload->event_id = $events->id;
                $upload->save();
            }
            $events->cover_image = $fileNameToStore;
            $events->save();

        }

        else {
            $fileNameToStore = 'noimage.jpg';
            $events->cover_image = $fileNameToStore;
            $events->save();
        }
        return redirect('/event')->with('success', 'Event successfully added');
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
        $image = Uploads::find($event);

        return view('events.show')->with('events',$event)->with('images',$image);
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
                'postcode' => 'required',
                'county' => 'required',
                ]
        );

        $events = Event::find($id);
        $events->event_name = $request->get('event_name');
        $events->category  = $request->get('category');
        $events->description = $request->get('description');
        $events->date = $request->get('date');
        $events->start_at = $request->get('start_at');
        $events->end_at = $request->get('end_at');
        $events->contact = $request->get('contact');
        $events->location = $request->get('location');
        $events->postcode = $request->get('postcode');
        $events->county = $request->get('county');
        $events->save();

        // Handle File Upload on update
        if ($request->hasFile('cover_image')) {

            //delete any existing images before saving new ones
            $allUploads = Uploads::all();
            $images = Uploads::find($id);
            $images->delete();

            //Handle the file request
            $files = $request->file('cover_image');

            foreach ($files as $file){

                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileSize = $file->getClientSize();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                $path = $file->storeAs('public/cover_images', $fileNameToStore);

                $upload = New Uploads;
                $upload->image_name = $fileNameToStore;
                $upload->image_size = $fileSize;
                $upload->user_id = auth()->user()->id;
                $upload->event_id = $events->id;
                $upload->save();
            }

            $events->cover_image = $fileNameToStore;
            $events->save();
        }

        else if ($events->cover_image != 'noimage.jpg') {
            $upload = Uploads::find($id);
            $fileNameToStore = $upload->image_name;
            $events->cover_image = $fileNameToStore;
            $events->save();
        }
        else {
            $fileNameToStore = 'noimage.jpg';
            $events->cover_image = $fileNameToStore;
            $events->save();
        }
        return redirect('/event')->with('success','Event successfully Updated');
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
        $uploads = Uploads::find($id);
        $allUploads = Uploads::whereNotnull('event_id');

        //checks for the correct user
        if(auth()->user()->id !== $events->user_id) {
            return redirect('/event')->with('error','Unauthorized Page');
        }


        if($events->cover_image != 'noimage.jpg'){
            // Delete the main Image
            Storage::delete('public/cover_images/'.$events->cover_image);


        }

        $events->delete();
        $uploads->delete();
        return redirect('/event')->with('success','Event Removed');
    }
}
