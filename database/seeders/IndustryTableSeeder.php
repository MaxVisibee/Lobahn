<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Industry;

class IndustryTableSeeder extends Seeder
{
    public function run()
    {
        $industry = [
            [
            'industry_name'=> 'Consumer goods',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'industry_name'=> 'Energy',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'industry_name'=> 'Financial Services',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'industry_name'=> 'Healthcare',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'industry_name'=> 'Hospitality & Leisure',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'industry_name'=> 'Industrial manufacturing',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'industry_name'=> 'Information Technology',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'industry_name'=> 'Insurance',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'industry_name'=> 'Media',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'industry_name'=> 'NGO/Non-profits',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'industry_name'=> 'Professional Services',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'industry_name'=> 'Public Sector/Government Service',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'industry_name'=> 'Retailing',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'industry_name'=> 'Telecommunications Services',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'industry_name'=> 'Transportation & Logistics',
            'created_at'     => now(),
            'updated_at'     => now()
            ]
        ];

        Industry::insert($industry);
    }
}
