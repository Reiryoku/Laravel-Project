@extends('layouts.app')

@section('bodytag')
	<body class="categories">
@endsection

@section('content')

<section id="results-top-wrapper">
	<div class="poster-bg-wrapper">
    	<div class="poster-bg"></div>
    </div>
    <div class="container">
    	<div class="row">
            <div class="col-md-6 col-sm-7 col-xs-12">
                <h1>ΚΑΤΗΓΟΡΙΕΣ</h1>
                <h2>ΚΑΙ ΤΑ ΤΕΛΕΥΤΑΙΑ ΑΡΘΡΑ ΤΟΥΣ</h2>
            </div>
            <div class="col-md-6 col-sm-5 col-xs-12 buttons">
            	<div class="btn">
                	<i class="fa fa-archive" aria-hidden="true"></i>
                    <div class="number">{!! $categories->count() !!}</div>
                    <div class="text">ΣΥΝΟΛΙΚΑ<br>ΚΑΤΗΓΟΡΙΕΣ</div>
                 </div>
                 <div class="btn">
                	<i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <div class="number">{!! $posts->count() !!}</div>
                    <div class="text">ΣΥΝΟΛΙΚΑ<br>ΑΡΘΡΑ</div>
                 </div>
         	</div>
        </div>
    </div>
    <div id="links-wrapper">
		<div class="container">
        	@foreach($categories as $category)
        	<a href="/settings">{!! $category->name !!}</a>
            @endforeach
     	</div>
	</div>
</section>

@foreach($categories as $category)
	@if (count($category->posts) >= 1)
        <section id="results-wrapper" class="posts">
            <div class="container">
                <h2 class="section">
                    <a class="see-more-link" href="{{ route('posts.index') }}">
                        <div class="see-more">
                            <span class="see-more-text">ΠΕΡΙΣΣΟΤΕΡΑ</span>
                            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                        </div>
                    </a>
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>Άρθρα <span class="category">{!! $category->name !!}</span>
                </h2>
                <div class="row fanarts">
                @foreach($category->posts as $post)
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
    @elseif (count($category->posts) === 0)
    
    @endif 
@endforeach

@endsection