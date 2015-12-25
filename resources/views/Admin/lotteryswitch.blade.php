@extends('Layout.backmaster')

@section('title')
    维护开头
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-switch.min.css') }}">
@stop

@section('content')
    <div>
        @include('errors.list')
        <h2 class="col-md-offset-5">维护开关</h2>
        <hr/>
        {!! Form::open(['url' => '/savenews', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="form-group">
            <div class="col-md-5" style="padding: 0px">
                <div class="switch switch-large">
                    <input type="checkbox" checked/>
                </div>
            </div>
        </div>
        <br>
        <br>

        <div class="form-group col-md-5 col-md-offset-4">
            {!! Form::submit('修改', ['class' => 'btn btn-success form-control col-md-offset-4']) !!}
        </div>
        {!! Form::close() !!}

    </div>
@stop
@section('script')
    <script type="text/javascript" src="/js/bootstrap-switch.min.js"></script>
@stop