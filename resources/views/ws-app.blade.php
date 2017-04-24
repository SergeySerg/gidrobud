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

<header class="header" style="background-image: url('/img/bg-main.jpg')">
	<div class="container header-wrap">
		<div class="row">
			<div class="col-md-3">
				<a href="index.html"><img src="img/logo.png" alt="Gidrobud" class="logo"></a>
			</div>
			<div class="col-md-9">
				<div class="col-md-offset-2 col-md-3">
					<div class="address"><b>Адрес:</b> <br>
						г. Киев <br>
						ул. Шевченко, 17</div>
				</div>
				<div class="col-md-offset-1 col-md-3">
					<div class="phone">
						<b>Телефон:</b><br>
						+38 (044) 00-00-00 <br>
						+38 (044) 11-11-00
					</div>
				</div>
				<div class="col-md-3">
					<div class="btn btn__yellow callback">заказать звонок</div>
				</div>
				<div class="col-md-12">
					<nav class="nav__blue">
						<a href="index.html" class="nav_item active">Главная</a>
						<a href="about-us.html" class="nav_item">О компании</a>
						<a href="services.html" class="nav_item">Услуги</a>
						<a href="project.html" class="nav_item">Проекты</a>
						<a href="vacantions.html" class="nav_item">Вакансии</a>
						<a href="license.html" class="nav_item">Лицензии</a>
						<a href="contact.html" class="nav_item">Контакты</a>
					</nav>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h1 class="title section-title">Изготовление</h1>
				<h2 class="title section-subtitle">водонапорных башен</h2>
				<div class="section-description">На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестоимости но в это же время </div>
				<a href="services.html"><div class="btn btn__blue">подробнее</div></a>
			</div>
		</div>
	</div>
</header>

<div class="advertising-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="statistic clearfix">
					<li class="col-md-3 statistic-item-wrap">
						<div class="statistic-item" style="background-image: url('/img/tower.png');">
							<div class="statistic-item_number">58</div>
							<div class="statistic-item_subtitle">изготовлено</div>
							<div class="statistic-item_subscribe">водонапорных башень</div>
						</div>
					</li>
					<li class="col-md-3 statistic-item-wrap">
						<div class="statistic-item" style="background-image: url('/img/crane.png');">
							<div class="statistic-item_number">58</div>
							<div class="statistic-item_subtitle">изготовлено</div>
							<div class="statistic-item_subscribe">водонапорных башень</div>
						</div>
					</li>
					<li class="col-md-3 statistic-item-wrap">
						<div class="statistic-item" style="background-image: url('/img/wrench.png');">
							<div class="statistic-item_number">58</div>
							<div class="statistic-item_subtitle">изготовлено</div>
							<div class="statistic-item_subscribe">водонапорных башень</div>
						</div>
					</li>
					<li class="col-md-3 statistic-item-wrap">
						<div class="statistic-item" style="background-image: url('/img/builder.png');">
							<div class="statistic-item_number">58</div>
							<div class="statistic-item_subtitle">изготовлено</div>
							<div class="statistic-item_subscribe">водонапорных башень</div>
						</div>
					</li>
				</ul>
				<div class="shadow-block"></div>
			</div>
		</div>
	</div>
</div>

