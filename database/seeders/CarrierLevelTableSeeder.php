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
                'priority'       =>  1,  
                'created_at'     => now(),
                'updated_at'     => now()         
            ],
            [               
                'carrier_level'  => 'Team Leader',  
                'priority'       =>  2,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],      
            [               
                'carrier_level'  => 'Functional Head',  
                'priority'       =>  3,
                'created_at'     => now(),
                'updated_at'     => now()           
            ],      
            [               
                'carrier_level'  => 'Company-wide leadership role',  
                'priority'       =>  4,
                'created_at'     => now(),
                'updated_at'     => now()           
            ]
        ];
      
         CarrierLevel::insert($carrier_levels);
    }
}
