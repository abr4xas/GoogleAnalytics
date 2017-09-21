@extends('layouts.app')

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $description }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @foreach($analytics as $key => $item)
        <table class="table table-bordered">
            <tr>
                <th>Days</th>
                <th>User Type</th>
                <th>Sessions</th>
            </tr>
            <tr>
                <td rowspan="2">{{ $key  }}</td>
                <td>New Visitor</td>
                <td>{{ $item[0]['visitors'] }}</td>
            </tr>
            <tr>
                <td>Returning Visitor</td>
                <td>{{ $item[1]['visitors'] }}</td>
            </tr>
        </table>
        @endforeach
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection