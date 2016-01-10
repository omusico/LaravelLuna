@extends('Layout.backmaster')

@section('title')
    手动开奖
@stop

@section('content')
    <div>
        <h2>手动开奖</h2>
        <hr/>

        @include('errors.list')

        <div class="form-group">
            {!! Form::open(['url' => '/manualkjPost', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            <div class="form-group">
                <label for="groupId" class="control-label col-md-2  ">彩种: </label>
                @if(env('SITE_TYPE','')=='five')
                    <div class="col-md-4">
                        <select class="form-control" required="required" id="lottery_type" name="lottery_type">
                            <option value=""></option>
                            <option value="sdfive">山东11选5</option>
                            <option value="gdfive">广东11选5</option>
                            <option value="shfive">上海11选5</option>
                            <option value="zjfive">浙江11选5</option>
                            <option value="jxfive">江西11选5</option>
                            <option value="liaoningfive">辽宁11选5</option>
                            <option value="hljfive">黑龙江11选5</option>
                            <option value="cqfive">重庆11选5</option>
                        </select>
                    </div>
                @elseif(env('SITE_TYPE','')=='gaopin')
                    <div class="col-md-4">
                        <select class="form-control" required="required" id="lottery_type" name="lottery_type">
                            <option value=""></option>
                            <option value="6he">香港六合彩</option>
                            <option value="sdfive">山东11选5</option>
                            <option value="gdfive">广东11选5</option>
                            <option value="shfive">上海11选5</option>
                            <option value="zjfive">浙江11选5</option>
                            <option value="jxfive">江西11选5</option>
                            <option value="liaoningfive">辽宁11选5</option>
                            <option value="hljfive">黑龙江11选5</option>
                            <option value="cqfive">重庆11选5</option>
                            <option value="jsold">江苏快三</option>
                            <option value="beijin">北京快三</option>
                            <option value="anhui">安徽快三</option>
                            <option value="hebei">河北快三</option>
                            <option value="jilin">吉林快三</option>
                            <option value="jsnew">广西快三</option>
                            <option value="hubei">湖北快三</option>
                            <option value="fjk3">福建快三</option>
                            <option value="nmg">内蒙古快三</option>
                            <option value="cqssc">重庆时时彩</option>
                            <option value="jxssc">江西时时彩</option>
                            <option value="tjssc">天津时时彩</option>
                            <option value="xjssc">新疆时时彩</option>
                        </select>
                    </div>

                @else
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
                @endif
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
                @if(env('SITE_TYPE','')=='five')
                    <label class="col-md-4 col-md-offset-2">格式: 0,09,05,11,03 </label>
                @elseif(env('SITE_TYPE','')=='gaopin')
                    <label class="col-md-4 col-md-offset-2">六合彩格式: 29,11,09.47,43,06,08 </label><br>
                    <label class="col-md-9 col-md-offset-2">11选5格式: 0,09,05,11,03 </label><br>
                    <label class="col-md-4 col-md-offset-2">快三格式: 3,2,3 </label><br>
                @else
                    <label class="col-md-4 col-md-offset-2">格式: 3,2,3 </label>
                @endif
            </div>
            <div class="form-group">
                <div class="col-md-4 col-md-offset-2">
                    {!! Form::submit('手动,开奖', ['class' => 'btn btn-success form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop