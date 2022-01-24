<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClickColumnsToOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->integer('received')->default(0)->after('slug');
            $table->integer('connected')->default(0)->after('received');
            $table->integer('shortlist')->default(0)->after('connected');
            $table->integer('impression')->default(0)->after('shortlist');
            $table->integer('click')->default(0)->after('impression');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            //
        });
    }
}
