@extends('layouts.master')

    @section('content')

        {!! Form::open(array('action' => 'CategoryController@store', 'method' => 'post')) !!}
            
            {!! Form::label('name', 'Category Name') !!}
            <br>
            {!! Form::text('name') !!}
            @foreach ($errors->get('name') as $error)
                {{ $error }}
            @endforeach
            <br><br>

            {!! Form::label('description', 'Description') !!}
            <br>
            {!! Form::textarea('description') !!}
            @foreach ($errors->get('description') as $error)
                {{ $error }}
            @endforeach
            <br><br>

        	{!! Form::submit('Create Post') !!}

        {!! Form::close() !!}

    @stop