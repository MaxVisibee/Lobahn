<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsLikesTable extends Migration
{
    public function up()
    {
        Schema::create('news_likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();           
            $table->integer('news_id')->nullable();          
            $table->string('user_type')->nullable();
            $table->date('like_date')->nullable();    
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news_likes');
    }
}
