<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Institution;
use App\Models\JobTitleCategory;

class JobTitleCategorySeeder extends Seeder
{
    public function run()
    {
        $institutions = [
            [
                'category' => 'Accounting',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category' => 'Software Development',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category' => 'Engineering',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category' => 'Financial',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category' => 'Digital & Media',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category' => 'Operations',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category' => 'Human Resources',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category' => 'Business Development',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category' => 'Hospitality & Leisure',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category' => 'Insurance',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category' => 'Healthcare',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category' => 'Telecommunications Services',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category' => 'Transportation & Logistics',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category' => 'NGO/Non-profits',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
        ];

        JobTitleCategory::insert($institutions);
    }
}