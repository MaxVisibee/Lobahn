<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Geographical;

class GeographicalTableSeeder extends Seeder
{
    public function run()
    {
        $geographical = [
            [
                'geographical_name' => 'Hong Kong and Macau',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Taiwan',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Japan',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Singapore',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'China',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'South Korea',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Malaysia',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Indonesia',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Cambodia',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Philippines',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Thailand',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Vietnam',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Laos',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Myanmar',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Australia & New Zealand',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Brunei',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'India',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Canada',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Mexico',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'United Kingdom',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Europe',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Middle East and Africa',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Central America',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'Central Asia',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'South America',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'geographical_name' => 'South Asia',
                'created_at'     => now(),
                'updated_at'     => now()
            ]
        ];
        Geographical::insert($geographical);
    }
}
