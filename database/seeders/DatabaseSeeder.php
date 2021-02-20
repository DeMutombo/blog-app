<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->has(Post::factory())->create();

        // \App\Models\User::factory(10)->create()->each(function ($user) {
        //     $user->posts()->save(App\Models\Post::class())->make());
        // });


        // factory(App\Models\User::class, 10)->create()->each(function ($user) {
        //     $user->posts()->save(factory(App\models\Post::class)->make());
        // });
    }
}
