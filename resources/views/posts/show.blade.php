@extends('layouts.app')

@section('title', "| $post->title")

@section('body-class', 'post')

@section('content')
<section id="main-wrapper">
    <div class="container">
        <div class="row">
            <article class="post">                
                <header class="post-header">
                	<h1>{{ $post->title }}</h1>
                </header>
                <figure class="post-image">
                	<img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-original="{{ $post->image }}" class="img-responsive">
                </figure>
                <div class="post-inner">
                    <div class="post-meta clearfix">
                        <span class="pull-left">
                        	<ul class="list-inline">
                            	<li><i class="fa fa-calendar fa-fw"></i> {{ date('M j, Y h:ia', strtotime($post->created_at)) }}</li>
                                <li><span><i class="fa fa-user" aria-hidden="true"></i> </span>{{ $post->user->first_name. ' ' .$post->user->last_name }}</li>
                            	<li><span>Κατηγορία: </span>{{ $post->category->name }}</li>                               
                                <li>
                                    <ul class="list-inline">
                                    	<span><i class="fa fa-tags" aria-hidden="true"></i> </span>
                                        @foreach ($post->tags as $tag)
                                            <li>{{ $tag->name }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </span>
                        <span class="pull-right">
                        @if (Auth::user())
                        	<ul class="list-inline">
                        		<li>{!! Html::linkroute('posts.edit', 'Επεξεργασία', array($post->id), array('class' => 'btn btn-link btn-sm btn-block')) !!}</li>
                        		<li>
                                	{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
										{!! Form::submit('Διαγραφή', ['class' => 'btn btn-link btn-sm btn-block']) !!}
									{!! Form::close() !!}
                            	</li>
                            </ul>
                        @endif
                        </span>
                    </div> 
                    <div class="row">                       
                    	<div class="post-content col-md-9 col-sm-12">
                        	{{ $post->body }}
                        </div>
                    </div>
              	</div>      
            </article>       
        </div>
    </div>
</section>
@endsection
