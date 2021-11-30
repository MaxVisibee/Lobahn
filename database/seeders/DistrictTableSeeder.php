<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $districts= [
            [               
                'area_id'          => '1',
                'district_name'    => 'Aberdeen',             
            ],
            [               
                'area_id'          => '1',
                'district_name'    => 'Ap Lei Chau ',                             
            ],
            [               
                'area_id'          => '1', 
                'district_name'    => 'Siu Sai Wan',             
            ],         

        ];
      
         District::insert($districts);
    }
}
