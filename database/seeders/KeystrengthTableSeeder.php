<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\KeyStrength;

class KeystrengthTableSeeder extends Seeder
{
    public function run()
    {
        $keystrength = [
            [
            'key_strength_name'=> 'Business development',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'key_strength_name'=> 'Client relations',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'key_strength_name'=> 'Communications',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'key_strength_name'=> 'Data analysis',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'key_strength_name'=> 'Networking',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'key_strength_name'=> 'Presentation',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'key_strength_name'=> 'Project management',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'key_strength_name'=> 'Research',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'key_strength_name'=> 'Strategic Planning',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
            [
            'key_strength_name'=> 'Team leadership',
            'created_at'     => now(),
            'updated_at'     => now()
            ],
        ];
        
        KeyStrength::insert($keystrength);
    }
}
