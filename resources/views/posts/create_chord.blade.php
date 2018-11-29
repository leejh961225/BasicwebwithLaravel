@extends('layouts.app')
@section('content')
  <h1>Create Chords</h1>
<hr></br>
  {!!  Form::open(['action' => 'PostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {{ Form::label('title', 'Music Title') }}
      {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Music Title']) }}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', '', ['id' => 'music_field', 'class' => 'form-control', 'placeholder' => 'Post Body']) }}
      </div>
      <div class="form-group">
          {{ Form::file('cover_image') }}
      </div>
      {{Form::submit('Post', ['class' => 'btn btn-primary']) }}
  {!! Form::close() !!}
@endsection