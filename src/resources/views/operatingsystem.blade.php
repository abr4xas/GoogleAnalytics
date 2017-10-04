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
        <table class="table table-bordered">
            <tr>
                <th>Operating System</th>
                <th>Operating System Version</th>
                <th>Browser</th>
                <th>Browser Version</th>
                <th>Sessions</th>
            </tr>
            @foreach($entries as $key => $item)
            <tr>
                <td>{{ $item[0]  }}</td>
                <td>{{ $item[1]  }}</td>
                <td>{{ $item[2]  }}</td>
                <td>{{ $item[3]  }}</td>
                <td>{{ $item[4]  }}</td>
            </tr>
            @endforeach
         {{ $entries->withPath('analytics-operating') }}
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</section>
@endsection