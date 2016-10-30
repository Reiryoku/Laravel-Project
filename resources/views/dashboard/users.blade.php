@extends('dashboard.index')

@section('bodytag')
	<body class="dashboard users">
@endsection

@section('dashboard-content')
    <section id="results-top-wrapper" class="dashboard-wrapper">
        <div class="poster-bg-wrapper">
            <div class="poster-bg" style="background-image: url({{ URL::to('/') }}/img/poster-bg.jpg)"></div>
        </div>
        <div class="container">
            <h1>Όλοι οι χρήστες</h1>
        </div>
    </section>   
    <section id="users-wrapper">
        <div class="container">
            <div class="pagination-top">
                {!! $users->links(); !!}
            </div>            
            <div class="row fanarts">
                @foreach ($users as $user)
                    <div class="grid-item col-md-4">
                        <div class="row">
                            <div class="col-sm-5 col-md-4">
                                <div class="fanart">
                                    <img class="base" src="/uploads/images/avatar.jpg" alt="Fanart">
                                    <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{{ isset($user->avatar) ? '/uploads/images/'.$user->avatar : '/uploads/images/avatar.jpg' }}">
                                    <div class="shadow-base"></div>
                                </div>
                                <div class="quick-icons">
                                    <div class="actions">
                                        <a class="view" href="{{ route('users.show', $user->id) }}"><div class="base"></div><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a class="edit" href="{{ route('users.edit', $user->id) }}"><div class="base"></div><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a class="delete"><div class="base"></div><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                                            <h4>Created at:</h4> {{ date('M j, Y h:ia', strtotime($user->created_at)) }}  
                                         </li>
                                        <li>
                                            <h4> Updated at: </h4> {{ date('M j, Y h:ia', strtotime($user->updated_at )) }}
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