<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FunctionalArea;

class FunctionalAreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $functional_areas= [
            [               
                'area_name'          => 'Accountant',              
            ],
            [               
                'area_name'          => 'Architecture',             
            ],
            [               
                'area_name'          => 'HR',             
            ],         

        ];
      
         FunctionalArea::insert($functional_areas);
    }
}
