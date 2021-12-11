<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSetting::create([
        	'site_name' => 'Lobahn',
            // 'site_phone_primary' => '',
            // 'site_phone_secondary' => '',
            // 'site_address' => '',
            // 'site_google_map' => '',
            // 'mail_from_address' => '',
            // 'mail_from_name' => '',
            // 'mail_to_address' => '',
            // 'mail_to_name' => '',
            // 'facebook_address' => '',
            // 'instagram_address' => '',
            // 'linkedin_address' => '',
            // 'twitter_address' => '',
            // 'nocaptcha_sitekey' => '',
            // 'nocaptcha_secret' => '',
            // 'paypal_account' => '',
            // 'paypal_client_id' => '',
            // 'paypal_secret' => '',
            // 'paypal_live_sandbox' => '',
            // 'stripe_key' => '',
            // 'stripe_secret' => '',
        ]);
    }
}
