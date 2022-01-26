<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobType;

class JobTypeTableSeeder extends Seeder
{
    public function run(){
        
        $job_types= [
            [               
                'job_type'       => 'Normal full-time work week', 
                'created_at'     => now(),
                'updated_at'     => now()               
            ],
            [               
                'job_type'       => 'Five-day week', 
                'created_at'     => now(),
                'updated_at'     => now()               
            ],
            [               
                'job_type'       => 'Flexible work hours', 
                'created_at'     => now(),
                'updated_at'     => now()               
            ],
            [               
                'job_type'       => 'Work from home', 
                'created_at'     => now(),
                'updated_at'     => now()               
            ],
            [               
                'job_type'       => 'Freelance', 
                'created_at'     => now(),
                'updated_at'     => now()               
            ],         

        ];
      
         JobType::insert($job_types);
    }
}
