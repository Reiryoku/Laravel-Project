@extends('layouts.app')

@section('title', '| Dashboard')

@section('bodytag')
	<body class="dashboard">
@endsection

@section('content')

<section id="dashboard-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-1">
            	<div class="row">
                    <ul class="nav nav-stacked">
                  		<li><a href="{{ url('/dashboard/pages') }}">Σελίδες</a></li>
                      	<li><a href="{{ url('/dashboard/posts') }}">Άρθρα</a></li>
                      	<li><a href="{{ url('/dashboard/categories') }}">Κατηγορίες</a></li>
                      	<li><a href="{{ url('/dashboard/tags') }}">Ετικέτες</a></li>
                        <li><a href="{{ url('/dashboard/users') }}">Χρήστες</a></li>
                        <li><a href="{{ url('/dashboard/roles') }}">Ρόλοι</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-11">
            	<div class="row">
            		@yield('dashboard-content')
                </div>
            </div>
		</div>
	</div>   
</section>
 
@endsection