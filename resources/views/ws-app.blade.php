<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
	<meta charset="utf-8">
	<title>	@if(isset($static_page)){{ $static_page->getTranslate('meta_title') }}  @elseif(isset($seo)) {{ $seo->getTranslate('meta_title') }} @endif</title>
	<meta name="description" content="@if(isset($static_page)) {{ $static_page->getTranslate('meta_description') }} @elseif(isset($seo)){{ $seo->getTranslate('meta_description') }}@endif">
	<meta name="keywords" content="@if(isset($static_page)) {{ $static_page->getTranslate('meta_keywords') }} @elseif(isset($seo)) {{ $seo->getTranslate('meta_keywords') }}@endif">

	{{-- CSS --}}
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<link rel="shortcut icon" href="{{ asset('/img/favicon/favicon.ico') }}" type="image/x-icon">
	<link rel="apple-touch-icon" href="{{ asset('/img/favicon/apple-touch-icon.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon/apple-touch-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/img/favicon/apple-touch-icon-114x114.png') }}">


	<link href="{{ asset('/libs/normalize.css/normalize.css') }}" rel="stylesheet" type="text/css" media="all">
	<link href="{{ asset('/libs/bootstrap-grid-only/css/grid12.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('/libs/owl-carousel/owl.carousel.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('/libs/owl-carousel/owl.theme.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('/css/frontend/fonts.css"') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('/css/frontend/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('/css/frontend/main.css') }}?ver={{ $version }}" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="{{ asset('/css/plugins/sweetalert.css') }}">
	{{-- /CSS --}}
	{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>--}}
</head>

<body>

<header class="header" style="background-image: url('{{ asset('/img/frontend/bg-main.jpg') }}')">
	<div class="container header-wrap">
		<div class="row">
			<div class="col-md-3">
				<a href="index.html"><img src="{{ asset('img/frontend/logo.png') }}" alt="Gidrobud" class="logo"></a>
			</div>
			<div class="col-md-9">
				<div class="col-md-offset-2 col-md-3">
					<div class="address"><b>{{ trans('base.address') }}:</b> <br>
						{{ $texts->get('address') }}
					</div>
				</div>
				<div class="col-md-offset-1 col-md-3">
					<div class="phone">
						<b>{{ trans('base.telephone') }}:</b><br>
						{{ $texts->get('telephone_one') }} <br>
						{{ $texts->get('telephone_second') }}
					</div>
				</div>
				<div class="col-md-3">
					<div class="btn btn__yellow callback">{{ trans('base.callback') }}</div>
				</div>
				<div class="col-md-12">
					<nav class="nav__blue">
						<a href="index.html" class="nav_item active">{{ trans('base.main') }}</a>
						<a href="about-us.html" class="nav_item">{{ trans('base.company') }}</a>
						<a href="services.html" class="nav_item">{{ trans('base.services') }}</a>
						<a href="project.html" class="nav_item">{{ trans('base.project') }}</a>
						<a href="vacantions.html" class="nav_item">{{ trans('base.careers') }}</a>
						<a href="license.html" class="nav_item">{{ trans('base.license') }}</a>
						<a href="contact.html" class="nav_item">{{ trans('base.contacts') }}</a>
					</nav>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				@if( count($main) !== 0 AND $categories_data['main']->active == 1)
					<h1 class="title section-title">{{ $main->getTranslate('title') }}</h1>
					{{--<h2 class="title section-subtitle">{{ $main->getTranslate('title') }}</h2>--}}
					<div class="section-description">
						{!! $main->getTranslate('short_description') !!}
					</div>
					<a href="services.html"><div class="btn btn__blue">{{ trans('base.more') }}</div></a>
				@endif
			</div>
		</div>
	</div>
</header>

@yield('content')

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="btn btn__yellow btn__footer callback">{{ trans('base.callback') }}</div>
			</div>
			<div class="col-md-6">
				<nav class="footer_nav">
					<a href="index.html" class="footer_nav-item active">{{ trans('base.main') }}</a>
					<a href="about-us.html" class="footer_nav-item">{{ trans('base.company') }}</a>
					<a href="services.html" class="footer_nav-item">{{ trans('base.services') }}</a>
					<a href="project.html" class="footer_nav-item">{{ trans('base.project') }}</a>
					<a href="vacantions.html" class="footer_nav-item">{{ trans('base.careers') }}</a>
					<a href="license.html" class="footer_nav-item">{{ trans('base.license') }}</a>
					<a href="contact.html" class="footer_nav-item">{{ trans('base.contacts') }}</a>
				</nav>
			</div>
			<div class="col-md-3">
				<img class="footer_logo" src="{{ asset('/img/logo.png') }}" alt="Gidrobud">
			</div>
		</div>
	</div>
</footer>

<div id="callback" style="display: none;">
	<h1 class="title section-title section-title_service-form">Обратный звонок</h1>
	<form action="" id="vacantion-form-1" method="post">
		<input type="text" name="name" placeholder="ФИО">
		<input type="number" name="phone" placeholder="Телефон">
		<textarea rows="8" name="text" placeholder="Cообщение"></textarea>
		<button type="submit" id="vacantion-send-1" class="btn btn__blue">отправить</button>
	</form>
</div>

<div id="overlay"></div><!-- Пoдлoжкa -->

{{--Файл переводов--}}
<script>
	var trans = {
		'base.success': '{{ trans('base.success_send_contact') }}',
		'base.error': '{{ trans('base.error_send_contact') }}',
	};
</script>
{{--Файл переводов--}}
{{-- JS --}}
	<script src="{{ asset('/libs/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/sweetalert.min.js') }}"></script>
{{--
	<script src="{{ asset('/js/frontend/jquery-3.1.1.min.js') }}"></script>
--}}
	<script src="{{ asset('/js/frontend/common.js') }}?ver={{ $version }}"></script>
	<script src="{{ asset('/libs/owl-carousel/owl.carousel.min.js') }}"></script>


{{-- JS --}}
</body>
</html>