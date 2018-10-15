@extends('layouts.app')

@section('content')
<h1> Messages </h1>
  @if(count($messages) > 0)
  @foreach($messages as $message)
    <ul class="list-group">
      <li class="list-group-item"><b>Name:</b> {{$message->name}} </li>
      <li class="list-group-item"><b>Email:</b> {{$message->email}} </li>
      <li class="list-group-item"><b>Message:</b> {{$message->message}} </li>
    </ul>
    </br>
  @endforeach
  @endif
@endsection

@section('sidebar')
@parent
 This is the sidebar 
 <p>This is appended to the sidebar 
 </p>
@endsection
