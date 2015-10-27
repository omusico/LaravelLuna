@extends('Layout.backmaster')

@section('title')
    快三赔率
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">赔率设置</div>
                    <div class="panel-body">
                        @include('errors.list')
                        <div class="form-group">
                            {!! Form::open(['url' => '/savek3odds', 'class' => 'form-horizontal', 'role' => 'form'])
                            !!}
                            @foreach($odds as $key=>$value)
                                @if($key=='HZ')
                                    <h2 class="col-md-offset-5">{{$types[$key]['name']}}</h2>
                                    <hr/>
                                    <div class="form-group">
                                        @foreach($value as $k=>$v)
                                            <label class="control-label col-md-1">{{$k}}</label>
                                            <div class="col-md-1" style="padding: 0px">
                                                <input class="form-control" required="required"
                                                       name="odds[{{$key}}][{{$k}}]"
                                                       type="text" value="{{$v}}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">单双大小</label>
                                        <label class="control-label col-md-2">最低单期下注</label>

                                        <div class="col-md-1" style="padding: 0px">
                                            <input class="form-control" required="required"
                                                   name="chipins[{{$key}}][dsdx_low]"
                                                   value="{{$chipins[$key]['dsdx_low']}}">
                                        </div>
                                        <label class="control-label col-md-2">最高单期下注</label>

                                        <div class="col-md-1" style="padding: 0px">
                                            <input class="form-control" required="required"
                                                   name="chipins[{{$key}}][dsdx_hight]"
                                                   value="{{$chipins[$key]['dsdx_hight']}}">
                                        </div>
                                    </div>
                                @elseif($key=='TX')
                                    <h2 class="col-md-offset-5">{{$types[$key]['name']}}</h2>
                                    <hr/>
                                    <div class="form-group">
                                        @foreach($value as $k=>$v)
                                            <label class="control-label col-md-1">{{$k}}</label>
                                            <div class="col-md-1" style="padding: 0px">
                                                <input class="form-control" required="required"
                                                       name="odds[{{$key}}][{{$k}}]"
                                                       type="text" value="{{$v}}">
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <h2 class="col-md-offset-5">{{$types[$key]['name']}}</h2>
                                    <hr/>
                                    <div class="form-group">
                                        <label class="control-label col-md-1">赔率</label>

                                        <div class="col-md-1" style="padding: 0px">
                                            <input class="form-control" required="required"
                                                   name="odds[{{$key}}][value]"
                                                   type="text" value="{{$value['value']}}">
                                        </div>
                                        @foreach($value as $k=>$v)
                                            @if($k!='value')
                                                <div class="col-md-1" style="padding: 0px;display: none">
                                                    <input class="form-control" required="required"
                                                           name="odds[{{$key}}][{{$k}}]"
                                                           type="text" value="{{$v}}">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="control-label col-md-2">最低单期下注</label>

                                    <div class="col-md-1" style="padding: 0px">
                                        <input class="form-control" required="required"
                                               name="chipins[{{$key}}][low]"
                                               value="{{$chipins[$key]['low']}}">
                                    </div>
                                    <label class="control-label col-md-2">最高单期下注</label>

                                    <div class="col-md-1" style="padding: 0px">
                                        <input class="form-control" required="required"
                                               name="chipins[{{$key}}][hight]"
                                               value="{{$chipins[$key]['hight']}}">
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group col-md-5 col-md-offset-4">
                                {!! Form::submit('修改', ['class' => 'btn btn-success form-control col-md-offset-4']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            @include('Admin.right_bar')
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript" src="/js/collect.js"></script>
@stop