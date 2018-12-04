@extends('layouts.app')

@section('content')

  <h1>Posts</h1> 
  <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="text-muted" id="test1" href="#">Subscribe</a>
      </div>
      <div class="col-4 text-center">
        <a class="btn btn-sm btn-success" href="/posts/create_chord">Create New Chords</a>
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
              <div class="col-md-4 col-sm-4">
                  <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/100x150?theme=thumb" alt="Thumbnail [100x150]" style="width: 100%; height: 100%;" src="/storage/cover_images/{{ $post->cover_image }}" data-holder-rendered="true">

              </div>
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
            </div>
          </div>
          <hr>
        @endforeach
       <!-- Laravel pagination. details in PostController.php index function. -->
        <div class="row flex-nowrap align-items-center">
         
          <div class="col-sm-3">  
            {{ Form::open(array('action' => array('PostController@index'), 'class' => 'pull-right', 'method' => 'GET') ) }}
            {{ Form::select('search_key', array(
              '1' => '글제목', 
              '2' => '글내용',
              '3' => '글쓴이'
              ), '1', ['class' => 'form-control'] ) }}
            </div>   
            <div class="col-sm-6">  
              {{ Form::text('search_word', '', ['class' => 'form-control', 'placeholder' => '검색어']) }}
            
            </div>
              {{ Form::submit('검색', ['class' => 'btn btn-default']) }}
           
              {{ Form::close() }}
            </div>
            <hr>
            <div class="col-sm">
                  {{ $posts->links() }} 
            </div>
        
       
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
          @if(!isset($post))

          @else
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
          @endif
        </div>
        
    </div>
  </div>
</div>
@endsection

