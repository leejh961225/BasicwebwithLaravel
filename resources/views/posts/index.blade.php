@extends('layouts.app')

@section('content')
  <h1>Posts</h1> 
  <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="text-muted" id="test1" href="#">Subscribe</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#">Large</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
       
        <a class="btn btn-sm btn-outline-secondary" href="/posts/create">Create New Post</a>
      </div>
    </div>
    
<hr></br> </br>
  @if(count($posts) > 0)
        @foreach ($posts as $post)   
        <div class="col-md-12">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
              <div class="card-body d-flex flex-column align-items-start">
                  <div class="container">
                      <div class="row">
                        <div class="col-sm">
                            <strong class="d-inline-block mb-2 text-primary">Post#:{{ $post->id }}</strong>
                        </div>
                        <div class="col-sm">
                  @if(Auth::user()->id == $post->user_id)       
                        <button type="button" class="close pull-right" data-toggle="modal" data-target="#Post_Delete_Modal" data-post="{{ $post->id }}" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                  @endif

                             
                        </div>
                      </div>
                    </div>
             
               
                
                <h3 class="mb-0">
                  <a class="text-dark" href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h3>
                <div class="mb-1 text-muted">{{ $post->created_at }}</div>
                <p class="card-text mb-auto"></p>
                <a href="/posts/{{ $post->id }}">Continue reading</a>
              </div>
              <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/100x150?theme=thumb" alt="Thumbnail [200x250]" style="width: 100px; height: 150px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1669a0202f4%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1669a0202f4%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            </div>
          </div>
          <hr>
        @endforeach
        {{ $posts->links() }}
  @else
  <p>No Posts found</p>
  @endif

  
<!-- Delete Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="Post_Delete_Modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"  id="favoritesModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body message-modal">
        {!! Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
        {{ Form::hidden('_method', 'DELETE') }} 
        {{ Form::hidden('postId', '') }} 
        Are you sure you want to delete this post?
          Post index: 
        </div>
        <div class="modal-footer">
          {{ Form::submit('', ['class' => 'btn btn-danger footer_action_button'])}}
            {!! Form::close() !!}
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>

@endsection

