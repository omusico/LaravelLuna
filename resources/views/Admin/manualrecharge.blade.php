@extends('Layout.backmaster')

@section('title')
    手动充值
@stop

@section('content')
    <div>
        <h2>手动充值</h2>
        <hr/>

        @include('errors.list')

        <div class="form-group">
            {!! Form::open(['url' => '/manualupdate', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <div class="form-group">
                {!! Form::text('id', $user->id, ['class' => 'form-control','readonly','style'=>'display:none']) !!}
                <input name="sn" type="hidden" value="{{date("YmdHis")}}">
                {!! Form::label('name', '用户名: ', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-4">
                    {!! Form::text('name',$user-> name, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('realName', '充值金额: ', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-4">
                    {!! Form::input('number','amounts', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 col-md-offset-2">如果要减金额，前面加个减号（-）,例如（-100） </label>
            </div>
            <div class="form-group">
                {!! Form::label('groupId', '添加类型: ', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-4">
                    <select class="form-control" required="required" id="addType" name="addType">
                        <?php $i = 1 ?>
                        @foreach ($point_types as $point_types)
                            @if($i==11)
                                <option value="{{ $i++ }}" selected>{{ $point_types}}</option>
                            @else
                                <option value="{{ $i++ }}">{{ $point_types}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('points', '账户余额: ', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-4">
                    {!! Form::text('points', $user->lu_user_data->points, ['class' => 'form-control','readonly']) !!}
                </div>
            </div>
            <?php
            if (!is_null($user->lu_user_data->loginIp)) {
                $users = \App\lu_user_data::where("loginIp", $user->lu_user_data->loginIp)->get();
                $count = $users->count();
            } else {
                $count = 0;
            }
            ?>
            @if(isset($count))
                @if($count>1)
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-2" style="color: red;font-size: larger">
                            @foreach($users as $user)
                                {{\App\lu_user::find($user->uid)->name}}
                            @endforeach
                            共用一个ip，请知悉
                        </div>
                    </div>
                @endif
            @endif

            <div class="form-group">
                <div class="col-md-4">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 col-md-offset-2">
                    {{--{!! Form::submit('完成,创建', ['class' => 'btn btn-success form-control']) !!}--}}
                    <button class="btn btn-success form-control" onclick="return confirm('确定添加?')">添加金额</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop