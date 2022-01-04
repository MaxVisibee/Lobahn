<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAmountToTargetPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('target_pays', function (Blueprint $table) {
            $table->integer('user_id')->nullable();
            $table->integer('opportunity_id')->nullable();
            $table->string('fulltime_amount')->nullable();
            $table->string('parttime_amount')->nullable();
            $table->string('freelance_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('target_pays', function (Blueprint $table) {
            //
        });
    }
}