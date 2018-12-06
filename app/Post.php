<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table name
    protected $table = 'posts';
    //PK
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    //posts belongs to user
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        //Here, we have written all the comments, whose parent_id is null. 
        //The reason is that we need to display the parent level comment and also save the parent level comment. 
        //That is why. We need to differentiate between the Comment and its replies.
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    public function total_comments(){
        //get the total count of comments.
        //'commentable_id is from the comment table and id is from the posts table
        //used in show.blade.php
        return $this->hasMany(Comment::class, 'commentable_id','id');
    }
}
