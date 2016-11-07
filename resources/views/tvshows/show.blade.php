@extends('layouts.app')

@section('stylesheets')
	{!! Html::style('https://file.myfontastic.com/YCZ8RSupHiz3F6X4QzSdYd/icons.css') !!}
@endsection

@section('bodytag')
	<body class="tvshows show">
@endsection

@section('content')

<section id="summary-wrapper">    
    <div class="bg">
        <div class="bg lazy" style="background-image: url( https://image.tmdb.org/t/p/w1280/{{ $tvshow->backdrop_path }} );"></div>
    </div>
    <div class="shadow-base"></div>
    <div class="tvshow" id="summary-ratings-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2 col-sm-9 col-sm-offset-3">
                    <ul class="ratings">
                        <li itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                            <meta content="{!! $tvshow->tmdb_vote_average!!}" itemprop="ratingValue">
                            <meta content="0" itemprop="worstRating">
                            <meta content="10" itemprop="bestRating">
                            <div class="fa icon icon-tmdb tmdb"></div>
                            <div class="number">
                                <div class="rating">{!! $tvshow->tmdb_vote_average!!}</div>
                                <div class="votes">
                                	<span itemprop="ratingCount">{!! $tvshow->tmdb_vote_count !!} </span>ψήφοι
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="stats">
                        <li>
                            <div class="number">
                                <div class="rating"><i class="fa fa-eye" aria-hidden="true"></i> 3</div>
                                <div class="votes">Προβολές</div>
                            </div>
                        </li>
                        <li>
                            <div class="number">
                                <div class="rating"><i class="fa fa-comment-o" aria-hidden="true"></i> 94</div>
                                <div class="votes">comments</div>
                            </div>
                      	</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container summary">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2 col-sm-9 col-sm-offset-3">
                    <h1>{!! isset($tvshow->original_name) ? $tvshow->original_name : $tvshow->name !!} <span class="year">{!! date('Y', strtotime($tvshow->first_air_date)) !!}</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="info-wrapper">

	<div class="subnav-wrapper season-links">
		<div class="container">
    		<div class="row">
    			<div class="col-md-10 col-md-offset-2 col-sm-9 col-sm-offset-3 links-outer">
    				<label>ΚΥΚΛΟΙ</label>
    				<div class="links">
                    	<ul>
                        @foreach ($tvshow->seasons as $season)
                            <li><a href="{!! route('season.show', ['id'=> $season->tvshow_id,'season_number'=> $season->season_number ]) !!}">{!! $season->season_number !!}</a></li>
                        @endforeach
                    	</ul>
                    </div>
              	</div>
    		</div>
    	</div>
    </div>
    
	<div class="container">
		<div class="row">
            <div class="col-md-2 col-sm-3 hidden-xs">
                <div class="sidebar affixable" style="width: 173px;">
                    <div class="poster">
                        <img class="base" src="/img/noimage.png" alt="Poster">
                        <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="https://image.tmdb.org/t/p/w185/{{ $tvshow->poster_path }}">
                    </div>
                    <div class="scrollspy">
                        <ul class="nav sections">
                            <li><a href="#overview">Υποθεση</a></li>
                            <li><a href="#trailer-link">Trailer</a></li>
                            <li>
                                <a href="#comments-link">
                                	<span class="disqus-comment-count" data-disqus-url="http://subztv.local/tvshows/617-mad-max">Σχολια</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="external">
                    	@if($tvshow->tmdb_id)
                        <li><a target="_blank" href="https://www.themoviedb.org/tv/{!! $tvshow->tmdb_id !!}">TMDB<div class="fa fa-external-link"></div></a></li>
                        @endif
                        @if($tvshow->imdb_id)
                        <li><a target="_blank" href="https://www.imdb.com/title/{!! $tvshow->imdb_id !!}">IMDB<div class="fa fa-external-link"></div></a></li>
                        @endif
                        @if($tvshow->tvdb_id)
                        <li><a target="_blank" href="http://thetvdb.com/?id={!! $tvshow->tvdb_id !!}&tab=series">TVDB<div class="fa fa-external-link"></div></a></li>
                        @endif
                    </ul>
                    <ul class="vip-actions" id="lists">
                        <li><a href="" target="_blank"><button class="btn"><i class="fa fa-pencil" aria-hidden="true"></i>ΕΠΕΞΕΡΓΑΣΙΑ ΣΕΙΡΑΣ</button></a></li>
					</ul>
                </div>
            </div>
            
            <div class="col-md-10 col-sm-9 info" id="overview">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <ul class="additional-stats">
                        	<li><label>ΔΗΜΙΟΥΡΓΟΣ</label><span>{!! $tvshow->creators !!}</span></li>
                           	<li><label>ΠΡΩΤΗ ΠΡΟΒΟΛΗ</label><span>{!! date('l j F Y', strtotime($tvshow->first_air_date)) !!}</span></li>
                            <li><label>ΔΙΚΤΥΟ</label><span>{!! $tvshow->networks !!}</span></li>
                            <li><label>ΧΩΡΑ</label><span>{!! $tvshow->origin_country !!}</span></li>
                            <li><label>ΓΛΩΣΣΑ</label><span>{!! $tvshow->original_language !!}</span></li>
                            <li><label>ΚΥΚΛΟΙ</label><span>{!! $tvshow->number_of_seasons !!}</span></li>
                            <li><label>ΕΠΕΙΣΟΔΙΑ</label><span>{!! $tvshow->number_of_episodes !!}</span></li>
                            <li><label>ΔΙΑΡΚΕΙΑ ΕΠΕΙΣΟΔΙΟΥ</label><span>~{!! $tvshow->episode_runtime !!} λεπτά</span></li>
                            <li><label>ΕΤΑΙΡΙΑ ΠΑΡΑΓΩΓΗΣ</label><span>{!! $tvshow->production_companies !!}</span></li>
                            <li><label>ΕΙΔΟΣ</label><span>{!! $tvshow->genres !!}</span></li>
                            <li><label>ΚΑΤΑΣΤΑΣΗ</label><span>{!! $tvshow->status !!}</span></li>
                        </ul>
                        <div id="overview" itemprop="description">{!! $tvshow->overview !!}</div>
                    </div>
                    <div class="hidden-xs hidden-sm col-lg-4 col-md-5 action-buttons">

                    </div>
                </div>
                <h2 id="trailer-link">
                	<i class="glyphicon glyphicon-film" aria-hidden="true"></i>Trailer
                </h2>
                <div id="trailer">
                    <div class="row fanarts">
                        <div class="grid-item col-sm-12 col-md-12">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" data-original="http://www.youtube.com/embed/{!! $tvshow->trailer !!}"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            
		</div>
	</div>
