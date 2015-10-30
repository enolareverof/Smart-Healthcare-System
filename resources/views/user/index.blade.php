@extends('layouts.master')

	@section('content')

		@foreach($users as $user)

			<h3>ID:{{ $user->id }} Name:{{ $user->name }} Email:{{ $user->email }}</h3>
		
		@endforeach

	@stop