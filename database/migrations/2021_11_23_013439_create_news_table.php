<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('news_image')->nullable();
            $table->boolean('is_default')->default(0)->nullable(); 
            $table->boolean('is_active')->default(1)->nullable();
            $table->string('created_by')->nullable();      
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
        Schema::dropIfExists('news');
    }
}
