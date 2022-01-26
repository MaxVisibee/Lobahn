<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPackagesTable extends Migration
{
   
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->integer('taking_percent')->nullable()->after('package_for');
            $table->boolean('is_recommanded')->default(false)->after('taking_percent');
        });
    }

    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            //
        });
    }
}
