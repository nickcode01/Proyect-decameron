<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [


            'room_id' => rand(1,3),
            'accommodation_id'=> rand(1,6),
            'num_room'=>rand(10,30),
        ];
    }
}
