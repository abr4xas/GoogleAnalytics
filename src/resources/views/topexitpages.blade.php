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
                            <th style="width:40%">Exit Page</th>
                            <th>Exits</th>
                            <th>Pageviews</th>
                        </tr>
                        @foreach($entries as $key => $item)
                        <tr>
                            <td style="word-wrap: break-word;">{{ $item[0] }}</td>
                            <td style="width:10%">{{ $item[1] }}</td>
                            <td style="width:10%">{{ $item[2] }}</td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $entries->withPath('analytics-top-exit-pages') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
