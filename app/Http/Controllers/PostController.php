<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class PostController extends Controller
{
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
        $posts = Post::where('user_id', Auth::user()->id)->get();         
        return view('manage-post',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the form input
        $request->validate([
            'postTitle' => 'required|string|max:150',
            'post' => 'required|string',
            
        ], [
            'postTitle.required' => 'Opps! Post Title is required',
            'postTitle.max' => 'Opps! Post Title is too long',
            'post.required' => 'Opps! Post is required',
        ]);

        $posts = new Post;
        //$user = new User;
        
        // assign input values to the object
        $posts->postTitle = $request->postTitle;
        $posts->post = $request->post;
        $posts->user_id = Auth::user()->id;

        $posts->save();

        return redirect()->route('manage-post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('edit-post',compact('posts'));
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
        // validate the form input
        $request->validate([
            'postTitle' => 'required|string|max:150',
            'post' => 'required|string',
            
        ], [
            'postTitle.required' => 'Opps! Post Title is required',
            'postTitle.max' => 'Opps! Post Title is too long',
            'post.required' => 'Opps! Post is required',
        ]);

        $posts = Post::find($id);
        
        // assign input values to the object
        $posts->postTitle = $request->postTitle;
        $posts->post = $request->post;
        $posts->user_id = Auth::user()->id;

        $posts->update();

        return redirect()->route('manage-post');
    }

    public function fav($id){
        //$fav = Post::findOrFail($id);
        Post::where('id', $id)->update(['status'=>'FAVORITE']);
        //$fav->update(['status'=>'FAVORITE']);
        return redirect()->back();
    }

    public function complete($id){
        Post::where('id', $id)->update(['sts'=>'COMPLETE']);
        return redirect()->back();
    }

    public function un_complete($id){
        Post::where('id', $id)->update(['sts'=>NULL]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        $post->delete();
        
        return redirect()->route('manage-post');
    }
}
