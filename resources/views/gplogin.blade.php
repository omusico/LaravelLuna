<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="高频彩">
    <title>登陆页</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/gaopin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">
    <link rel="icon" href="gaopinfavicon.ico" type="image/x-icon"/>
</head>
<body>
<div class="container" style="margin: 0 auto">
    <div class="col-md-offset-1 col-md-10">
        <div style="margin-top: 18%">
            <div class="gp_title"></div>
            <a onclick="openZoosUrl('chatwin');">
                <div class="gp_question"></div>
            </a>
        </div>
        <div class="gp_login_back">
            <a href="#">
                <div style="background-color: transparent;position: absolute;width: 53px;height: 130px;margin-top: 150px"></div>
            </a>
            {!! Form::open(['url' => '/login', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <div class="form-group" style="padding-top: 60px">
                <div style="padding-left: 150px">
                    <input class="form-control" required="required" name="name" type="text" style="width: 190px">
                </div>
            </div>
            <div class="form-group" style="padding-top: 20px">
                <div style="padding-left: 150px">
                    <input class="form-control" required="required" name="password" type="password" value=""
                           style="width: 190px">
                </div>
            </div>
            <div class="form-group" style="padding-top: 30px">
                <div style="padding-left: 110px">
                    {!! Form::submit('', ['class' => 'gp_btnlogin']) !!}
                    <br>
                    <a href="{{ url('/register') }}">
                        <input class="gp_btnreg" type="button">
                    </a>
                    <a href="{{ url('/dailiregister') }}">
                        <input class="gp_btndreg" type="button">
                    </a>
                    {{--{!! Form::submit('登陆', ['class' => 'btn btn-default btn-primary']) !!}--}}
                    {{--<a class="btn btn-default btn-info" href="{{ url('/register') }}">免费注册</a>--}}
                    {{--<a class="btn btn-default btn-warning" href="{{ url('/dailiregister') }}">代理注册</a>--}}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/all.js"></script>
<script language="javascript" src="http://dht.zoosnet.net/JS/LsJS.aspx?siteid=DHT65019353&float=1&lng=cn"></script>
<script type="text/javascript">

    $(document).ready(function () {
        setTimeout(function () {
            $("#LRdiv0").hide();
        }, 1000);
    })
</script>
</body>
</html>
