@extends('layouts.master')

	@section('content')

		<h2>{{ $post->title }}</h2>
		<h3>Category: {{ $post->category->name }}</h3>
		<h4>Written By: User {{ $post->user_id }}</h4>
		<h5>{{ $post->body }}</h5>

		@foreach($post->comments as $comment)
			<h6>User {{ $comment->user_id}}</h6>
			<h6>{{ $comment->body }}</h6>
		@endforeach

		{!! Form::open(array('action' => 'CommentController@store', 'method' => 'post')) !!}

			{!! Form::label('body', 'Comment Body') !!}
		    <br>
		    {!! Form::textarea('body') !!}
		    @foreach ($errors->get('body') as $error)
		    	{{ $error }}
			@endforeach
		    <br><br>

			{!! Form::submit('Comment') !!}

		{!! Form::close() !!}

	@stop