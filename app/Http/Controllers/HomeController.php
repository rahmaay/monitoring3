<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function contactme(Request $r)
    {
        $data['contact'] = \App\contact::where('id_contact');


        $new = new \App\contact;
        $new->name = $r->input('name');
        $new->email = $r->input('email');
        $new->subject = $r->input('subject');
        $new->message = $r->input('message');

        $new->save();

        return redirect('/');
    }

    // ----------------URL REDIRECT TO ERROR404------------
     public function pagenotfound()
     {
         return view('503');
    }
}