@extends('Layout.fivemaster')
@section('title')
    中国快三网-{{$czName}}
@stop
@section('css')
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('/css/betting.css') }}">--}}
    <style type="text/css">
    </style>
    <script type="text/javascript">
    </script>
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 align="center" style="color: white">
                    {{$czName}}走势图</h2>
                <table class="table table-hover" style="background-color: white">
                    <tr>
                        <th rowspan="2">期号</th>
                        <th colspan="3" rowspan="2">开奖号码</th>
                        <th colspan="10">定位单双大小</th>
                        <th colspan="3">和值</th>
                    </tr>
                    <tr>
                        <th colspan="2">第一位</th>
                        <th colspan="2">第二位</th>
                        <th colspan="2">第三位</th>
                        <th colspan="2">第四位</th>
                        <th colspan="2">第五位</th>
                        <th>和值</th>
                        <th>单双</th>
                        <th>大小</th>
                    </tr>
                    <?php
                    $sums = array(
                            3,
                            4,
                            5,
                            6,
                            7,
                            8,
                            9,
                            10,
                            11,
                            12,
                            13,
                            14,
                            15,
                            16,
                            17,
                            18
                    );
                    $hz = 0;
                    ?>
                    @if (count($datas))
                        @foreach ($datas as $item)
                            <tr>
                                <td>
                                    {{$item->proName}}
                                </td>
                                <td colspan="3" style="background-color: rgb(255, 255, 238);color: red">
                                    {{$item->codes}}
                                </td>
                                <?php
                                $hz = 0;
                                $codes = explode(",", $item->codes);
                                foreach ($codes as $c) {
                                    $hz = $hz + ( int )$c;
                                };
                                ?>
                                @if($codes[0]%2==0)
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #ddd005;">
                                        双
                                    </td>
                                @else
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #84cf54;">
                                        单
                                    </td>
                                @endif
                                @if($codes[0]>5)
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #ddd005;">
                                        大
                                    </td>
                                @else
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #84cf54;">
                                        小
                                    </td>
                                @endif
                                @if($codes[1]%2==0)
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #ddd005;">
                                        双
                                    </td>
                                @else
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #84cf54;">
                                        单
                                    </td>
                                @endif
                                @if($codes[1]>5)
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #ddd005;">
                                        大
                                    </td>
                                @else
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #84cf54;">
                                        小
                                    </td>
                                @endif
                                @if($codes[2]%2==0)
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #ddd005;">
                                        双
                                    </td>
                                @else
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #84cf54;">
                                        单
                                    </td>
                                @endif
                                @if($codes[2]>5)
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #ddd005;">
                                        大
                                    </td>
                                @else
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #84cf54;">
                                        小
                                    </td>
                                @endif
                                @if($codes[3]%2==0)
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #ddd005;">
                                        双
                                    </td>
                                @else
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #84cf54;">
                                        单
                                    </td>
                                @endif
                                @if($codes[3]>5)
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #ddd005;">
                                        大
                                    </td>
                                @else
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #84cf54;">
                                        小
                                    </td>
                                @endif
                                @if($codes[4]%2==0)
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #ddd005;">
                                        双
                                    </td>
                                @else
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #84cf54;">
                                        单
                                    </td>
                                @endif
                                @if($codes[4]>5)
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #ddd005;">
                                        大
                                    </td>
                                @else
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #84cf54;">
                                        小
                                    </td>
                                @endif

                                @if($hz>30)
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #ddd005;">
                                        大
                                    </td>
                                @else
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #84cf54;">
                                        小
                                    </td>
                                @endif
                                @if($hz %2==0)
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #ddd005;">
                                        单
                                    </td>
                                @else
                                    <td style="color: rgb(255, 255, 255);     background: none repeat scroll 0% 0% #84cf54;">
                                        双
                                    </td>
                                @endif
                                <td style="color: rgb(255, 255, 255); background: none repeat scroll 0% 0% rgb(231, 133, 141);">{{$hz}}</td>
                            </tr>
                        @endforeach
                    @else
                        <h1>走势数据为空</h1>
                    @endif
                </table>
            </div>
        </div>

    </div>
@stop
@section('script')
@stop
