@extends('layouts.master')

    @section('content')

        @include('layouts.message')

        {!! Form::open(array('action' => 'UserController@postLogIn', 'method' => 'post')) !!}

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

            {!! Form::label('remember', 'Remember Me') !!}
            {!! Form::checkbox('remember', 'true', false) !!}
            <br><br>

        	{!! Form::submit('Log In') !!}

        {!! Form::close() !!}

    @stop