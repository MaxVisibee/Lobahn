<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerPartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_partner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description_one')->nullable();
            $table->text('image_one')->nullable();
            $table->text('description_two')->nullable();
            $table->text('image_two')->nullable();
            $table->text('description_three')->nullable();
            $table->text('image_three')->nullable();
            $table->text('description_four')->nullable();
            $table->text('image_four')->nullable();
            $table->text('description_five')->nullable();
            $table->text('image_five')->nullable();
            $table->text('description_six')->nullable();
            $table->text('image_six')->nullable();
            $table->text('description')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('career_partner');
    }
}