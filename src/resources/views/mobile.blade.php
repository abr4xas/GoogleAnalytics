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
                        @endforeach {{ $entries->withPath('analytics-mobile') }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
