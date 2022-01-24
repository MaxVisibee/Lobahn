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
        $array1 = ['1','2','3','4','5'];
        $array2 = [];
        return [
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
            'country_id' => json_encode(['1','2']),
            'address' => $this->faker->address(),
            'contract_term_id' => json_encode($array2),
            'contract_hour_id' => json_encode($array2),
            'keyword_id' => json_encode($array1),
            'remember_token' => Str::random(10),
            'management_level_id' => CarrierLevel::pluck('id')->random(),
            'experience_id' => JobExperience::pluck('id')->random(),
            'education_level_id' => DegreeLevel::pluck('id')->random(),
            'institution_id' => json_encode($array1),
            'language_id' =>  Language::pluck('id')->random(),
            'language_level' =>  $this->faker->randomElement(['Basic', 'Intermediate','Advance']),
            'geographical_id' => json_encode($array1),
            'people_management_id' => rand(1,4),
            'skill_id' => json_encode($array1),
            'field_study_id' => json_encode(['1','2']),
            'qualification_id' => json_encode($array1),
            'key_strength_id' => json_encode($array1),
            'position_title_id' => json_encode($array1),
            'industry_id' => json_encode($array1),
            'sub_sector_id' => json_encode($array1),
            'functional_area_id' => json_encode($array1),
            'target_employer_id' => Company::pluck('id')->random(),
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
