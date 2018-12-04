@extends('layouts.app')
@section('content')
  <h1>Create Chords</h1>
<hr></br>
  {!!  Form::open(['action' => 'PostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        <b> {{ Form::label('title', 'Music Title') }}</b>
      {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Music Title']) }}
    </div>
    <div class="form-group">
        <b> {{ Form::label('artist', 'Artist') }}</b>
      {{ Form::text('artist', '', ['class' => 'form-control', 'placeholder' => 'Artist']) }}
      </div>
    <!--label class="col-md-4 control-label" for="RootKey">Chords</label-->
    <!--label class="col-md-4 control-label" for="Tuning">Tuning</label-->
    <div class="form-group row">
      <div class="col-md-4 ">
          <b>  {{ Form::label('Chords', 'Chords') }} </b>
        {{ Form::select('RootKey', array(
        'C' => 'C', 
        'D' => 'D',
        'E' => 'E',
        'F' => 'F',
        'G' => 'G',
        'A' => 'A',
        'B' => 'B',
        'C#' => 'C#',
        'D#' => 'D#',
        'F#' => 'F#',
        'G#' => 'G#',
        'Bb' => 'Bb'
        ), 'C', ['class' => 'form-control'] ) }}
        <!--select id="RootKey" name="RootKey" class="form-control">
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

        </select-->
      </div>
      <div class="col-md-4 ">
          <b> {{ Form::label('tune', 'Tuning') }} </b>
          {{ Form::select('Tuning', array(
          '0' => '(not selected)', 
          '1' => 'Standard',
          '2' => 'Drop D',
          '3' => 'Half-Step Down'
          ), '0', ['class' => 'form-control'] ) }}
        <!--select id="Tuning" name="Tuning" class="form-control">
          <option value="n/s">(not selected)</option>
          <option value="Standard">Standard</option>
          <option value="Drop-D">Drop D</option>
          <option value="Half-Step Down">Half-Step Down</option>
        </select-->
      </div>
      <div class="col-md-4 ">
        <b>  {{ Form::label('capo', 'Capo') }} </b>
          {{ Form::select('Capo', array(
          '0' => '(not selected)', 
          '1' => '1st fret',
          '2' => '2nd fret',
          '3' => '3rd fret',
          '4' => '4th fret',
          '5' => '5th fret',
          '6' => '6th fret'
          ), '0', ['class' => 'form-control'] ) }}
        <!--select id="Tuning" name="Tuning" class="form-control">
          <option value="n/s">(not selected)</option>
          <option value="Standard">Standard</option>
          <option value="Drop-D">Drop D</option>
          <option value="Half-Step Down">Half-Step Down</option>
        </select-->
      </div>
      
    <!-- End of Form-group --> 
    </div>
    <div class="form-group">
        <b>  {{ Form::label('body', 'Body') }} </b>
        {{ Form::textarea('body', '', ['id' => 'music_field', 'style' => "margin-top: 0px; margin-bottom: 0px; height: 548px; resize:none", 'class' => 'form-control', 'placeholder' => '가사']) }}
      </div>
      <div class="form-group">
          {{ Form::file('cover_image') }}
      </div>
      {{Form::submit('Post', ['class' => 'btn btn-primary']) }}
  {!! Form::close() !!}
@endsection