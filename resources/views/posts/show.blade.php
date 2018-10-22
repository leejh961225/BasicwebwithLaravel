@extends('layouts.app')

@section('content')
</br>
<a href="/posts" class="">Go back</a>
</br><hr>
<h1>{{ $post->title }}</h1>
  
  <div>
    {!! $post->body !!}
  </div>
<hr></br> </br>
<small>Written on {{ $post->created_at }}</small>
@endsection
