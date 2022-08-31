<?php

namespace App\Providers;

use App\SmsService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SmsService::class, function ($app){
            return new SmsService(env('GSMS_API_KEY', 'C20006176119e2e1716fa1.72831472'),env('GSMS_SENDER_ID', '8809601001375'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
