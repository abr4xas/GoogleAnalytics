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
                <th>Source</th>
                <th>Medium</th>
                <th>Sessions</th>
                <th>Pageviews</th>
                <th>Sessions Duration</th>
                <th>Exits</th>
            </tr>
            @foreach($analytics as $key => $item)
            <tr>
                <td>{{ $item[0]  }}</td>
                <td>{{ $item[1]  }}</td>
                <td>{{ $item[2]  }}</td>
                <td>{{ $item[3]  }}</td>
                <td>{{ $item[4]  }}</td>
                <td>{{ $item[5]  }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</section>
@endsection