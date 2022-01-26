<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DegreeLevel;

class DegreeLevelTableSeeder extends Seeder
{
    public function run(){
        $degree_levels= [
            [               
                'degree_name'    => 'HKCEE/HKDSE/NVQ/A-Level',  
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()               
            ],
            [               
                'degree_name'    => 'Higher Diploma/Assiciate Degree',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],
            [               
                'degree_name'    => "Bachelor's Degree",   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],
            [               
                'degree_name'    => "Master's Degree",   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],
            [               
                'degree_name'    => 'PhD(Earned)',   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],         

        ];
      
         DegreeLevel::insert($degree_levels);
    }
}
