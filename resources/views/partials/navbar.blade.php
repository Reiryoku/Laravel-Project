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
            <a class="navbar-brand" href="{!! url('/') !!}">
            	<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="/img/logo.png" class="lazy">
            </a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
      	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{!! route('posts.index') !!}">Άρθρα</a></li>
                <li><a href="/movies">Ταινίες</a></li>
                <li><a href="{!! route('categories.index') !!}">Κατηγορίες</a></li>
                <li><a href="{!! route('tags.index') !!}">Ετικέτες</a></li>
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
            		<li><a class="btn btn-primary" href="{!! url('/login') !!}">ΕΙΣΟΔΟΣ</a></li>
                  	<li><a class="btn btn-signup" href="{!! url('/register') !!}">ΕΓΓΡΑΦΗ</a></li>
              	@else
        		<li class="dropdown">
          			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">                    
                    	<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{!! isset(Auth::user()->avatar) ? '/uploads/images/'.Auth::user()->avatar : '/img/avatar.png' !!}" class="avatar lazy">
                    	<span class="hidden-xs hidden-sm">{!! Auth::user()->first_name && Auth::user()->last_name ? Auth::user()->first_name . ' ' . Auth::user()->last_name : Auth::user()->username !!}</span>
                    	<span class="caret"></span>
                    </a>
                    <!-- User Menu -->
          			<ul id="user-menu" class="dropdown-menu">
            			<li><a href="{!! route('users.show', Auth::user()->id) !!}">Προφίλ</a></li>
                        <li><a href="{!! route('users.edit', Auth::user()->id) !!}">Ρυθμισεις</a></li>
                        @if(Auth::user()->hasRole('admin'))
		           			<li><a href="{!! url('dashboard') !!}">Πινακας Ελεγχου</a></li>
		           		@endif
            			<li role="separator" class="divider"></li>
            			<li>
                        	<a href="{!! url('/logout') !!}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Αποσύνδεση</a>
                           	<form id="logout-form" action="{!! url('/logout') !!}" method="POST" style="display: none;">{!! csrf_field() !!}</form>
 						</li>
          			</ul>
        		</li>
                @endif
			</ul>
            {!! Form::open(['route' => 'search', 'method' => 'GET', 'class'=>'navbar-form navbar-right', 'role'=>'search']) !!}
				<div class="form-group">
                    {!! Form::text('q', null, array('placeholder'=>'Αναζήτηση...', 'class'=>'form-control') ); !!}
				</div>
  				<button class="btn" type="submit"><i class="fa fa-search"></i> </button> 
			{!! Form::close() !!}
          	<ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="https://www.facebook.com/codingo.me/"><i class="fa fa-facebook"></i></a>
                </li>
                <li class="nav-item">
                    <a href="https://twitter.com/codingo_me"><i class="fa fa-twitter"></i></a>
                </li>
                <li class="nav-item">
                    <a href="https://plus.google.com/u/2/b/109783202683475265470/collection/wwmLx"><i class="fa fa-google-plus"></i></a>
                </li>
                <li class="nav-item">
                    <a href="https://github.com/codingo-me"><i class="fa fa-github"></i></a>
                </li>
            </ul>
      	</div>
	</div>
</nav>