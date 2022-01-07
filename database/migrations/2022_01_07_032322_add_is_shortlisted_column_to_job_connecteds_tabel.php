<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsShortlistedColumnToJobConnectedsTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_connecteds', function (Blueprint $table) {
            $table->boolean('is_shortlisted')->after('is_connected')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_connecteds', function (Blueprint $table) {
            //
        });
    }
}
