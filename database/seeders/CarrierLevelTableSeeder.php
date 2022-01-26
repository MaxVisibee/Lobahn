<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarrierLevel;

class CarrierLevelTableSeeder extends Seeder
{
    public function run(){

        $carrier_levels= [
            [               
                'carrier_level'  => 'Individual Specialist',  
                'created_at'     => now(),
                'updated_at'     => now()            
            ],
            [               
                'carrier_level'  => 'Individual Specialist',    
                'created_at'     => now(),
                'updated_at'     => now()         
            ],
            [               
                'carrier_level'  => 'Team Leader',  
                'created_at'     => now(),
                'updated_at'     => now()           
            ],      
            [               
                'carrier_level'  => 'Functional Head',  
                'created_at'     => now(),
                'updated_at'     => now()           
            ],      
            [               
                'carrier_level'  => 'Company-wide leadership role',  
                'created_at'     => now(),
                'updated_at'     => now()           
            ]
        ];
      
         CarrierLevel::insert($carrier_levels);
    }
}
