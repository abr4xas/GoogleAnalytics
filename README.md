<img align="left" width="180" src="https://blog.abr4xas.org/icons/apple-icon-180x180.png">

## GoogleAnalytics

[![Latest Version on Packagist][ico-version]](https://packagist.org/packages/abr4xas/googleanalytics)
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]](https://github.com/abr4xas/GoogleAnalytics)

This package is for Laravel and shows pageviews and other data from Google Analytics in your admin page. You only need <a href="https://github.com/spatie/laravel-analytics#how-to-obtain-the-credentials-to-communicate-with-google-analytics" target="_blank">setup the credentials to communicate with Google Analytics</a>.

---

### Installation

add this to your composer.json

```json
"require": {
    "abr4xas/GoogleAnalytics": "dev-master"
}
```

and

```bash
$ composer update
$ composer dump-autoload -o // optional
```

Next up the service provider must be registered:

```php
'providers' => [
    ...
    Spatie\Analytics\AnalyticsServiceProvider::class,
    Abr4xas\GoogleAnalytics\GoogleAnalyticsServiceProvider::class,
];

...

'aliases' => [
    ...
    'Analytics' => Spatie\Analytics\AnalyticsFacade::class,
    ...
];

```
Next up routes:

```php
//Google Analytics
Route::get('analytics', 'AnalyticsController@index')->name('analytics');
Route::get('analytics-mobile', 'AnalyticsController@mobile')->name('analytics-mobile');
Route::get('analytics-returning', 'AnalyticsController@newreturningsessions')->name('analytics-returning');
Route::get('analytics-operating', 'AnalyticsController@operatingsystem')->name('analytics-operating');
Route::get('analytics-traffic', 'AnalyticsController@traffic')->name('analytics-traffic');
Route::get('analytics-time-on-site', 'AnalyticsController@timeonsite')->name('analytics-time-on-site');
Route::get('analytics-referring-sites', 'AnalyticsController@referringsites')->name('analytics-referring-sites');
Route::get('analytics-search-engines', 'AnalyticsController@searchengines')->name('analytics-search-engines');
Route::get('analytics-keywords', 'AnalyticsController@keywords')->name('analytics-keywords');
Route::get('analytics-topcontent', 'AnalyticsController@topcontent')->name('analytics-topcontent');
Route::get('analytics-top-landing-pages', 'AnalyticsController@toplandingpages')->name('analytics-top-landing-pages');
Route::get('analytics-top-exit-pages', 'AnalyticsController@topexitpages')->name('analytics-top-exit-pages');
```

Follow the instruction at [spatie/laravel-analytics](https://github.com/spatie/laravel-analytics) and add download a json file and save as a service-account-credentials.json under `storage/app/googleanalytics/` folder.

Add `ANALYTICS_VIEW_ID` to `.env` file.
Add Chart.js to header.

### Menu

```php
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	<i class="fa fa-line-chart"></i>  
	{{ trans('googleanalytics::googleanalytics.analytics') }}
	<span class="caret"></span>
   </a>
   <ul class="dropdown-menu">
        <li>
            <a href="{{ route('analytics') }}">
                <i class="fa fa-pie-chart"></i> 
                <span>{{ trans('googleanalytics::googleanalytics.analyticsbasic') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('analytics-mobile') }}">
                <i class="fa fa-table"></i> 
                <span>{{ trans('googleanalytics::googleanalytics.mobile-traffic') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('analytics-returning') }}">
                <i class="fa fa-table"></i> 
                <span>{{ trans('googleanalytics::googleanalytics.returningsessions') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('analytics-operating') }}">
                <i class="fa fa-table"></i> 
                <span>{{ trans('googleanalytics::googleanalytics.operatingsystem') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('analytics-traffic') }}">
                <i class="fa fa-table"></i> 
                <span>{{ trans('googleanalytics::googleanalytics.trafficsources') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('analytics-time-on-site') }}">
                <i class="fa fa-table"></i> 
                <span>{{ trans('googleanalytics::googleanalytics.timeonsite') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('analytics-referring-sites') }}">
                <i class="fa fa-table"></i> 
                <span>{{ trans('googleanalytics::googleanalytics.referringsites') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('analytics-search-engines') }}">
                <i class="fa fa-table"></i> 
                <span>{{ trans('googleanalytics::googleanalytics.searchengines') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('analytics-keywords') }}">
                <i class="fa fa-table"></i> 
                <span>{{ trans('googleanalytics::googleanalytics.keywords') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('analytics-topcontent') }}">
                <i class="fa fa-table"></i> 
                <span>{{ trans('googleanalytics::googleanalytics.topcontent') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('analytics-top-landing-pages') }}">
                <i class="fa fa-table"></i> 
                <span>{{ trans('googleanalytics::googleanalytics.toplandingpages') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('analytics-top-exit-pages') }}">
                <i class="fa fa-table"></i> 
                <span>{{ trans('googleanalytics::googleanalytics.topexitpages') }}</span>
            </a>
        </li>
    </ul>
</li> 
```

### Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

### Testing

``` bash
$ composer test
```

### Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

### Security


### Credits

- [Shinichi Okada][link-author]
- [All Contributors][link-contributors]

### License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/abr4xas/GoogleAnalytics.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/abr4xas/GoogleAnalytics/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/abr4xas/GoogleAnalytics.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/abr4xas/GoogleAnalytics.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/abr4xas/GoogleAnalytics.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/abr4xas/googleanalytics
[link-travis]: https://travis-ci.org/abr4xas/GoogleAnalytics
[link-scrutinizer]: https://scrutinizer-ci.com/g/abr4xas/GoogleAnalytics/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/abr4xas/GoogleAnalytics
[link-downloads]: https://packagist.org/packages/abr4xas/googleanalytics
[link-author]: https://github.com/abr4xas
[link-contributors]: ../../contributors
