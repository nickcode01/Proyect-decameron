<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->sentence,
            "city" => $this->faker->text(30),
            "address" => $this->faker->text(70),

            'nit' => rand(1000,5000),
            'num_room'=> rand(10,30),

        ];
    }
}
