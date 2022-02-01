<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(CarrierLevelTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(DegreeLevelTableSeeder::class);
        $this->call(FunctionalAreaTableSeeder::class);
        $this->call(GeographicalTableSeeder::class);
        $this->call(IndustryTableSeeder::class);
        $this->call(InstitutionTableSeeder::class);
        $this->call(JobTitleTableSeeder::class);
        $this->call(JobTypeTableSeeder::class);
        $this->call(JobShiftTableSeeder::class);
        $this->call(KeystrengthTableSeeder::class);
        $this->call(KeywordTableSeeder::class);
        $this->call(NewsCategoryTableSeeder::class);
        $this->call(PackageTableSeeder::class);
        $this->call(QulificationTableSeeder::class);
        $this->call(SkillTableSeeder::class);
        $this->call(SpecialityTableSeeder::class);
        $this->call(SubSectorTableSeeder::class);
        $this->call(SuitabilityRatioSeeder::class);
        $this->call(JobTitleCategorySeeder::class);
        // $this->call(AreaTableSeeder::class);
        // $this->call(DistrictTableSeeder::class);
        // $this->call(PermissionTableSeeder::class);
    }
}