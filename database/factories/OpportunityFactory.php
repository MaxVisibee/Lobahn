<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\CarrierLevel;
use App\Models\Company;
use App\Models\Country;
use App\Models\DegreeLevel;
use App\Models\District;
use App\Models\FunctionalArea;
use App\Models\Geographical;
use App\Models\Industry;
use App\Models\Institution;
use App\Models\JobExperience;
use App\Models\JobShift;
use App\Models\JobSkill;
use App\Models\JobTitle;
use App\Models\JobType;
use App\Models\KeyStrength;
use App\Models\Keyword;
use App\Models\Language;
use App\Models\Opportunity;
use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\Qualification;
use App\Models\Speciality;
use App\Models\StudyField;
use App\Models\SubSector;
use App\Models\TargetPay;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OpportunityFactory extends Factory
{
    protected $model = Opportunity::class;
    public function definition()
    {
        $array = ['1'];
        $array1 = [];
            return [
            
            'country_id' => json_encode($array),
            'job_type_id' => json_encode($array),
            'target_salary' => 5000,
            'contract_hour_id' => json_encode($array),
            'keyword_id' => json_encode($array),
            'carrier_level_id' => json_encode($array),
            'job_experience_id' => json_encode($array),
            'degree_level_id' => json_encode($array),
            'institution_id' => json_encode($array),
            'language_id' => json_encode(['2']),
            'geographical_id' => json_encode($array),
            'people_management' => 1,
            'job_skill_id' => json_encode($array),
            'field_study_id' =>  json_encode($array),
            'qualification_id' => json_encode($array),
            'key_strength_id' => json_encode($array),
            'job_title_id' => json_encode($array),
            'industry_id' => json_encode($array),
            'sub_sector_id' => json_encode($array),
            'functional_area_id' => json_encode($array),
            'target_employer_id' => json_encode($array),
            
            'is_featured' => $this->faker->randomElement([true,false]),
            'title' => $this->faker->sentence(),
            'ref_no' => $this->faker->numberBetween($min = 0, $max = 100000),
            'company_id' => Company::pluck('id')->random(),
            'area_id' => Area::pluck('id')->random(),
            'district_id' => District::pluck('id')->random(),
            'is_freelance' => $this->faker->randomElement(['1', '0']),
            'salary_from' => rand(2000,3000),
            'salary_to' => rand(4000,6000),
            'gender' => $this->faker->randomElement(['Female', 'Male']), 
            'requirement' => $this->faker->name(),
            'description' => $this->faker->text(),
            'highlight_1' => $this->faker->text(),
            'highlight_2' => $this->faker->text(),
            'highlight_3' => $this->faker->text(),
            'supporting_document' => '',
            'about_company' => $this->faker->text(),
            'benefits' => $this->faker->text(),
            'expire_date' => $this->faker->date(),
            'is_active' => $this->faker->randomElement(['1', '0']),
            'is_default' => $this->faker->randomElement(['1', '0']),
            'slug' => Str::slug($this->faker->name),
            'address' => $this->faker->address(),
            'management_id' => '',
            'specialist_id' => Speciality::pluck('id')->random(),
            'website_address' => $this->faker->address(),
            'target_pay_id' => TargetPay::pluck('id')->random(),
            'package_id' => Package::pluck('id')->random(),
            'payment_id' => PaymentMethod::pluck('id')->random(),
            'package_start_date' => $this->faker->date(),
            'package_end_date' => $this->faker->date(),
            'is_featured' => $this->faker->randomElement(['1', '0']),
            'is_subscribed' => $this->faker->randomElement(['1', '0']),
            'listing_date' => $this->faker->date(), 
            'target_salary' => rand(2000,4000)
        ];
    }
}