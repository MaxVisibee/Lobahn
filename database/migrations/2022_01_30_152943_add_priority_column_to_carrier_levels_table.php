<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriorityColumnToCarrierLevelsTable extends Migration
{
    public function up()
    {
        Schema::table('carrier_levels', function (Blueprint $table) {
            $table->integer('priority')->after('carrier_level')->nullable();
        });
    }

    public function down()
    {
        Schema::table('carrier_levels', function (Blueprint $table) {
            //
        });
    }
}
