<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $usersIDs = DB::table('users')->pluck('id');
        $categoriesIDs = DB::table('categories')->pluck('id');

        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'url' => $this->faker->url(),
            'user_id' => $this->faker->randomElement($usersIDs),
            'category_id' => $this->faker->randomElement($categoriesIDs)
        ];
    }
}
