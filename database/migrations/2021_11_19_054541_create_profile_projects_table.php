<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_projects', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('name')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->date('date_start')->nullable();
            $table->date('end_start')->nullable();
            $table->boolean('is_on_going')->default(1)->nullable();                
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
        Schema::dropIfExists('profile_projects');
    }
}
