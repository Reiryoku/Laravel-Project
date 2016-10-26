<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Post;
use Auth;
use Image;

class UserController extends Controller
{
	
	public function show($id){
		$user = User::find($id);
    	$posts = Post::where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->take(4)->get();
		return view('user.show')->withUser($user)->withPosts($posts);
    }

    public function update_avatar(Request $request){
		
    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalName();
			
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('user.profile', array('user' => Auth::user()) )->with('success','Image Upload successful');

    }
}
