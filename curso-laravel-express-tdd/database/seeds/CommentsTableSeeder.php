<?php

use Illuminate\Database\Seeder;
use laravel_express\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Comment::truncate();
        factory('laravel_express\Comment', 5)->create();
    }
}
