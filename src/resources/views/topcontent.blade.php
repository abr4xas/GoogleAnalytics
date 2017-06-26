@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('googleanalytics::googleanalytics.topcontent') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('googleanalytics::googleanalytics.topcontent') }}</li>
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
        <table class="table table-bordered"  style="table-layout: fixed; width: 100%">
            <tr>
                <th style="width:40%">Page</th>
                <th>Pageviews</th>
                <th>Unique Pageviews</th>
                <th>Time on Page</th>
                <th>Bounces</th>
                <th>Entrances</th>
                <th>Exits</th>
            </tr>
            @foreach($entries as $key => $item)
            <tr>
                <td style="word-wrap: break-word;">{{ $item[0]  }}</td>
                <td style="width:10%">{{ $item[1]  }}</td>
                <td style="width:10%">{{ $item[2]  }}</td>
                <td style="width:10%">{{ $item[3]  }}</td>
                <td style="width:10%">{{ $item[4]  }}</td>
                <td style="width:10%">{{ $item[5]  }}</td>
                <td style="width:10%">{{ $item[6]  }}</td>
            </tr>
            @endforeach
         {{ $entries->withPath('analytics-topcontent') }}
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection

@section('after_scripts')
@endsection










