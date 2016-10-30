@extends('dashboard.index')

@section('bodytag')
	<body class="dashboard categories">
@endsection

@section('dashboard-content')

<section id="results-top-wrapper" class="dashboard-wrapper">
	<div class="poster-bg-wrapper">
    	<div class="poster-bg" style="background-image: url({{ URL::to('/') }}/img/poster-bg.jpg)"></div>
    </div>
    <div class="container">
    	<h1>Όλες οι κατηγορίες</h1>
    </div>
</section>

<section id="main-wrapper" style="padding:0;">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-md-8">
            	<div class="row">
                	<div style="padding:20px; background-color: #fafafa">
                    	<div class="pagination-top">
                    		{!! $categories->links(); !!}
                        </div>
                    	<h2> </h2>
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
                                    <td>{{ $category->image }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->posts->count() }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-bottom">
                    		{!! $categories->links(); !!}
                        </div>
                    </div>
                </div>  
            </div>    
    		<div class="col-md-4">
                <div class="row">
                    <div style="padding:40px 20px; background-color: #eee;">
                    <h1>ΝΕΑ ΚΑΤΗΓΟΡΙΑ</h1>
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
        </div>
    </div>
</section> 
 
@endsection