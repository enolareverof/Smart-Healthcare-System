<h2>{{ $comment->post->title }}</h2>
<h3>Category: {{ $comment->post->category->name }}</h3>
<h4>Written By: User {{ $comment->post->user_id }}</h4>
<h5>{{ $comment->post->body }}</h5>


{!! Form::model($comment, array('action' => 'CommentController@update', 'method' => 'put')) !!}

	{!! Form::label('body', 'Comment Body') !!}
    <br>
    {!! Form::textarea('body') !!}
    @foreach ($errors->get('body') as $error)
    	{{ $error }}
	@endforeach
    <br><br>

	{!! Form::submit('Comment') !!}

{!! Form::close() !!}