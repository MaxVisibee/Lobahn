<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Institution;

class InstitutionTableSeeder extends Seeder
{
    public function run()
    {
        $institutions =[
            [
                'institution_name' => 'Aarhus University, Denmark',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Aalto University, Finland',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Aberystwyth University, United Kingdom',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Abu Dhabi University, UAE',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Adelphi University, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Ain Shams University, Egypt',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Albion College, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Alice Lloyd College, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Alma College, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'American University, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'American University of Sharjah, UAE',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Amherst College, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Amrita University, India',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Anadolu University, Turkey',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Anderson University, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Andrews University, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Appalachian State University, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Arcadia University, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Arizona State University - Tempe, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Arkansas State University, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Art Center College of Design, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Asbury University, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Ashland University, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Asia University, Taiwan, Taiwan',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Aston University, United Kingdom',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Ateneo de Manila University, Philippines',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Auburn University, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Auckland University of Technology, New Zealand',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Augsburg University, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Augustana University, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Austin College, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Australian National University, Australia',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Autonomous University of Barcelona, Spain',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Ave Maria University, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'institution_name' => 'Avila University, United States',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
        ];

        Institution::insert($institutions);
    }
}
