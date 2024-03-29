@extends('Layout.'.env("SITE_TYPE",'').'master')

@section('title')
    欢迎登录
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">登录</div>
                    <div class="panel-body">

                        @include('errors.list')
                        {!! Form::open(['url' => '/login', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        <div class="form-group">
                            {!! Form::label('name', '用户名', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', '密码', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">记住我
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('登陆', ['class' => 'btn btn-default btn-primary']) !!}
                                <a class="btn btn-default btn-info" href="{{ url('/register') }}" >免费注册</a>
                                <a class="btn btn-default btn-warning" href="{{ url('/dailiregister') }}" >代理注册</a>
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<a class="btn btn-link" href="{{ url('/password/email') }}">忘记密码？</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop