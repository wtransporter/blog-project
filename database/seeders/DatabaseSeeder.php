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
        $user = \App\Models\User::factory()->create();

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

        Category::all()->each(function($category) use ($user){
            return \App\Models\Post::factory(2)->create([
                'user_id' => $user->id,
                'category_id' => $category->id
            ]);
        });
    }
}
