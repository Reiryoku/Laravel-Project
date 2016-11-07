@extends('layouts.app')

@section('title', '| Πίνακας Ελέγχου')

@section('bodytag')
	<body class="dashboard">
@endsection

@section('content')

<section id="results-top-wrapper">
	<div class="poster-bg-wrapper">
    	<div class="poster-bg" style="background-image: url({{ URL::to('/') }}/img/poster-bg.jpg)"></div>
    </div>
    <div class="container">
    	<h1>Πίνακας Ελέγχου</h1>
   	</div>
    <div id="links-wrapper">
    	<div class="container">
        	<a href="/settings">General</a>
            <a href="{{ url('/dashboard/pages') }}">Σελίδες</a>
            <a href="{{ url('/dashboard/posts') }}">Άρθρα</a>
            <a href="{{ url('/dashboard/categories') }}">Κατηγορίες</a>
            <a href="{{ url('/dashboard/tags') }}">Ετικέτες</a>
            <a href="{{ url('/dashboard/users') }}">Χρήστες</a>
            <a href="{{ url('/dashboard/roles') }}">Ρόλοι</a>
        </div>
   	</div>
</section>

<section id="main-wrapper">
	<div class="container">
		<div class="row" id="info-wrapper">
            @yield('dashboard-content')
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
      top: 300,
      bottom: ($('footer').outerHeight(true) + $('#main-search').outerHeight(true)) + 40
    }
});
</script>
@endsection