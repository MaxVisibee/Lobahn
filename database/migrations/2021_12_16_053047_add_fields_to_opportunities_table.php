<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->integer('contract_hour_id')->after('functional_area_id')->nullable();
            $table->integer('institution_id')->after('contract_hour_id')->nullable();
            $table->integer('language_id')->after('institution_id')->nullable();
            $table->integer('geographical_id')->after('language_id')->nullable();
            $table->integer('management_id')->after('geographical_id')->nullable();
            $table->integer('field_study_id')->after('management_id')->nullable();
            $table->integer('qualification_id')->after('field_study_id')->nullable();
            $table->integer('key_strnegth_id')->after('qualification_id')->nullable();
            $table->integer('industry_id')->after('key_strnegth_id')->nullable();
            $table->integer('sub_sector_id')->after('industry_id')->nullable();
            $table->integer('keyword_id')->after('sub_sector_id')->nullable();
            $table->integer('specialist_id')->after('keyword_id')->nullable();
            $table->integer('package_id')->after('specialist_id')->nullable();
            $table->integer('payment_id')->after('package_id')->nullable();
            $table->string('address')->after('payment_id')->nullable();
            $table->string('website_address')->after('address')->nullable();
            $table->string('target_employer_id')->after('website_address')->nullable();
            $table->date('package_start_date')->after('target_employer_id')->nullable(); 
            $table->date('package_end_date')->after('package_start_date')->nullable();
            $table->date('listing_date')->after('package_end_date')->nullable();
            $table->boolean('is_subscribed')->after('listing_date')->default(1)->nullable();
            $table->boolean('is_featured')->after('is_subscribed')->default(0)->nullable();
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
