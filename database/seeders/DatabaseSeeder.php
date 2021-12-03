<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CreateAdminUserSeeder::class);
        $this->call(PermissionTableSeeder::class);
        
        $this->call(CountryTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(CarrierLevelTableSeeder::class);
        $this->call(DegreeLevelTableSeeder::class);        
        $this->call(CompanyTableSeeder::class);       

        // $this->call(JobTypeTableSeeder::class);
        // $this->call(JobTitleTableSeeder::class);
        // $this->call(JobShiftTableSeeder::class);
        // $this->call(JobSkillTableSeeder::class);
        // $this->call(JobExperienceTableSeeder::class);
        // $this->call(FunctionalAreaTableSeeder::class); 
    }
}
