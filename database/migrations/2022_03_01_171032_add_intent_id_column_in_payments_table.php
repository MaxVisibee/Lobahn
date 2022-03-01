<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIntentIdColumnInPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('intent_id')->nullable()->after('payment_id');
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
}
