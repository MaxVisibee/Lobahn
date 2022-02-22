<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsTrialColumnInCompaniesTable extends Migration
{
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->boolean('is_trial')->default(false)->after('slug');
        });
    }

    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
