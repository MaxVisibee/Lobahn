<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLikeColumnInNewsTable extends Migration
{

    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->integer('like')->default(0)->after('description');
        });
    }

    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            //
        });
    }
}
