<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('site_slogan')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_phone_primary')->nullable();
            $table->string('site_phone_secondary')->nullable();
            $table->string('site_address')->nullable();
            $table->text('site_google_map')->nullable();
            $table->string('mail_from_address')->nullable();
            $table->string('mail_from_name')->nullable();
            $table->string('mail_to_address')->nullable();
            $table->string('mail_to_name')->nullable();
            $table->string('facebook_address')->nullable();
            $table->string('instagram_address')->nullable();
            $table->string('linkedin_address')->nullable();
            $table->string('twitter_address')->nullable();
            $table->string('nocaptcha_sitekey')->nullable();
            $table->string('nocaptcha_secret')->nullable();
            $table->string('paypal_account')->nullable();
            $table->string('paypal_client_id')->nullable();
            $table->string('paypal_secret')->nullable();
            $table->string('paypal_live_sandbox')->nullable();
            $table->string('stripe_key')->nullable();
            $table->string('stripe_secret')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}
