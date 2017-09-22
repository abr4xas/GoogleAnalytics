<?php

namespace Abr4xas\GoogleAnalytics;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class GoogleAnalyticsServiceProvider extends ServiceProvider
{
    
   /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            // lang
            __DIR__.'/resources/lang'       => resource_path('lang/vendor/googleanalytics'),
            // views
            __DIR__ . '/resources/views'    => resource_path('views/vendor/googleanalytics'),

            // controller
            __DIR__ . '/Http/Controllers'    => app_path('Http/Controllers'),
        ], 'googleanalytics');  

        // use this if your package has views
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'googleanalytics');
        
        // use this if your package has lang files
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'googleanalytics');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerGoogleAnalytics();
    }

    private function registerGoogleAnalytics()
    {
        $this->app->bind('googleanalytics',function($app){
            return new GoogleAnalytics($app);
        });
    } 
    
}
