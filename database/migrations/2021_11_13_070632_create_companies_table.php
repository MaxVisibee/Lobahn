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
            $table->id();
            $table->string('name');
            $table->string('company_name')->nullable();
            $table->string('position_title')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->integer('industry_id')->nullable()->default(0);
            $table->integer('sub_sector_id')->nullable();
            $table->text('description')->nullable();
            $table->integer('no_of_offices')->nullable();
            $table->string('no_of_employees')->nullable();
            $table->string('website_address')->nullable();
            $table->string('established_in')->nullable();
            $table->string('phone')->nullable();
            $table->text('company_logo')->nullable();
            $table->string('address')->nullable();
            $table->integer('country_id')->nullable()->default(0);
            $table->integer('area_id')->nullable()->default(0);
            $table->integer('district_id')->nullable()->default(0);
            $table->string('slug')->nullable();
            $table->boolean('is_active')->default(1)->nullable();
            $table->boolean('is_featured')->default(0)->nullable();
            $table->boolean('verified')->default(0)->nullable();
            $table->string('verification_token')->nullable();
            $table->text('map')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->integer('preferred_school_id')->nullable();
            $table->integer('target_employer_id')->nullable();
            $table->integer('package_id')->nullable()->default(0);
            $table->timestamp('package_start_date')->nullable();
            $table->timestamp('package_end_date')->nullable();
            $table->smallInteger('jobs_quota')->nullable()->default(0);
            $table->smallInteger('availed_jobs_quota')->nullable()->default(0);
            $table->boolean('is_subscribed')->nullable()->default(1);
            $table->date('password_updated_date')->nullable();
            $table->integer('keyword_id')->nullable();
            $table->integer('key_strength_id')->nullable();
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
