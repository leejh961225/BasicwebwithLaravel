@extends('layouts.app')

@section('content')
</br>
<a href="/posts" class="">Go back</a>
</br><hr>
<h1>{{ $post->title }}</h1> <hr>
<div class="col-md-12 col-sm-12">
  @if($post->cover_image !== 'noimage.jpg')
<img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/100x150?theme=thumb" alt="Thumbnail [100x150]" style="width: 100%; height: 100%;" src="/storage/cover_images/{{ $post->cover_image }}" data-holder-rendered="true">
  @endif
</div>
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
