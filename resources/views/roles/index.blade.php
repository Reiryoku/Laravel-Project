@extends('layouts.app')
 
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
                <h1>Ετικέτες <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a></h1>
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th width="280px">Action</th>
                    </tr>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->display_name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>                        
                		<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
						<a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </table>
                {!! $roles->render() !!}
			</div>
        </div>
    </div>
</section>
@endsection