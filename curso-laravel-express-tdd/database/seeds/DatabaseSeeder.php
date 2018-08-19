<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        factory('laravel_express\User')->create(
            [
                'name' => 'Jaqueline',
                'email' => 'soamazing@gmail.com',
                'password' => bcrypt('123456'),
                'remember_token' => str_random(10),
            ]
        );

        $this->call('PostsTableSeeder');
        $this->call('CommentsTableSeeder');
        $this->call('TagsTableSeeder');

        Model::reguard();
    }
}
