@extends('Layout.backmaster')

@section('title')
    手动开奖
@stop

@section('content')
    <div class="container">
        <div class="row">
            @include('Admin.back_left_bar')
            <div class="col-md-10">
                <h2>快三手动开奖</h2>
                <hr/>

                @include('errors.list')

                <div class="form-group">
                    {!! Form::open(['url' => '/manualkjPost', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    <div class="form-group">
                        <label for="groupId" class="control-label col-md-2  ">彩种: </label>
                        <div class="col-md-4">
                            <select class="form-control" required="required" id="lottery_type" name="lottery_type">
                                <option value=""></option>
                                <option value="jsold">江苏快三</option>
                                <option value="beijin">北京快三</option>
                                <option value="anhui">安徽快三</option>
                                <option value="hebei">河北快三</option>
                                <option value="jilin">吉林快三</option>
                                <option value="jsnew">广西快三</option>
                                <option value="hubei">湖北快三</option>
                                <option value="fjk3">福建快三</option>
                                <option value="nmg">内蒙古快三</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('proName', '开奖期号: ', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-4">
                            {!! Form::text('proName', null, ['class' => 'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 col-md-offset-2">格式: 20140629-016(请直接从投注查看拷贝期号.勿手写) </label>
                    </div>
                    <div class="form-group">
                        {!! Form::label('winCode', '开奖结果: ', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-4">
                            {!! Form::text('winCode', old('winCode'), ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-2">格式: 3,2,3 </label>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-2">
                            {!! Form::submit('手动,开奖', ['class' => 'btn btn-success form-control']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop