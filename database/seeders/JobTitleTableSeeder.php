<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobTitle;

class JobTitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $job_titles= [
            [               
                'job_title'          => 'Project Manager',              
            ],
            [               
                'job_title'          => 'Developer',             
            ],         

        ];
      
         JobTitle::insert($job_titles);
    }
}
