<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DegreeLevel;

class DegreeLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $degree_levels= [
            [               
                'degree_name'          => 'Master',              
            ],
            [               
                'degree_name'          => 'Bachelor',             
            ],
            [               
                'degree_name'          => 'Diploma',             
            ],         

        ];
      
         DegreeLevel::insert($degree_levels);
    }
}
