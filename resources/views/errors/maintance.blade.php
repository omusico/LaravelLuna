@extends('master')

@section('title')
    维护界面
@stop
@section('css')
    <style type="text/css">
        /*body {*/
            /*margin: 0;*/
            /*padding: 0;*/
            /*width: 100%;*/
            /*height: 100%;*/
            /*color: #B0BEC5;*/
            /*display: table;*/
            /*font-weight: 100;*/
            /*font-family: 'Lato';*/
        /*}*/

        /*.container {*/
            /*text-align: center;*/
            /*display: table-cell;*/
            /*vertical-align: middle;*/
        /*}*/

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
    @stop

@section('content')
    <div class="container" style="vertical-align: middle;text-align: center;vertical-align: middle">
        <div class="content">
            <div class="title">该彩种正在维护，不能投注.</div>
        </div>
    </div>
@stop