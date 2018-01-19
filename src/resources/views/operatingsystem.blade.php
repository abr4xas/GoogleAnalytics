@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $description }}
                </div>

                <div class="panel-body">
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
                            <td>{{ $item[0] }}</td>
                            <td>{{ $item[1] }}</td>
                            <td>{{ $item[2] }}</td>
                            <td>{{ $item[3] }}</td>
                            <td>{{ $item[4] }}</td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $entries->withPath('analytics-operating') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
