@extends('Layout.backmaster')

@section('title')
    彩票状态
@stop

@section('content')
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">彩票状态</div>

            <div class="panel-body">
                @include('errors.list')
                <div class="form-group">
                    {!! Form::open(['url' => '/savelotterystatus', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                    <h1 class="col-md-offset-5">是否托管</h1>

                    <div class="form-group ">
                        <div class="col-md-offset-4 col-md-4" style="padding: 0px;">
                            @foreach($isdelegate as $key=>$value)
                                @if($key=="num")
                                    <div class="col-md-2" style="padding: 0px;">
                                        <label class="form-control">{{$key}}:</label>
                                    </div>
                                    <div class="col-md-2" style="padding: 0px;">
                                        <input class="form-control" required="required" onkeyup='this.value=this.value.replace(/\D/gi,"")'
                                               name="isdelegate[{{$key}}]"
                                               type="text" value="{{$value}}">
                                    </div>
                                @else
                                    <select class="form-control " style="color: red" required="required"
                                            name="isdelegate[{{$key}}]">
                                        @if($value =="0")
                                            <option value="0" selected>否</option>
                                            <option value="1">是</option>
                                        @else
                                            <option value="0">否</option>
                                            <option value="1" selected>是</option>
                                        @endif
                                    </select>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @if(env("SITE_TYPE","")=="")
                        @foreach($k3lotterystatus as $key=>$value)
                            <h2 class="col-md-offset-5">{{$k3lotterystatus[$key]['name']}}</h2>
                            <hr/>
                            <div class="form-group">
                                <label class="control-label col-md-1">彩票状态</label>

                                @foreach($value as $k=>$v)
                                    @if($k=='status')
                                        <div class="col-md-1" style="padding: 0px;">
                                            <label class="form-control">{{$k}}:</label>
                                        </div>
                                        <div class="col-md-1" style="padding: 0px;">
                                            <select class="form-control" style="color: red" required="required"
                                                    name="k3lotterystatus[{{$key}}][{{$k}}]">
                                                @if($v=="0")
                                                    <option value="0" selected>关闭</option>
                                                    <option value="1">启用</option>
                                                @else
                                                    <option value="0">关闭</option>
                                                    <option value="1" selected>启用</option>
                                                @endif
                                            </select>
                                        </div>
                                    @else
                                        <div class="col-md-1" style="padding: 0px;">
                                            <label class="form-control">{{$k}}:</label>
                                        </div>
                                        <div class="col-md-1" style="padding: 0px;">
                                            <input class="form-control" required="required" readonly
                                                   name="k3lotterystatus[{{$key}}][{{$k}}]"
                                                   type="text" value="{{$v}}">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    @elseif (env('SITE_TYPE', '') == "five")
                        @foreach($fivelotterystatus as $key=>$value)
                            <h2 class="col-md-offset-5">{{$fivelotterystatus[$key]['name']}}</h2>
                            <hr/>
                            <div class="form-group">
                                <label class="control-label col-md-1">彩票状态</label>

                                @foreach($value as $k=>$v)
                                    @if($k=='status')
                                        <div class="col-md-1" style="padding: 0px;">
                                            <label class="form-control">{{$k}}:</label>
                                        </div>
                                        <div class="col-md-1" style="padding: 0px;">
                                            <select class="form-control" style="color: red" required="required"
                                                    name="fivelotterystatus[{{$key}}][{{$k}}]">
                                                @if($v=="0")
                                                    <option value="0" selected>关闭</option>
                                                    <option value="1">启用</option>
                                                @else
                                                    <option value="0">关闭</option>
                                                    <option value="1" selected>启用</option>
                                                @endif
                                            </select>
                                        </div>
                                    @else
                                        <div class="col-md-1" style="padding: 0px;">
                                            <label class="form-control">{{$k}}:</label>
                                        </div>
                                        <div class="col-md-1" style="padding: 0px;">
                                            <input class="form-control" required="required" readonly
                                                   name="fivelotterystatus[{{$key}}][{{$k}}]"
                                                   type="text" value="{{$v}}">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    @else
                        @foreach($k3lotterystatus as $key=>$value)
                            <h2 class="col-md-offset-5">{{$k3lotterystatus[$key]['name']}}</h2>
                            <hr/>
                            <div class="form-group">
                                <label class="control-label col-md-1">彩票状态</label>

                                @foreach($value as $k=>$v)
                                    @if($k=='status')
                                        <div class="col-md-1" style="padding: 0px;">
                                            <label class="form-control">{{$k}}:</label>
                                        </div>
                                        <div class="col-md-1" style="padding: 0px;">
                                            <select class="form-control" style="color: red" required="required"
                                                    name="k3lotterystatus[{{$key}}][{{$k}}]">
                                                @if($v=="0")
                                                    <option value="0" selected>关闭</option>
                                                    <option value="1">启用</option>
                                                @else
                                                    <option value="0">关闭</option>
                                                    <option value="1" selected>启用</option>
                                                @endif
                                            </select>
                                        </div>
                                    @else
                                        <div class="col-md-1" style="padding: 0px;">
                                            <label class="form-control">{{$k}}:</label>
                                        </div>
                                        <div class="col-md-1" style="padding: 0px;">
                                            <input class="form-control" required="required" readonly
                                                   name="k3lotterystatus[{{$key}}][{{$k}}]"
                                                   type="text" value="{{$v}}">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                        @foreach($fivelotterystatus as $key=>$value)
                            <h2 class="col-md-offset-5">{{$fivelotterystatus[$key]['name']}}</h2>
                            <hr/>
                            <div class="form-group">
                                <label class="control-label col-md-1">彩票状态</label>

                                @foreach($value as $k=>$v)
                                    @if($k=='status')
                                        <div class="col-md-1" style="padding: 0px;">
                                            <label class="form-control">{{$k}}:</label>
                                        </div>
                                        <div class="col-md-1" style="padding: 0px;">
                                            <select class="form-control" style="color: red" required="required"
                                                    name="fivelotterystatus[{{$key}}][{{$k}}]">
                                                @if($v=="0")
                                                    <option value="0" selected>关闭</option>
                                                    <option value="1">启用</option>
                                                @else
                                                    <option value="0">关闭</option>
                                                    <option value="1" selected>启用</option>
                                                @endif
                                            </select>
                                        </div>
                                    @else
                                        <div class="col-md-1" style="padding: 0px;">
                                            <label class="form-control">{{$k}}:</label>
                                        </div>
                                        <div class="col-md-1" style="padding: 0px;">
                                            <input class="form-control" required="required" readonly
                                                   name="fivelotterystatus[{{$key}}][{{$k}}]"
                                                   type="text" value="{{$v}}">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                        @foreach($ssclotterystatus as $key=>$value)
                            <h2 class="col-md-offset-5">{{$ssclotterystatus[$key]['name']}}</h2>
                            <hr/>
                            <div class="form-group">
                                <label class="control-label col-md-1">彩票状态</label>

                                @foreach($value as $k=>$v)
                                    @if($k=='status')
                                        <div class="col-md-1" style="padding: 0px;">
                                            <label class="form-control">{{$k}}:</label>
                                        </div>
                                        <div class="col-md-1" style="padding: 0px;">
                                            <select class="form-control" style="color: red" required="required"
                                                    name="ssclotterystatus[{{$key}}][{{$k}}]">
                                                @if($v=="0")
                                                    <option value="0" selected>关闭</option>
                                                    <option value="1">启用</option>
                                                @else
                                                    <option value="0">关闭</option>
                                                    <option value="1" selected>启用</option>
                                                @endif
                                            </select>
                                        </div>
                                    @else
                                        <div class="col-md-1" style="padding: 0px;">
                                            <label class="form-control">{{$k}}:</label>
                                        </div>
                                        <div class="col-md-1" style="padding: 0px;">
                                            <input class="form-control" required="required" readonly
                                                   name="ssclotterystatus[{{$key}}][{{$k}}]"
                                                   type="text" value="{{$v}}">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group col-md-5 col-md-offset-4">
                        {!! Form::submit('修改', ['class' => 'btn btn-success form-control col-md-offset-4']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
@section('script')
@stop