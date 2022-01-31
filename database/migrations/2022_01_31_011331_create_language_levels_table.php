<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('language_levels', function (Blueprint $table) {
            $table->id();
            $table->string('level');
            $table->integer('priority');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('language_levels');
    }
}
