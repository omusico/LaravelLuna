<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="彩票合买,快三">
    <meta name="Description" content="中国快三网彩票购买平台提供快三的彩票，是一家服务于中国彩民的互联网彩票合买代购交易平台，是当前中国彩票互联网交易行业的领导者。">
	<title> @yield('title') </title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/all.css') }}">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				@if(Auth::guest())
					<a class="navbar-brand" href="/">后台管理</a>
				@else
                        @if (Auth::user()->is_admin)
						<a class="navbar-brand" href="/admin">后台管理</a>
					@else
						<a class="navbar-brand" href="/">后台管理</a>
					@endif
				@endif

			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="http://www.golaravel.com" target="__blank">Power by laravel5</a></li>
			</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/logout') }}">退出</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		@include('flash')
	</div>

	@yield('content')

<!-- script -->
<script type="text/javascript" src="/js/all.js"></script>
</body>
</html>