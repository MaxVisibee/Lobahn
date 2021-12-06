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
            $table->string('email')->unique();
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->integer('industry_id')->nullable()->default(0);
            $table->integer('ownership_type_id')->nullable()->default(0);
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->integer('no_of_offices')->nullable();
            $table->string('no_of_employees')->nullable();
            $table->string('website')->nullable();
            $table->string('established_in')->nullable();
            $table->string('phone')->nullable();
            $table->string('logo')->nullable();
            $table->integer('country_id')->nullable()->default(0);
            $table->integer('state_id')->nullable()->default(0);
            $table->integer('city_id')->nullable()->default(0);
            $table->string('slug')->nullable();
            $table->boolean('is_active')->default(1)->nullable();
            $table->boolean('is_featured')->default(0)->nullable();
            $table->boolean('verified')->default(0)->nullable();
            $table->string('verification_token')->nullable();
            $table->text('map')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('pinterest')->nullable();
            $table->integer('package_id')->nullable()->default(0);
            $table->timestamp('package_start_date')->nullable();
            $table->timestamp('package_end_date')->nullable();
            $table->smallInteger('jobs_quota')->nullable()->default(0);
            $table->smallInteger('availed_jobs_quota')->nullable()->default(0);
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
        Schema::dropIfExists('companies');
    }
}
