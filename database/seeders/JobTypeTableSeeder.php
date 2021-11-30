<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobType;

class JobTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $job_types= [
            [               
                'job_type'          => 'Full Time',              
            ],
            [               
                'job_type'          => 'Part Time',             
            ],         

        ];
      
         JobType::insert($job_types);
    }
}
