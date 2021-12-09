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
            $table->id();
            $table->string('name');
            $table->string('user_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('father_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->integer('nationality_id')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nric')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->integer('job_experience_id')->nullable();
            $table->integer('career_level_id')->nullable();
            $table->integer('industry_id')->nullable();
            $table->integer('functional_area_id')->nullable();
            $table->string('current_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('salary_currency')->nullable();
            $table->text('street_address')->nullable();
            $table->boolean('is_active')->nullable()->default(0);
            $table->boolean('verified')->nullable()->default(0);
            $table->string('verification_token')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('image')->nullable();
            $table->string('lang')->nullable();
            $table->boolean('is_immediate_available')->nullable()->default(1);
            $table->integer('num_profile_views')->nullable();
            $table->integer('package_id')->nullable();
            $table->timestamp('package_start_date')->nullable();
            $table->timestamp('package_end_date')->nullable();
            $table->integer('jobs_quota')->nullable()->default(0);
            $table->integer('availed_jobs_quota')->nullable()->default(0);
            $table->text('search')->nullable();
            $table->boolean('is_subscribed')->nullable()->default(1);
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
