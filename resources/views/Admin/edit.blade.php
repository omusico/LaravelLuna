@extends('Layout.backmaster')

@section('title')
    会员修改
@stop

@section('content')
    <div class="container">
        <div class="row">
            @include('Admin.back_left_bar')
            <div class="col-md-10">
                <h2>会员修改</h2>
                <hr/>

                @include('errors.list')

                <div class="form-group">
                    {!! Form::open(['url' => '/admin/', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    <div class="form-group">
                        {!! Form::label('name', '用户名: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('id', $lu_user->id, ['class' => 'form-control','readonly','style'=>'display:none']) !!}
                            {!! Form::text('name', $lu_user->name, ['class' => 'form-control','readonly']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('realName', '姓名: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('realName', $lu_user->realName, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('sex', '性别: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::select('sex', array('男'=>'男','女'=>'女'),$lu_user->sex,['class' => 'form-control',
                            'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone', '手机: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('phone', $lu_user->phone, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('qq', 'QQ: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('qq', $lu_user->qq, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            {!! Form::text('email', $lu_user->email, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('groupId', '权限组: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            <select class="form-control" required="required" id="groupId" name="groupId">
                                @foreach ($user_groups as $user_group)
                                    @if($lu_user->groupId == $user_group['groupId'])
                                        <option value="{{ $user_group['groupId'] }}" selected="selected">{{ $user_group['name'] }}</option>
                                    @else
                                        <option value="{{ $user_group['groupId'] }}">{{ $user_group['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('groupId', '等级: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            <select class="form-control" required="required" id="level" name="level" >
                                @foreach ($user_level as $key=>$level)
                                    {{--{{var_dump($lu_user->$level)}}--}}
                                    @if($lu_user->level == $key)
                                        <option value="{{ $key }}" selected="selected">{{ $level['name'] }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $level['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('status', '状态: ', ['class' => 'control-label col-md-1']) !!}
                        <div class="col-md-4">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="status1"
                                           value="1" {{$lu_user->status==0?"":"checked"}}>
                                    激活
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="status2"
                                           value="0" {{$lu_user->status==1?"":"checked"}}>
                                    锁定
                                </label>
                            </div>
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
        </div>
    </div>
@stop