@extends('Layout.backmaster')

@section('title')
    支付方式
@stop

@section('content')
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">支付设置</div>
            <div class="panel-body">
                @include('errors.list')
                <div class="form-group">
                    {!! Form::open(['url' => '/saveuserlevel', 'class' => 'form-horizontal', 'role' => 'form'])
                    !!}
                    @foreach($userlevels as $key=>$value)
                        <hr/>
                        <div class="form-group" id="{{$key}}">
                            {{--<label class="control-label col-md-1">{{$key}}</label>--}}
                            <input value="{{$key}}" type="hidden" name="key">
                            <label class="control-label col-md-1">
                                支付ID-({{$key}})
                            </label>
                            <label class="control-label col-md-1">
                                类型
                            </label>

                            <div class="col-md-1" style="padding: 0px">
                                <input class="form-control" required="required"
                                       name="userlevel[{{$key}}][typeName]"
                                       type="text" value="{{$value['typeName']}}">
                            </div>
                            <label class="control-label col-md-1">
                                名称
                            </label>

                            <div class="col-md-1" style="padding: 0px">
                                <input class="form-control" required="required"
                                       name="userlevel[{{$key}}][name]"
                                       type="text" value="{{$value['name']}}">
                            </div>
                            <label class="control-label col-md-1">
                                商户id
                            </label>

                            <div class="col-md-1" style="padding: 0px">
                                <input class="form-control" required="required"
                                       name="userlevel[{{$key}}][id]"
                                       type="text" value="{{$value['id']}}">
                            </div>
                            <label class="control-label col-md-1">
                                密钥
                            </label>

                            <div class="col-md-3" style="padding: 0px">
                                <input class="form-control" required="required"
                                       name="userlevel[{{$key}}][key]"
                                       type="text" value="{{$value['key']}}">
                            </div>
                            <label class="control-label col-md-2">
                                返回地址
                            </label>
                            <div class="col-md-7" style="padding: 0px">
                                <input class="form-control" required="required"
                                       name="userlevel[{{$key}}][returnurl]"
                                       type="text" value="{{$value['returnurl']}}">
                            </div>
                            <div class="col-md-2 col-md-offset-1" style="padding: 0px">
                                <a class="btn btn-danger" onclick="javascript:removethis({{$key}});">删除</a>
                                <a class="btn btn-success" onclick="javascript:addthis();">添加</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group col-md-5 col-md-offset-4" style="padding-top: 50px">
                        {!! Form::submit('保存', ['class' => 'btn btn-success form-control col-md-offset-4']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
@section('script')
    {{--<script type="text/javascript" src="/js/collect.js"></script>--}}
    <script type="text/javascript">
        function removethis(key) {
            $("#" + key).remove();
        }
        function addthis() {
            lastvalue = $("input[name=key]").last().val();
            newkey = parseInt(lastvalue) + 1;
            var html = '';
            html += '<div class="form-group" id="' + newkey + '">';
            html += '<input value="' + newkey + '" type="hidden" name="key">';
            html += '<label class = "control-label col-md-1" > 支付ID - (' + newkey + ') </label>';
            html += '<label class = "control-label col-md-1" > 类型 </label>';
            html += '<div class = "col-md-1" style = "padding: 0px"> <input class = "form-control" required = "required" name = "userlevel[' + newkey + '][typeName]" type = "text" value = ""> </div>';
            html += '<label class = "control-label col-md-1" > 名称 </label> ';
            html += '<div class = "col-md-1" style = "padding: 0px" > <input class = "form-control" required = "required" name = "userlevel[' + newkey + '][name]" type = "text" value = ""> </div>';
            html += '<label class = "control-label col-md-1" > 商户id </label > ';
            html += '<div class = "col-md-1" style = "padding: 0px" > <input class = "form-control" required = "required" name = "userlevel[' + newkey + '][id]" type = "text" value = ""> </div>';
            html += '<label class = "control-label col-md-1"> 密钥</label >';
            html += '<div class = "col-md-3" style = "padding: 0px"> <input class = "form-control" required = "required" name = "userlevel[' + newkey + '][key]" type = "text" value = ""> </div><br/>';
            html += '<label class = "control-label col-md-2">返回地址</label>';
//            html +='<div class="col-md-7" style="padding: 0px"> <input class="form-control" required="required" name="userlevel['+newkey+'][returnurl]" type="text" value=""> </div> <div class="col-md-2 col-md-offset-1" style="padding: 0px"> <a class="btn btn-danger" onclick="javascript:removethis('+newkey+');">删除</a> <a class="btn btn-success" onclick="javascript:addthis();">添加</a> </div>';
            html += '<div class = "col-md-7" style = "padding: 0px"> <input class = "form-control" required = "required" name = "userlevel[' + newkey + '][returnurl]" type = "text" value=""></div>';
            html += '<div class = "col-md-2 col-md-offset-1" style="padding: 0px" > <a class = "btn btn-danger" onclick = "javascript:removethis(' + newkey + ');" > 删除 </a> <a class = "btn btn-success" onclick = "javascript:addthis();"> 添加 </a> </div></div>';
            $("#" + lastvalue).after(html);
        }
    </script>
@stop