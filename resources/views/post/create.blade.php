@extends('layouts.master')

    @section('content')

        {!! Form::open(array('action' => 'PostController@store', 'method' => 'post')) !!}
            
            {!! Form::label('title', 'Title') !!}
            <br>
            {!! Form::text('title') !!}
            @foreach ($errors->get('title') as $error)
            	{{ $error }}
        	@endforeach
            <br><br>

        	{!! Form::label('body', 'Body') !!}
            <br>
            {!! Form::textarea('body') !!}
            @foreach ($errors->get('body') as $error)
            	{{ $error }}
        	@endforeach
            <br><br>

            {!! Form::label('category', 'Category') !!}
            <br>
            {!! Form::select('category', array('' => 'Please Select') + $categories->all() , null) !!}
            @foreach ($errors->get('category') as $error)
                {{ $error }}
            @endforeach
            <br><br>

        	{!! Form::submit('Create Post') !!}

        {!! Form::close() !!}

    @stop