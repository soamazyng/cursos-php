<?php

namespace laravel_express;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    protected $fillable = ['name'];

    public function posts()
    {
    	return $this->belongsToMany('laravel_express\Post', 'posts_tags');
    }
}
