@extends('Layout.master')

@section('title')
    用户账户
@stop

@section('content')
    <div class="container">
        <aside class="col-md-3" style="padding-left: 0px">
            @include('User.left_bar')
        </aside>
        <main class="col-md-9">
            @include('errors.list')
            <h2 class="col-md-offset-4">个人账户信息</h2><br><br>

            {!! Form::open(['url' => '/saveaccount', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                <div class="form-group">
                    {!! Form::label('name', '用户名: ', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('id', Auth::user()->id, ['class' =>
                        'form-control','readonly','style'=>'display:none']) !!}
                        {!! Form::text('name', Auth::user()->name, ['class' => 'form-control','readonly']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('realName', '姓名: ', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('realName', Auth::user()->realName, ['class' => 'form-control', 'required']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('sex', '性别: ', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::select('sex', array('男'=>'男','女'=>'女'),Auth::user()->sex,['class' => 'form-control',
                        'required']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('phone', '手机: ', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('phone', Auth::user()->phone, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('qq', 'QQ: ', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('qq', Auth::user()->qq, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email: ', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        {!! Form::text('email', Auth::user()->email, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('status1', '状态: ', ['class' => 'control-label col-md-2']) !!}
                    <div class="col-md-4">
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="status1" readonly
                                      disabled value="1" {{Auth::user()->status==0?"":"checked"}}>
                                激活
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="status2" readonly
                                      disabled value="0" {{Auth::user()->status==1?"":"checked"}}>
                                锁定
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-2">
                        {!! Form::submit('修改', ['class' => 'btn btn-success form-control']) !!}
                    </div>
                </div>

            {!! Form::close() !!}
        </main>
    </div>
@stop
