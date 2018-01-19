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
                            <th>Keyword</th>
                            <th>Sessions</th>
                        </tr>
                        @foreach($entries as $key => $item)
                        <tr>
                            <td>{{ $item[0] }}</td>
                            <td>{{ $item[1] }}</td>
                        </tr>
                        @endforeach {{ $entries->withPath('analytics-keywords') }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
