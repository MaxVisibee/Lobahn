<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsEvent;

class NewsEventTableSeeder extends Seeder
{
    public function run()
    {
        NewsEvent::truncate();

        NewsEvent::factory()->count(10)->create();
    }
}
