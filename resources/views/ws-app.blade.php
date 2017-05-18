<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
	<meta charset="utf-8">
	<title>@if($categories_data[$type]->getTranslate('meta_title')){{ $categories_data[$type]->getTranslate('meta_title') }} @else Гидробуд @endif</title>
	<meta name="description" content="@if($categories_data[$type]->getTranslate('meta_description')){{ $categories_data[$type]->getTranslate('meta_description') }} @else Предприятие проводит весь комплекс работ по строительству систем водоснабжения, водоотведения и канализации на всей территории Украины. @endif">
	<meta name="keywords" content="@if($categories_data[$type]->getTranslate('meta_keywords')){{ $categories_data[$type]->getTranslate('meta_keywords') }} @else Гидробуд @endif">

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
	<link href="{{ asset('/css/frontend/fonts.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('/css/frontend/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('/libs/unitegallery/dist/css/unite-gallery.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('/css/frontend/main.css') }}?ver={{ $version }}" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="{{ asset('/css/plugins/sweetalert.css') }}">
	{{-- /CSS --}}
	{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>--}}
</head>

<body>
	<div id="menu-toggle-open">Меню</div>
	<nav id="nav-toggle">
		<a href="/{{ App::getLocale() }}" class="nav-toggle_item @if(Request::is(App::getLocale())) active @endif">{{ trans('base.main') }}</a>
		<a href="/{{ App::getLocale() }}/company" class="nav-toggle_item @if(Request::is('*/company')) active @endif">{{ trans('base.company') }}</a>
		<a href="/{{ App::getLocale() }}/services" class="nav-toggle_item @if(Request::is('*/services')) active @endif">{{ trans('base.services') }}</a>
		<a href="/{{ App::getLocale() }}/projects" class="nav-toggle_item @if(Request::is('*/projects')) active @endif">{{ trans('base.project') }}</a>
		<a href="/{{ App::getLocale() }}/vacancies" class="nav-toggle_item @if(Request::is('*/vacancies')) active @endif">{{ trans('base.careers') }}</a>
		<a href="/{{ App::getLocale() }}/licenses" class="nav-toggle_item @if(Request::is('*/licenses')) active @endif">{{ trans('base.license') }}</a>
		<a href="/{{ App::getLocale() }}/contacts" class="nav-toggle_item @if(Request::is('*/contacts')) active @endif">{{ trans('base.contacts') }}</a>
		<div id="menu-toggle-close">Закрыть</div>
	</nav>

	@if(Request::is(App::getLocale()))
	<header class="header" style="background-image: url('{{ asset('/img/frontend/bg-main.jpg') }}')">
	@else
	<header class="header header_other" style="background-image: url('{{ asset('/img/frontend/bg-top.jpg') }}')">
	@endif
		<div class="container header-wrap">
			<div class="row">
				<div class="col-xs-5 col-sm-2 col-md-3">
					<a href="/{{ App::getLocale() }}"><img src="{{ asset('img/frontend/logo.png') }}" alt="Gidrobud" class="logo"></a>
				</div>
				<div class="col-xs-7 col-sm-10 col-md-9 xs-text-right">
					<div class="col-xs-12 col-sm-4 col-md-offset-2 col-md-3">
						<div class="address">
							<b>{{ trans('base.address') }}:<br>
							{!! $texts->get('address') !!}
							</b>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-offset-1 col-md-3">
						<div class="phone">
							<b>{{ trans('base.telephone') }}:<br>
							{{ $texts->get('telephone_one') }} <br>
							{{ $texts->get('telephone_second') }}<br>
							{{ $texts->get('telephone_third') }}</b>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="btn btn__yellow callback">{{ trans('base.callback') }}</div>
					</div>
					<div class="col-sm-12 col-md-12">
						<nav class="nav__blue">
							<a href="/{{ App::getLocale() }}" class="nav_item @if(Request::is(App::getLocale())) active @endif">{{ trans('base.main') }}</a>
							<a href="/{{ App::getLocale() }}/company" class="nav_item @if(Request::is('*/company')) active @endif">{{ trans('base.company') }}</a>
							<a href="/{{ App::getLocale() }}/services" class="nav_item @if(Request::is('*/services')) active @endif">{{ trans('base.services') }}</a>
							<a href="/{{ App::getLocale() }}/projects" class="nav_item @if(Request::is('*/projects')) active @endif">{{ trans('base.project') }}</a>
							<a href="/{{ App::getLocale() }}/vacancies" class="nav_item @if(Request::is('*/vacancies')) active @endif">{{ trans('base.careers') }}</a>
							<a href="/{{ App::getLocale() }}/licenses" class="nav_item @if(Request::is('*/licenses')) active @endif">{{ trans('base.license') }}</a>
							<a href="/{{ App::getLocale() }}/contacts" class="nav_item @if(Request::is('*/contacts')) active @endif">{{ trans('base.contacts') }}</a>
						</nav>
					</div>
				</div>
			</div>
			@if(Request::is(App::getLocale()))
				<div class="row">
					<div class="col-md-6">
						@if( count($main) !== 0 AND $categories_data['main']->active == 1)
							<h1 class="title section-title">{{ $main->getTranslate('title') }}</h1>
							{{--<h2 class="title section-subtitle">{{ $main->getTranslate('title') }}</h2>--}}
							<div class="section-description">
								{!! $main->getTranslate('short_description') !!}
							</div>
							<a href="/{{ App::getLocale() }}/company"><div class="btn btn__blue">{{ trans('base.more') }}</div></a>
						@endif
					</div>
				</div>
			@endif
		</div>
	</header>

