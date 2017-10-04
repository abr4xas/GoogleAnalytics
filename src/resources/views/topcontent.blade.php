@extends('layouts.app')

@section('content')


<section class="p-t-lg p-y-md">
<div class="container">
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
</div>
</div>
@endsection