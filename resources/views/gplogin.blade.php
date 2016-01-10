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
<div class="container">
    <div class="gp_login_back" style="margin-top:25%">
        {!! Form::open(['url' => '/login', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="form-group" style="padding-top: 80px">
            <div class="col-md-offset-1 col-md-3" style="padding-left: 40px">
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group" style="padding-top: 25px">
            <div class="col-md-offset-1 col-md-3" style="padding-left: 40px">
                {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group" style="padding-top: 30px">
            <div class="col-md-6 col-md-offset-1">
                {!! Form::submit('登陆', ['class' => 'btn btn-default btn-primary']) !!}
                <a class="btn btn-default btn-info" href="{{ url('/register') }}">免费注册</a>
                <a class="btn btn-default btn-warning" href="{{ url('/dailiregister') }}">代理注册</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<script type="text/javascript" src="/js/all.js"></script>
</body>
</html>
