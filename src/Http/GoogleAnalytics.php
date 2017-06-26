<?php 
namespace Shinokada\GoogleAnalytics\Http;

use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;
/*
 * https://developers.google.com/analytics/devguides/reporting/core/v3/common-queries
 */

class GoogleAnalytics{

    static function fetchCountry() 
    {
        $country = Analytics::performQuery(Period::days(14),'ga:sessions',  ['dimensions'=>'ga:country','sort'=>'-ga:sessions']);
        $result= collect($country['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'country' =>  $dateRow[0],
                'sessions' => (int) $dateRow[1],
            ];
        });
        return $result;
    }

    static function fetchUsers(array $periods)
    {
        foreach($periods as $period)
        {
            $users = Analytics::performQuery(Period::days($period),'ga:pageviews,ga:users');
            $result[$period]= collect($users['rows'] ?? [])->map(function (array $dateRow) {
                $data = [
                    'pageviews' => (int) $dateRow[0],
                    'users' => (int) $dateRow[1],
                ];
                return $data;
            });
        }
        return $result;
    }

    static function fetchTopBrowsers()
    {
        $analyticsData = Analytics::fetchTopBrowsers(Period::days(14));
        $array = $analyticsData->toArray();
        foreach ($array as $k=>$v)
        {
            $array[$k] ['label'] = $array[$k] ['browser'];
            unset($array[$k]['browser']); 
            $array[$k] ['value'] = $array[$k] ['sessions'];
            unset($array[$k]['sessions']); 
            $array[$k]['color'] = $array[$k]['highlight'] = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        return json_encode($array);
    }


    //public function performQuery(Period $period, string $metrics, array $others = [])
    static function fetchMobile(Period $period)
    {
        $analyticsData = Analytics::performQuery($period,'ga:sessions,ga:pageviews,ga:sessionDuration',['dimensions' => 'ga:mobileDeviceInfo,ga:source','segment'=>'gaid::-14']);
        return $analyticsData['rows'];
    }


    static function fetchReturning(array $periods)
    {
        foreach($periods as $period)
        {
            $analyticsData = Analytics::performQuery(Period::days($period),'ga:sessions',['dimensions' => 'ga:userType']);
            $result[$period]= collect($analyticsData['rows'] ?? [])->map(function (array $dateRow) {
                $data = [
                    'visitors' => (int) $dateRow[1],
                ];
                //return collect($new);
                return $data;
            });
        }
        return $result;
    }


    static function fetchOperatingSystem(Period $period)
    {
        $analyticsData = Analytics::performQuery($period,'ga:sessions',['dimensions' => 'ga:operatingSystem,ga:operatingSystemVersion,ga:browser,ga:browserVersion']);
        return $analyticsData['rows'];
    }

    static function fetchTrafficSources(Period $period)
    {
        $analyticsData = Analytics::performQuery($period,'ga:sessions,ga:pageviews,ga:sessionDuration,ga:exits',['dimensions' => 'ga:source,ga:medium','sort'=>'-ga:sessions']);
        return $analyticsData['rows'];
    }

    static function fetchTimeOnSite(Period $period)
    {
        $analyticsData = Analytics::performQuery($period,'ga:sessions,ga:sessionDuration');
        return $analyticsData['rows'];
    }


    static function fetchReferringSites(Period $period)
    {
        $analyticsData = Analytics::performQuery($period,'ga:pageviews,ga:sessionDuration,ga:exits',['dimensions'=>'ga:source','filters'=>'ga:medium==referral','sort'=>'-ga:pageviews']);
        return $analyticsData['rows'];
    }


    static function fetchSearchEngines(Period $period)
    {
        $analyticsData = Analytics::performQuery($period,'ga:pageviews,ga:sessionDuration,ga:exits',['dimensions'=>'ga:source','filters'=>'ga:medium==cpa,ga:medium==cpc,ga:medium==cpm,ga:medium==cpp,ga:medium==cpv,ga:medium==organic,ga:medium==ppc','sort'=>'-ga:pageviews']);
        return $analyticsData['rows'];
    }


    static function fetchKeywords(Period $period)
    {
        $analyticsData = Analytics::performQuery($period,'ga:sessions',['dimensions'=>'ga:keyword','sort'=>'-ga:sessions']);
        return $analyticsData['rows'];
    }


    static function fetchTopcontent(Period $period)
    {
        $analyticsData = Analytics::performQuery($period,'ga:pageviews,ga:uniquePageviews,ga:timeOnPage,ga:bounces,ga:entrances,ga:exits',['dimensions'=>'ga:pagePath','sort'=>'-ga:pageviews']);
        return $analyticsData['rows'];
    }


    static function fetchTopLandingPages(Period $period)
    {
        $analyticsData = Analytics::performQuery($period,'ga:pageviews,ga:uniquePageviews,ga:timeOnPage,ga:bounces,ga:entrances,ga:exits',['dimensions'=>'ga:pagePath','sort'=>'-ga:pageviews']);
        return $analyticsData['rows'];
    }


    static function fetchTopExitPages(Period $period)
    {
        $analyticsData = Analytics::performQuery($period,'ga:entrances,ga:bounces',['dimensions'=>'ga:landingPagePath','sort'=>'-ga:entrances']);
        return $analyticsData['rows'];
    }




}

