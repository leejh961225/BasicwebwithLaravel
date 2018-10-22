@extends('layouts.app')

@section('content')
  <h1>Create Post</h1>
<hr></br>
  {!!  Form::open(['action' => 'PostController@store', 'method' => 'POST']) !!}
    <div class="form-group">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Post Title']) }}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Post Body']) }}
      </div>

      {{Form::submit('Post', ['class' => 'btn btn-primary']) }}
  {!! Form::close() !!}
@endsection
