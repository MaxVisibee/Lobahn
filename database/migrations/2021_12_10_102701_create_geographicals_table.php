<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeographicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geographicals', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('geographical_name')->nullable();
            $table->boolean('is_default')->default(0)->nullable(); 
            $table->boolean('is_active')->default(1)->nullable();        
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geographicals');
    }
}
