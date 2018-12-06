@extends('layouts.app')

@section('content')
  <h1>Create Post</h1>
<hr></br>                                     <!-- Enctype is file input as the browser will know how to properly format the request.  -->
  {!!  Form::open(['action' => 'PostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Post Title']) }}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Post Body']) }}
      </div>
      <div class="form-group">
          {{ Form::file('cover_image') }}
      </div>
      {{Form::submit('Post', ['class' => 'btn btn-primary']) }}
  {!! Form::close() !!}
@endsection
