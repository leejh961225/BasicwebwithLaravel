<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    //
    public function store(Request $request){
        
        $comment = new Comment;
        //get comment message
        $comment->body = $request->get('comment_body');
        //get user id
        $comment->user()->associate($request->user());
        //get post's id
        $post = Post::find($request->get('post_id'));
  
        $post->comments()->save($comment);


        return back()->with('success','댓글이 작성되었습니다.');
    }

    public function replyStore(Request $request){

        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();
    }

}
