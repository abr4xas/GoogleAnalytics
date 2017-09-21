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
        // use this if your package has views
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'googleanalytics');
        
        // use this if your package has lang files
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'googleanalytics');
        
        // use this if your package has routes
        $this->setupRoutes($this->app->router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'Abr4xas\GoogleAnalytics\Http\Controllers'], function($router)
        {
            require __DIR__.'/Http/routes.php';
        });
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
