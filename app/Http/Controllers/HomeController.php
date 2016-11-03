<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Movie;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
		$movies = Movie::orderBy('tmdb_popularity', 'desc')->limit(24)->get();
		
        return view('home')->withPosts($posts)->withMovies($movies);
    }
}
