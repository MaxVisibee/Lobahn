<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobShift;

class JobShiftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $job_shifts= [
            [               
                'job_shift'          => 'Full Time',              
            ],
            [               
                'job_shift'          => 'Part Time',             
            ],         

        ];
      
         JobShift::insert($job_shifts);
    }
}
