@extends('layouts.master')

	@section('content')

		@foreach($posts as $post)
			<h2>{{ $post->title }}</h2>
			<h3>Category: {{ $post->category->name }}</h3>
			<h4>Written By: User {{ $post->user_id }}</h4>
			<h5>{{ $post->body }}</h5>
			<hr>
		@endforeach

	@stop