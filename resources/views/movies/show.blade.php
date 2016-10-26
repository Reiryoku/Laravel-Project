@extends('layouts.app')

@section('body-class', 'home')

@section('content')
<section id="main-wrapper">
    <div class="container">
        <div class="row">
            <article class="post">                
                <header class="post-header">
                	<h1>{!! $movie['title'] !!}</h1>
                </header>
                <figure class="post-image">
                	<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="" class="img-responsive">
                </figure>
                <div class="post-inner">
                    <div class="post-meta clearfix">
                        <span class="pull-left">
                            <i class="fa fa-calendar fa-fw"></i> </span>
                        <span class="pull-right">

                        </span>
                    </div> 
                    <div class="row">                       
                    	<div class="post-content col-md-9 col-sm-12">
                        	{!! $movie['overview'] !!}
                        </div>
                    </div>
              	</div>      
            </article>       
        </div>
    </div>
</section>
@endsection
