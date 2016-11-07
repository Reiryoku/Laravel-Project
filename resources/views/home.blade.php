@extends('layouts.app')

@section('bodytag')
	<body class="home">
@endsection

@section('content')

<section id="main-wrapper" class="popular-movies">
	<div class="container">
		<h2 class="section">
        	<i class="fa fa-calendar"></i>ΔΗΜΟΦΙΛΕΙΣ ΤΑΙΝΙΕΣ 
        </h2>
		<div class="row posters">
			@foreach( $movies as $movie)
				<div class="grid-item col-xs-4 col-md-2 col-sm-3">
                	<a class="titles-link" href="{!! route('movie.show', $movie->id) !!}">
                        <div class="poster">
                            <img class="base" src="/img/noimage.png" alt="Poster">
                            <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="https://image.tmdb.org/t/p/w185/{!! $movie->poster_path !!}">
                            <div class="shadow-base"></div>
                        </div>
					</a>
                    <div class="titles">
						<h3>{!! isset($movie->original_title) ? $movie->original_title : $movie->title !!}</h3>
                        <h4>{!! date('Y', strtotime($movie->release_date)) !!}</h4>   
					</div>
				</div>
			@endforeach
		</div>
		<a href="{!! action('MovieController@getPopular') !!}" class="text-center">
  			<button type="button" class="btn btn-danger" id="bt1"></button>
		</a> 
	</div>   
</section>

<section id="main-wrapper" class="popular-tvshows">
	<div class="container">
		<h2 class="section">
        	<i class="fa fa-calendar"></i>ΔΗΜΟΦΙΛΕΙΣ ΣΕΙΡΕΣ
        </h2>
		<div class="row posters">
			@foreach( $tvshows as $tvshow)
				<div class="grid-item col-xs-4 col-md-2 col-sm-3">
                	<a class="titles-link" href="{!! route('tvshow.show', $tvshow->id) !!}">
                        <div class="poster">
                            <img class="base" src="/img/noimage.png" alt="Poster">
                            <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="https://image.tmdb.org/t/p/w185/{!! $tvshow->poster_path !!}">
                            <div class="shadow-base"></div>
                        </div>
					</a>
                    <div class="titles">
						<h3>{!! isset($tvshow->original_name) ? $tvshow->original_name : $tvshow->name !!}</h3>
                        <h4>{!! date('Y', strtotime($tvshow->first_air_date)) !!}</h4>
					</div>
				</div>
			@endforeach
		</div>
		<a href="{!! action('TvShowController@getPopular') !!}" class="text-center">
  			<button type="button" class="btn btn-danger" id="bt1"></button>
		</a> 
	</div>   
</section>

@endsection
