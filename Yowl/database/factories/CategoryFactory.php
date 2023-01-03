<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $list_categ=[ 'sport', 'house', 'animal', 'car', 'travel', 'work' , 'restaurant', 'theater', 'wildlife', 'sportwear'];
        // // dd($list_categ);
        // return [

        //     'name' => $list_categ,
        //     'icon' => $this->faker->paragraph,
        // ];
    }
}
