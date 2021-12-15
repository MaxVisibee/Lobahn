<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiledsToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('email')->after('user_name')->nullable();
            $table->string('email_verified_at')->after('email')->nullable();
            $table->string('phone')->after('email_verified_at')->nullable();
            $table->string('company_phone')->after('phone')->nullable();
            $table->string('password')->after('company_phone')->nullable();
            $table->text('company_logo')->after('password')->nullable();
            $table->text('profile_photo')->after('company_logo')->nullable();
            $table->integer('country_id')->after('profile_photo')->nullable();
            $table->integer('area_id')->after('country_id')->nullable();
            $table->integer('district_id')->after('area_id')->nullable();
            $table->integer('user_id')->after('district_id')->nullable();
            $table->integer('contract_term_id')->after('user_id')->nullable();
            $table->integer('contract_hour_id')->after('contract_term_id')->nullable();
            $table->integer('keyword_id')->after('contract_hour_id')->nullable();
            $table->integer('management_level_id')->after('keyword_id')->nullable();
            $table->integer('experience_id')->after('management_level_id')->nullable();
            $table->integer('education_level_id')->after('experience_id')->nullable();
            $table->integer('institution_id')->after('education_level_id')->nullable();
            $table->integer('language_id')->after('institution_id')->nullable();
            $table->integer('geographical_id')->after('language_id')->nullable();
            $table->integer('people_management_id')->after('geographical_id')->nullable();
            $table->integer('skill_id')->after('management_id')->nullable();
            $table->integer('field_study_id')->after('skill_id')->nullable();
            $table->integer('qualification_id')->after('field_study_id')->nullable();
            $table->integer('key_strnegth_id')->after('qualification_id')->nullable();
            $table->integer('position_title_id')->after('key_strnegth_id')->nullable();
            $table->integer('industry_id')->after('position_title_id')->nullable();
            $table->integer('sub_sector_id')->after('industry_id')->nullable();
            $table->integer('function_id')->after('sub_sector_id')->nullable();
            $table->integer('specialist_id')->after('function_id')->nullable();
            $table->string('website_address')->after('specialist_id')->nullable();
            $table->string('target_employer')->after('website_address')->nullable();
            $table->text('company_description')->after('target_employer')->nullable();
            $table->string('address')->after('company_description')->nullable();
            $table->integer('package_id')->after('address')->nullable();
            $table->date('package_start_date')->after('package_id')->nullable();
            $table->date('package_end_date')->after('package_start_date')->nullable();
            $table->integer('payment_id')->after('package_id')->nullable();
            $table->string('no_of_offices')->after('payment_id')->nullable();
            $table->string('no_of_employees')->after('no_of_offices')->nullable();
            $table->string('established_in')->after('no_of_employees')->nullable();
            $table->string('slug')->after('established_in')->nullable();
            $table->string('verified')->after('slug')->nullable();
            $table->string('verification_token')->after('verified')->nullable();
            $table->boolean('is_active')->default(1)->after('verification_token')->nullable();
            $table->boolean('is_featured')->default(0)->after('is_active')->nullable();
            $table->boolean('is_subscribed')->default(1)->after('is_featured')->nullable();
            $table->string('remember_token')->after('is_subscribed')->nullable();
            $table->date('password_updated_date')->after('remember_token')->nullable();
            $table->date('listing_date')->after('password_updated_date')->nullable();
            $table->date('expire_date')->after('listing_date')->nullable();
            $table->string('from_salary')->after('expire_date')->nullable();
            $table->string('to_salary')->after('from_salary')->nullable();
            $table->string('target_pay')->after('to_salary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
