@extends('layouts.app')

@section('content')


<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $description }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered"  style="table-layout: fixed; width: 100%">
            <tr>
                <th style="width:40%">Landing Page</th>
                <th>Entrance</th>
                <th>Bounce</th>
            </tr>
            @foreach($entries as $key => $item)
            <tr>
                <td style="word-wrap: break-word;">{{ $item[0]  }}</td>
                <td style="width:10%">{{ $item[1]  }}</td>
                <td style="width:10%">{{ $item[2]  }}</td>
            </tr>
            @endforeach
         {{ $entries->withPath('analytics-top-landing-pages') }}
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection