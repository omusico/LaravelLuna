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
                <label>开奖期号:</label><input type="text" id="proName" name="proName" value="{{$proName}}">
            </div>
            <div style="float: left;">
                <label>类型:</label>
                <select required="required" id="typeName" name="typeName">
                    @if(env('SITE_TYPE','')=='five')
                        <option value=""></option>
                        <option value="sdfive">山东11选5</option>
                        <option value="gdfive">广东11选5</option>
                        <option value="shfive">上海11选5</option>
                        <option value="zjfive">浙江11选5</option>
                        <option value="jxfive">江西11选5</option>
                        <option value="liaoningfive">辽宁11选5</option>
                        <option value="hljfive">黑龙江11选5</option>
                        <option value="cqfive">重庆11选5</option>
                    @elseif(env('SITE_TYPE','')=='gaopin')
                        <option value=""></option>
                        <option value="6he">香港六合彩</option>
                        <option value="sdfive">山东11选5</option>
                        <option value="gdfive">广东11选5</option>
                        <option value="shfive">上海11选5</option>
                        <option value="zjfive">浙江11选5</option>
                        <option value="jxfive">江西11选5</option>
                        <option value="liaoningfive">辽宁11选5</option>
                        <option value="hljfive">黑龙江11选5</option>
                        <option value="cqfive">重庆11选5</option>
                        <option value="jsold">江苏快三</option>
                        <option value="beijin">北京快三</option>
                        <option value="anhui">安徽快三</option>
                        <option value="hebei">河北快三</option>
                        <option value="jilin">吉林快三</option>
                        <option value="jsnew">广西快三</option>
                        <option value="hubei">湖北快三</option>
                        <option value="fjk3">福建快三</option>
                        <option value="nmg">内蒙古快三</option>
                        <option value="cqssc">重庆时时彩</option>
                        <option value="jxssc">江西时时彩</option>
                        <option value="tjssc">天津时时彩</option>
                        <option value="xjssc">新疆时时彩</option>

                    @else
                        <option value=""></option>
                        <option value="jsold">江苏快三</option>
                        <option value="beijin">北京快三</option>
                        <option value="anhui">安徽快三</option>
                        <option value="hebei">河北快三</option>
                        <option value="jilin">吉林快三</option>
                        <option value="jsnew">广西快三</option>
                        <option value="hubei">湖北快三</option>
                        <option value="fjk3">福建快三</option>
                        <option value="nmg">内蒙古快三</option>
                    @endif
                </select>
                <label>开奖号码:</label><input type="text" id="codes" name="codes" value="{{$codes}}">
            </div>
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
        <?php echo $LotteriesResults->appends(['proName' => $proName, 'codes' => $codes,'typeName' =>$typeName])->render(); ?>

    </div>
@stop
@section('script')
    {{--<script type="text/javascript" src="/js/collect.js"></script>--}}
    <script type="text/javascript">
        $(function () {
            $("#typeName").val("{{$typeName}}")
        });
        function Search() {
            url = "LotteriesResult?proName=" + $("#proName").val() + "&codes=" + $("#codes").val() + "&typeName=" + $("#typeName option:selected").val();
            window.location.href = url;
        }
    </script>
@stop