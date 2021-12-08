<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();           
            $table->integer('community_id')->nullable();
            $table->integer('like_qty')->nullable();           
            $table->string('user_type')->nullable();
            $table->text('remark')->nullable();
            $table->date('like_date')->nullable();    
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
        Schema::dropIfExists('community_likes');
    }
}
