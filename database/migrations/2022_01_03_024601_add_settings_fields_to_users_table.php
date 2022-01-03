<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSettingsFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('new_opportunities')->default(true)->after('availed_jobs_quota');
            $table->boolean('change_of_status')->default(false)->after('new_opportunities');
            $table->boolean('connection')->default(true)->after('change_of_status');
            $table->boolean('lobahan_connect')->default(true)->after('connection');
            $table->boolean('auto_connect')->default(true)->after('lobahan_connect');
            $table->boolean('feature_member_display')->default(true)->after('auto_connect');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
