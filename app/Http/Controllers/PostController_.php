<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Auth;
use Session;

class PostController extends Controller
{
		
	public function index()
    {
		$posts = Post::all();
		return view('posts.index')->withPosts($posts);
    }

	public function create()
    {
		return view('posts.create');
    }
	
	public function store(Request $request)
    {		
		$this->validate($request, array(
			'title' => 'required|max:255',
			'body'  => 'required'
		));
		
		$post = new Post();
		
		$post->title = $request->title;
        $post->body = $request->body;
		$post->user_id = Auth::id();
		
		$post->save();
		
		Session::flash('success', 'Το άρθρο δημιουργήθηκε επιτυχώς!');
		
		return redirect()->route('posts.show', $post->id);
    }
	
	public function show($id)
    {
		$post = Post::find($id);
		return view('posts.show')->withPost($post);
    }
	
    public function edit()
    {
        
    }
	
	public function destroy()
    {
        
    }

}
