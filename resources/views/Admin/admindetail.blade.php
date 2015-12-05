@extends('Layout.backmaster')

@section('title')
    资金明细
@stop

@section('content')
    <div>
        @include('errors.list')
        <hr>
        <table class="table table-hover">
            <tr>
                <td>姓名</td>
                <td>类型</td>
                <td>原来金额</td>
                <td>改变金额</td>
                <td>新的金额</td>
                <td>发生时间</td>
            </tr>
            @if (count($lu_points_records))
                @foreach ($lu_points_records as $lu_points_record)
                    <tr>
                        <td>{{ $lu_points_record->userName }}</td>
                        @if(is_numeric($lu_points_record->addType))
                            <td>{{ $point_types[$lu_points_record->addType] }}</td>
                        @else
                            <td>{{ $lu_points_record->addType }}</td>
                        @endif
                        <td>{{ $lu_points_record->oldPoint }}</td>
                        <td>{{ $lu_points_record->changePoint }}</td>
                        <td>{{ $lu_points_record->newPoint }}</td>
                        <td>{{ $lu_points_record->created_at }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <?php echo $lu_points_records->render(); ?>

    </div>
@stop
@section('script')
    {{--<script type="text/javascript" src="/js/collect.js"></script>--}}
    <script type="text/javascript">
        $(document).ready(function () {
        });
        function changtolocation(value) {
            var index = value.selectedIndex; // 选中索引

            var text = value.options[index].text; // 选中文本
            var val = value.options[index].value; // 选中值
            setTimeout(window.location.href = "admin?groupid=" + val, 1000);
        }

        function Search() {
            url = "admin?userName=" + $("#userName").val();
            window.location.href = url;
        }
    </script>
@stop