@extends('layouts.app')

@section('body-class', 'user profile')


<style>
#boxes-wrapper .row .stat-box {
    background-size: cover;
    background-color: #1d1d1d;
    background-position: center;
    height: 250px;
    color: #fff;
    padding: 0 20px;
    position: relative;
}
#boxes-wrapper .row .last-comment {
    background-color: #d62b20;
    overflow: hidden;
}
#boxes-wrapper .row .stat-box h2 {
	font-weight:bold;
    font-size: 14px;
    text-transform: uppercase;
    margin-top: 0;
    padding-top: 20px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
#boxes-wrapper .row .stat-box .full-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    background-position: center;
    opacity: 0;
    transition: all 1s;
}
#boxes-wrapper .row .stat-box .full-bg.enabled {
    opacity: 1;
}
#boxes-wrapper .row .stat-box a {
    color: #fff;
}
#boxes-wrapper .row .stat-box .shade {
    background: rgba(0,0,0,0.3);
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    padding: 0 20px;
}
#boxes-wrapper .row .stat-box .shade h2, 
#boxes-wrapper .row .stat-box .shade h3, 
#boxes-wrapper .row .stat-box .shade .see-more {
    text-shadow: 0 0 20px black;
}
#boxes-wrapper .row .stat-box .shade h3 {
	font-weight:bold;
    font-size: 32px;
    margin: 10px 0 0 0;
}
#boxes-wrapper .row .stat-box .see-more {
    color: #fff;
    position: absolute;
    right: 20px;
    bottom: 20px;
    border-bottom: solid 1px #b3b3b4;
    text-transform: uppercase;	
	font-weight:bold;
    font-size: 14px;
    line-height: 1;
    text-decoration: none;
}
#boxes-wrapper .row .stats {
    background-color: #019edf;
    text-align: center;
}
#boxes-wrapper .row .stats .split {
    width: 50%;
    float: left;
}
#boxes-wrapper .row .stats .stat {
    font-size: 20px;
    line-height: 22px;
    margin-top: 18px;
}
#boxes-wrapper .row .stats .stat .number {
	font-weight:bold;
}
#boxes-wrapper .row .stats .under-stat {
    line-height: 1.2;
    font-size: 12px;
    color: #77CBEE;
}
#boxes-wrapper .row .stats .under-stat .type {
    color: #fff;
	font-weight:bold;
    text-transform: uppercase;
}
#boxes-wrapper .row .stats .bottom-shade {
    background-color: #0199d8;
    position: absolute;
    width: 100%;
    height: 50%;
    bottom: 0;
    left: 0;
}
#chart-genres-legend {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 40px;
}
#chart-genres-legend ul {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    white-space: nowrap;
    list-style: none;
    margin: 0;
    padding: 0;
}
#chart-genres-legend ul li {
	font-weight:bold;
    font-size: 12px;
    text-transform: uppercase;
    margin: 10px 0 0 0;
}
#chart-genres-legend ul li>span {
    background-color: #666;
    width: 15px;
    height: 15px;
    margin-right: 10px;
    float: left;
}
</style>

@section('content')

<section id="cover-wrapper">
	<div class="full-bg enabled" style="background-image: url({{ isset($user->cover) ? '/uploads/images/'.$user->cover : '/uploads/images/cover.jpg' }});"></div>
	<div class="shadow hidden-xs"></div>
	<div class="container">
		<div id="avatar-wrapper">
            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{{ isset($user->avatar) ? '/uploads/images/'.$user->avatar : '/uploads/images/avatar.jpg' }}" class="avatar lazy">
			<h1>{{ $user->first_name && $user->last_name ? $user->first_name : $user->name }}</h1>
			<input type="hidden" name="username" id="username" value="{{ $user->name }}">
			<div class="under-name">
				<h3>
                	<span class="follower-count">0</span> followers
                </h3>
                @if(!empty($user->roles))
				<h3>
                
					@foreach($user->roles as $v)
						<span>{{ $v->display_name }}</span>
					@endforeach
                </h3>    
				@endif
                <h3>
					<div class="fa fa-map-marker"></div> Corfu, Kerkira, Greece
                    @if (isset($user->gender))
                    	<i class="{{ $user->gender = 'male' ? 'fa fa-mars' : 'fa fa-venus' }}" aria-hidden="true"></i>
                    @endif
					<span title="Age">29</span>
				</h3>
				<h3 class="social-icons"><a target="_blank" title="" href="https://www.facebook.com/app_scoped_user_id/782624017/" data-original-title="Facebook"><i class="network-icon fa fa-facebook"></i></a></h3>
			</div>
		</div>
	</div>
	<div id="links-wrapper">
		<div class="container">
        	<a class="selected" href="{{ route('users.show', $user->id) }}">Προφίλ</a>
            <a href="{{ route('user.posts', $user->id) }}">Άρθρα</a>
       	</div>
	</div>