<div class="project-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 center">
				<h1 class="title section-title section-title_projects">Наши проекты</h1>
			</div>
			<div class="col-md-3 project-item_wrap">
				<a href="#" class="project-item show-project-item" data-project-id="1">
					<div class="project-item_img" style="background-image: url('/img/project-test.jpg');"></div>
					<h3 class="project-item_title">Название</h3>
					<div class="project-item_description">
						Обьем - 113м.кб.<br>
						Дополнительное описание
					</div>
				</a>
			</div>
			<div class="col-md-3 project-item_wrap">
				<a href="#" class="project-item show-project-item" data-project-id="2">
					<div class="project-item_img" style="background-image: url('/img/project-test.jpg');"></div>
					<h3 class="project-item_title">Название</h3>
					<div class="project-item_description">
						Обьем - 113м.кб.<br>
						Дополнительное описание
					</div>
				</a>
			</div>
			<div class="col-md-3 project-item_wrap">
				<a href="#" class="project-item show-project-item" data-project-id="3">
					<div class="project-item_img" style="background-image: url('/img/project-test.jpg');"></div>
					<h3 class="project-item_title">Название</h3>
					<div class="project-item_description">
						Обьем - 113м.кб.<br>
						Дополнительное описание
					</div>
				</a>
			</div>
			<div class="col-md-3 project-item_wrap">
				<a href="#" class="project-item show-project-item" data-project-id="4">
					<div class="project-item_img" style="background-image: url('/img/project-test.jpg');"></div>
					<h3 class="project-item_title">Название</h3>
					<div class="project-item_description">
						Обьем - 113м.кб.<br>
						Дополнительное описание
					</div>
				</a>
			</div>
			<div class="col-md-3 project-item_wrap">
				<a href="#" class="project-item show-project-item" data-project-id="5">
					<div class="project-item_img" style="background-image: url('/img/project-test.jpg');"></div>
					<h3 class="project-item_title">Название</h3>
					<div class="project-item_description">
						Обьем - 113м.кб.<br>
						Дополнительное описание
					</div>
				</a>
			</div>
			<div class="col-md-3 project-item_wrap">
				<a href="#" class="project-item show-project-item" data-project-id="6">
					<div class="project-item_img" style="background-image: url('/img/project-test.jpg');"></div>
					<h3 class="project-item_title">Название</h3>
					<div class="project-item_description">
						Обьем - 113м.кб.<br>
						Дополнительное описание
					</div>
				</a>
			</div>
			<div class="col-md-3 project-item_wrap">
				<a href="#" class="project-item  show-project-item" data-project-id="7">
					<div class="project-item_img" style="background-image: url('/img/project-test.jpg');"></div>
					<h3 class="project-item_title">Название</h3>
					<div class="project-item_description">
						Обьем - 113м.кб.<br>
						Дополнительное описание
					</div>
				</a>
			</div>
			<div class="col-md-3 project-item_wrap">
				<a href="#" class="project-item  show-project-item" data-project-id="8">
					<div class="project-item_img" style="background-image: url('/img/project-test.jpg');"></div>
					<h3 class="project-item_title">Название</h3>
					<div class="project-item_description">
						Обьем - 113м.кб.<br>
						Дополнительное описание
					</div>
				</a>
			</div>
			<div class="col-md-12">
				<a href="project.html"><div class="btn btn__blue btn__center">все проекты</div></a>
			</div>
		</div>
		<div class="project-popup_wrap clearfix" data-popup-id="1">
			<img class="project-popup_item-img" src="/img/project-test.jpg" alt="Item">
			<div class="col-md-3">
				<h3 class="project-item_title project-item_title-in-popup">Название</h3>
				<div class="project-item_description">
					Обьем - 113м.кб.<br>
					Дополнительное описание
				</div>
			</div>
			<div class="col-md-9">
				<div class="project-item_full-description">
					На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестоимости но в это же время стоимость их услуг по монтажу их продукции у таких компаний доходит до половины от стоимости самой изготовляемой  продукции.
				</div>
			</div>
		</div>
		<div class="project-popup_wrap clearfix" data-popup-id="2">
			<img class="project-popup_item-img" src="/img/project-test.jpg" alt="Item">
			<div class="col-md-3">
				<h3 class="project-item_title project-item_title-in-popup">Название</h3>
				<div class="project-item_description">
					Обьем - 113м.кб.<br>
					Дополнительное описание
				</div>
			</div>
			<div class="col-md-9">
				<div class="project-item_full-description">
					На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестоимости но в это же время стоимость их услуг по монтажу их продукции у таких компаний доходит до половины от стоимости самой изготовляемой  продукции.
				</div>
			</div>
		</div>
		<div class="project-popup_wrap clearfix" data-popup-id="3">
			<img class="project-popup_item-img" src="/img/project-test.jpg" alt="Item">
			<div class="col-md-3">
				<h3 class="project-item_title project-item_title-in-popup">Название</h3>
				<div class="project-item_description">
					Обьем - 113м.кб.<br>
					Дополнительное описание
				</div>
			</div>
			<div class="col-md-9">
				<div class="project-item_full-description">
					На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестоимости но в это же время стоимость их услуг по монтажу их продукции у таких компаний доходит до половины от стоимости самой изготовляемой  продукции.
				</div>
			</div>
		</div>
		<div class="project-popup_wrap clearfix" data-popup-id="4">
			<img class="project-popup_item-img" src="/img/project-test.jpg" alt="Item">
			<div class="col-md-3">
				<h3 class="project-item_title project-item_title-in-popup">Название</h3>
				<div class="project-item_description">
					Обьем - 113м.кб.<br>
					Дополнительное описание
				</div>
			</div>
			<div class="col-md-9">
				<div class="project-item_full-description">
					На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестоимости но в это же время стоимость их услуг по монтажу их продукции у таких компаний доходит до половины от стоимости самой изготовляемой  продукции.
				</div>
			</div>
		</div>
		<div class="project-popup_wrap clearfix" data-popup-id="5">
			<img class="project-popup_item-img" src="/img/project-test.jpg" alt="Item">
			<div class="col-md-3">
				<h3 class="project-item_title project-item_title-in-popup">Название</h3>
				<div class="project-item_description">
					Обьем - 113м.кб.<br>
					Дополнительное описание
				</div>
			</div>
			<div class="col-md-9">
				<div class="project-item_full-description">
					На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестоимости но в это же время стоимость их услуг по монтажу их продукции у таких компаний доходит до половины от стоимости самой изготовляемой  продукции.
				</div>
			</div>
		</div>
		<div class="project-popup_wrap clearfix" data-popup-id="6">
			<img class="project-popup_item-img" src="/img/project-test.jpg" alt="Item">
			<div class="col-md-3">
				<h3 class="project-item_title project-item_title-in-popup">Название</h3>
				<div class="project-item_description">
					Обьем - 113м.кб.<br>
					Дополнительное описание
				</div>
			</div>
			<div class="col-md-9">
				<div class="project-item_full-description">
					На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестоимости но в это же время стоимость их услуг по монтажу их продукции у таких компаний доходит до половины от стоимости самой изготовляемой  продукции.
				</div>
			</div>
		</div>
		<div class="project-popup_wrap clearfix" data-popup-id="7">
			<img class="project-popup_item-img" src="/img/project-test.jpg" alt="Item">
			<div class="col-md-3">
				<h3 class="project-item_title project-item_title-in-popup">Название</h3>
				<div class="project-item_description">
					Обьем - 113м.кб.<br>
					Дополнительное описание
				</div>
			</div>
			<div class="col-md-9">
				<div class="project-item_full-description">
					На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестоимости но в это же время стоимость их услуг по монтажу их продукции у таких компаний доходит до половины от стоимости самой изготовляемой  продукции.
				</div>
			</div>
		</div>
		<div class="project-popup_wrap clearfix" data-popup-id="8">
			<img class="project-popup_item-img" src="/img/project-test.jpg" alt="Item">
			<div class="col-md-3">
				<h3 class="project-item_title project-item_title-in-popup">Название</h3>
				<div class="project-item_description">
					Обьем - 113м.кб.<br>
					Дополнительное описание
				</div>
			</div>
			<div class="col-md-9">
				<div class="project-item_full-description">
					На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестоимости но в это же время стоимость их услуг по монтажу их продукции у таких компаний доходит до половины от стоимости самой изготовляемой  продукции.
				</div>
			</div>
		</div>
	</div>
