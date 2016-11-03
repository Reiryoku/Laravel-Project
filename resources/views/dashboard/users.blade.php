@extends('dashboard.index')

@section('bodytag')
	<body class="dashboard users">
@endsection

@section('dashboard-content')

    <section id="results-top-wrapper" class="dashboard-wrapper dashboard-users-wrapper">
        <div class="container">
            <h1>Όλοι οι χρήστες</h1>
        </div>
    </section>

	<section id="dashboard-users-wrapper">
        <div class="container-fluid">
            <div class="pagination-top">
                {!! $users->links(); !!}
            </div>
            <div class="row fanarts">
				<h2 class="with-line">
                	<div class="time-spent hidden-xs">
                    	<span class="number hours">2</span> hours, <span class="number minutes">16</span> mins</div>
                    <div class="time-spent visible-xs">
                    <span class="number hours">2</span>h <span class="number minutes">16</span>m
                    </div>
                    <span class="trakt-icon-time-play"></span><b>Friday</b> March 25, 2016</h2>
                @foreach ($users as $user)
                    <div class="grid-item col-md-2">
                        <div class="row">
                            <div class="col-sm-5 col-md-4">
                                <div class="fanart">
                                    <img class="base" src="/img/avatar.png" alt="Fanart">
                                    <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{{ isset($user->avatar) ? '/uploads/images/'.$user->avatar : '/img/avatar.png' }}">
                                </div>
                                <div class="quick-icons">
                                    <div class="actions">
                                        <a class="view" href="{{ route('users.show', $user->id) }}"><div class="base"></div><i class="fa fa-eye fa-fw" aria-hidden="true"></i></a>
                                        <a class="edit" href="{{ route('users.edit', $user->id) }}"><div class="base"></div><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                                        <a class="delete"><div class="base"></div><i class="fa fa-trash-o fa-fw" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-7 under-info">
                                <div class="titles">
                                    <h3>
                                    <div class="stats">
                                        <a title=""><i class="fa fa-file-text-o" aria-hidden="true"></i>{{ $user->posts->count() }}</a>
                                    </div>
                                        <a href="{{ route('users.show', $user->id) }}">
                                            <span class="main-title-sxe">ID: {{ $user->id }}</span>
                                            <span class="main-title">{{ $user->first_name && $user->last_name ? $user->first_name : $user->name }}</span>
                                        </a>
                                    </h3>
                                    <ul class="additional-stats">
                                        <li>
                                            @foreach($user->roles as $role)
                                                <h4 class="role">{{ $role->display_name }}</h4>
                                            @endforeach
                                         </li>
                                        <li>
                                            <h4>Created at:</h4> {{ date('M j, Y h:ia', strtotime($user->created_at)) }}, <h4> Updated at: </h4> {{ date('M j, Y h:ia', strtotime($user->updated_at )) }}
                                         </li>
                                    </ul>
                                </div>
                                <p class="bio">
                                    {{ $user->bio }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-bottom">
                {!! $users->links(); !!}
            </div>
        </div>
    </section>

@endsection
