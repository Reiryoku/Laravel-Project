<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TvShow;
use App\Season;

use Tmdb\Laravel\Facades\Tmdb;

class SeasonController extends Controller
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
    function show($id, $season_number)
    {
		$tvshow = Tvshow::find($id);
		$season = Season::where('season_number',$season_number)->where('tvshow_id',$tvshow->id)->get();
		dd($season);
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
	public function getSeason($id)
    {
		$tvshow = Tvshow::find($id);
		$tvshow_seasons = $tvshow->number_of_seasons;

		ini_set('max_execution_time', 600);
		for ($x = 1; $x <= $tvshow_seasons; $x++)
		{
			$season = Tmdb::getTvSeasonApi()->getSeason($id, $x);	

			if (!empty($season))
			{
				$season_data = 
					[
						'air_date' => $season['air_date'],
						'name' => $season['name'], 
						'overview' => $season['overview'],
						'poster_path' => $season['poster_path'],
						'season_number' => $season['season_number'],
						'id' => $season['id'],
						'tvshow_id' => $tvshow['id']
					];
											
				$season = Season::findOrNew($season_data['id']);
				
				$season->id = $season_data['id'];
				$season->air_date = $season_data['air_date'];
				$season->name = $season_data['name'];
				$season->overview = $season_data['overview'];
				$season->poster_path = $season_data['poster_path'];
				$season->season_number = $season_data['season_number'];
				$season->tvshow_id = $season_data['tvshow_id'];
				
				$season->save();
			}
		}
    }
}