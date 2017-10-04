<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Users & Pageviews</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 20%">Days</th>
                <th>No. of Users</th>
                <th>No. of Pageviews</th>
            </tr>
                @foreach ($gausers as $key => $item)

                <tr>
                    <td>Last {{ $key }} days</td>
                    <td>{{ !empty($item[0]['users']) ? $item[0]['users'] : 0  }}</td>
                    <td>{{ !empty($item[0]['pageviews']) ? $item[0]['pageviews'] : 0 }}</td>
                </tr>
                @endforeach
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

