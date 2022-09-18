<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10000),
            'level_two_id' => rand(1, 500),
            'cart_name' => fake()->unique()->text('14'),
            'main_photo' => 'https://images.pexels.com/photos/2533311/pexels-photo-2533311.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
            'important_details' => fake()->text('500'),
        ];
    }
}