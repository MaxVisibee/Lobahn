<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsRefundColumnInPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->boolean('is_refund')->default(false)->after('is_charged');
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
}
