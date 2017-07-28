<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use App\Fundraiser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drives = Fundraiser::all()->sortByDesc('rating');

        if(!empty($drives))
            return view('home')->with('drives', $drives);
        else
            return view('home');
    }
}
