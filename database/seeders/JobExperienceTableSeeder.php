<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobExperience;

class JobExperienceTableSeeder extends Seeder
{
    public function run(){
        //
        for($i=1;$i<=50;$i++)
        {
                JobExperience::insert([               
                'job_experience' => $i.' Years',  
                'Priority' =>  $i,
                'created_at' => now(),
                'updated_at' => now()               
            ]);
        }
         
    }
}
