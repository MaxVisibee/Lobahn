<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_title')->nullable();
            $table->text('description')->nullable();
            $table->date('event_date')->nullable();
            $table->time('event_time')->nullable();
            $table->string('created_by')->nullable();
            $table->year('event_year')->nullable();
            $table->text('event_image')->nullable();
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
        Schema::dropIfExists('news_events');
    }
}
