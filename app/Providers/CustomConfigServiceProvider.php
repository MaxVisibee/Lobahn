<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SiteSetting;

class CustomConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($settings = SiteSetting::findOrFail(1)) {
            
            // $this->app['config']['mail'] = [
            //     'driver' => $settings->mail_driver,
            //     'host' => $settings->mail_host,
            //     'port' => $settings->mail_port,
            //     'from' => [
            //         'address' => $settings->mail_from_address,
            //         'name' => $settings->mail_from_name
            //     ],
            //     'recieve_to' => [
            //         'address' => $settings->mail_to_address,
            //         'name' => $settings->mail_to_name
            //     ],
            //     'encryption' => $settings->mail_encryption,
            //     'username' => $settings->mail_username,
            //     'password' => $settings->mail_password,
            //     'sendmail' => $settings->mail_sendmail,
            //     'pretend' => $settings->mail_pretend
            // ];

            $this->app['config']['captcha'] = [
                'sitekey' => $settings->nocaptcha_sitekey,
                'secret' => $settings->nocaptcha_secret,
                'options' => ['timeout' => 2.0,],
            ];
            
            $this->app['config']['paypal'] = [
                'client_id' => env('PAYPAL_CLIENT_ID', $settings->paypal_client_id),
                'secret' => env('PAYPAL_SECRET', $settings->paypal_secret),
                'settings' => array(
                    'mode' => env('PAYPAL_MODE', $settings->paypal_live_sandbox),
                    'http.ConnectionTimeOut' => 1000,
                    'log.LogEnabled' => true,
                    'log.FileName' => storage_path() . '/logs/paypal.log',
                    'log.LogLevel' => 'ERROR'
                ),
            ];

            $this->app['config']['stripe'] = [
                'stripe_key' => env('stripe_key', $settings->stripe_key),
                'stripe_secret' => env('stripe_secret', $settings->stripe_secret),
            ];

        }
        
    }
}
