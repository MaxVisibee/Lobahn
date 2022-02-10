<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class CommunityFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->text,
            'user_id' => rand(1,4),
            'approved' => true,
            'started_date' => Carbon::now(),
        ];
    }
}
