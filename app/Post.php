<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
        'postTitle','post',
    ];

    public function users()
    {
        return $this->hasMany('App\Post');
    }
}
