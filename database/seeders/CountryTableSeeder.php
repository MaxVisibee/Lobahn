<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountryTableSeeder extends Seeder
{
    public function run(){
        $countries= [
            [               
                'country_name'   => 'Hong Kong',
                'nationality'    => 'HK',
                'country_code'   => '+852', 
                'created_at'     => now(),
                'updated_at'     => now()           
            ],
            [               
                'country_name'   => 'Singapore',
                'nationality'    => 'Chinese',
                'country_code'   => '+65',
                'created_at'     => now(),
                'updated_at'     => now()              
            ],  
            [
                'country_name'   => 'Macau',
                'nationality'    => 'Chinese',
                'country_code'   => '+853', 
                'created_at'     => now(),
                'updated_at'     => now()  
            ]    
        ];
        Country::insert($countries);
    }
}
