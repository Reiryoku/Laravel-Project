<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\User;
use App\Movie;

use Mail;
use Session;

class SearchController extends Controller 
{	
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function search(Request $request)
	{	
		$query = $request->input('q');

		$users = User::where('first_name', 'LIKE', '%' . $query . '%')->orWhere('name', 'LIKE', '%' . $query . '%')->limit(12)->get();
		$posts = Post::where('title', 'LIKE', '%' . $query . '%')->limit(12)->get();
		$movies = Movie::where('original_title', 'LIKE', '%' . $query . '%')->orderBy('tmdb_popularity', 'desc')->limit(12)->get();
		
		return view('search.results')->withPosts($posts)->withMovies($movies)->withUsers($users)->withQuery($query);
	 }
}