@extends('layouts.master')

    @section('content')

        @include('layouts.message')

        {!! Form::open(array('action' => 'UserController@store', 'method' => 'post')) !!}
            
            {!! Form::label('name', 'Name') !!}
            <br>
            {!! Form::text('name') !!}
            @foreach ($errors->get('name') as $error)
            	{{ $error }}
        	@endforeach
            <br><br>

        	{!! Form::label('email', 'Email') !!}
            <br>
            {!! Form::text('email') !!}
            @foreach ($errors->get('email') as $error)
            	{{ $error }}
        	@endforeach
            <br><br>

            {!! Form::label('password', 'Password') !!}
            <br>
            {!! Form::password('password') !!}
            @foreach ($errors->get('password') as $error)
                {{ $error }}
            @endforeach
            <br><br>

            {!! Form::label('confirm_password', 'Confirm Password') !!}
            <br>
            {!! Form::password('confirm_password') !!}
            @foreach ($errors->get('confirm_password') as $error)
                {{ $error }}
            @endforeach
            <br><br>

        	{!! Form::submit('Create Account') !!}

        {!! Form::close() !!}

    @stop