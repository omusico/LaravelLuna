@extends('master')

@section('title')
    添加会员
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>添加会员</h2>
                <hr/>

                @include('errors.list')

                <div class="form-group">
                    {!! Form::model($user = new \App\lu_user, ['url' => 'admin/', 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('name', '用户名: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('realName', '姓名: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('realName', old('name'), ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('sex', '性别: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::select('sex', array('男'=>'男','女'=>'女'),'男',['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone', '手机: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('phone', old('phone'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('qq', 'QQ: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('qq', old('qq'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('groupId', '权限组: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            <select class="form-control" required="required" id="groupId" name="groupId">
                                @foreach ($user_groups as $user_group)
                                    <option value="{{ $user_group['groupId'] }}">{{ $user_group['name'] }}</option>
                                @endforeach
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('groupId', '等级: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            <select class="form-control" required="required" id="groupId" name="groupId">
                                @foreach ($user_groups as $user_group)
                                    <option value="{{ $user_group['groupId'] }}">{{ $user_group['name'] }}</option>
                                @endforeach
                                ?>
                            </select>
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