<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPercentToJobStreamScores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_stream_scores', function (Blueprint $table) {
            $table->decimal('tsr_percent')->nullable()->after('tsr_score');
            $table->decimal('psr_percent')->nullable()->after('psr_score');
            $table->decimal('jsr_percent')->nullable()->after('jsr_score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_stream_scores', function (Blueprint $table) {
            //
        });
    }
}
