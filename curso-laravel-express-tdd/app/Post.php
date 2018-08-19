<?php

namespace laravel_express;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //seta quais os atributos do banco de dados eu posso atribuir em massa 'massAssigment'
    protected $fillable = [
    	'title',
    	'content'
    ];

    public function comments()
    {
    	return $this->hasMany('laravel_express\Comment');
    }

    public function tags()
    {
    	return $this->belongsToMany('laravel_express\Tag', 'posts_tags');
    }

    public function getTagListAttribute()
    {
        $tags = $this->tags()->lists('name')->all();
        return implode(', ', $tags);
    }
}
