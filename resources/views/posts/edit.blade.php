@extends('layouts.app')

@section('title', '| Επεξεργασία Άρθρου')

@section('content')

<section id="results-top-wrapper">
	<div class="poster-bg-wrapper">
    	<div class="poster-bg" style="background-image: url({{ URL::to('/') }}/img/poster-bg.jpg)"></div>
    </div>
    <div class="container">
    	<h1>Επεξεργασία Άρθρου</h1>
    </div>
</section>

<section id="main-wrapper">
	<div class="container">
    	<div class="row">
            <div class="col-md-12">
                {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
                    <div class="form-group">
                    	{!! Form::label('title', 'Τίτλος:') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                    	{!! Form::label('title', 'Κατηγορία:') !!}
						{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                    	{!! Form::label('title', 'Περιεχόμενο:') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}                   
                    </div>
					<div class="form-group">
						{!! Form::submit('Ενημέρωση', ['class' => 'btn btn-success btn-block']) !!}
					</div>
                {!! Form::close() !!}
                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                	<div class="form-group">
						{!! Form::submit('Διαγραφή', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>
				{!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection