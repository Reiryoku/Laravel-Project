@extends('dashboard.index')

@section('bodytag')
	<body class="dashboard posts">
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
                {!! $posts->links(); !!}
            </div>
            <div class="row fanarts">
                @foreach ($posts as $post)
                    <div class="grid-item col-md-4">
                        <div class="row">
                            <div class="col-sm-6 col-md-5">
                                <div class="fanart">
                                    <img class="base" src="http://test.subztv.gr/themes/subztv/assets/bootstrap/img/noimage2.png" alt="Fanart">
                                    <img class="real lazy" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{{ isset($post->image) ? '/uploads/images/'.$post->image : 'http://test.subztv.gr/themes/subztv/assets/bootstrap/img/noimage2.png' }}">
                                    <div class="shadow-base"></div>
                                </div>
                                <div class="quick-icons">
                                    <div class="actions">
                                        <a class="view" href="{{ route('posts.show', $post->id) }}"><div class="base"></div><i class="fa fa-eye fa-fw" aria-hidden="true"></i></a>
                                        <a class="edit" href="{{ route('posts.edit', $post->id) }}"><div class="base"></div><i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a>
                                        <a class="delete"><div class="base"></div><i class="fa fa-trash-o fa-fw" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-6 under-info">
                                <div class="titles">
                                    <h3>
                                    <div class="stats">
                                        <a title=""><i class="fa fa-file-text-o" aria-hidden="true"></i>{{ $post->category->name }}</a>
                                    </div>
                                        <a href="{{ route('posts.show', $post->id) }}">
                                            <span class="main-title-sxe">ID: {{ $post->id }} </span>
                                            <span class="main-title">{{ $post->title }}</span>
                                        </a>
                                    </h3>
                                    <ul class="additional-stats">
                                        <li>
                                            <h4 class="role">{{ $post->user->first_name }} {{ $post->user->last_name }}</h4>
                                         </li>
                                        <li>
                                            <h4>Created at:</h4>{{ date('M j, Y', strtotime($post->created_at)) }},  <h4>Updated at:</h4>{{ date('M j, Y', strtotime($post->updated_at)) }}
                                         </li>
                                    </ul>
                                </div>
                                <p class="bio">
                                    {{ substr($post->body, 0, 100) }}{{ strlen($post->body) > 100 ? "..." : "" }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-bottom">
                {!! $posts->links(); !!}
            </div>
        </div>
    </section>

@endsection
