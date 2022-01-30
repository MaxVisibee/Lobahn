<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PeopleManagementLevel;
class PeopleManagementLevelSeeder extends Seeder
{
    public function run()
    {
     
        $data = [
            [
                'level' => '0',
                'priority' => 1,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'level' => '1-5',
                'priority' => 2,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'level' => '6-20',
                'priority' => 3,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'level' => '21-100',
                'priority' => 4,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'level' => '101-500',
                'priority' => 5,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'level' => 'Over 500',
                'priority' => 6,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
        ];

        PeopleManagementLevel::insert($data);
    }
}
