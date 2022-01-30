<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriorityColumnToJobExperiencesTable extends Migration
{
    public function up()
    {
        Schema::table('job_experiences', function (Blueprint $table) {
            $table->integer('priority')->after('job_experience')->nullable();
        });
    }

    public function down()
    {
        Schema::table('job_experiences', function (Blueprint $table) {
            //
        });
    }
}
