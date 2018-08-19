<?php

use Illuminate\Database\Seeder;
use laravel_express\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::truncate();
        factory('laravel_express\Post', 15)->create();
    }
}