</div>

<div class="aboutus-section" style="background-image: url('/img/bg-about-us.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="/img/logo.png" alt="Gidrobud">
				<h1 class="title section-title section-title_about">О компании</h1>
				<div class="section-description section-description_about-us">
					На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестоимости но в это же время стоимость их услуг по монтажу их продукции у таких компаний доходит до половины от стоимости самой изготовляемой  продукции.
					<br>На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестоимости но в это же время стоимость их услуг по монтажу их продукции у таких компаний доходит до половины от стоимости самой изготовляемой  продукции.
					<br>На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестоимости но в </div>
				<div class="btn btn__yellow callback">заказать звонок</div>
			</div>
			<div class="col-md-6">
				<div class="dashed-block">
					На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова
				</div>
			</div>
		</div>
	</div>
</div>

<div class="advertising-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="statistic clearfix">
					<li class="col-md-4 statistic-item-wrap_about-us">
						<div class="statistic-item statistic-item_about-us" style="background-image: url('/img/fine.png');">
							<div class="statistic-item_subtitle statistic-item_subtitle-about-us">качественные
								И надежные материалы</div>
							<div class="statistic-item_subscribe-about-us">Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестои</div>
						</div>
					</li>
					<li class="col-md-4 statistic-item-wrap_about-us">
						<div class="statistic-item statistic-item_about-us" style="background-image: url('/img/speedometer.png');">
							<div class="statistic-item_subtitle statistic-item_subtitle-about-us">МИНИМАЛЬНЫЕ СРОКИ
								СТРОИТЕЛЬСТВА</div>
							<div class="statistic-item_subscribe-about-us">Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестои</div>
						</div>
					</li>
					<li class="col-md-4 statistic-item-wrap_about-us">
						<div class="statistic-item statistic-item_about-us" style="background-image: url('/img/wrench-hend.png');">
							<div class="statistic-item_subtitle statistic-item_subtitle-about-us">ПРОФЕССИОНАЛЬНЫЕ
								МОНТАЖНИКИ И СТРОИТЕЛИ</div>
							<div class="statistic-item_subscribe-about-us">Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестои</div>
						</div>
					</li>
				</ul>
				<div class="shadow-block"></div>
			</div>
		</div>
	</div>
</div>

