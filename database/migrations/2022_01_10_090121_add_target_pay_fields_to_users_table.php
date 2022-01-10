<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTargetPayFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('target_salary')->nullable()->after('target_pay_id');
            $table->string('full_time_salary')->nullable()->after('target_salary');
            $table->string('part_time_salary')->nullable()->after('full_time_salary');
            $table->string('freelance_salary')->nullable()->after('part_time_salary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
