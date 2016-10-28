<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Post;
use Auth;
use Session;
use Image;
use Storage;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(4);
        //return view('user.index')->withUsers($users);
		dd($users);
    }
	
	public function posts($id)
    {
		$user = User::find($id);
        $posts = Post::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->paginate(2);
		return view('users.posts')->withUser($user)->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
    	$posts = Post::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->take(4)->get();
		return view('users.show')->withUser($user)->withPosts($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$user = User::find($id);
       	return view('users.edit')->withUser($user);
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
        $this->validate($request, array(
                'name' => 'required|max:255',
				'email' => 'required|max:255',
				'image' => 'image'
            ));
        // Save the data to the database
        $user = User::find($id);

        $user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->first_name = $request->input('first_name');
		$user->last_name = $request->input('last_name');
		$user->gender = $request->input('gender');
		
		if ($request->hasFile('avatar')) 
		{
        	$image = $request->file('avatar');
          	$filename = time() . '.' . $image->getClientOriginalExtension();
          	$location = public_path('uploads/images/' . $filename);
          	Image::make($image)->resize(100, 100)->save($location);
			$oldFilename = $user->avatar;
			// update the database
			$user->avatar = $filename;
			// delete old image
			Storage::delete($oldFilename);
        }

        $user->save();

        // set flash data with success message
        Session::flash('success', 'Το προφίλ ενημερώθηκε επιτυχώς!');

        // redirect with flash data to posts.show
        return redirect()->route('users.edit', $user->id);
    }
	
	public function avatar(Request $request)
	{
		
		$this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar'))
		{
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
			
			$dir = public_path('/uploads/avatars/'.Auth::user()->name);
			$path = $dir.'/'.$filename;
			
    		$img = Image::make($avatar);
			// resize the image to a width of 300 and constrain aspect ratio (auto height)
			$img->resize(300, null, function ($constraint) {
    			$constraint->aspectRatio();
			});
			
			// check if $folder is a directory
			if( ! File::isDirectory($dir) ) 
			{
		
				File::makeDirectory($dir, 493, true);
			}
			
			$img->save($path);

    		$user = Auth::user();
			
    		$user->avatar = $filename;
			
    		$user->save();
    	}
		
		// set flash data with success message
        Session::flash('success', 'Η εικόνα προφίλ ενημερώθηκε επιτυχώς!');

    	// redirect with flash data to posts.show
        return redirect()->route('users.edit', $user->id);

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