</section>

<section id="related-wrapper">
	<div class="container">
        <h2><i class="fa fa-film"></i> Εαν σου αρεσε αυτη η  ταινια  ισως σου αρεσει επισης...</h2>
        <div class="row posters">
			@foreach($similars as $similar)                                                            
			<div class="grid-item col-xs-4 col-md-2 col-sm-3">
                <a class="titles-link" href="{{ route('tvshow.show', $similar->id) }}">
                    <div class="poster">
                        <img class="base" src="/img/noimage.png" alt="Poster">
                        <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="https://image.tmdb.org/t/p/w185/{!! $similar->poster_path !!}">
                        <div class="shadow-base"></div>
                    </div>
                </a>
                <div class="titles">
                    <h3>{!! isset($similar->original_name) ? $similar->original_name : $similar->name !!}</h3>
                    <h4>{!! date('Y', strtotime($similar->first_air_date)) !!}</h4>
                </div>
			</div>
			@endforeach                   			                			                			                			                                			                			                			
  		</div>   
	</div>   
</section>

@endsection

@section('scripts')
<script>
	$('body').scrollspy(
		{ target: '.scrollspy', offset: 470 }
	)
	$('.affixable').affix({
		offset: {     
		  top: 290,
		  bottom: ($('footer').outerHeight(true) + $('#main-search').outerHeight(true) + $('#related-wrapper').outerHeight(true)) + 40
		}
	});
</script>
@endsection