@extends('layouts.app')

@section('title', "| Αποτελέσματα αναζήτησης για: $query")

@section('content')

<section id="results-top-wrapper">
	<div class="poster-bg-wrapper">
    	<div class="poster-bg"></div>
    </div>
    <div class="container">
    	<h1>ΑΝΑΖΗΤΗΣΗ</h1>
        <h2>ΑΠΟΤΕΛΕΣΜΑΤΑ ΑΝΑΖΗΤΗΣΗΣ ΓΙΑ: <span class="query">{!! $query !!}</span></h2>
    </div>
</section>
		
@if (count($posts) === 0)
	<section id="results-wrapper" class="posts no-data">
		<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	<div class="alert alert-no-data">Δεν βρέθηκε κάποιο Άρθρο...</div>
                </div>
            </div>
        </div>
    </section>
@elseif (count($posts) >= 1)
	<section id="results-wrapper" class="posts">
        <div class="container">
        	<h2 class="section">
            	<a class="see-more-link" href="{{ route('posts.index') }}">
                	<div class="see-more">
                    	<span class="see-more-text">ΠΕΡΙΣΣΟΤΕΡΑ</span>
                        <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                	</div>
                </a>
        		<i class="fa fa-file-text-o" aria-hidden="true"></i> Άρθρα 
        	</h2>
        	<div class="row fanarts">
            @foreach($posts as $key => $post)
            <div class="grid-item col-sm-4 col-md-4">
                <a href="{{ URL::route('posts.show', ['id' => $post->id]) }}">
                	<div class="fanart">
                   		<img class="base" src="/img/noimage-w.png" alt="Fanart">
                        <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="/uploads/images/{!! $post->image !!}">
                        <div class="shadow-base"></div>
                        <div class="titles">
                        	<h4>
                            	<span class="date">{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</span>
                                <span class="category">{!! $post->category->name !!}</span>
                            </h4>
                            <h3>{!! $post->title !!}</h3>
                     	</div>
                	</div>
                </a>
                <div class="body">
                	{{ substr($post->body, 0, 250) }}{{ strlen($post->body) > 250 ? "..." : "" }}                 
                </div>
            </div>              
            @endforeach
			</div>
        </div>
    </section>
@endif

@if (count($movies) === 0)
	<section id="results-wrapper" class="movies no-data">
		<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	<div class="alert alert-no-data">Δεν βρέθηκε κάποια Ταινία...</div>
                </div>
            </div>
        </div>
    </section>
@elseif (count($movies) >= 1)
	<section id="results-wrapper" class="movies">
        <div class="container">
        	<h2 class="section">
            	<a class="see-more-link" href="{{ route('movies') }}">
                	<div class="see-more">
                    	<span class="see-more-text">ΠΕΡΙΣΣΟΤΕΡΑ</span>
                        <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                	</div>
                </a>
        		<i class="fa fa-film" aria-hidden="true"></i>Ταινιες 
        	</h2>
        	<div class="row posters">
            @foreach($movies as $key => $movie)
            <div class="grid-item col-xs-4 col-md-2 col-sm-3">
                <a class="titles-link" href="{{ route('movie.show', $movie->id) }}">
                    <div class="poster">
                        <img class="base" src="/img/noimage.png" alt="Poster">
                        <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="https://image.tmdb.org/t/p/w185/{!! $movie->poster_path !!}">
                        <div class="shadow-base"></div>
                    </div>
                </a>
                <div class="titles">
                    <h3>{!! $movie->original_title !!}</h3>
                    <h4>{!! date('Y', strtotime($movie->release_date)) !!}</h4>
                </div>
            </div>              
            @endforeach
            </div>
        </div>
    </section>
@endif

@if (count($users) === 0)
	<section id="results-wrapper" class="users no-data">
		<div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	<div class="alert alert-no-data">Δεν βρέθηκε κάποιος Χρήστης...</div>
                </div>
            </div>
        </div>
    </section>
@elseif (count($users) >= 1)
	<section id="results-wrapper" class="users">
        <div class="container">
        	<h2 class="section">
            	<a class="see-more-link" href="{{ route('users.index') }}">
                	<div class="see-more">
                    	<span class="see-more-text">ΠΕΡΙΣΣΟΤΕΡΑ</span>
                        <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                	</div>
                </a>
        		<i class="fa fa-file-text-o" aria-hidden="true"></i> Άρθρα 
        	</h2>
        	<div class="row posters">
            @foreach($users as $key => $user)
            <div class="grid-item col-sm-2 col-md-2">
                <a class="titles-link" href="{{ route('users.show', $user->id) }}" data-toggle="tooltip" data-placement="top" title="{!! $user->name !!}">
                    <div class="poster avatar">
                        <img class="base" src="/img/avatar.png" alt="Poster">
                    	<img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{{ isset($user->avatar) ? '/uploads/images/'.$user->avatar : '/img/avatar.png' }}">
                   		<div class="shadow-base"></div>
                    </div>
                 </a>
   				<div class="titles">
					<h3>{!! $user->first_name !!} {!! $user->last_name !!}</h3>
                  	<h4>oeo</h4>
   					<h5>oeo</h5>
				</div>
            </div>              
            @endforeach
			</div>
        </div>
    </section>
@endif
@endsection