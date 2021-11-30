<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $areas= [
            [               
                'area_name'          => 'Hong Kong Island',
                'country_id'          => '1',          
            ],
            [               
                'area_name'          => 'Kowloon',
                'country_id'          => '1',             
            ],
            [               
                'area_name'          => 'New Territories',
                'country_id'          => '1',             
            ],         

        ];
      
         Area::insert($areas);
    }
}
