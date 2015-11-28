@extends('Layout.'.env("SITE_TYPE",'').'master')

@section('title')
    修改密码
@stop

@section('content')
    <div class="container">
        @if(env('SITE_TYPE','')=='five')
            <div class="row">
                <div class="col-md-10 col-md-offset-1" style="background-color: white;padding:0px">
                    @endif
                    <aside class="col-md-3" style="padding-left: 0px">
                        @include('User.left_bar')
                    </aside>
                    <main class="col-md-9">
                        @include('errors.list')
                        <h2 class="col-md-offset-4">修改密码</h2><br><br>

                        {{--{!! Form::model($user = new \App\lu_user, ['url' => 'savebank', 'class' => 'form-horizontal']) !!}--}}
                        {!! Form::open(['url' => '/editpwdpost', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        <div class="form-group">
                            {!! Form::label('password', '原来的密码: ', ['class' => 'control-label col-md-4']) !!}
                            <div class="col-md-4">
                                {!! Form::input('password','oldpassword', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', '密码: ', ['class' => 'control-label col-md-4']) !!}
                            <div class="col-md-4">
                                <input class="form-control" name="password" type="password" id="password"
                                       required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation', '再次确认: ', ['class' => 'control-label col-md-4'])
                            !!}
                            <div class="col-md-4">
                                <input class="form-control" name="password_confirmation" type="password"
                                       id="password_confirmation" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('cashPwd', '支付密码: ', ['class' => 'control-label col-md-4']) !!}
                            <div class="col-md-4">
                                {!! Form::selectRange('cashPwd[0]',0,9,0,['class' => '']) !!}
                                {!! Form::selectRange('cashPwd[1]',0,9,0,['class' => '']) !!}
                                {!! Form::selectRange('cashPwd[2]',0,9,0,['class' => '']) !!}
                                {!! Form::selectRange('cashPwd[3]',0,9,0,['class' => '']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                {!! Form::submit('完成,创建', ['class' => 'btn btn-success form-control']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </main>
                    @if(env('SITE_TYPE','')=='five')
                </div>
            </div>
        @endif
    </div>
@stop
