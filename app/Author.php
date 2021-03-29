<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function info() {
        return $this->hasOne('App\AuthorInfo');
    }

    public function post() {
        return $this->hasMany('App\Post');
    }
}
