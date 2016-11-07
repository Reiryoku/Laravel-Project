<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;
use Auth;
use Image;
use Storage;
use Session;

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
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);
		
        return view('posts.index')->withPosts($posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
		$tags = Tag::all();
		
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
        		'title' => 'required|max:255',
                'category_id'   => 'required|integer',
                'body'          => 'required',
				'image'         => 'required|image'
        ));

        // store in the database
        $post = new Post;

        $post->title = $request->title;
		$post->category_id = $request->category_id;
        $post->body = $request->body;
		$post->user_id = Auth::id();
		
		if ($request->hasFile('image')) 
		{
        	$image = $request->file('image');
          	$filename = time() . '.' . $image->getClientOriginalExtension();
          	$location = public_path('uploads/images/' . $filename);
          	Image::make($image)->resize(1160, null, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();} )->save($location);
			
          	$post->image = $filename;
        }

        $post->save();
		
		$post->tags()->sync($request->tags, false);

        Session::flash('success', 'Το άρθρο δημιουργήθηκε επιτυχώς!');

        return redirect()->route('posts.show', $post->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
		
        return view('posts.show')->withPost($post);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {		
		// find the post in the database and save as a var
        $post = Post::find($id);
		
        $categories = Category::all();
        $cats = array();
		
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
		
        $tags = Tag::all();
        $tags2 = array();
		
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }		
        // return the view and pass in the var we previously created
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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
		// Validate the data
        $post = Post::find($id);
		
        $this->validate($request, array(
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'body'  => 'required',
				'image' => 'image'
       	));
			
		// Save the data to the database
        $post = Post::find($id);	

        $post->title = $request->input('title');
        $post->body = $request->input('body');
		$post->category_id = $request->input('category_id');
		$post->user_id = Auth::id();
		
		if ($request->hasFile('image')) 
		{
        	$image = $request->file('image');
          	$filename = time() . '.' . $image->getClientOriginalExtension();
          	$location = public_path('uploads/images/' . $filename);
          	Image::make($image)->resize(1160, null, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();} )->save($location);
			$oldFilename = $post->image;
			// update the database
			$post->image = $filename;
			// delete old image
			Storage::delete($oldFilename);
        }

        $post->save();
		
		if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }

        // set flash data with success message
        Session::flash('success', 'Το άρθρο ενημερώθηκε επιτυχώς!');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
		
		$post->tags()->detach();
		Storage::delete($post->image);

        $post->delete();

        Session::flash('success', 'The post was successfully deleted.');
		
        return redirect()->route('posts.index');
    }
}