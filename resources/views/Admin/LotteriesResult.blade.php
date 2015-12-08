@extends('Layout.backmaster')

@section('title')
    管理员
@stop

@section('content')
    <div>
        @include('errors.list')
        <hr>
        <div>
            <div style="float: left;">
                <label>用户名:</label><input type="text" id="proName" name="proName" value="{{$proName}}">
            </div>
            {{--<div style="float: left">--}}
            {{--<select name="groupId" class="easyui-combobox" style="width: 215px" id="groupId">--}}
            {{--<option value="">选择要管理的组</option>--}}
            {{--@foreach($user_groups as $user_group)--}}
            {{--<option value="{{$user_group['groupId']}}">{{$user_group['name']}}</option>--}}
            {{--@endforeach--}}
            {{--</select>--}}
            {{--</div>--}}
            <div style="float: right;margin-right: 50px">
                <a class="btn btn-default btn-primary" onclick="Search()">查询</a>
            </div>
        </div>

        <table class="table table-hover">
            <tr>
                <td>类型</td>
                <td>开奖期数</td>
                <td>开奖号码</td>
                <td>来源</td>
                <td>开奖时间</td>
                <td>操作</td>
            </tr>
            <?php $lunafunctions = new \App\LunaLib\Common\LunaFunctions(); ?>
            @if (count($LotteriesResults))
                @foreach ($LotteriesResults as $LotteriesResult)
                    <tr>
                        <td>{{ $lunafunctions->get_lottery_name(strtolower($LotteriesResult->typeName)) }}</td>
                        <td>{{ $LotteriesResult->proName }}</td>
                        <td>{{ $LotteriesResult->codes }}</td>
                        <td>{{ $LotteriesResult->source }}</td>
                        <td>{{ $LotteriesResult->created_at }}</td>
                        <td>
                            <form action="{{ url('LotteriesResult/'.$LotteriesResult->id) }}" style='display: inline'
                            method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button class="btn btn-sm btn-danger" onclick="return confirm('确定删除?')">删除
                            </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
        <?php echo $LotteriesResults->appends(['proName' => $proName])->render(); ?>

    </div>
@stop
@section('script')
    {{--<script type="text/javascript" src="/js/collect.js"></script>--}}
    <script type="text/javascript">
        function Search() {
            url = "LotteriesResult?proName=" + $("#proName").val() ;
            window.location.href = url;
        }
    </script>
@stop