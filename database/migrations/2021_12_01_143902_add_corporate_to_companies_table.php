<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCorporateToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('confirm_password')->after('password')->nullable();            
            $table->integer('position_title_id')->after('city_id')->nullable();
            $table->integer('sub_sector_id')->after('position_title_id')->nullable();
            $table->integer('target_id')->after('sub_sector_id')->nullable();
            $table->integer('skill_id')->after('target_id')->nullable();
            $table->integer('carrier_level_id')->after('skill_id')->nullable();
            $table->integer('experience_id')->after('carrier_level_id')->nullable();
            $table->integer('degree_level_id')->after('experience_id')->nullable();
            $table->integer('language_id')->after('degree_level_id')->nullable();
            $table->integer('study_field_id')->after('language_id')->nullable();            
            $table->integer('working_hour_id')->after('study_field_id')->nullable();
            $table->string('preferred_school')->after('working_hour_id')->nullable();
            $table->string('adjacent_position')->after('preferred_school')->nullable();
            $table->string('speciality')->after('adjacent_position')->nullable();
            $table->string('keyword')->after('speciality')->nullable();
            $table->text('geographical_experience')->after('keyword')->nullable();            
            $table->text('people_management')->after('geographical_experience')->nullable();
            $table->text('tech_knowledge')->after('people_management')->nullable();
            $table->text('qualification')->after('tech_knowledge')->nullable();            
            $table->text('key_strength')->after('qualification')->nullable();            
            $table->text('contract_term')->after('key_strength')->nullable();
            $table->string('min_salary')->after('contract_term')->nullable();
            $table->string('max_salary')->after('min_salary')->nullable();
            $table->string('reference')->after('max_salary')->nullable();
            $table->text('function')->after('reference')->nullable();
            $table->date('listing_date')->after('function')->nullable();
            $table->date('expire_date')->after('listing_date')->nullable();
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
