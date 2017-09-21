<?php 

Route::group(['prefix' => 'admin', 'middleware' => ['web','admin']], function()
{
    Route::get('analytics', 'AnalyticsController@index');
    Route::get('analytics-mobile', 'AnalyticsController@mobile');
    Route::get('analytics-returning', 'AnalyticsController@newreturningsessions');
    Route::get('analytics-operating', 'AnalyticsController@operatingsystem');
    Route::get('analytics-traffic', 'AnalyticsController@traffic');
    Route::get('analytics-time-on-site', 'AnalyticsController@timeonsite');
    Route::get('analytics-referring-sites', 'AnalyticsController@referringsites');
    Route::get('analytics-search-engines', 'AnalyticsController@searchengines');
    Route::get('analytics-keywords', 'AnalyticsController@keywords');
    Route::get('analytics-topcontent', 'AnalyticsController@topcontent');
    Route::get('analytics-top-landing-pages', 'AnalyticsController@toplandingpages');
    Route::get('analytics-top-exit-pages', 'AnalyticsController@topexitpages');
});

