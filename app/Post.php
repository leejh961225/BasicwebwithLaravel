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
}
