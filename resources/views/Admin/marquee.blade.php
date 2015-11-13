@extends('Layout.backmaster')

@section('title')
    滚动文字
@stop

@section('content')
    <div>
        @include('errors.list')
        <h2 class="col-md-offset-5">滚动文字设置</h2>
        <hr/>
        {!! Form::open(['url' => '/savemarquee', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="form-group col-md-10 col-md-offset-1">
            <textarea class="form-control" name="marquee" rows="5">{{$marquee}}</textarea>
        </div>
        <br>
        <div class="form-group col-md-10 col-md-offset-1">
            {!! Form::submit('修改', ['class' => 'btn btn-success form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop
@section('script')
    {{--<script type="text/javascript" src="/js/collect.js"></script>--}}
@stop