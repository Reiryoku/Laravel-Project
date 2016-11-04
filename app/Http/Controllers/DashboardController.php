<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Permission;

use App\Post;
use App\Category;
use App\Tag;

use Session;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
        return view('dashboard.index');
    }
	
	public function categories()
	{
		$categories = Category::orderBy('id', 'asc')->paginate(10);
        return view('dashboard.categories')->withCategories($categories);
	}

	public function tags()
	{
		$tags = Tag::orderBy('id', 'asc')->paginate(10);
        return view('dashboard.tags')->withTags($tags);
	}
	
	public function users()
	{
		$users = User::with('roles')->orderBy('id', 'asc')->paginate(15);
        return view('dashboard.users')->withUsers($users);
	}
	
	public function posts()
	{
		$posts = Post::orderBy('created_at', 'desc')->paginate(10);
		$categories = Category::all();
		$tags = Tag::all();
        return view('dashboard.posts')->withPosts($posts)->withCategories($categories)->withTags($tags);
	}

}
