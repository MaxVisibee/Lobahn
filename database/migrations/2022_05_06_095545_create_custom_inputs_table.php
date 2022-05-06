<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomInputsTable extends Migration
{
    public function up()
    {
        Schema::create('custom_inputs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('field');
            $table->integer('user_id');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('custom_inputs');
    }
}
