@extends('layouts.app')

@section('title', '| Επεξεργασία Άρθρου')

@section('stylesheets')
	{!! Html::style('css/select2.css') !!}
@endsection

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
            <div class="col-md-10 col-sm-9">

                {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true ]) !!}
				<div class="panel panel-default" id="account">
                	<div class="panel-body">
                        <div class="form-group">
                            {!! Form::label('title', 'Τίτλος:') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Τίτλος:') !!}
                            <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{{ asset('uploads/images/'. $post->image) }}" class="img-responsive lazy">
                            {{ Form::file('image') }}                   
                        </div>
                        <div class="form-group">
                            {!! Form::label('title', 'Κατηγορία:') !!}
                            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {!! Form::label('title', 'Ετικέτες:') !!}
                            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2', 'multiple' => 'multiple']) }}
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
                 	</div>
                </div>
                {!! Form::close() !!}
              
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
	{!! Html::script('js/select2.js') !!}
	<script type="text/javascript">
		$('.select2').select2();
		$('.select2').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
	</script>
@endsection