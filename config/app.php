<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store'  => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        Tymon\JWTAuth\Providers\LaravelServiceProvider::class,
    ])->toArray(),

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
        'Helper' => App\Helper\Helper::class,
        'JWTAuth'=>Tymon\JWTAuth\Facades\JWTAuth::class,

    ])->toArray(),

    // 'googlemap_key' => 'AIzaSyCZ-UCtNfnLcijcQUNF4IPZI-KxoINt3nI', 
    'googlemap_key' => 'AIzaSyCNPbBqnDpOhg08JFjbq3p7ywLTqEWG5UI', 
     
    /* DEVICE PUSH NOTIFICATION DETAILS */
    'customer_certy_url' => 'http://192.168.0.89/uber_schedule/api/public/apps/ios_push/iph_cert/Client_certy.pem',
    'customer_certy_pass' => '123456',
    'customer_certy_type' => '1',
    'provider_certy_url' => 'http://192.168.0.89/uber_schedule/api/public/apps/ios_push/walker/iph_cert/Walker_certy.pem',
    'provider_certy_pass' => '123456',
    'provider_certy_type' => '1',
    'gcm_browser_key' => 'AIzaSyBjltkw3rou7UEn_56eczTa6IJijl7kPC4',
    /* DEVICE PUSH NOTIFICATION DETAILS END */
    'currency_symb' => '$', 
    
    /* Developer Company Details */
    'developer_company_name' => 'Mowares',
    'developer_company_web_link' => 'http://www.mowares.com/', 
    'developer_company_email' => 'info@mowares.com', 
    'developer_company_fb_link' => 'https://www.facebook.com/MOWARES', 
    'developer_company_twitter_link' => 'https://twitter.com/mowares',
    /* Developer Company Details END */
    
    /* APP LINK DATA */
    'android_client_app_url'=>'http://www.google.com',
    'android_provider_app_url'=>'http://www.apple.com',
    'ios_client_app_url'=>'http://www.apple.com',
    'ios_provider_app_url'=>'http://www.google.com',
    /* APP LINK DATA END */
    
    'no_data_available' => 'History not availalbe.', 
    'data_not_available' => 'Data not availalbe.', 
    'blank_fiend_val' => 'N/A',

    'website_title' => 'Al-Hajj',
    'referral_prefix' => 'TNN',
    'datenow'=>'Y-m-d H:i:s',
    'appdate'=>'d-m-Y 23:59:59',
    'referral_zero_len' => 10,
    'website_meta_description' => '',
    'website_meta_keywords' => '',

    's3_bucket' => '',

    'twillo_account_sid' => '',
    'twillo_auth_token' => '',
    'twillo_number' => '',

    'production' => false,

    'default_payment' => 'stripe',

    'stripe_secret_key' => 'sk_test_R3HXNSi3I0jmGfGcG1G1IoAx',
    'stripe_publishable_key' => 'pk_test_emQEtnQRVMlrGBDShhzRJGoF',
    'braintree_environment' => '',
    'braintree_merchant_id' => '',
    'braintree_public_key' => '',
    'braintree_private_key' => '',
    'braintree_cse' => '',
        
    'coinbaseAPIKey' => 'g0xKQqKRwNj84IW9',
    'coinbaseAPISecret' => 'iEHiMMeUXWEGHV02M3lcxt8evBPaOzlC',

    'paypal_sdk_mode' => 'sandbox',
    'paypal_sdk_UserName' => 'npavankumar34-buyer_api1.gmail.com',
    'paypal_sdk_Password' => 'WUUPVM3ETSJ6CARS',
    'paypal_sdk_Signature' => 'AnIGq3pWk8Gb1yRu1ZjCY0N3ccikAdq-3A6AHjDQPytHJVE2N4d6jeWH',
    'paypal_sdk_AppId' => 'APP-80W284485P519543T',

];
