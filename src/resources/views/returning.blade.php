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
                            <th>Days</th>
                            <th>User Type</th>
                            <th>Sessions</th>
                        </tr>
                        @foreach($analytics as $key => $item)
                        <tr>
                            <td rowspan="2">{{ $key }}</td>
                            <td>New Visitor</td>
                            <td>{{ !empty($item[0]['visitors']) ? $item[0]['visitors'] : 0 }}</td>
                        </tr>
                        <tr>
                            <td>Returning Visitor</td>
                            <td>{{ !empty($item[1]['visitors']) ? $item[1]['visitors'] : 0 }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
