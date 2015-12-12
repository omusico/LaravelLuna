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
                            <option value="{{ $i++ }}">{{ $point_types}}</option>
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
            <div class="form-group">
                <div class="col-md-4 col-md-offset-2">
                    {!! Form::submit('完成,创建', ['class' => 'btn btn-success form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop