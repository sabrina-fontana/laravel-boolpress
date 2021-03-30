<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'text', 'date', 'author_id'];

    public function author() {
        return $this->belongsTo('App\Author');
    }

    public function comment() {
        return $this->hasMany('App\Comment');
    }
}
