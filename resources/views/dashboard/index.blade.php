@extends('layouts.app')

@section('title', '| Dashboard')

@section('bodytag')
	<body class="dashboard">
@endsection

@section('content')

<section id="dashboard-wrapper">
	<div class="container-fluid">
		<div class="row">
        	<section id="dashboard-sidebar" style="position: absolute;top: 0;left: 0;padding-top: 50px;min-height: 100%;width: 230px;z-index: 810;background-color: #1d1d1d;">
                <ul class="nav nav-stacked">
                    <li><a href="{{ url('/dashboard/pages') }}">Σελίδες</a></li>
                    <li><a href="{{ url('/dashboard/posts') }}">Άρθρα</a></li>
                    <li><a href="{{ url('/dashboard/categories') }}">Κατηγορίες</a></li>
                    <li><a href="{{ url('/dashboard/tags') }}">Ετικέτες</a></li>
                    <li><a href="{{ url('/dashboard/users') }}">Χρήστες</a></li>
                    <li><a href="{{ url('/dashboard/roles') }}">Ρόλοι</a></li>
                </ul>   
            </section>
            <section id="dashboard-content-wrapper" style="margin-left: 230px;min-height: 916px; z-index: 800;">
           		@yield('dashboard-content')
            </section>
		</div>
	</div>     
</section>
 
@endsection