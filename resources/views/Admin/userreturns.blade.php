@extends('Layout.backmaster')

@section('title')
    返水设置
@stop

@section('content')
    <div class="container">
        <div class="row">
            @include('Admin.back_left_bar')
            <div class="col-md-10">
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
                            <div class="form-group col-md-5 col-md-offset-4">
                                {!! Form::submit('修改', ['class' => 'btn btn-success form-control col-md-offset-4']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript" src="/js/collect.js"></script>
@stop