<?php

namespace App\Http\Controllers;

use App\Fundraiser;
use App\Comment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FundraiserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fundraisers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:5',
            'comment' => 'required|string|min:5',
            'rating' => 'required|numeric|min:0.5|max:5'
            ]);
             
        // Create a new Fundraiser
        $fund = new Fundraiser();
        $fund->title = $request->input('title');
        $fund->description = $request->input('description');
        $fund->rating = $request->input('rating');
        
        $fund->save();
        
        $request->fundraiser_id = $fund->id;
        
        $commentController = new CommentController();
        $commentController->store($request);
        
        return redirect('/')->with('success', "New fundraising charity \"{$fund->title}\" has been added");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        session(['fundraiser_id' => $id]);
        $drive = Fundraiser::findOrFail($id);
        $comments = Comment::where('fundraiser_id', $id)->get();
        $data = [$drive, $comments];
//print_r($comments);        
        //return view('fundraisers.show')->with('drive', $drive);
        return view('fundraisers.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
