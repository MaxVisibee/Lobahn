<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurrentEmployerColumnToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer("current_employer_id")->nullable()->after('mobile_phone');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
