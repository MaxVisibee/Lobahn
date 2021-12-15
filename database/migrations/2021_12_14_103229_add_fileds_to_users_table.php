<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiledsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->after('email')->nullable();
            $table->dateTime('email_verified_at')->after('name')->nullable();
            $table->string('phone')->after('email_verified_at')->nullable();
            $table->string('mobile_phone')->after('phone')->nullable();
            $table->string('password')->after('mobile_phone')->nullable();
            $table->string('fater_name')->after('password')->nullable();
            $table->date('dob')->after('fater_name')->nullable();
            $table->string('gender')->after('dob')->nullable();
            $table->string('marital_status')->after('gender')->nullable();
            $table->integer('nationality_id')->after('marital_status')->nullable();
            $table->string('nationality')->after('nationality_id')->nullable();
            $table->string('nric')->after('nationality')->nullable();          
            $table->integer('country_id')->after('nric')->nullable();
            $table->integer('area_id')->after('country_id')->nullable();
            $table->integer('district_id')->after('area_id')->nullable();
            $table->integer('address')->after('district_id')->nullable();
            $table->integer('contract_term_id')->after('address')->nullable();
            $table->integer('contract_hour_id')->after('contract_term_id')->nullable();
            $table->integer('keyword_id')->after('contract_hour_id')->nullable();
            $table->integer('management_level_id')->after('keyword_id')->nullable();
            $table->integer('experience_id')->after('management_level_id')->nullable();
            $table->integer('education_level_id')->after('experience_id')->nullable();
            $table->integer('institution_id')->after('education_level_id')->nullable();
            $table->integer('language_id')->after('institution_id')->nullable();
            $table->integer('geographical_id')->after('language_id')->nullable();
            $table->integer('people_management_id')->after('geographical_id')->nullable();
            $table->integer('skill_id')->after('people_management_id')->nullable();
            $table->integer('field_study_id')->after('skill_id')->nullable();
            $table->integer('qualification_id')->after('field_study_id')->nullable();
            $table->integer('key_strnegth_id')->after('qualification_id')->nullable();
            $table->integer('position_title_id')->after('key_strnegth_id')->nullable();
            $table->integer('industry_id')->after('position_title_id')->nullable();
            $table->integer('sub_sector_id')->after('industry_id')->nullable();
            $table->integer('function_id')->after('sub_sector_id')->nullable();
            $table->integer('specialist_id')->after('function_id')->nullable();
            $table->integer('company_id')->after('specialist_id')->nullable();
            $table->integer('package_id')->after('company_id')->nullable();
            $table->date('package_start_date')->after('package_id')->nullable();
            $table->date('package_end_date')->after('package_start_date')->nullable();
            $table->integer('payment_id')->after('package_id')->nullable();
            $table->string('preferred_employment_terms')->after('payment_id')->nullable();
            $table->string('target_pay')->after('preferred_employment_terms')->nullable();
            $table->string('current_salary')->after('target_pay')->nullable();
            $table->string('expected_salary')->after('current_salary')->nullable();
            $table->string('verified')->after('expected_salary')->nullable();
            $table->string('verification_token')->after('verified')->nullable();
            $table->boolean('is_active')->default(1)->after('verification_token')->nullable();
            $table->boolean('is_immediate_available')->default(1)->after('is_active')->nullable();
            $table->boolean('is_subscribed')->default(1)->after('is_immediate_available')->nullable();
            $table->string('remember_token')->after('is_subscribed')->nullable();
            $table->date('password_updated_date')->after('remember_token')->nullable();
            $table->string('search')->after('password_updated_date')->nullable();
            $table->text('cv')->after('search')->nullable();
            $table->text('image')->after('cv')->nullable();
            $table->text('remark')->after('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
