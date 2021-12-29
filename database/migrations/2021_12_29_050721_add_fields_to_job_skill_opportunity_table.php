<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToJobSkillOpportunityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_skill_opportunity', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('job_skill_id');
            $table->string('type')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_skill_opportunity', function (Blueprint $table) {
            //
        });
    }
}
