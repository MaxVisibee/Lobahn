<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateColumnsToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string("package_start_date")->nullable()->after('package_id');
            $table->string("package_end_date")->nullable()->after('package_start_date');
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
}
