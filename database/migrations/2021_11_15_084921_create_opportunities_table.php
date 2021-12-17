<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('job_title_id')->nullable();
            $table->integer('job_type_id')->nullable();
            $table->string('job_skill_id')->nullable();
            $table->integer('job_experience_id')->nullable();
            $table->integer('degree_level_id')->nullable();
            $table->integer('carrier_level_id')->nullable();
            $table->integer('functional_area_id')->nullable();
            $table->boolean('is_freelance')->default(0)->nullable();
            $table->string('salary_from')->nullable();
            $table->string('salary_to')->nullable();
            $table->string('salary_currency')->nullable();
            $table->boolean('hide_salary')->default(0)->nullable();
            $table->string('gender')->nullable();
            $table->string('no_of_position')->nullable();
            $table->text('requirement')->nullable();
            $table->text('description')->nullable();
            $table->text('about_company')->nullable();
            $table->text('benefits')->nullable();
            $table->date('expire_date')->nullable();
            $table->boolean('is_active')->default(1)->nullable();
            $table->boolean('is_default')->default(0)->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opportunities');
    }
}
