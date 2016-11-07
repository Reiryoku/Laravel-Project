@extends('layouts.app')

@section('bodytag')
	<body class="users">
@endsection

@section('content')

<section id="main-wrapper" class="users">
	<div class="container">
    	<div class="pagination-top">
    		{!! $users->links() !!} 
        </div>
    	<div class="row posters">
            @foreach($users as $user)
         		<div class="grid-item col-xs-4 col-md-1 col-sm-3">
                	<a>
                     	<div class="poster avatar">
                           	<img class="base" src="/uploads/images/avatar.jpg" alt="Poster">
                    		<img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{{ isset($user->avatar) ? '/uploads/images/'.$user->avatar : '/uploads/images/avatar.jpg' }}">
                   			<div class="shadow-base">
                        </div>
                   	</div>
                    </a>
                   	<div class="titles">
                   		<h3>{!! $user->first_name && $user->last_name ? $user->first_name. ' ' .$user->last_name : $user->name !!}</h3>
               		</div>
            	</div>
            @endforeach
    	</div>
        <div class="pagination-bottom">
    		{!! $users->links() !!} 
        </div>
	</div>
</section>

@endsection
