<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarrierLevel;

class CarrierLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $carrier_levels= [
            [               
                'carrier_level'          => 'Department Head',              
            ],
            [               
                'carrier_level'          => 'Senior',             
            ],
            [               
                'carrier_level'          => 'Junior',             
            ],         

        ];
      
         CarrierLevel::insert($carrier_levels);
    }
}
