# GoogleAnalytics

[![Latest Version on Packagist][ico-version]](https://packagist.org/packages/shinokada/googleanalytics)
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]](https://github.com/shinokada/GoogleAnalytics)

This package is for Backpack for Laravel shows Google Analytics in your admin page.


## Installation

1. Install [Laravel](https://laravel.com/docs/5.4/installation)
2. Install [Backpack for Laravel Base](https://github.com/Laravel-Backpack/Base) and [Backpack for CRUD](https://github.com/Laravel-Backpack/CRUD). You can follow this [instruction](https://laravel-backpack.readme.io/docs/install-on-laravel-54). You need to purchase a license for a non-commercial license for  Backpack for Laravel. Please read [this](https://backpackforlaravel.com/#pricing) for more details. 

3. Use `valet park` so that you can see your website at `yourweb.dev`.
4. Modify `.env` for Database config. And login from `yourweb.dev/admin/login`.



Via Composer

``` bash
$ composer require shinokada/GoogleAnalytics
```

Next up the service provider must be registered:

```php
'providers' => [
    ...
    Spatie\Analytics\AnalyticsServiceProvider::class,
    Shinokada\GoogleAnalytics\GoogleAnalyticsServiceProvider::class,
];

...

'aliases' => [
    ...
    'Analytics' => Spatie\Analytics\AnalyticsFacade::class,
    ...
];

```

Follow the instruction at [spatie/laravel-analytics](https://github.com/spatie/laravel-analytics) and add download a json file and save is as service-account-credentilas.json under `storage/app/googleanalytics/` folder.

Add `ANALYTICS_VIEW_ID` to `.env` file.

Add a menu item for it in resources/views/vendor/backpack/base/inc/sidebar.blade.php or menu.blade.php:

```php
<li class="treeview">
    <a href="#"><i class="fa fa-line-chart"></i> <span>{{ trans('googleanalytics::googleanalytices.analytics') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ url('admin/analytics') }}"><i class="fa fa-pie-chart"></i> <span>{{ trans('googleanalytics::googleanalytices.analyticsbasic') }}</span></a></li>
        <li><a href="{{ url('admin/analytics-mobile') }}"><i class="fa fa-table"></i> <span>{{ trans('googleanalytics::googleanalytices.mobile-traffic') }}</span></a></li>
        <li><a href="{{ url('admin/analytics-returning') }}"><i class="fa fa-table"></i> <span>{{ trans('googleanalytics::googleanalytices.returningsessions') }}</span></a></li>
        <li><a href="{{ url('admin/analytics-operating') }}"><i class="fa fa-table"></i> <span>{{ trans('googleanalytics::googleanalytices.operatingsystem') }}</span></a></li>
        <li><a href="{{ url('admin/analytics-traffic') }}"><i class="fa fa-table"></i> <span>{{ trans('googleanalytics::googleanalytices.trafficsources') }}</span></a></li>
        <li><a href="{{ url('admin/analytics-time-on-site') }}"><i class="fa fa-table"></i> <span>{{ trans('googleanalytics::googleanalytices.timeonsite') }}</span></a></li>
        <li><a href="{{ url('admin/analytics-referring-sites') }}"><i class="fa fa-table"></i> <span>{{ trans('googleanalytics::googleanalytices.referringsites') }}</span></a></li>
        <li><a href="{{ url('admin/analytics-search-engines') }}"><i class="fa fa-table"></i> <span>{{ trans('googleanalytics::googleanalytices.searchengines') }}</span></a></li>
        <li><a href="{{ url('admin/analytics-keywords') }}"><i class="fa fa-table"></i> <span>{{ trans('googleanalytics::googleanalytices.keywords') }}</span></a></li>
        <li><a href="{{ url('admin/analytics-topcontent') }}"><i class="fa fa-table"></i> <span>{{ trans('googleanalytics::googleanalytices.topcontent') }}</span></a></li>
        <li><a href="{{ url('admin/analytics-top-landing-pages') }}"><i class="fa fa-table"></i> <span>{{ trans('googleanalytics::googleanalyt.toplandingpages') }}</span></a></li>
        <li><a href="{{ url('admin/analytics-top-exit-pages') }}"><i class="fa fa-table"></i> <span>{{ trans('googleanalytics::googleanalyt.topexitpages') }}</span></a></li>
    </ul>
</li>
```


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email okada.shin(at)gmail.com instead of using the issue tracker.

## Credits

- [Shinichi Okada][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/shinokada/GoogleAnalytics.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/shinokada/GoogleAnalytics/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/shinokada/GoogleAnalytics.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/shinokada/GoogleAnalytics.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/shinokada/GoogleAnalytics.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/shinokada/GoogleAnalytics
[link-travis]: https://travis-ci.org/shinokada/GoogleAnalytics
[link-scrutinizer]: https://scrutinizer-ci.com/g/shinokada/GoogleAnalytics/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/shinokada/GoogleAnalytics
[link-downloads]: https://packagist.org/packages/shinokada/GoogleAnalytics
[link-author]: https://github.com/shinokada
[link-contributors]: ../../contributors
