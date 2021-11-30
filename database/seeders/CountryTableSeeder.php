<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $countries= [
            [               
                'country_name'   => 'Hong Kong',
                'country_code'   => '+852',            
            ],
            [               
                'country_name'   => 'Singapore',
                'country_code'   => '+65',            
            ],         

        ];
      
         Country::insert($countries);
    }
}
