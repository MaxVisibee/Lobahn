<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->nullable();          
            $table->string('user_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('password')->nullable();
            $table->text('company_logo')->nullable();
            $table->text('profile_photo')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('user_id')->nullable();
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
            $table->integer('function_id')->nullable();
            $table->integer('specialist_id')->nullable();
            $table->string('website_address')->nullable();
            $table->string('target_employer')->nullable();
            $table->text('company_description')->nullable();
            $table->string('address')->nullable();
            $table->integer('package_id')->nullable();
            $table->date('package_start_date')->nullable();
            $table->date('package_end_date')->nullable();
            $table->integer('payment_id')->nullable();
            $table->string('no_of_offices')->nullable();
            $table->string('no_of_employees')->nullable();
            $table->string('established_in')->nullable();
            $table->string('slug')->nullable();
            $table->string('verified')->nullable();
            $table->string('verification_token')->nullable();
            $table->boolean('is_active')->default(1)->nullable();
            $table->boolean('is_featured')->default(0)->nullable();
            $table->boolean('is_subscribed')->default(1)->nullable();
            $table->string('remember_token')->nullable();
            $table->date('password_updated_date')->nullable();
            $table->date('listing_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->string('from_salary')->nullable();
            $table->string('to_salary')->nullable();
            $table->string('target_pay')->nullable();            
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
        Schema::dropIfExists('companies');
    }
}
