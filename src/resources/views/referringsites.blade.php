@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('googleanalytics::googleanalytics.referringsites') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('googleanalytics::googleanalytics.referringsites') }}</li>
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
                <th>Source</th>
                <th>Pageviews</th>
                <th>Session Duration</th>
                <th>Exits</th>
            </tr>
            @foreach($analytics as $key => $item)
            <tr>
                <td>{{ $item[0]  }}</td>
                <td>{{ $item[1]  }}</td>
                <td>{{ $item[2]  }}</td>
                <td>{{ $item[3]  }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection

@section('after_scripts')
@endsection







