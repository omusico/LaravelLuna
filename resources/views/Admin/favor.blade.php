@extends('Layout.backmaster')

@section('title')
    优惠活动细则
@stop

@section('content')
    <div>
        @include('errors.list')
        <h2 class="col-md-offset-5">优惠活动细则</h2>
        <hr/>
        {!! Form::open(['url' => '/savefavor', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="form-group col-md-10 col-md-offset-1">
            <textarea class="form-control" name="favor" rows="20">{{$favor}}</textarea>
        </div>
        <br>
        <br>

        <div class="form-group col-md-10 col-md-offset-1">
            {!! Form::submit('修改', ['class' => 'btn btn-success form-control']) !!}
        </div>
        {!! Form::close() !!}

    </div>
@stop
