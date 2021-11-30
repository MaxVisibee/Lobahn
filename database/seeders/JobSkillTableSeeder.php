<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobSkill;

class JobSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $job_skills= [
            [               
                'job_skill'          => 'Good Written and Spoken English',              
            ],
            [               
                'job_skill'          => 'Interpersonal and Communication SKill',             
            ],
            [               
                'job_skill'          => 'Familiar with Serve-based OS',             
            ],         
            [               
                'job_skill'          => 'Creative Problem-Solving Skill',             
            ],
            [               
                'job_skill'          => 'Bachelor Degree',             
            ],
            [               
                'job_skill'          => 'Design experinece',             
            ],
            [               
                'job_skill'          => 'Have knowledge Programming',             
            ],

        ];
      
         JobSkill::insert($job_skills);
    }
}
