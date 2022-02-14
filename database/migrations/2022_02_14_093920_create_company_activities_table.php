<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('company_activities', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->boolean('position')->default(false);
            $table->boolean('impression')->default(false);
            $table->boolean('click')->default(false);
            $table->boolean('profile')->default(false);
            $table->boolean('shortlist')->default(false);
            $table->boolean('connection')->default(false);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('company_activities');
    }
}
