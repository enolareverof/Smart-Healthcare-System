@extends('layouts.master')

	@section('content')

		@include('layouts.message')
		
		<h2>{{ $user->id }} {{ $user->name }}</h2>
		<h3>{{ $user->email }}</h3>

	@stop