@yield('content')

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-2 col-md-3">
				<div class="btn btn__yellow btn__footer callback">{{ trans('base.callback') }}</div>
			</div>
			<div class="col-sm-8 col-md-6">
				<nav class="footer_nav">
					<a href="/{{ App::getLocale() }}" class="footer_nav-item @if(Request::is(App::getLocale())) active @endif">{{ trans('base.main') }}</a>
					<a href="/{{ App::getLocale() }}/company" class="footer_nav-item @if(Request::is('*/company')) active @endif">{{ trans('base.company') }}</a>
					<a href="/{{ App::getLocale() }}/services" class="footer_nav-item @if(Request::is('*/services')) active @endif">{{ trans('base.services') }}</a>
					<a href="/{{ App::getLocale() }}/projects" class="footer_nav-item @if(Request::is('*/projects')) active @endif">{{ trans('base.project') }}</a>
					<a href="/{{ App::getLocale() }}/vacancies" class="footer_nav-item @if(Request::is('*/vacancies')) active @endif">{{ trans('base.careers') }}</a>
					<a href="/{{ App::getLocale() }}/licenses" class="footer_nav-item @if(Request::is('*/licenses')) active @endif">{{ trans('base.license') }}</a>
					<a href="/{{ App::getLocale() }}/contacts" class="footer_nav-item @if(Request::is('*/contacts')) active @endif">{{ trans('base.contacts') }}</a>
				</nav>
			</div>
			<div class="col-sm-2 col-md-3">
				<img class="footer_logo" src="{{ asset('/img/frontend/logo.png') }}" alt="Gidrobud">
			</div>
		</div>
	</div>
</footer>

<div id="callback" style="display: none;">
	<h1 class="title section-title section-title_service-form">{{ trans('base.callback_ring') }}</h1>
	<form action="" class="callback" method="post">
		<input type="text" name="name" placeholder="{{ trans('base.fio') }}">
		<input type="number" name="phone" placeholder="{{ trans('base.tel') }}">
		<textarea rows="8" name="text" placeholder="{{ trans('base.message') }}"></textarea>
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<button type="submit" id="submit-send" class="btn btn__blue">{{ trans('base.send') }}</button>
	</form>
</div>

<div id="overlay"></div><!-- Пoдлoжкa -->
<input type="hidden" name="url" value="/{{ App::getLocale() }}/contact"/>
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
	<script src="{{ asset('/libs/unitegallery/dist/js/unitegallery.js') }}"></script>
	<script src="{{ asset('/libs/unitegallery/dist/themes/tilesgrid/ug-theme-tilesgrid.js') }}"></script>
	<script src="{{ asset('/js/frontend/common.js') }}?ver={{ $version }}"></script>
	<script src="{{ asset('/libs/owl-carousel/owl.carousel.min.js') }}"></script>


{{-- JS --}}
</body>
</html>