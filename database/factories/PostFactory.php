<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(4);

        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => '<p>' . $this->faker->paragraph(2) . '</p>',
            'body' => '<p>' . $this->faker->paragraph(20) . '</p>',
            'published_at' => now()->addSeconds(20)
        ];
    }
}
