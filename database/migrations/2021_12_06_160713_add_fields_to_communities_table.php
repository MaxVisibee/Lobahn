<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('communities', function (Blueprint $table) {
            $table->integer('user_id')->after('created_by')->nullable();
            $table->string('user_types')->after('user_id')->nullable();
            $table->integer('like')->after('user_types')->nullable();
            $table->datetime('started_date')->after('like')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('communities', function (Blueprint $table) {
            //
        });
    }
}
