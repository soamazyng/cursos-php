<?php

namespace laravel_express\Http\Controllers;

use Illuminate\Http\Request;

use laravel_express\Http\Requests;
use laravel_express\Post;
use laravel_express\Http\Controllers\Controller;

class PostsController extends Controller
{
    //

    public function index()
    {
		$posts = \laravel_express\Post::all();
		return view('posts.index', compact('posts'));		
    }
}
