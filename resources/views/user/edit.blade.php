@extends('layouts.master')

    @section('content')

        @include('layouts.message')

        {!! Form::model($user, array('action' => array('UserController@update', $user->id), 'method' => 'put')) !!}
            
            {!! Form::label('name', 'Name') !!}
            <br>
            {!! Form::text('name') !!}
            @foreach ($errors->get('name') as $error)
            	{{ $error }}
        	@endforeach
            <br><br>

        	{!! Form::submit('Update Account') !!}

        {!! Form::close() !!}

    @stop