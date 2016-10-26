@extends('layouts.app')

@section('body-class', 'home')

@section('content')
<style>
#schedule-wrapper {
    background-color: #fafafa;
	padding-top:50px;
    padding-bottom: 10px;
}
#schedule-wrapper h2 {
    text-transform: uppercase;
    color: #959595;
    font-weight: bold;
    font-size: 20px;
    margin: 20px 0 0 0;
}
</style>
<!-- Schedule Wrapper -->
<section id="schedule-wrapper">
	<div class="container">
		<h2><i class="fa fa-calendar"></i> Δημοφιλεις Ταινιες</h2>
        <!-- Posters -->	
		<div class="row posters">

			@foreach( $movies['results'] as $movie)

                <!-- Grid Item -->	
				<div class="grid-item col-xs-4 col-md-2 col-sm-3">

                	<a class="titles-link" href="#">
                    	<!-- Poster -->	
                        <div class="poster">
                            <img class="base" src="http://test.subztv.gr/themes/subztv/assets/bootstrap/img/noimage.png" alt="Poster">
                            <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="https://image.tmdb.org/t/p/w185/{!! $movie['poster_path'] !!}">

                            <div class="shadow-base"></div>
                        </div>
					</a>
                    <!-- Titles -->	
                    <div class="titles">
						<h3>{!! $movie['title'] !!}</h3>
                        <h4>{!! $movie['release_date'] !!}</h4>
   
					</div>
				</div>
				
				
			@endforeach
		</div> 
	</div>   
</section>

@endsection
