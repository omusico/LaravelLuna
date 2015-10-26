@extends('master')

@section('title')
    代理注册
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">代理注册</div>
                    <div class="panel-body">

                        @include('errors.list')

                        <div class="form-group">
                            {!! Form::model($user = new \App\lu_user, ['url' => 'register/save', 'class' => 'form-horizontal'])
                            !!}
                            <div class="form-group">
                                {!! Form::label('invite', '邀请码: ', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('invite', $invite, ['class' => 'form-control','required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', '用户名: ', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('name', old('name'), ['class' => 'form-control','required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', '密码: ', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-4">
                                    {{--{!! Form::password('password', null, ['class' => 'form-control col-md-4']) !!}--}}
                                    <input class="form-control" name="password" type="password" id="password" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('password_confirmation', '再次确认: ', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-4">
                                    {{--{!! Form::password('password', null, ['class' => 'form-control col-md-4']) !!}--}}
                                    <input class="form-control" name="password_confirmation" type="password" id="password_confirmation" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                            {!! Form::label('realName', '姓名: ', ['class' => 'control-label col-md-4']) !!}
                            <div class="col-md-4">
                            {!! Form::text('realName', old('name'), ['class' => 'form-control', 'required']) !!}
                            </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('sex', '性别: ', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-4">
                                    {!! Form::select('sex', array('男'=>'男','女'=>'女'),'男',['class' => 'form-control',
                                    'required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                            {!! Form::label('phone', '手机: ', ['class' => 'control-label col-md-4']) !!}
                            <div class="col-md-4">
                            {!! Form::text('phone', old('phone'), ['class' => 'form-control']) !!}
                            </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('qq', 'QQ: ', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('qq', old('qq'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('bankName', '银行名称: ', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('bankName', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('openBank', '开户行地址: ', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('openBank', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('bankCode', '银行账号: ', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('bankCode', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('bankUserName', '开户人姓名: ', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('bankUserName', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group" style="display: none">
                                {!! Form::label('groupId', '权限组: ', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-4">
                                    {{--{!! Form::text('groupId', old('email'), ['class' => 'form-control']) !!}--}}
                                    {!!
                                    Form::select('groupId',array('3'=>'代理'),3,['class'=>'form-control','required','readonly'])
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4">
                                    {!! Form::submit('完成,创建', ['class' => 'btn btn-success form-control']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop