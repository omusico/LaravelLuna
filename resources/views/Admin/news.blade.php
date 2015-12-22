@extends('Layout.backmaster')

@section('title')
    前台优惠消息
@stop

@section('content')
    <div>
        @include('errors.list')
        <h2 class="col-md-offset-5">新闻设置</h2>
        <hr/>
        {!! Form::open(['url' => '/savenews', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="form-group">
            <div class="col-md-5" style="padding: 0px">
                <input class="form-control"
                       name="news[1][title]"
                       value="{{isset($news[1]['title'])?$news[1]['title']:''}}" placeholder="输入新闻标题">
            </div>
            <div class="col-md-5" style="padding: 0px">
                <input class="form-control"
                       name="news[1][url]"
                       value="{{isset($news[1]['url'])?$news[1]['url']:''}}" placeholder="输入新闻链接">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-5" style="padding: 0px">
                <input class="form-control"
                       name="news[2][title]"
                       value="{{isset($news[2]['title'])?$news[2]['title']:''}}" placeholder="输入新闻标题">
            </div>
            <div class="col-md-5" style="padding: 0px">
                <input class="form-control"
                       name="news[2][url]"
                       value="{{isset($news[2]['url'])?$news[2]['url']:''}}" placeholder="输入新闻链接">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-5" style="padding: 0px">
                <input class="form-control"
                       name="news[3][title]"
                       value="{{isset($news[3]['title'])?$news[3]['title']:''}}" placeholder="输入新闻标题">
            </div>
            <div class="col-md-5" style="padding: 0px">
                <input class="form-control"
                       name="news[3][url]"
                       value="{{isset($news[3]['url'])?$news[3]['url']:''}}" placeholder="输入新闻链接">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-5" style="padding: 0px">
                <input class="form-control"
                       name="news[4][title]"
                       value="{{isset($news[4]['title'])?$news[4]['title']:''}}" placeholder="输入新闻标题">
            </div>
            <div class="col-md-5" style="padding: 0px">
                <input class="form-control"
                       name="news[4][url]"
                       value="{{isset($news[4]['url'])?$news[4]['url']:''}}" placeholder="输入新闻链接">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-5" style="padding: 0px">
                <input class="form-control"
                       name="news[5][title]"
                       value="{{isset($news[5]['title'])?$news[5]['title']:''}}" placeholder="输入新闻标题">
            </div>
            <div class="col-md-5" style="padding: 0px">
                <input class="form-control"
                       name="news[5][url]"
                       value="{{isset($news[5]['url'])?$news[5]['url']:''}}" placeholder="输入新闻链接">
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
    {{--<script type="text/javascript" src="/js/collect.js"></script>--}}
@stop