<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailColumnToPackagesTable extends Migration
{
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->string('detail')->nullable()->after('promotion_percent');
        });
    }

    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            //
        });
    }
}
