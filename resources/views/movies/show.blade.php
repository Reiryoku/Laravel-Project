@extends('layouts.app')

@section('stylesheets')
	{!! Html::style('https://file.myfontastic.com/YCZ8RSupHiz3F6X4QzSdYd/icons.css') !!}
@endsection

@section('bodytag')
	<body class="movies show">
@endsection

@section('content')

<section id="summary-wrapper">    
    <div class="bg">
        <div class="bg lazy" style="background-image: url( https://image.tmdb.org/t/p/w1280/{{ $movie->backdrop_path }} );"></div>
    </div>
    <div class="shadow-base"></div>
    <div class="movie" id="summary-ratings-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2 col-sm-9 col-sm-offset-3">
                    <ul class="ratings">
                        <li itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                            <meta content="{!! $movie->tmdb_vote_average!!}" itemprop="ratingValue">
                            <meta content="0" itemprop="worstRating">
                            <meta content="10" itemprop="bestRating">
                            <div class="fa icon icon-tmdb tmdb"></div>
                            <div class="number">
                                <div class="rating">{!! $movie->tmdb_vote_average!!}</div>
                                <div class="votes"><span itemprop="ratingCount">{!! $movie->tmdb_vote_count !!} </span>ψήφοι</div>
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
                    <h1>{!! isset($movie->original_title) ? $movie->original_title : $movie->title !!} <span class="year">{!! date('Y', strtotime($movie->release_date)) !!}</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="info-wrapper">
	<div class="container">
		<div class="row">
            <div class="col-md-2 col-sm-3 hidden-xs">
                <!-- Sidebar -->
                <div class="sidebar affixable" style="width: 173px;">
                    <!-- Poster -->
                    <div class="poster">
                        <img class="base" src="/img/noimage.png" alt="Poster">
                        <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="https://image.tmdb.org/t/p/w185/{{ $movie->poster_path }}">
                    </div>
                    <div class="scrollspy">
                        <!-- Sections -->
                        <ul class="nav sections">
                            <li><a href="#overview">Υποθεση</a></li>
                            <li><a href="#trailer-link">Trailer</a></li>
                            <li>
                                <a href="#comments-link">
                                	<span class="disqus-comment-count" data-disqus-url="http://subztv.local/movies/617-mad-max">Σχολια</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="external">
                        <li>
                            <a target="_blank" href="https://www.themoviedb.org/movie/{!! $movie->tmdb_id !!}">
                                TMDB
                                <div class="fa fa-external-link"></div>
                            </a>
                        </li>
                    </ul>
                    <ul class="vip-actions" id="lists">
                        <li>
                            <button class="btn" id="watchlist" data-bind="click: handleLists.bind($data, 'watchlist')">
                                <!-- ko if: watchlist --><!-- /ko -->
                                <!-- ko ifnot: watchlist -->
                                <i class="fa fa-square-o"></i>
                                <!-- /ko -->
                                Λιστα Παρακολουθησης
                            </button>
                        </li>
                        <li>
                            <button class="btn" id="favorite" data-bind="click: handleLists.bind($data, 'favorite')">
                                <!-- ko if: favorite --><!-- /ko -->
                                <!-- ko ifnot: favorite -->
                                <i class="fa fa-square-o"></i>
                                <!-- /ko -->
                                Λιστα αγαπημενων
                            </button>
                        </li>
                        <li>
                            <button class="btn" data-toggle="modal" data-target="#add-link-modal">
                            <i class="fa fa-fw fa-plus"></i> Προσθηκη Υποτιτλου
                            </button>
                        </li>
                        <li>
                            <a href="http://subztv.local/movies/617-mad-max-%CE%9F-%CE%94%CF%81%CF%8C%CE%BC%CE%BF%CF%82-%CE%A4%CE%B7%CF%82-%CE%9F%CF%81%CE%B3%CE%AE%CF%82/edit" target="_blank">
                            	<button class="btn">
                            		<i class="fa fa-pencil" aria-hidden="true"></i> Επεξεργασία Ταινιας
                            	</button>
                            </a>
                        </li>
					</ul>
                </div>
            </div>
            
            <div class="col-md-10 col-sm-9 info">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <!-- Aditional Stats -->
                        <ul class="additional-stats">
                            <li>
                                <label>Σκηνοθεσια</label>
                                <span itemprop="director" itemtype="http://schema.org/Person">
                                    <meta content="George Miller" itemprop="name">
                                    George Miller
                                </span>
                            </li>
                            <li>
                                <label>Σεναριο</label>
                                <span itemprop="author" itemtype="http://schema.org/Person">
                                    <meta content="Nick Lathouris" itemprop="name">
                                    Nick Lathouris
                                </span>
                                <span itemprop="author" itemtype="http://schema.org/Person">
                                    <meta content="George Miller" itemprop="name">
                                    George Miller
                                </span>
                                <span itemprop="author" itemtype="http://schema.org/Person">
                                    <meta content="Brendan McCarthy" itemprop="name">
                                    Brendan McCarthy
                                </span>
                            </li>
                            <li>
                                <label>Πρωτη Προβολη</label>{!! date('j M Y', strtotime($movie->release_date)) !!}
                                <meta content="{!! $movie->release_date !!}" itemprop="datePublished">
                            </li>
                            @if($movie->runtime)
                            <li>
                                <label>Διαρκεια</label>{!! $movie->runtime !!} λεπτά
                                <meta content="P{!! $movie->runtime !!}M" itemprop="duration">
                            </li>
                            @endif
                            <li><label>Γλωσσα</label>
                            	{!! $movie->spoken_languages !!}
                           	</li>
                            <li itemprop="countryOfOrigin" itemtype="http://schema.org/Country">
                                <meta content="{{ $movie->production_countries }}" itemprop="name">
                                <label>Χωρα</label>
                                @foreach(explode(',', $movie->production_countries) as $production_country)
                             	<span itemprop="production_country">
                               		{!! $production_country !!}
                                </span>
                               @endforeach
                            </li>
                            @if($movie->budget)
                            <li><label>Προυπολογισμος</label>{!! $movie->budget !!}</li>
                            @endif
                            @if($movie->revenue)
                            <li><label>Εισπράξεις</label>{!! $movie->revenue !!}</li>
                            @endif
                            <li><label>Εταιρία Παραγωγής</label>
                            	@foreach(explode(',', $movie->production_companies) as $production_company)
                             	<span itemprop="production_company">
                               		{!! $production_company !!} 
                                </span>
                               @endforeach
                         	</li>
                        </ul>
                        @if(!empty($movie->tagline))
                        <!-- Tagline -->
                        <div id="tagline">{!! $movie->tagline !!}</div>
                        @endif
                        <!-- Overview-->
                        <div id="overview" itemprop="description">{!! $movie->overview !!}</div>
                    </div>
                    <div class="hidden-xs hidden-sm col-lg-4 col-md-5 action-buttons">

                    </div>
                </div>
                <!-- Trailer -->
                <h2 id="trailer-link"><i class="glyphicon glyphicon-film" aria-hidden="true"></i> Trailer</h2>
                <div id="trailer">
                    <div class="row fanarts">
                        <div class="grid-item col-sm-12 col-md-12">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" data-original="http://www.youtube.com/embed/{!! $movie->trailer !!}"></iframe>
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
                <a class="titles-link" href="{{ route('movie.show', $similar->id) }}">
                    <div class="poster">
                        <img class="base" src="/img/noimage.png" alt="Poster">
                        <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="https://image.tmdb.org/t/p/w185/{!! $similar->poster_path !!}">
    
                        <div class="shadow-base"></div>
                    </div>
                </a>
                <div class="titles">
                    <h3>{!! isset($similar->original_title) ? $similar->original_title : $similar->title !!}</h3>
                    <h4>{!! date('Y', strtotime($similar->release_date)) !!}</h4>
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