<div class="services-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 center">
				<h1 class="title section-title section-title_services">ПРОДУКЦИЯ И УСЛУГИ</h1>
			</div>
			<div class="col-md-4 project-item_wrap">
				<a href="services.html#1" class="project-item services-item">
					<h3 class="services-item_title">Строительство водонапорных башен</h3>
					<div class="project-item_description">
						На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже
					</div>
				</a>
			</div>
			<div class="col-md-4 project-item_wrap">
				<a href="services.html#2" class="project-item services-item">
					<h3 class="services-item_title">Строительство водонапорных башен</h3>
					<div class="project-item_description">
						На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже
					</div>
				</a>
			</div>
			<div class="col-md-4 project-item_wrap">
				<a href="services.html#3" class="project-item services-item">
					<h3 class="services-item_title">Строительство водонапорных башен</h3>
					<div class="project-item_description">
						На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже
					</div>
				</a>
			</div>
			<div class="col-md-4 project-item_wrap">
				<a href="services.html#4 class="project-item services-item">
				<h3 class="services-item_title">Строительство водонапорных башен</h3>
				<div class="project-item_description">
					На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже
				</div>
				</a>
			</div>
			<div class="col-md-4 project-item_wrap">
				<a href="services.html#5" class="project-item services-item">
					<h3 class="services-item_title">Строительство водонапорных башен</h3>
					<div class="project-item_description">
						На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="project.html"><div class="btn btn__blue btn__services">подробнее</div></a>
			</div>
		</div>
	</div>
</div>

<div class="license-orderers-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 center">
				<h1 class="title section-title section-title_license">ЛИЦЕНЗИИ и СЕРТИФИКАТЫ</h1>
				<div class="license-description">
					На самом деле стоимость электроэнергии, металла и всех используемых материалов одинакова приблизительно везде по Украине. Но некоторые предприятия прибегают к уловкам, скажем так что бы привлечь клиентов  ставят цену на свою продукцию ниже рыночной или даже ниже себестоимости но в это же время стоимо
					сть их услуг по монтажу их продукции у таких компаний доходит до половины от стоимости самой изготовляемой  продукции.
				</div>
			</div>
			<div class="col-md-12">
				<div class="owl-carousel">
					<div class="license-item" style="background-image: url('/img/license-test.jpg');"></div>
					<div class="license-item" style="background-image: url('/img/license-test.jpg');"></div>
					<div class="license-item" style="background-image: url('/img/license-test.jpg');"></div>
					<div class="license-item" style="background-image: url('/img/license-test.jpg');"></div>
					<div class="license-item" style="background-image: url('/img/license-test.jpg');"></div>
					<div class="license-item" style="background-image: url('/img/license-test.jpg');"></div>
					<div class="license-item" style="background-image: url('/img/license-test.jpg');"></div>
					<div class="license-item" style="background-image: url('/img/license-test.jpg');"></div>
				</div>
				<a href="license.html"><div class="btn btn__blue btn__center">все лицензии</div></a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 center">
				<h1 class="title section-title section-title_orderers">Наши заказчики</h1>
			</div>
			<div class="col-md-12">
				<div class="owl-carousel">
					<div class="orderers-item" style="background-image: url('/img/orderers-test-1.png');"></div>
					<div class="orderers-item" style="background-image: url('/img/orderers-test-2.png');"></div>
					<div class="orderers-item" style="background-image: url('/img/orderers-test-1.png');"></div>
					<div class="orderers-item" style="background-image: url('/img/orderers-test-2.png');"></div>
					<div class="orderers-item" style="background-image: url('/img/orderers-test-1.png');"></div>
					<div class="orderers-item" style="background-image: url('/img/orderers-test-2.png');"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="btn btn__yellow btn__footer callback">заказать звонок</div>
			</div>
			<div class="col-md-6">
				<nav class="footer_nav">
					<a href="index.html" class="footer_nav-item active">Главная</a>
					<a href="about-us.html" class="footer_nav-item">О компании</a>
					<a href="services.html" class="footer_nav-item">Услуги</a>
					<a href="project.html" class="footer_nav-item">Проекты</a>
					<a href="vacantions.html" class="footer_nav-item">Вакансии</a>
					<a href="license.html" class="footer_nav-item">Лицензии</a>
					<a href="contact.html" class="footer_nav-item">Контакты</a>
				</nav>
			</div>
			<div class="col-md-3">
				<img class="footer_logo" src="/img/logo.png" alt="Gidrobud">
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
	<script src="{{ asset('/js/plugins/sweetalert.min.js') }}"></script>
{{--
	<script src="{{ asset('/js/frontend/jquery-3.1.1.min.js') }}"></script>
--}}
	<script src="{{ asset('/js/frontend/common.js') }}?ver={{ $version }}"></script>
	<script src="{{ asset('/libs/owl-carousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('/libs/jquery/dist/jquery.min.js') }}"></script>

{{-- JS --}}
</body>
</html>