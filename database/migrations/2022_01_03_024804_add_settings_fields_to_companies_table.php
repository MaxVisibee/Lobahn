<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSettingsFieldsToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->boolean('new_opportunities')->default(true)->after('availed_jobs_quota');
            $table->boolean('change_of_status')->default(false)->after('new_opportunities');
            $table->boolean('connection')->default(true)->after('change_of_status');
            $table->boolean('lobahan_connect')->default(true)->after('connection');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
