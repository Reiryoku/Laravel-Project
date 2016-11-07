<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TvShow;

use Tmdb\Laravel\Facades\Tmdb;

class TvShowController extends Controller
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
        $tvshows = Tvshow::orderBy('tmdb_popularity', 'desc')->paginate(24);
        return view('tvshows.index')->withTvshows($tvshows);		
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
        $tvshow = Tvshow::find($id);
		
		// Get Tv Shows
		$url = Tmdb::getTvApi()->getSimilar($id);
		$results = $url['results'];	
		
		if (!empty($results))
		{
			$tmdb_id = [];
			foreach($results as $result) 
			{
     			$tmdb_id[] = $result['id'];
    		}
			$similars = Tvshow::whereIn('tmdb_id', $tmdb_id)->orderBy('tmdb_popularity','desc')->limit(6)->get();
		}		
        return view('tvshows.show')->withTvshow($tvshow)->withSimilars($similars);
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
		for ($x = 1; $x <= 30; $x++)
		{
			$url = Tmdb::getTvApi()->getPopular(['page' => $x]);
			$results = $url['results'];	
		
			if (!empty($results))
			{
				foreach($results as $result)
				{
					// tvshow TMDB ID		
					$tmdb_id = $result['id'];
					// tvshow Original Name	
					$original_name = $result['name'];
					
					$tvshow = Tmdb::getTvApi()->getTvshow($tmdb_id, ['language' => 'el']);			
					// tvshow Title	
					$name = $tvshow['name'];
					// tvshow Backdrop		
					$backdrop_path = '';
					if (!empty($tvshow['backdrop_path']))
					{
						$backdrop_path = $tvshow['backdrop_path'];
					}
					// tvshow Creators
					$creators = '';
					if (!empty($tvshow['created_by'][0]))
					{
						$creators = $tvshow['created_by'];
						$g = [];
						foreach ($creators as $creator) 
						{
							$g[]= $creator['name'];
						}
						$p = array_slice($g, 0, 4);
						$creators = implode(", ", $p);
					}
					// tvshow Genres
					$genres = '';
					if (!empty($tvshow['genres'][0]))
					{
						$genres = $tvshow['genres'];
						$g = [];
						foreach ($genres as $genre) 
						{
							$g[]= $genre['name'];
						}
						$p = array_slice($g, 0, 4);
						$genres = implode(", ", $p);
					}							
					// tvshow Episode Runtime
					$episode_runtime = '';
					if (!empty($tvshow['episode_run_time'][0]))
					{
						$episode_runtime = $tvshow['episode_run_time'][0];
					}
					// tvshow First Aired
					$first_air_date = $tvshow['first_air_date'];
					// tvshow Homepage
					$homepage = $tvshow['homepage'];
					// tvshow Languages
					$languages = '';
					if (!empty($tvshow['languages'][0]))
					{
						$languages = $tvshow['languages'][0];
					}			
					// tvshow Last Air Date
					$last_air_date = $tvshow['last_air_date'];
					// tvshow Networks
					$networks = '';
					if (!empty($tvshow['networks'][0]))
					{
						$networks = $tvshow['networks'];
						$g = [];
						foreach ($networks as $network) 
						{
							$g[]= $network['name'];
						}
						$p = array_slice($g, 0, 4);
						$networks = implode(", ", $p);
					}
					// tvshow Number of Episodes
					$number_of_episodes = $tvshow['number_of_episodes'];
					// tvshow Number of Seasons
					$number_of_seasons = $tvshow['number_of_seasons'];	
					// tvshow Origin Country
					$origin_country = '';
					if (!empty($tvshow['origin_country'][0]))
					{
						$origin_country = $tvshow['origin_country'][0];
					}
					// tvshow Original Language
					$original_language = $tvshow['original_language'];
					// tvshow Overview
					$overview = $tvshow['overview'];
					// tvshow Popularity
					$tmdb_popularity = $tvshow['popularity'];
					// tvshow Poster		
					$poster_path = '';
					if (!empty($tvshow['poster_path']))
					{
						$poster_path = $tvshow['poster_path'];
					}
					// tvshow Production Companies
					$production_companies = '';
					if (!empty($tvshow['production_companies'][0]))
					{
						$production_companies = $tvshow['production_companies'];
						$g = [];
						foreach ($production_companies as $production_company) 
						{
							$g[]= $production_company['name'];
						}
						$p = array_slice($g, 0, 4);
						$production_companies = implode(", ", $p);
					}	
					// tvshow Status
					$status = $tvshow['status'];
					// tvshow Type
					$type = $tvshow['type'];
					// tvshow Average
					$tmdb_vote_average = $tvshow['vote_average'];
					// tvshow Count
					$tmdb_vote_count = $tvshow['vote_count'];
					// tvshow Trailer		
					$trailers = Tmdb::getTvApi()->getVideos($tmdb_id);
					$trailer = '';
					if (!empty($trailers['results'][0]))
					{
						$trailer = $trailers['results'][0]['key'];
					}		
					// tvshow External IDs	
					$externals = Tmdb::getTvApi()->getExternalIds($tmdb_id);
					if (!empty($externals))
					{
						$imdb_id = $externals['imdb_id'];
  						$tvdb_id = $externals['tvdb_id'];
  						$tvrage_id = $externals['tvrage_id'];
					}
					// tvshow Slug
					$slug = str_slug($original_name.'-'.date('Y', strtotime($first_air_date)), '-');
					$tvshow_data = 
					[
						'backdrop_path' => $backdrop_path, 
						'creators' => $creators, 
						'episode_runtime' => $episode_runtime, 
						'first_air_date' => $first_air_date, 
						'genres' => $genres, 
						'homepage' => $homepage, 
						'tmdb_id' => $tmdb_id,  
						'languages' => $languages, 
						'last_air_date' => $last_air_date, 
						'name' => $name,
						'networks' => $networks, 
						'number_of_episodes' => $number_of_episodes, 
						'number_of_seasons' => $number_of_seasons, 
						'origin_country' => $origin_country, 
						'original_language' => $original_language, 
						'original_name' => $original_name, 
						'overview' => $overview, 
						'tmdb_popularity' => $tmdb_popularity, 
						'poster_path' => $poster_path,
						'production_companies' => $production_companies,
						'status' => $status,
						'type' => $type,
						'tmdb_vote_average' => $tmdb_vote_average, 
						'tmdb_vote_count' => $tmdb_vote_count,
						'trailer' => $trailer, 
						'imdb_id' => $imdb_id, 
						'tvdb_id' => $tvdb_id,
						'tvrage_id' => $tvrage_id,
						'slug' => $slug
					];
					
					$tvshow = Tvshow::findOrNew($tmdb_id);
					
					$tvshow->id = $tvshow_data['tmdb_id'];
					$tvshow->backdrop_path = $tvshow_data['backdrop_path'];
					$tvshow->creators = $tvshow_data['creators'];
					$tvshow->episode_runtime = $tvshow_data['episode_runtime'];
					$tvshow->first_air_date = $tvshow_data['first_air_date'];
					$tvshow->genres = $tvshow_data['genres'];
					$tvshow->homepage = $tvshow_data['homepage'];
					$tvshow->tmdb_id = $tvshow_data['tmdb_id'];
					$tvshow->languages = $tvshow_data['languages'];
					$tvshow->last_air_date = $tvshow_data['last_air_date'];
					$tvshow->name = $tvshow_data['name'];
					$tvshow->networks = $tvshow_data['networks'];
					$tvshow->number_of_episodes = $tvshow_data['number_of_episodes'];
					$tvshow->number_of_seasons = $tvshow_data['number_of_seasons'];
					$tvshow->origin_country = $tvshow_data['origin_country'];
					$tvshow->original_language = $tvshow_data['original_language'];
					$tvshow->original_name = $tvshow_data['original_name'];
					$tvshow->overview = $tvshow_data['overview'];
					$tvshow->tmdb_popularity = $tvshow_data['tmdb_popularity'];
					$tvshow->poster_path = $tvshow_data['poster_path'];
					$tvshow->production_companies = $tvshow_data['production_companies'];
					$tvshow->status = $tvshow_data['status'];
					$tvshow->type = $tvshow_data['type'];
					$tvshow->tmdb_vote_average = $tvshow_data['tmdb_vote_average'];
					$tvshow->tmdb_vote_count = $tvshow_data['tmdb_vote_count'];
					$tvshow->trailer = $tvshow_data['trailer'];
					$tvshow->imdb_id = $tvshow_data['imdb_id'];
					$tvshow->tvdb_id = $tvshow_data['tvdb_id'];
					$tvshow->tvrage_id = $tvshow_data['tvrage_id'];
					$tvshow->slug = $tvshow_data['slug'];	
											
					$tvshow->save();
				}
			}
		}
    }
}
