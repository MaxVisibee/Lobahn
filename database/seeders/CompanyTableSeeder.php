<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $companies= [
            [               
                'name'       => 'VisibleOne',
                'email'      => 'developer.visibleone@.com',
                'user_name'  =>  'VisibleOne',
                'password'   => bcrypt('@dmin123'),       
            ],       

        ];
      
         Company::insert($companies);
    }
}
