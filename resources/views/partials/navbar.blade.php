<nav class="navbar navbar-fixed-top">
	<div class="container">
    	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
      	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('posts.index') }}">Άρθρα</a></li>
                <li><a href="/movies">Ταινίες</a></li>
                <li><a href="{{ route('categories.index') }}">Κατηγορίες</a></li>
                <li><a href="{{ route('tags.index') }}">Ετικέτες</a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
        		@if (Auth::guest())
            		<li><a href="{{ url('/login') }}">Είσοδος</a></li>
                  	<li><a href="{{ url('/register') }}">Εγγραφή</a></li>
              	@else
        		<li class="dropdown">
          			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">                    
                    <img class="avatar" src="{{ isset(Auth::user()->avatar) ? '/uploads/avatars/'.Auth::user()->name.'/'.Auth::user()->avatar : '/uploads/avatars/default.jpg' }}">
                    <span class="hidden-xs hidden-sm">{{ Auth::user()->first_name && Auth::user()->last_name ? Auth::user()->first_name . ' ' . Auth::user()->last_name : Auth::user()->username }}</span>
                    <span class="caret"></span></a>
          			<ul id="user-menu" class="dropdown-menu">
            			<li><a href="{{ route('profile', Auth::user()->id) }}">Προφίλ</a></li>
                        <li><a href="{{ route('settings', Auth::user()->id) }}">Ρυθμισεις</a></li>
            			<li role="separator" class="divider"></li>
            			<li>
                        	<a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Αποσύνδεση</a>
                           	<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
 						</li>
          			</ul>
        		</li>
                @endif
			</ul>
      	</div>
	</div>
</nav>