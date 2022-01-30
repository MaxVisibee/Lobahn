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
                'priority'       => 1,
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()               
            ],
            [               
                'degree_name'    => 'Higher Diploma/Assiciate Degree',
                'priority'       => 2,   
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],
            [               
                'degree_name'    => "Bachelor's Degree", 
                'priority'       => 3,  
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],
            [               
                'degree_name'    => "Master's Degree",   
                'priority'       => 4,
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],
            [               
                'degree_name'    => 'PhD(Earned)',   
                'priority'       => 5,
                'is_active'      => true,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],         

        ];
      
         DegreeLevel::insert($degree_levels);
    }
}
