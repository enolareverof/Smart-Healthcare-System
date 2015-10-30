@extends('layouts.master')

	@section('content')

		<h2>{{ $category->name }}</h2>
		<h3>Description: {{ $category->description }}</h3>
		<h4>Created By: User {{ $category->user_id }}</h4>

		@foreach($category->posts as $post)
			<h2>{{ $post->title }}</h2>
			<h4>Written By: User {{ $post->user_id }}</h4>
			<h5>{{ $post->body }}</h5>
			<hr>
		@endforeach

	@stop