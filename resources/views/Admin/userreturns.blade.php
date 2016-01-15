@extends('Layout.backmaster')

@section('title')
    返水设置
@stop

@section('content')
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">返水设置</div>
            <div class="panel-body">
                @include('errors.list')
                <div class="form-group">
                    {!! Form::open(['url' => '/saveuserreturns', 'class' => 'form-horizontal', 'role' => 'form'])
                    !!}
                    @foreach($userreturns as $key=>$value)
                        <div class="form-group">
                            <label class="control-label col-md-2">最小金额</label>

                            <div class="col-md-1" style="padding: 0px">
                                <input class="form-control" required="required"
                                       name="userreturns[{{$key}}][min]"
                                       value="{{$value['min']}}">
                            </div>
                            <label class="control-label col-md-2">最大金额</label>

                            <div class="col-md-1" style="padding: 0px">
                                <input class="form-control" required="required"
                                       name="userreturns[{{$key}}][max]"
                                       value="{{$value['max']}}">
                            </div>
                            <label class="control-label col-md-1">赔率</label>

                            <div class="col-md-1" style="padding: 0px">
                                <input class="form-control" required="required"
                                       name="userreturns[{{$key}}][rate]"
                                       type="text" value="{{$value['rate']}}">
                            </div>
                        </div>
                    @endforeach
                    <?php
                        if(isset($userreturns[6])){

                        }else{
                            $userreturns[6]["min"]="";
                            $userreturns[6]["max"]="";
                            $userreturns[6]["rate"]="";
                        }
                    ?>
                    <div class="form-group">
                        <label class="control-label col-md-2">最小金额</label>

                        <div class="col-md-1" style="padding: 0px">
                            <input class="form-control" required="required"
                                   name="userreturns[6][min]"
                                   value="{{$userreturns[6]['min']}}">
                        </div>
                        <label class="control-label col-md-2">最大金额</label>

                        <div class="col-md-1" style="padding: 0px">
                            <input class="form-control" required="required"
                                   name="userreturns[6][max]"
                                   value="{{$userreturns[6]['max']}}">
                        </div>
                        <label class="control-label col-md-1">赔率</label>

                        <div class="col-md-1" style="padding: 0px">
                            <input class="form-control" required="required"
                                   name="userreturns[6][rate]"
                                   type="text" value="{{$userreturns[6]['rate']}}">
                        </div>
                    </div>
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