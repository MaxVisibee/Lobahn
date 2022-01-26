<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobShift;

class JobShiftTableSeeder extends Seeder
{
    public function run(){
        $job_shifts= [
            [               
                'job_shift'      => 'Normal full-time work week',  
                'created_at'     => now(),
                'updated_at'     => now()               
            ],
            [               
                'job_shift'      => 'Five-day week',    
                'created_at'     => now(),
                'updated_at'     => now()            
            ],   
            [               
                'job_shift'      => 'Flexible work hours',    
                'created_at'     => now(),
                'updated_at'     => now()            
            ],   
            [               
                'job_shift'      => 'Work from home',    
                'created_at'     => now(),
                'updated_at'     => now()            
            ],   
            [               
                'job_shift'      => 'Freelance',    
                'created_at'     => now(),
                'updated_at'     => now()            
            ],         

        ];
      
         JobShift::insert($job_shifts);
    }
}
