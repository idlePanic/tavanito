<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = "posts";
    protected $fillable = ['title' , 'body' , 'tags'];

}
