<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applies', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('user_id')->nullable();  
            $table->integer('job_opportunity_id')->nullable();
            $table->integer('cv_id')->nullable();         
            $table->string('current_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('salary_currency')->nullable();        
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
        Schema::dropIfExists('job_applies');
    }
}
