<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApprovedColumnInCommunitiesTable extends Migration
{
    public function up()
    {
        Schema::table('communities', function (Blueprint $table) {
            $table->boolean('approved')->default(false)->after('company_id');
        });
    }

    public function down()
    {
        Schema::table('communities', function (Blueprint $table) {
            //
        });
    }
}