</section>
<section id="boxes-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-md-3 last-comment stat-box">
				<h2>About Nick</h2>
				<h4></h4>
			</div>
            @if(!$user->posts->isEmpty())
            	@foreach($posts->slice(0, 1) as $post)
                <div class="col-sm-6 col-md-3 last-watched stat-box">
                    <div class="full-bg enabled lazy" style="background-image: url({{ '/uploads/images/'.$post->image }});"></div>
                    <div class="shade">
                        <h2>ΠΙΟ ΠΡΟΣΦΑΤΟ ΑΡΘΡΟ</h2>
                        <a href="{{ route('posts.show', $post->id) }}">
                            <h3>{{ $post->title }}</h3>
                        </a>
                        <a class="see-more" href="{{ route('posts.show', $post->id) }}">Διάβασε το!</a>
                    </div>
                </div>
                @endforeach
                <div class="col-sm-6 col-md-3 stats stat-box">
                    <h2>ΣΤΑΤΙΣΤΙΚΑ ΑΡΘΡΩΝ</h2>
                    <div class="top-shade">
                        <div class="split">
                            <div class="stat">
                            	<span class="number minutes">...</span>..
                            </div>
                            <div class="under-stat">
                                <div class="type">....</div>
                                <strong>{{ count($user->posts) }}</strong> Άρθρα
                            </div>
                        </div>
                        <div class="split">
                            <div class="stat">
                            	<span class="number days">...</span>... 
                                <span class="number hours">...</span>....
                                <span class="number minutes">...</span>...</div>
                            <div class="under-stat">
                                <div class="type">...</div>
                                <strong>....</strong>....
                            </div>
                        </div>
                    </div>
                    <div class="bottom-shade">
                        <h2>.....</h2>
                        <div class="split">
                            <div class="stat">
                            	<span class="number minutes">...</span>...</div>
                            <div class="under-stat">
                                <div class="type">....</div>
                                <strong>....</strong> ......
                            </div>
                        </div>
                        <div class="split">
                            <div class="stat">
                            	<span class="number hours">...</span>..
                                <span class="number minutes">...</span>...</div>
                            <div class="under-stat">
                                <div class="type">...</div>
                                <strong>...</strong>....
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wide-chart stat-box">
                    <h2>ΑΓΑΠΗΜΕΝΕΣ ΚΑΤΗΓΟΡΙΕΣ</h2>                    
                    <div class="hidden-xs" id="chart-genres-legend">
                        <ul>
                        	@foreach($categories as $category)
                            	<li><span style="background-color:#ed2626"></span>{{ $category->name }} - {{ count($user->posts()) }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                </div>
            @endif
		</div>
	</div>
</section>
@if(!$user->posts->isEmpty())
<section id="recent-wrapper">
	<div class="container">
		<h2 class="section">
			<a class="see-more-link" href="{{ route('user.posts', $user->id) }}">
				<div class="see-more">
					<span class="see-more-text">ολα τα αρθρα</span>
                    <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
				</div>
			</a>
			<i class="fa fa-file-text-o" aria-hidden="true"></i>τελευταια αρθρα
		</h2>
		<div class="row posters">
        @foreach($posts->slice(0, 4) as $post)
			<div class="grid-item col-md-3 col-sm-4">
				<a href="{{ route('posts.show', $post->id) }}">
					<div class="poster screenshot">
						<img class="base" src="http://test.subztv.gr/themes/subztv/assets/bootstrap/img/noimage2.png" alt="Fanart">
                        <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{{ '/uploads/images/'.$post->image }}">
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
@endif
@endsection
