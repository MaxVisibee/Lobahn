<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Community;

class CommunitiesTableSeeder extends Seeder
{
    public function run()
    {
        Community::truncate();
        Community::factory()->count(10)->create();
    }
}
