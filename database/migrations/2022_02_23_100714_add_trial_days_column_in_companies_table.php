<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrialDaysColumnInCompaniesTable extends Migration
{
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->integer('trial_days')->nullable()->after('is_trial');
        });
    }

    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
