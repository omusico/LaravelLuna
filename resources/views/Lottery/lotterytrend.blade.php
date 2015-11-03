@extends('Layout.master')
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
            <div class="col-md-12">

                @include('errors.list')
                <h3 align="center">
                    {{$czName}}走势图</h3>
                <table class="table table-hover">
                    <tr>
                        <th rowspan="2">期号</th>
                        <th colspan="3" rowspan="2">开奖号码</th>
                        <th colspan="6">开奖号码分布</th>
                        <th colspan="16">和值</th>
                        <th colspan="2">大小</th>
                        <th colspan="2">单双</th>
                    </tr>
                    <tr>
                        <th>01</th>
                        <th>02</th>
                        <th>03</th>
                        <th>04</th>
                        <th>05</th>
                        <th>06</th>
                        <th>03</th>
                        <th>04</th>
                        <th>05</th>
                        <th>06</th>
                        <th>07</th>
                        <th>08</th>
                        <th>09</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                        <th>13</th>
                        <th>14</th>
                        <th>15</th>
                        <th>16</th>
                        <th>17</th>
                        <th>18</th>
                        <th>大</th>
                        <th>小</th>
                        <th>单</th>
                        <th>双</th>
                    </tr>
                    <?php
                    $balls = array(
                            '01',
                            '02',
                            '03',
                            '04',
                            '05',
                            '06'
                    );
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
                                <td colspan="3">
                                    {{$item->codes}}
                                </td>
                                <?php
                                $hz = 0;
                                $codes = explode(",", $item->codes);
                                foreach ($codes as $c) {
                                    $hz = $hz + ( int )$c;
                                };
                                ?>
                                @foreach($balls as $ball)
                                    @if($codes[0] ==$ball || $codes[1] ==$ball || $codes[2] ==$ball)
                                        <td class="winBall">
                                            {{$ball}}
                                        </td>
                                    @else
                                        <td style="color:#808080;">
                                            {{$ball}}
                                        </td>
                                    @endif
                                @endforeach
                                @foreach($sums as $sum)
                                    @if($hz == $sum)
                                        <td class="winBall">
                                            {{$sum}}
                                        </td>
                                    @else
                                        <td style="color:#808080;">
                                            {{$sum}}
                                        </td>
                                    @endif
                                @endforeach
                                @if($hz>10)
                                    <td style="background-color: red;color: white;font-family: bold">
                                        大
                                    </td>
                                    <td style="background-color: #008000;color: #808080">
                                        小
                                    </td>
                                @else
                                    <td style="background-color: #008000;color: #808080">
                                        大
                                    </td>
                                    <td style="background-color: red;color: white;font-family: bold">
                                        小
                                    </td>
                                @endif
                                @if($hz %2==0)
                                    <td style="background-color: red;color: white;font-family: bold">
                                        单
                                    </td>
                                    <td style="background-color: #008000;color: #808080">
                                        双
                                    </td>
                                @else
                                    <td style="background-color: #008000;color: #808080">
                                        单
                                    </td>
                                    <td style="background-color: red;color: white;font-family: bold">
                                        双
                                    </td>
                                @endif
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
