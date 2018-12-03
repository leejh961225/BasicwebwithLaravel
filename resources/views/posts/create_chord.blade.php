@extends('layouts.app')
@section('content')
  <h1>Create Chords</h1>
<hr></br>
  {!!  Form::open(['action' => 'PostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {{ Form::label('title', 'Music Title') }}
      {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Music Title']) }}
    </div>
    <label class="col-md-4 control-label" for="RootKey">Chords</label>
    <label class="col-md-4 control-label" for="Tuning">Tuning</label>
    <div class="form-group row">
      <div class="col-md-4 ">
        <select id="RootKey" name="RootKey" class="form-control">
          <option value="C" >C</option>
          <option value="D" >D</option>
          <option value="E" >E</option>
          <option value="F" >F</option>
          <option value="G" >G</option>
          <option value="A" >A</option>
          <option value="B" >B</option>
          <option value="D" >C#</option>
          <option value="E" >D#</option>
          <option value="F#">F#</option>
          <option value="G#">G#</option>
          <option value="Bb">Bb</option>

        </select>
      </div>
      <div class="col-md-4 ">
        <select id="Tuning" name="Tuning" class="form-control">
          <option value="n/s">(not selected)</option>
          <option value="Standard">Standard</option>
          <option value="Drop-D">Drop D</option>
          <option value="Half-Step Down">Half-Step Down</option>
        </select>
      </div>
      
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', '', ['id' => 'music_field', 'class' => 'form-control', 'placeholder' => '가사']) }}
      </div>
      <div class="form-group">
          {{ Form::file('cover_image') }}
      </div>
      {{Form::submit('Post', ['class' => 'btn btn-primary']) }}
  {!! Form::close() !!}
@endsection