@extends('layouts.app')

@section('content')
</br> </br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <a href="/posts/create" class="btn btn-primary"> Create Post </a> 
        <a href="/posts/create_chord" class="btn btn-success"> Create Tab </a> 

        <hr>
        <h3>Your Blog Posts</h3>
    <br>
  
    @if(!isset($posts))
        <p>You have to posts yet</p>
    @else

    @if(count($posts) > 0)
   
    <table class="table table-striped" id="dashboard_tbl">
        <thead>
        <tr>
            <th></th>
            <th width="25%">Title</th>
            <th></th>
            <th></th>
            <th></th>
            <th>작성일</th>
            <th>조회</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr> 
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td><a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit</a></td>
                <td>
                        {!! Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                        {{ Form::hidden('postId',  $post->id) }} 
                        {{ Form::hidden('_method', 'DELETE') }} 
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}
                </td>
                <td><a href="/posts/{{ $post->id }}" class="btn btn-success">See</a></td>
                <td>{{ $post->created_at->format('M d Y') }}</td>
                <td>{{ $post->id }}</td>
            </tr>
        @endforeach
    </tbody> 
    </table>
   
    @else
        <p>You have no posts</p>
    @endif
    @endif
       

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
