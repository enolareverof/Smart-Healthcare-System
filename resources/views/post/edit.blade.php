@extends('layouts.master')

    @section('content')

        {!! Form::model($post, array('action' => array('PostController@update', $post->id), 'method' => 'put')) !!}
            
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
            {!! Form::select('category', $categories->all() , $post->category->id) !!}
            <br><br>

        	{!! Form::submit('Update Post') !!}

        {!! Form::close() !!}

    @stop