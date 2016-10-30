<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Permission;

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
		$categories = Category::orderBy('id', 'asc')->paginate(1);
        return view('dashboard.categories')->withCategories($categories);
	}

	public function tags()
	{
		$tags = Tag::all();
        return view('dashboard.tags')->withTags($tags);
	}
	
	public function users()
	{
		$users = User::with('roles')->orderBy('id', 'asc')->paginate(16);
        return view('dashboard.users')->withUsers($users);
	}

}
