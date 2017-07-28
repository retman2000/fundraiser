<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Fundraiser;
use Auth;
use DB;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if current user has already left a comment return msg stating such
        $comment_exists = DB::table('comments')->where([['user_id', Auth::user()->id], ['fundraiser_id', session('fundraiser_id')]])->count();
//die("exists: $comment_exists");
        if($comment_exists) {
            $errors[] = 'You can only leave one comment per fundraiser.';
        }
//die(print_r($errors));
        
            return view('comments.create')->with('errors', $errors);
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
            'user' => "unique:comments,user_id,NULL,id,fundraiser_id,".$request->fundraiser,
            'comment' => 'required|string|min:5',
            'rating' => 'required|numeric|min:0.5|max:5'
        ]);
             
        // Create a new Fundraiser
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->fundraiser_id = $request->fundraiser;
        $comment->comment = $request->input('comment');
        $comment->rating = $request->input('rating');
        
        $comment->save();
        
        $this->updateRatingAverage($request->fundraiser);
        
        return redirect('/fundraisers/'.$request->fundraiser)->with('success', "New comment added");
    }

    /**
     * Calculate the Charity's average rating
     * 
     * @param int $fundraiser_id
     */
    private function updateRatingAverage($fundraiser_id)
    {
        $avg_rating = Comment::where('fundraiser_id', $fundraiser_id)->avg('rating');
        
        $fund = Fundraiser::find($fundraiser_id);
        $fund->rating = $avg_rating;
        $fund->save();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //session(['fundraiser_id' => $id]);
        $comments = Comment::findOrFail($id);

        return view('comments.show')->with('comments', $comments);
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
