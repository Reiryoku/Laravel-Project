@extends('layouts.app')

@section('body-class', 'tvshows')

@section('content')
<section id="results-top-wrapper">
	<div class="poster-bg-wrapper">
    	<div class="poster-bg"></div>
    </div>
    <div class="container">
    	<h1>Ταινίες</h1>
    </div>
</section>

<section class="subnav-wrapper">
	<div class="container">
		<div class="left">
		</div>
		<div class="right icons">
			<a class="feed-icon">
            	<i class="fa fa-fw fa-rss" aria-hidden="true"></i>
            </a>
            <a class="feed-icon">
            	<i class="fa fa-fw fa-calendar" aria-hidden="true"></i>
            </a>
		</div>
	</div>
</section>
<!-- tvshows Wrapper -->
<section id="tvshows-wrapper">
	<div class="container">
    	<div class="pagination-top">
        	{!! $tvshows->links(); !!} 
        </div>
        <!-- Posters -->	
		<div class="row posters">
			
			@foreach( $tvshows as $tvshow)

                <!-- Grid Item -->	
				<div class="grid-item col-xs-4 col-md-2 col-sm-3">

                	<a class="titles-link" href="{{ route('tvshow.show', $tvshow->id) }}">
                    	<!-- Poster -->	
                        <div class="poster">
                            <img class="base" src="/img/noimage.png" alt="Poster">
                            <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="https://image.tmdb.org/t/p/w185/{!! $tvshow->poster_path !!}">

                            <div class="shadow-base"></div>
                        </div>
					</a>
                    <!-- Titles -->	
                    <div class="titles">
						<h3>{!! $tvshow->original_title !!}</h3>
                        <h4>{!! date('Y', strtotime($tvshow->release_date)) !!}</h4>
   
					</div>
				</div>
				
				
			@endforeach
              
		</div>
        <div class="pagination-bottom"> 
        	{!! $tvshows->links(); !!} 
        </div>
	</div>   
</section>

@endsection
