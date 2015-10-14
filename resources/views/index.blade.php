@extends('master')

@section('content')
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" xmlns="http://www.w3.org/1999/html">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="http://images.apple.com/cn/macbook-air/images/overview_hero_hero.jpg" alt="...">

                <div class="carousel-caption">
                    <p>11 英寸 MacBook Air 充电一次可运行长达 9 小时，而 13 英寸机型则可运行长达 12 小时。</p>
                </div>
            </div>
            <div class="item">
                <img src="http://images.apple.com/cn/macbook-air/images/overview_processor_hero.jpg" alt="...">

                <div class="carousel-caption">
                    <p>无论是什么任务，配备 Intel HD Graphics 5000 图形处理器的第四代 Intel Core 处理器都能应对自如。</p>
                </div>
            </div>
            <div class="item">
                <img src="http://images.apple.com/cn/macbook-air/images/overview_wireless_hero_enhanced.png" alt="...">

                <div class="carousel-caption">
                    <p>有了新一代 802.11ac 技术，MacBook Air 令 Wi-Fi 速度超越极限。</p>
                </div>
            </div>
        </div>

        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">test1</div>
            <div class="col-md-4"></div>
            <div class="col-md-4">test3</div>
        </div>

    </div>
@stop