@extends('layouts.master')

    @section('content')

        {!! Form::model($category, array('action' => array('CategoryController@update', $category->id), 'method' => 'put')) !!}
            
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

        	{!! Form::submit('Update Category') !!}

        {!! Form::close() !!}

    @stop