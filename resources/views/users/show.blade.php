@extends('layouts.app')

@section('body-class', 'user profile')

@section('content')

<section id="cover-wrapper">
	<div class="full-bg enabled" style="background-image: url({{ isset($user->cover) ? '/uploads/cover/'.$user->name.'/'.$user->cover : '/uploads/covers/default.jpg' }});"></div>
	<div class="shadow hidden-xs"></div>
	<div class="container">
		<div id="avatar-wrapper">
            <img src="{{ isset($user->avatar) ? '/uploads/avatars/'.$user->name.'/'.$user->avatar : '/uploads/avatars/default.jpg' }}" class="avatar">
			<h1>{{ $user->first_name && $user->last_name ? $user->first_name : $user->name }}</h1>
			<input type="hidden" name="username" id="username" value="{{ $user->name }}">
			<div class="under-name">
				<h3><span class="follower-count">0</span> followers</h3>
				<h3>
					<div class="fa fa-map-marker"></div>
					Corfu, Kerkira, Greece
					<div class="fa fa-mars" title="Male"></div>
					<span title="Age">29</span>
				</h3>
				<h3 class="social-icons"></h3>
			</div>
		</div>
	</div>
	<div id="links-wrapper">
		<div class="container">
        	<a class="selected" href="/users/reiryoku">Profile</a>
            <a href="/users/reiryoku/history">History</a>
       	</div>
	</div>
</section>
<section id="recent-wrapper">
	<div class="container">
		<h2 class="section">
			<a class="see-more-link" href="{{ route('posts.index') }}">
				<div class="see-more">
					<span class="see-more-text">ολα τα αρθρα</span>
                    <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
				</div>
			</a>
			<i class="fa fa-file-text-o" aria-hidden="true"></i>τελευταια αρθρα
		</h2>
		<div class="row posters">
        @foreach($posts as $post)
			<div class="grid-item col-md-3 col-sm-4">
				<a href="{{ route('posts.show', $post->id) }}">
					<div class="poster screenshot">
						<img class="base" src="http://test.subztv.gr/themes/subztv/assets/bootstrap/img/noimage2.png" alt="Fanart">
                        <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{{ $post->image }}">
					</div>
				</a>
				<a class="titles-link" href="{{ route('posts.show', $post->id) }}">
					<div class="titles">
						<h3>
                        	<span class="main-title-sxe">{{ $post->category->name }}</span> 
                        	<span class="main-title">{{ $post->title }}</span>
                        </h3>
						<h4>{{ substr($post->body, 0, 30) }}{{ strlen($post->body) > 30 ? "..." : "" }}</h4>
						<h4><span class="format-date" data-date="2015-10-13T05:00:00+03:00"><i class="fa fa-calendar fa-fw"></i> {{ date('M j, Y h:ia', strtotime($post->created_at)) }}</span></h4>
					</div>
				</a>
			</div>
         @endforeach
		</div>
	</div>
</section>
@endsection
