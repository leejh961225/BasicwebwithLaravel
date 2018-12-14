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
<small>작성일: {{ $post->created_at }} by {{ $post->user->name }}</small>
<hr>

@if(!Auth::guest())
  @if(Auth::user()->id == $post->user_id)
    <b>작성자 권한: </b>
  <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">수정</a>
 
  <!-- auth author checking end -->
  @endif
  <hr>
<!-- Shadow textarea -->
<b><p class="font">댓글: <a href="#" class="text-warning">{{ $post->total_comments->count() }}</a>개</p></b>

    <!-- Contenedor Principal -->
      
    <div class="">
      <ul id="comments-list" class="comments-list">
        <li>
<!-- fetch comments from db -->

			@include('posts._comment_replies', [ 'comments' => $post->comments, 'post_id' => $post->id ])
 
</li>
</ul>
</div>


{!!  Form::open(['url' =>  'comment/store' ]) !!}
<div class="form-group shadow-textarea">
    <label for="exampleFormControlTextarea6"></label>
{{ Form::textarea('comment_body', '', ['id' => 'comment_body', 'class' => 'form-control z-depth-1', 'rows' => '3', 'placeholder' => '댓글 쓰기..', 'required']) }}
{{ Form::hidden('post_id', $post->id ) }}
  </div>
  {{ Form::submit('등록', ['class' => 'btn btn-default']) }}

{!! Form::close() !!}
  
  <!-- Shadow textarea -->
<!-- auth guest checking end -->
@endif
@endsection
