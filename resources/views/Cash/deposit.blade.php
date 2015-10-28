@extends('Layout.master')

@section('title')
    提款申请
@stop

@section('content')
    <div class="container">
        <aside class="col-md-3" style="padding-left: 0px">
            @include('User.left_bar')
        </aside>
        <main class="col-md-9">
            @include('errors.list')
            <h2 class="col-md-offset-4">提款申请</h2><br><br>
            {!! Form::open(['url' => '/apply', 'class' => 'navbar-form navbar-left', 'role' => 'search']) !!}
            <div class="form-group col-md-9">
                <div class="form-group col-md-9">
                    {!! Form::label('cashPwd', '提款密码: ', ['class' => 'control-label col-md-3','style'=>'padding:0px'])
                    !!}
                    {!! Form::selectRange('cashPwd[0]',0,9,0,['class' => '']) !!}
                    {!! Form::selectRange('cashPwd[1]',0,9,0,['class' => '']) !!}
                    {!! Form::selectRange('cashPwd[2]',0,9,0,['class' => '']) !!}
                    {!! Form::selectRange('cashPwd[3]',0,9,0,['class' => '']) !!}
                </div>
                <div class="form-class col-md-9">
                    <input name="sn" type="hidden"
                           value="{{date("YmdHis")}}">
                    {!! Form::label('amounts', '取款金额: ', ['class' => 'control-label col-md-3','style'=>'padding:0px'])
                    !!}
                    {!! Form::input('number','amounts', 100, ['class' => 'form-control col-md-4', 'placeholder'
                    =>'金额','required']) !!}
                </div>
                {{--{!! Form::password('cashPwd', ['class' => 'form-control', 'placeholder'=>'输入四位的数字提款密码','required']) !!}--}}
            </div>
            {!! Form::submit('提款申请', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            <div>
                <table class="table table-hover">
                    <tr>
                        <td>流水号</td>
                        <td>金额</td>
                        <td>提款时间</td>
                        <td>手续费</td>
                        <td>状态</td>
                    </tr>
                    @if (count($lu_lottery_applys))
                        @foreach ($lu_lottery_applys as $lu_lottery_apply)
                            <tr>
                                <td>{{ $lu_lottery_apply->sn }}</td>
                                <td>{{ $lu_lottery_apply->amounts }}</td>
                                <td>{{ $lu_lottery_apply->created_at }}</td>
                                <td>{{ $lu_lottery_apply->fees }}</td>
                                <td>@if( $lu_lottery_apply->status ==2)
                                        未通过
                                    @else
                                        <a style="color: green;">通过</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
                <?php echo $lu_lottery_applys->render(); ?>
            </div>
        </main>
    </div>
@stop
@section('script')
    <script type="text/javascript" src="/js/collect.js"></script>
@stop