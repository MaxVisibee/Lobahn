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
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            return [
            'title' => $this->faker->sentence(),
            'ref_no' => $this->faker->numberBetween($min = 0, $max = 100000),
            'company_id' => Company::pluck('id')->random(),
            'country_id' => Country::pluck('id')->random(),
            'area_id' => Area::pluck('id')->random(),
            'district_id' => District::pluck('id')->random(),
            'job_title_id' => JobTitle::pluck('id')->random(),
            'job_type_id' => JobType::pluck('id')->random(),
            'job_skill_id' => JobSkill::pluck('id')->random(),
            'job_experience_id' => JobExperience::pluck('id')->random(),
            'degree_level_id' => DegreeLevel::pluck('id')->random(),
            'carrier_level_id' => CarrierLevel::pluck('id')->random(),
            'functional_area_id' => FunctionalArea::pluck('id')->random(),
            'is_freelance' => $this->faker->randomElement(['1', '0']),
            'salary_from' => $this->faker->text(),
            'salary_to' => $this->faker->text(),
            'salary_currency' => $this->faker->numberBetween($min = 0, $max = 10000),
            'hide_salary' => $this->faker->randomElement(['1', '0']),
            'gender' => $this->faker->randomElement(['Female', 'Male']),
            'no_of_position' => $this->faker->text(), 
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
            'contract_hour_id' => JobShift::pluck('id')->random(),
            'keyword_id' => Keyword::pluck('id')->random(),
            'institution_id' => Institution::pluck('id')->random(),
            'language_id' => Language::pluck('id')->random(),
            'geographical_id' => Geographical::pluck('id')->random(),
            'management_id' => '',
            'field_study_id' => StudyField::pluck('id')->random(),
            'qualification_id' => Qualification::pluck('id')->random(),
            'key_strength_id' => KeyStrength::pluck('id')->random(),
            'industry_id' => Industry::pluck('id')->random(),
            'sub_sector_id' => SubSector::pluck('id')->random(),
            'specialist_id' => Speciality::pluck('id')->random(),
            'website_address' => $this->faker->address(),
            'target_employer_id' => Company::pluck('id')->random(),
            'target_pay_id' => TargetPay::pluck('id')->random(),
            'package_id' => Package::pluck('id')->random(),
            'payment_id' => PaymentMethod::pluck('id')->random(),
            'package_start_date' => $this->faker->date(),
            'package_end_date' => $this->faker->date(),
            'is_featured' => $this->faker->randomElement(['1', '0']),
            'is_subscribed' => $this->faker->randomElement(['1', '0']),
            'listing_date' => $this->faker->date(), 
        ];
    }
}