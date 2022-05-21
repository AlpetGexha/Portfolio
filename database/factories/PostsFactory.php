<?php

namespace Database\Factories;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostsFactory extends Factory
{
    protected $model = Posts::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'body' => $this->faker->paragraph,
            'categorys' => $this->faker->sentence,
            'views' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->numberBetween(0, 1),
            'user_id' => User::get('id')->random()->id
            // User::inRandomOrder()->limit(1)->get()
        ];
    }
}
