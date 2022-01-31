<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LanguageLevel;

class LanguageLevelSeeder extends Seeder
{
    public function run()
    {
        $levels = [
            [
                'level' => "basic",
                'priority' => 1,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'level' => "fluent",
                'priority' => 2,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'level' => "native/bilingual",
                'priority' => 3,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
        ];
        LanguageLevel::insert($levels);
    }
}
