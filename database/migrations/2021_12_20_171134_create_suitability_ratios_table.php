<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuitabilityRatiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suitability_ratios', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('talent_num')->nullable();
            $table->decimal('talent_percent', 12,2)->nullable();
            $table->integer('position_num')->nullable();
            $table->decimal('position_percent', 12,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suitability_ratios');
    }
}
