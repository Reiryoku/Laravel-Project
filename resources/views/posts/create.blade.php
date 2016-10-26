@extends('layouts.app')

@section('title', '| Νέο Άρθρο')

@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
<section id="results-top-wrapper">
	<div class="poster-bg-wrapper">
    	<div class="poster-bg" style="background-image: url({{ URL::to('/') }}/img/poster-bg.jpg)"></div>
    </div>
    <div class="container">
    	<h1>Νέο Άρθρο</h1>
    </div>
</section>
<section id="main-wrapper">
	<div class="container">
    	<div class="row">
            <div class="col-md-12">
                <h1>Δημιουργία Νέου Άρθρου</h1>
                {!! Form::open(array('route' => 'posts.store')) !!}
                    <div class="form-group">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Τίτλος', 'required' => '', 'maxlength' => '255']) !!}
                    </div>
                   	<div class="form-group">
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value='{{ $category->id }}'>{{ $category->name }}</option>   
                            @endforeach
                        </select>
                	</div>
                    <div class="form-group">
                        <select class="form-control select2" name="tags[]" multiple="multiple">
                            @foreach($tags as $tag)
                                <option value='{{ $tag->id }}'>{{ $tag->name }}</option>   
                            @endforeach
                        </select>
                	</div>
                    <div class="form-group">
                        {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Περιεχόμενο Άρθρου', 'required' => '']) !!}                   
                    </div>
                    <div class="form-group">
                    	{!! Form::submit('Δημιουργία', ['class' => 'btn btn-success btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
	{!! Html::script('js/select2.min.js') !!}
    <!-- Scripts -->
    <script type="text/javascript">
		$('.select2').select2();
	</script>
@endsection