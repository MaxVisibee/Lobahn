<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Opportunity;

class OpportunitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opportunity::factory()->count(5)->create();
    }
}
