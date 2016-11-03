@extends('layouts.app')

@section('stylesheets')
    {!! Html::style('//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css') !!}
@endsection

@section('body-class', 'home')

@section('content')
<style>
.bg-slider {
    margin-top: 50px;
}
.bg-slider .slick-slide {
	background-color: black;
    background-size: cover;
    background-position: 50% 10%;
    transition: all .5s;
    height: 550px;
    color: white;
    position: relative;
}
.bg-slider .slick-slide .bg {
	position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: 50% 10%;
    opacity: 0.7;
    transition: all 1s;
}
.bg-slider .previous-item-link, 
.bg-slider .next-item-link {
    color: #fff !important;
    position: absolute;
    top: 188px;
    font-size: 100px;
    display: block;
    text-shadow: #666 0px 0px 10px;
    transition: all .5s;
    opacity: .2;
    text-decoration: none !important;
    cursor: pointer;
	z-index:1
}
.bg-slider .previous-item-link {
    left: 20px;
}
.bg-slider .next-item-link {
    right: 20px;
}
</style>
<div class="bg-slider">
@foreach($posts as $post)
	<div>
		<div class="bg" style="background-image: url({{ '/uploads/images/' .$post->image }})"></div>
        <div style="position:absolute;bottom:10px;left:10px;padding:20px;">
        	<div class="container">
        	<h1 style="margin: 0;text-shadow: 0 0 20px black;line-height: 1.2;">{{ $post->title }}</h1>
            </div>
        </div>
    </div>
@endforeach
</div>
<section id="main-wrapper">
    <div class="container">  
    	<h2 class="section">
        	<a class="see-more-link" href="{{ route('posts.create') }}">
            	<div class="see-more">
                	<span class="see-more-text">Νέο Άρθρο</span>
                    <i class="fa fa-plus" aria-hidden="true"></i>
            	</div>
            </a>
            <div class="feed-icons">
            	<a class="feed-icon">
                	<i class="fa fa-rss" aria-hidden="true"></i>
                </a>
            </div>
        	<i class="fa fa-file-text-o" aria-hidden="true"></i>Όλα Άρθρα
        </h2>
        <div class="row">          
            @foreach($posts as $post)
            <div class="row fanarts">
                <div class="grid-item col-sm-5 col-md-4">
                    <a href="{{ route('posts.show', $post->id) }}">
                        <div class="fanart">
                            <img class="base" src="http://test.subztv.gr/themes/subztv/assets/bootstrap/img/noimage2.png" alt="Fanart">
                            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{{ '/uploads/images/' .$post->image }}" class="real lazy">
                            <div class="shadow-base"></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-8 col-sm-7 under-info">
                    <div class="titles">
                        <h3>
                            <a href="{{ route('posts.show', $post->id) }}">
                                <span class="main-title-sxe">{{ $post->title }}</span>
                            </a>
                            <div class="stats hidden-sm">
                                <a href="{{ route('posts.show', $post->id) }}"><i class="fa fa-eye" aria-hidden="true"></i>Εμφάνιση</a>
                                <a href="{{ route('posts.edit', $post->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Επεξεργασία</a>
                            </div>
                        </h3>
                        <ul class="additional-stats">
                            <li><span><i class="fa fa-calendar fa-fw"></i> {{ date('M j, Y h:ia', strtotime($post->created_at)) }}</span></li>
                        </ul>
                    </div>
                    <p class="overview">{{ substr($post->body, 0, 600) }}{{ strlen($post->body) > 600 ? "..." : "" }}</p>
                </div>
            </div>
            @endforeach  
        </div>   
    </div>
</section>

<section id="main-wrapper" class="popular-movies">
	<div class="container">
		<h2 class="section">
        	<i class="fa fa-calendar"></i> Δημοφιλεις Ταινιες 
        </h2>
		<div class="row posters">
			@foreach( $movies as $movie)
				<div class="grid-item col-xs-4 col-md-2 col-sm-3">
                	<a class="titles-link" href="{{ route('movie.show', $movie->id) }}">
                        <div class="poster">
                            <img class="base" src="http://test.subztv.gr/themes/subztv/assets/bootstrap/img/noimage.png" alt="Poster">
                            <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="https://image.tmdb.org/t/p/w185/{!! $movie->poster !!}">
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
  			<button type="button" class="btn btn-danger" id="bt1">Get Popular</button>
		</a> 
	</div>   
</section>

@endsection

@section('scripts')
	{!! Html::script('//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js') !!}
    <script>
	$('.bg-slider').slick({
		dots: false,
  		infinite: true,
  		speed: 300,
  		slidesToShow: 3,
		prevArrow:"<a id='previous-item-link' class='previous-item-link' title='Προηγούμενη Εικόνα'><i class='fa fa-angle-left' aria-hidden='true'></i></a>",
		nextArrow:"<a id='next-item-link' class='next-item-link' title='Επόμενη Εικόνα'><i class='fa fa-angle-right' aria-hidden='true'></i></a>"
	});
	</script>
@endsection