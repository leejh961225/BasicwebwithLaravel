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
        <a href="/posts/create" class="btn btn-primary"> create post </a> 
    <hr>
        <h3>Your Blog Posts</h3>
    <br>
    @if(!isset($posts))
        <p>You have to posts yet</p>
    @else

    @if(count($posts) > 0)
    <table class="table table-striped">
        <tr>
            <th>Title</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($posts as $post)
        <tr>
                <td>{{ $post->title }}</td>
                <td><a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit</a></td>
                <td>
                        {!! Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                        {{ Form::hidden('postId',  $post->id) }} 
                        {{ Form::hidden('_method', 'DELETE') }} 
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
         
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