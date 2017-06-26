<?php
namespace Shinokada\GoogleAnalytics\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;
use Shinokada\GoogleAnalytics\Http\GoogleAnalytics;
use Illuminate\Pagination\LengthAwarePaginator;
use Auth;

class AnalyticsController extends Controller
{

    private function _pagination($analytics)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = collect($analytics);
        $perPage = 30;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        return new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
    }
    
    
    public function index()
    {
        $periods = [1, 3, 5,  7, 14, 30];
        $gausers= GoogleAnalytics::fetchUsers($periods);
        $this->data['gausers'] = $gausers;

        // fetchTotalVisitorAndPageViews
        $analyticsData_one = Analytics::fetchTotalVisitorsAndPageViews(Period::days(14));
        $this->data['dates'] = $analyticsData_one->pluck('date');
        $this->data['visitors'] = $analyticsData_one->pluck('visitors');
        $this->data['pageViews'] = $analyticsData_one->pluck('pageViews');

        $this->data['browserjson'] = GoogleAnalytics::fetchTopBrowsers();

        $result = GoogleAnalytics::fetchCountry();
        $this->data['country'] = $result->pluck('country');
        $this->data['country_sessions'] = $result->pluck('sessions');

        $this->data['title'] = trans('googleanalytics::googleanalytics.analytics'); 
        return view('googleanalytics::analytics', $this->data);
    }


    public function mobile()
    {
        $this->data['title'] = trans('googleanalytics::googleanalytics.mobile-traffic');
        $this->data['description'] = 'This query returns some information about sessions which occurred from mobile devices. Note that "Mobile Traffic" is defined using the default segment ID -14.';
        $analytics = GoogleAnalytics::fetchMobile(Period::days(7));
        $this->data['entries'] = $this->_pagination($analytics);
        return view('googleanalytics::mobile', $this->data);
    }


    public function newreturningsessions()
    {
        $this->data['title'] = trans('googleanalytics::googleanalytics.returningsessions'); 
        $this->data['description'] = 'This query returns the number of new sessions vs returning sessions.';
        $periods = [1, 3, 5,  7, 14, 30];
        $this->data['analytics'] = GoogleAnalytics::fetchReturning($periods);
        //dd($this->data['analytics']);
        return view('googleanalytics::returning', $this->data);
    }


    public function operatingsystem()
    {
        $this->data['title'] = trans('googleanalytics::googleanalytics.operatingsystem'); 
        $this->data['description'] = 'This query returns a breakdown of sessions by the Operating System, web browser, and browser version used.';
        $analytics = GoogleAnalytics::fetchOperatingSystem(Period::days(7));
        $this->data['entries'] = $this->_pagination($analytics);
        //dd($this->data['analytics']);
        return view('googleanalytics::operatingsystem', $this->data);
    }


    public function traffic()
    {
        $this->data['title'] = trans('googleanalytics::googleanalytics.trafficsources');
        $this->data['description'] = 'This query returns the site usage data broken down by source and medium, sorted by sessions in descending order.';
        $this->data['analytics'] = GoogleAnalytics::fetchTrafficSources(Period::days(7));
    //    dd($this->data['analytics']);
        return view('googleanalytics::traffic', $this->data);
    }


    public function timeonsite()
    {
        $this->data['title'] = trans('googleanalytics::googleanalytics.timeonsite');
        $this->data['description'] = 'This query returns the number of sessions and total time on site and calculated average time on site for the last 7 days.';
        $this->data['analytics'] = GoogleAnalytics::fetchTimeOnSite(Period::days(7));
        //dd($this->data['analytics']);
        return view('googleanalytics::timeonsite', $this->data);
    }


    public function referringsites()
    {
        $this->data['title'] = trans('googleanalytics::googleanalytics.referringsites');
        $this->data['description'] = 'This query returns a list of domains and how many sessions each referred to your site, sorted by pageviews in descending order for the last 30 days.';
        $this->data['analytics'] = GoogleAnalytics::fetchReferringSites(Period::days(30));
        //dd($this->data['analytics']);
        return view('googleanalytics::referringsites', $this->data);
    }


    public function searchengines()
    {
        $this->data['title'] = trans('googleanalytics::googleanalytics.searchengines');
        $this->data['description'] = 'This query returns site usage data for all traffic by search engine, sorted by pageviews in descending order for the last 30 days.';
        $this->data['analytics'] = GoogleAnalytics::fetchSearchEngines(Period::days(30));
        //dd($this->data['analytics']);
        return view('googleanalytics::searchengines', $this->data);
    }


    public function keywords()
    {
        $this->data['title'] = trans('googleanalytics::googleanalytics.keywords');
        $this->data['description'] = 'This query returns sessions broken down by search engine keywords used, sorted by sessions in descending order.';
        $this->data['analytics'] = $analytics = GoogleAnalytics::fetchKeywords(Period::days(30));
        //dd($this->data['analytics']);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = collect($analytics);
        $perPage = 30;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $this->data['entries'] = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
        //dd($this->data['entries']);
        return view('googleanalytics::keywords', $this->data);
    }


    public function topcontent()
    {
        $this->data['title'] = trans('googleanalytics::googleanalytics.topcontent');
        $this->data['description'] = 'This query returns sessions broken down by search engine keywords used, sorted by sessions in descending order for the last 30 days';
        $analytics = GoogleAnalytics::fetchTopcontent(Period::days(30));
        $this->data['entries'] = $this->_pagination($analytics);
        // dd($this->data['analytics']);
        return view('googleanalytics::topcontent', $this->data);
    }


    public function toplandingpages()
    {
        $this->data['title'] = trans('googleanalytics::googleanalytics.toplandingpages');
        $this->data['description'] = 'This query returns your most popular landing pages, sorted by entrances in descending order.';
        $analytics = GoogleAnalytics::fetchTopLandingPages(Period::days(30));
        $this->data['entries'] = $this->_pagination($analytics);
        // dd($this->data['analytics']);
        return view('googleanalytics::toplandingpages', $this->data);
    }


    public function topexitpages()
    {
        $this->data['title'] = trans('googleanalytics::googleanalytics.topexitpages');
        $this->data['description'] = 'This query returns your most common exit pages, sorted by exits in descending order.';
        $analytics = GoogleAnalytics::fetchTopExitPages(Period::days(30));
        // dd($this->data['analytics']);
        $this->data['entries'] = $this->_pagination($analytics);
        return view('googleanalytics::topexitpages', $this->data);
    }



}
