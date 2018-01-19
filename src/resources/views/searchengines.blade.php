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
                            <th>Source</th>
                            <th>Pageviews</th>
                            <th>Session Duration</th>
                            <th>Exits</th>
                        </tr>
                        @foreach($analytics as $key => $item)
                        <tr>
                            <td>{{ $item[0] }}</td>
                            <td>{{ $item[1] }}</td>
                            <td>{{ $item[2] }}</td>
                            <td>{{ $item[3] }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
