@extends('layouts.app')

@section('title', '| Όλες οι Κατηγορίες')

@section('content')

<section id="results-top-wrapper">
	<div class="poster-bg-wrapper">
    	<div class="poster-bg" style="background-image: url({{ URL::to('/') }}/img/poster-bg.jpg)"></div>
    </div>
    <div class="container">
    	<h1>Όλες οι κατηγορίες</h1>
    </div>
</section>

<section id="main-wrapper">
	<div class="container">
    	<div class="row">
            <div class="col-md-12">
                <h1>Κατηγορίες</h1>   
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Όνομα Κατηγορίας</th>
                            <th>Περιγραφή Κατηγορίας</th>
                            <th>Αρ. Άρθρων</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->posts->count() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    			<hr>
                <h1>Νέα Κατηγορία</h1>
                {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}					
                    <div class="form-group">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Όνομα']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Περιγραφή']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) !!}
                    </div>
                {!! Form::close() !!}
			</div>
        </div>
    </div>
</section>    

@endsection