@extends('layouts.master')

	@section('content')

		@foreach($categories as $category)
			<h2>{{ $category->name }}</h2>
			<h3>Description: {{ $category->description }}</h3>
			<h4>Created By: User {{ $category->user_id }}</h4>
			<hr>
		@endforeach

	@stop