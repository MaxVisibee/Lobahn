<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndividualToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('confirm_password')->after('password')->nullable();
            $table->integer('position_title_id')->after('street_address')->nullable();
            $table->integer('sub_sector_id')->after('position_title_id')->nullable();
            $table->integer('function_id')->after('sub_sector_id')->nullable();
            $table->integer('company_id')->after('function_id')->nullable();
            $table->integer('payment_id')->after('company_id')->nullable();
            $table->integer('contract_hour_id')->after('payment_id')->nullable();
            $table->integer('experience_id')->after('contract_hour_id')->nullable();
            $table->integer('degree_level_id')->after('experience_id')->nullable();
            $table->integer('language_id')->after('degree_level_id')->nullable();
            $table->integer('carrier_level_id')->after('language_id')->nullable();
            $table->integer('study_field_id')->after('carrier_level_id')->nullable();
            $table->text('specialities')->after('study_field_id')->nullable();
            $table->text('contract_term')->after('specialities')->nullable();
            $table->text('academic_institution')->after('contract_term')->nullable();
            $table->text('geographical_experience')->after('academic_institution')->nullable();
            $table->text('people_management')->after('geographical_experience')->nullable();
            $table->text('tech_knowledge')->after('people_management')->nullable();
            $table->text('qualification')->after('tech_knowledge')->nullable();
            $table->text('key_strength')->after('qualification')->nullable();
            $table->text('cv')->after('key_strength')->nullable();
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
