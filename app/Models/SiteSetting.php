<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SiteSetting extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = [
        'site_name', 'site_slogan', 'site_logo', 'front_site_logo', 'site_phone_primary', 'site_phone_secondary', 'site_address', 'site_google_map',
        'mail_from_address', 'mail_from_name', 'mail_to_address', 'mail_to_name', 'facebook_address', 'instagram_address',
        'linkedin_address', 'twitter_address', 'nocaptcha_sitekey', 'nocaptcha_secret', 'paypal_account', 'paypal_client_id',
        'paypal_secret', 'paypal_live_sandbox', 'stripe_key', 'stripe_secret',
    ];

    protected $table = "site_settings";

    protected $fillable = [
        'site_name','site_slogan','site_logo','front_site_logo','site_phone_primary','site_phone_secondary','site_address','site_google_map',
        'mail_from_address','mail_from_name','mail_to_address','mail_to_name','facebook_address','instagram_address',
        'linkedin_address','twitter_address','nocaptcha_sitekey','nocaptcha_secret','paypal_account','paypal_client_id',
        'paypal_secret','paypal_live_sandbox','stripe_key','stripe_secret',
    ];
    
}