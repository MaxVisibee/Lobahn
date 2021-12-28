<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHighlightToOpportunities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->string('highlight_1')->nullable()->after('description');
            $table->string('highlight_2')->nullable()->after('highlight_1');
            $table->string('highlight_3')->nullable()->after('highlight_2');
            $table->text('supporting_document')->nullable()->after('highlight_3');
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
