<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function replies(){
        return $this->hasMany(Comment::class, 'parent_id');
        //Add a primary key as a parent_id because we need to fetch a reply based on a parent comment’s id
    }
    
}
