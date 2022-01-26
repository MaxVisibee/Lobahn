<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Meta;

class MetaTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'page_name' => 'Lobahn Connect',
                'page_url'  => 'connect',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'Career Partaner',
                'page_url'  => 'career-partner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'Talent Discovery',
                'page_url'  => 'talent-discovery',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'Membership',
                'page_url'  => 'membership',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Meta::insert($data);
    }
}
