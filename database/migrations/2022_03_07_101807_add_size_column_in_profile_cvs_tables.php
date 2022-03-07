<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSizeColumnInProfileCvsTables extends Migration
{
    public function up()
    {
        Schema::table('profile_cvs', function (Blueprint $table) {
            $table->float('size')->nullable()->after('cv_file');
        });
    }

    public function down()
    {
        Schema::table('profile_cvs', function (Blueprint $table) {
            //
        });
    }
}
