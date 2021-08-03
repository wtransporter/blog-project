<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::factory(10)->create();

        \App\Models\Category::create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle'
        ]);

        \App\Models\Category::create([
            'name' => 'Home',
            'slug' => 'home'
        ]);

        \App\Models\Category::create([
            'name' => 'World',
            'slug' => 'world'
        ]);

        \App\Models\Category::create([
            'name' => 'Sports',
            'slug' => 'sports'
        ]);

        Category::all()->each(function($category) use ($user){
            return \App\Models\Post::factory(5)->create([
                'user_id' => rand(1,9),
                'category_id' => $category->id
            ])->each(fn($post) => \App\Models\Comment::factory(3)->create(['post_id' => $post->id]));
        });

        \App\Models\Category::factory(30)->create();
    }
}
