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
                            <td style="word-wrap: break-word;">{{ $item[0] }}</td>
                            <td style="width:10%">{{ $item[1] }}</td>
                            <td style="width:10%">{{ $item[2] }}</td>
                            <td style="width:10%">{{ $item[3] }}</td>
                            <td style="width:10%">{{ $item[4] }}</td>
                            <td style="width:10%">{{ $item[5] }}</td>
                            <td style="width:10%">{{ $item[6] }}</td>
                        </tr>
                        @endforeach 
                    </table>
                    {{ $entries->withPath('analytics-topcontent') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
