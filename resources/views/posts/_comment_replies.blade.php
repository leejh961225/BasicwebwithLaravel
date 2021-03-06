
@foreach($comments as $comment)

<!-- Check if the comment is reply or parent comment -->
@if ( $comment->parent_id != NULL )
<ul class="comments-list reply-list">
<li>
  <!-- Avatar -->
  <div class="comment-avatar"><img src="/img/user.jpg" alt=""></div>
  <!-- Contenedor del Comentario -->
  <div class="comment-box">
    <div class="comment-head">
      <h6 class="comment-name {{   $comment->user->id == $post->user_id ? 'by-author' : ''}} "><a href="http://creaticode.com/blog">{{ $comment->user->name }}</a></h6>
      <span>{{ $comment->updated_at }}</span>
      <!--i class="fa fa-reply"></i-->
      <i class="fa fa-heart"></i>
    </div>
    <div class="comment-content">
        {{ $comment->body }}
      </div>
  </div>
</li>
</ul>

@else
    
<div class="comment-main-level">
    <!-- Avatar -->
    <div class="comment-avatar"><img src="/img/user.jpg" alt=""></div>
    <!-- Contenedor del Comentario -->
    <div class="comment-box">
      <div class="comment-head">
        <h6 class="comment-name {{   $comment->user->id == $post->user_id ? 'by-author' : ''}} "><a href="http://creaticode.com/blog">{{ $comment->user->name }}</a></h6>
        <span>{{ $comment->updated_at }}</span>
        <i class="fa fa-reply reply" id="{{ $comment->id }}"></i>
        <i class="fa fa-heart"></i>
      </div>
      <div class="comment-content">
          {{ $comment->body }}
      </div>
    </div>
    <div class='append_textarea{{ $comment->id }}'></div>
  </div>

  @endif

  @include('posts._comment_replies', ['comments' => $comment->replies])

@endforeach


