<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleManagementLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('people_management_levels', function (Blueprint $table) {
            $table->id();
            $table->string('level');
            $table->integer('priority');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('people_management_levels');
    }
}
