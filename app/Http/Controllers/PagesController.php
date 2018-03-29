<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $title = "Events";
        return view('pages.events')->with('title',$title);
    }
}
