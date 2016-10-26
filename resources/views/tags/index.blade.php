@extends('layouts.app')

@section('title', '| Όλες οι ετικέτες')

@section('content')

<section id="results-top-wrapper">
	<div class="poster-bg-wrapper">
    	<div class="poster-bg" style="background-image: url({{ URL::to('/') }}/img/poster-bg.jpg)"></div>
    </div>
    <div class="container">
    	<h1>Όλες οι ετικέτες</h1>
    </div>
</section>

<section id="main-wrapper">
	<div class="container">
    	<div class="row">
            <div class="col-md-12">
                <h1>Ετικέτες</h1> 
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Όνομα</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ($tags as $tag)
                        <tr>
                            <th>{{ $tag->id }}</th>
                            <td>{{ $tag->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
				<hr>
                <h1>Νέα Ετικέτα</h1>
				{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
                	<div class="form-group">
						{{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
					<div class="form-group">
						{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
					</div>
				{!! Form::close() !!}
			</div>
        </div>
    </div>
</section>

@endsection