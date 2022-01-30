<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriorityColumnToDegreeLevelsTable extends Migration
{
    public function up()
    {
        Schema::table('degree_levels', function (Blueprint $table) {
            $table->integer('priority')->after('degree_name')->nullable();
        });
    }
    public function down()
    {
        Schema::table('degree_levels', function (Blueprint $table) {
            //
        });
    }
}
