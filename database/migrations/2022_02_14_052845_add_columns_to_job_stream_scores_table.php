<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToJobStreamScoresTable extends Migration
{
    public function up()
    {
        Schema::table('job_stream_scores', function (Blueprint $table) {
            $table->string('listing_date')->nullable()->after('matched_factors');
            $table->boolean('is_active')->default(true)->after('listing_date');
        });
    }
    public function down()
    {
        Schema::table('job_stream_scores', function (Blueprint $table) {
            //
        });
    }
}
