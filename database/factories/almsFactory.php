<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\alms>
 */
class almsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->text,
            'Noun' => $this->faker->text,
            'Salary' => $this->faker->numerify('######')
        ];
    }
}
