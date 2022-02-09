<?php

namespace Database\Factories;

use App\Models\NewsEvent;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsEventFactory extends Factory
{
    protected $model = NewsEvent::class;

    public function definition()
    {
        
        return [
            'event_title' => $this->faker->name(),
            'description' => $this->faker->text(),
            'event_date' =>  $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+1 year'),
            'event_time' => $this->faker->time($format = 'H:i:s', $min = 'now'),
            'event_year' => '2022' ,
        ];
    }
}
