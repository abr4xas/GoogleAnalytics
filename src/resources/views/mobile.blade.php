@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('googleanalytics::googleanalytics.mobile-traffic') }} for last 7 days
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('googleanalytics::googleanalytics.mobile-traffic') }}</li>
      </ol>
    </section>
@endsection

@section('after_styles')
@endsection


@section('content')


<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $description }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 40%">Mobile Device Info</th>
                <th style="width: 30%">Source</th>
                <th>Sessions</th>
                <th>Pageviews</th>
                <th>Session Duration</th>
            </tr>
                @foreach($entries as $item)
            <tr>
                    <td>{{ $item[0] }}</td>
                    <td>{{ $item[1] }}</td>
                    <td>{{ $item[2] }}</td>
                    <td>{{ $item[3] }}</td>
                    <td>{{ $item[4] }}</td>
                </tr>
                    @endforeach
         {{ $entries->withPath('analytics-mobile') }}
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection

@section('after_scripts')
@endsection

