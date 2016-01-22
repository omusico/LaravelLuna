@extends('Layout.'.env("SITE_TYPE",'').'master')

@section('title')
    用户账户
@stop

@section('content')
    <div class="container">
        {{--@if(env('SITE_TYPE','')=='five')--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-10 col-md-offset-1" style="background-color: white;padding:0px">--}}
        {{--@endif--}}
        <aside class="col-md-3" style="padding-left: 0px">
            @include('User.left_bar')
        </aside>
        <main class="col-md-9">
            @include('errors.list')
            <h2 class="col-md-offset-4">银行账户信息</h2><br><br>

            {{--{!! Form::model($user = new \App\lu_user, ['url' => 'savebank', 'class' => 'form-horizontal']) !!}--}}
            {!! Form::open(['url' => '/savebank', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <div class="form-group">
                {!! Form::label('bankName', '银行名称: ', ['class' => 'control-label col-md-4']) !!}
                <div class="col-md-4">
                    {!! Form::text('bankName', $bank->bankName, ['class' => 'form-control']) !!}
                    {!! Form::input('hidden','id', $bank->id, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('openBank', '开户行: ', ['class' => 'control-label col-md-4']) !!}
                <div class="col-md-4">
                    {!! Form::text('openBank', $bank->openBank, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('bankCode', '银行账号: ', ['class' => 'control-label col-md-4']) !!}
                <div class="col-md-4">
                    @if(!empty($bank->bankCode))
                        {!! Form::text('bankCode', $bank->bankCode, ['class' => 'form-control','readonly']) !!}
                    @else
                        {!! Form::text('bankCode', $bank->bankCode, ['class' => 'form-control']) !!}
                    @endif
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('userName', '开户人姓名: ', ['class' => 'control-label col-md-4']) !!}
                <div class="col-md-4">
                    {!! Form::text('userName', $bank->userName, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    {!! Form::submit('完成,创建', ['class' => 'btn btn-success form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </main>
        {{--@if(env('SITE_TYPE','')=='five')--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--@endif--}}
    </div>
@stop
