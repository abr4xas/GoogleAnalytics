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
                <th>Keyword</th>
                <th>Sessions</th>
            </tr>
            @foreach($entries as $key => $item)
            <tr>
                <td>{{ $item[0]  }}</td>
                <td>{{ $item[1]  }}</td>
            </tr>
            @endforeach
         {{ $entries->withPath('analytics-keywords') }}
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</div>
@endsection









