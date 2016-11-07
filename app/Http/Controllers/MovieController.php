<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;

use Tmdb\Laravel\Facades\Tmdb;

class MovieController extends Controller
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
        $movies = Movie::orderBy('created_at', 'desc')->paginate(24);
		
        return view('movies.index')->withMovies($movies);
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
        $movie = Movie::find($id);
		
		// Get similar movies
		$url = Tmdb::getMoviesApi()->getSimilar($id);
		$results = $url['results'];	
		
		if (!empty($results))
		{
			$tmdb_id = [];
			foreach($results as $result) 
			{
     			$tmdb_id[] = $result['id'];
    		}
			$similars = Movie::whereIn('tmdb_id', $tmdb_id)->orderBy('tmdb_popularity','desc')->limit(6)->get();
		}		
        return view('movies.show')->withMovie($movie)->withSimilars($similars);
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
	public function getPopular()
    {
		ini_set('max_execution_time', 600);
		for ($x = 1; $x <= 10; $x++)
		{
			$url = Tmdb::getMoviesApi()->getPopular(['page' => $x]);
			$results = $url['results'];	
		
			if (!empty($results))
			{
				foreach($results as $result)
				{
		
					// Movie TMDB ID		
					$tmdb_id = $result['id'];
					$original_title = $result['title'];
					
					$movie = Tmdb::getMoviesApi()->getMovie($tmdb_id, ['language' => 'el']);
		
					// Movie IMDB ID		
					$imdb_id = $movie['imdb_id'];		
					// Movie Title		
					$title = $movie['title'];
					// Movie Poster		
					$poster = '';
					if (!empty($movie['poster_path']))
					{
						$poster = $movie['poster_path'];
					}
					// Movie Backdrop		
					$backdrop = '';
					if (!empty($movie['backdrop_path']))
					{
						$backdrop = $movie['backdrop_path'];
					}	
					// Movie Overview		
					$overview = $movie['overview'];
					// Movie Released Date		
					$release_date = $movie['release_date'];
					// Movie Genre
					$genres = '';
					if (!empty($movie['genres'][0]))
					{
						$genres = $movie['genres'];
						$g = [];
						foreach ($genres as $genre) 
						{
							$g[]= $genre['name'];
						}
						$p = array_slice($g, 0, 4);
						$genres = implode(", ", $p);
					}
					// Movie TMDB Popularity		
					$tmdb_popularity = $movie['popularity'];
					// Movie Budget		
					$budget = number_format($movie['budget']);
					// Movie Revenue
					$revenue = number_format($movie['revenue']);
					// Movie Homepage		
					$homepage = $movie['homepage'];
					// Movie Original Language		
					$original_language = $movie['original_language'];
					// Movie Trailer		
					$trailers = Tmdb::getMoviesApi()->getVideos($tmdb_id);
					$trailer = '';
					if (!empty($trailers['results'][0]))
					{
						$trailer = $trailers['results'][0]['key'];
					}
					// Movie Runtime
					$runtime = $movie['runtime'];		
					// Movie Status
					$status = $movie['status'];		
					// Movie Trailer
					$tagline = $movie['tagline'];		
					// Movie Vote Average		
					$tmdb_vote_average = $movie['vote_average'];		
					// Movie Vote Count
					$tmdb_vote_count = $movie['vote_count'];					
					$production_companies = '';
					if (!empty($movie['production_companies'][0]))
					{
						$production_companies = $movie['production_companies'];
						$g = [];
						foreach ($production_companies as $production_company) 
						{
							$g[]= $production_company['name'];
						}
						$p = array_slice($g, 0, 4);
						$production_companies = implode(", ", $p);
					}
					// Movie Production Countries
					$production_countries = '';
					if (!empty($movie['production_countries'][0]))
					{
						$production_countries = $movie['production_countries'];
						$g = [];
						foreach ($production_countries as $production_country) 
						{
							$g[]= $production_country['name'];
						}
						$p = array_slice($g, 0, 4);
						$production_countries = implode(", ", $p);
					}
					// Movie Spoken Languages
					$spoken_languages = '';
					if (!empty($movie['spoken_languages'][0]))
					{
						$spoken_languages = $movie['spoken_languages'];
						$g = [];
						foreach ($spoken_languages as $spoken_language) 
						{
							$g[]= $spoken_language['name'];
						}
						$p = array_slice($g, 0, 4);
						$spoken_languages = implode(", ", $p);
					}
					// Movie Slug
					$slug = str_slug($original_title.'-'.date('Y', strtotime($release_date)), '-');
					$movie_data = 
					[
						'backdrop' => $backdrop,
						'budget' => $budget,
						'genres' => $genres, 
						'homepage' => $homepage,
						'tmdb_id' => $tmdb_id, 
						'imdb_id' => $imdb_id, 
						'title' => $title, 
						'original_title' => $original_title, 
						'poster' => $poster, 
						'overview' => $overview, 
						'release_date' => $release_date, 
						'tmdb_popularity' => $tmdb_popularity, 
						'revenue' => $revenue, 
						'original_language' => $original_language, 
						'runtime' => $runtime, 
						'status' => $status, 
						'tagline' => $tagline, 
						'tmdb_vote_average' => $tmdb_vote_average, 
						'tmdb_vote_count' => $tmdb_vote_count, 
						'trailer' => $trailer,
						'production_companies' => $production_companies,
						'production_countries' => $production_countries,
						'spoken_languages' => $spoken_languages,
						'slug' => $slug
					];
					
					// $movie = new Movie
					$movie = Movie::findOrNew($tmdb_id);
					
					$movie->id = $movie_data['tmdb_id'];
					$movie->tmdb_id = $movie_data['tmdb_id'];
					$movie->imdb_id = $movie_data['imdb_id'];
					$movie->title = $movie_data['title'];
					$movie->original_title = $movie_data['original_title'];
					$movie->poster_path = $movie_data['poster'];
					$movie->backdrop_path = $movie_data['backdrop'];
					$movie->overview = $movie_data['overview'];
					$movie->release_date = $movie_data['release_date'];
					$movie->genres = $movie_data['genres'];
					$movie->tmdb_popularity = $movie_data['tmdb_popularity'];
					$movie->budget = $movie_data['budget'];
					$movie->revenue = $movie_data['revenue'];
					$movie->homepage = $movie_data['homepage'];
					$movie->original_language = $movie_data['original_language'];
					$movie->runtime = $movie_data['runtime'];
					$movie->status = $movie_data['status'];
					$movie->tagline = $movie_data['tagline'];
					$movie->tmdb_vote_average = $movie_data['tmdb_vote_average'];
					$movie->tmdb_vote_count = $movie_data['tmdb_vote_count'];
					$movie->trailer = $movie_data['trailer'];
					$movie->production_companies = $movie_data['production_companies'];
					$movie->production_countries = $movie_data['production_countries'];
					$movie->spoken_languages = $movie_data['spoken_languages'];
					$movie->slug = $movie_data['slug'];					
		
					$movie->save();
				}
			}
		}
    }	
}
