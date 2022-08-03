<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->sentence(
                $this->faker->numberBetween(10, 50)
            ),
        ];
    }
}
