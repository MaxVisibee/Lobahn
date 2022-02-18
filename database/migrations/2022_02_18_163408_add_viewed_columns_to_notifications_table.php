<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddViewedColumnsToNotificationsTable extends Migration
{
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->boolean('corportate_viewed')->default(false)->after('viewed');
            $table->boolean('candidate_viewed')->default(false)->after('viewed');
        });
    }

    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            //
        });
    }
}
