<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();           
            $table->integer('community_id')->nullable();            
            $table->string('user_type')->nullable();
            $table->text('comment')->nullable();
            $table->dateTime('comment_date')->nullable();    
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
        Schema::dropIfExists('community_comments');
    }
}
