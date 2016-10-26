@extends('layouts.app')

@section('body-class', 'user profile')

@section('content')


        @foreach($posts as $post)
			{{ $post->title }}
         @endforeach
         
         {!! $posts->links(); !!}

@endsection
