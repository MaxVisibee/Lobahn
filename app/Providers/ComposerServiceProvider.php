<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SiteSetting;
use DB;
use View;

class ComposerServiceProvider extends ServiceProvider
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
        $siteSetting = SiteSetting::findOrFail(1);
        /*         * *********************************** */
        View::share(
                [
                    'siteSetting' => $siteSetting,
                ]
        );
    }
}
