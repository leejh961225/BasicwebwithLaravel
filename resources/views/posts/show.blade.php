@extends('layouts.app')

@section('content')
</br>
<a href="/posts" class="">Go back</a>
</br><hr>
<h1>{{ $post->title }}</h1>
<hr>
  <div>
    {!! $post->body !!}
  </div>
</br> </br>
<small>Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
<hr>

@if(!Auth::guest())
  @if(Auth::user()->id == $post->user_id)
    <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit</a>
  @endif
@endif
@endsection
