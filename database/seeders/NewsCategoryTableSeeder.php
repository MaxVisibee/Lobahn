<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\NewsCategory;

class NewsCategoryTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'category_name' => 'Information',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category_name' => 'Advice',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'category_name' => 'Opinion',
                'created_at'     => now(),
                'updated_at'     => now()
            ]
        ];
        NewsCategory::insert($categories);
    }
}
