<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('password')->nullable();
            $table->string('father_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->integer('nationality_id')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nric')->nullable();          
            $table->integer('country_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('address')->nullable();
            $table->integer('contract_term_id')->nullable();
            $table->integer('contract_hour_id')->nullable();
            $table->integer('keyword_id')->nullable();
            $table->integer('management_level_id')->nullable();
            $table->integer('experience_id')->nullable();
            $table->integer('education_level_id')->nullable();
            $table->integer('institution_id')->nullable();
            $table->integer('language_id')->nullable();
            $table->integer('geographical_id')->nullable();
            $table->integer('people_management_id')->nullable();
            $table->integer('skill_id')->nullable();
            $table->integer('field_study_id')->nullable();
            $table->integer('qualification_id')->nullable();
            $table->integer('key_strength_id')->nullable();
            $table->integer('position_title_id')->nullable();
            $table->integer('industry_id')->nullable();
            $table->integer('sub_sector_id')->nullable();
            $table->integer('functional_area_id')->nullable();
            $table->integer('specialist_id')->nullable();
            $table->integer('target_employer_id')->nullable();
            $table->integer('package_id')->nullable();
            $table->date('package_start_date')->nullable();
            $table->date('package_end_date')->nullable();
            $table->smallInteger('jobs_quota')->nullable()->default(0);
            $table->smallInteger('availed_jobs_quota')->nullable()->default(0);
            $table->integer('payment_id')->nullable();
            $table->string('preferred_employment_terms')->nullable();
            $table->string('target_pay_id')->nullable();
            $table->string('current_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('verified')->nullable();
            $table->string('verification_token')->nullable();
            $table->boolean('is_active')->default(1)->nullable();
            $table->boolean('is_immediate_available')->default(1)->nullable();
            $table->boolean('is_subscribed')->default(1)->nullable();
            $table->integer('num_impressions')->nullable()->default(0);
            $table->integer('num_clicks')->nullable()->default(0);
            $table->integer('num_opportunities_presented')->nullable()->default(0);
            $table->integer('num_sent_profiles')->nullable()->default(0);
            $table->integer('num_profile_views')->nullable()->default(0);
            $table->integer('num_shortlists')->nullable()->default(0);
            $table->integer('num_connections')->nullable()->default(0);
            $table->date('password_updated_date')->nullable();
            $table->string('search')->nullable();
            $table->text('cv')->nullable();
            $table->text('image')->nullable();
            $table->text('remark')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
