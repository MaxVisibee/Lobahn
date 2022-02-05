<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMatchedFactorsColumnToJobStreamScoresTable extends Migration
{
    public function up()
    {
        Schema::table('job_stream_scores', function (Blueprint $table) {
            $table->text('matched_factors')->nullable()->after('jsr_percent');
        });
    }

    public function down()
    {
        Schema::table('job_stream_scores', function (Blueprint $table) {
            //
        });
    }
}
