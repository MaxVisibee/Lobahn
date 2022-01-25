<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CarrierLevel;
use App\Models\JobExperience;
use App\Models\DegreeLevel;
use App\Models\Company;
use App\Models\Package;
use App\Models\PaymentMethod;
use App\Models\Language;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $array = ['1'];
        return [

            'country_id' => json_encode(['1']),
            'contract_term_id' => json_encode($array),
            'target_salary' => 2000,
            'contract_hour_id' => json_encode($array),
            'keyword_id' => json_encode($array),
            'management_level_id' => json_encode($array),
            'experience_id' => json_encode($array),
            'education_level_id' => json_encode($array),
            'institution_id' => json_encode($array),
            'language_id' =>  json_encode(['2']),
            'geographical_id' => json_encode($array),
            'people_management_id' => 1,
            'skill_id' => json_encode($array),
            'field_study_id' => json_encode($array),
            'qualification_id' => json_encode($array),
            'key_strength_id' => json_encode($array),
            'position_title_id' => json_encode($array),
            'industry_id' => json_encode($array),
            'sub_sector_id' => json_encode($array),
            'functional_area_id' => json_encode($array),
            'target_employer_id' => json_encode($array),

            'user_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->name(),
            'email_verified_at' => now(),
            'phone' => $this->faker->phoneNumber(),
            'mobile_phone'=>$this->faker->phoneNumber(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'father_name' => $this->faker->name(),
            'dob' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate = '-20 years', $timezone = null),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'marital_status' => $this->faker->randomElement(['Single', 'Married','Divorced']),
            'nationality_id'=>rand(1000000000,9999999999),
            'nationality' => $this->faker->country(),
            'nric' => rand(1000000000,9999999999),
            'address' => $this->faker->address(),
            'remember_token' => Str::random(10),
            'language_level' =>  $this->faker->randomElement(['Basic', 'Intermediate','Advance']),
            'package_id' => Package::pluck('id')->random(),
            'payment_id' => PaymentMethod::pluck('id')->random(),
            'package_start_date' => $this->faker->date(),
            'package_end_date' => $this->faker->date(),
            'range_from' => rand(2000,3000),
            'range_to' => rand(4000,6000),
            'is_active' => true,
            'is_featured' => $this->faker->randomElement([true, false]),
            'num_impressions' => rand(100,2000),
            'num_clicks' => rand(100,2000),
            'num_opportunities_presented' => rand(100,2000),
            'num_sent_profiles' => rand(100,500),
            'num_profile_views' => rand(100,800),
            'num_shortlists' => rand(10,80),
            'num_connections' => rand(100,200),
            'remark' => $this->faker->text(),
            'highlight_1' => $this->faker->text(),
            'highlight_2' => $this->faker->text(),
            'highlight_3' => $this->faker->text(),
            'is_subscribed' => $this->faker->randomElement(['1', '0']),
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
