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
                            {!! Form::open(['url' => '/savemarquee', 'class' => 'form-horizontal', 'role' => 'form'])
                            !!}
                            <h2 class="col-md-offset-5">和值</h2>
                            <hr/>
                            <div class="form-group">

                            </div>
                            <div class="form-group col-md-10 col-md-offset-1">
                                {!! Form::submit('修改', ['class' => 'btn btn-success form-control']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
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