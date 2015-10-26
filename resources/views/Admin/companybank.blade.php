@extends('master')

@section('title')
    添加会员
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>添加银行账号</h2>
                <hr/>

                @include('errors.list')

                <div class="form-group">
                    {!! Form::open(['url' => 'companybank/', 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('bankName', '银行名称: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('id', $cbank->id, ['class' => 'form-control','readonly','style'=>'display:none']) !!}
                            {!! Form::text('bankName', $cbank->bankName, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('province', '省份: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('province', $cbank->province, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('city', '城市: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('city', $cbank->city, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('bankCode', '银行账号: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('bankCode', $cbank->bankCode, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('userName', '开户名: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('userName', $cbank->userName, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5">
                            {!! Form::submit('完成,创建', ['class' => 'btn btn-success form-control']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            @include('Admin.right_bar')
        </div>
    </div>
@stop