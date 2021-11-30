<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobExperience;

class JobExperienceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $job_experiences= [
            [               
                'job_experience'          => '3 Years',              
            ],
            [               
                'job_experience'          => 'Over 3 Years',             
            ],         

        ];
      
         JobExperience::insert($job_experiences);
    }
}
