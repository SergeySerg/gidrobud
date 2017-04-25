@extends('ws-app')

@section('content')
@if( count($report) !== 0 AND $categories_data['report']->active == 1)
    <div class="advertising-section">
        <div class="container">
            <div class="row">

                    <div class="col-md-12">
                        <ul class="statistic clearfix">
                            @foreach($report as $report_item)
                                <li class="col-md-3 statistic-item-wrap">
                                    <div class="statistic-item" style="background-image: url('{{asset('/img/frontend/tower.png')}}}');">
                                        <div class="statistic-item_number">{{ $report_item->getAttributeTranslate('Количество') ? $report_item->getAttributeTranslate('Количество') : '' }}</div>
                                        <div class="statistic-item_subtitle">{{ $report_item->getTranslate('title') }}</div>
                                        <div class="statistic-item_subscribe">{!! $report_item->getTranslate('short_description') !!}</div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="shadow-block"></div>
                    </div>

            </div>
        </div>
    </div>
@endif

@if( count($projects) !== 0 AND $categories_data['projects']->active == 1)
    <div class="project-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 center">
                    <h1 class="title section-title section-title_projects">{{ trans('base.our_project') }}</h1>
                </div>
                    @foreach($projects as $project)
                        <div class="col-md-3 project-item_wrap">
                            <a href="#" class="project-item show-project-item" data-project-id="{{ $project->id }}">
                                <div class="project-item_img" style="background-image: url('{{ $project->img }}');"></div>
                                <h3 class="project-item_title">{{ $project->getTranslate('title') }}</h3>
                                <div class="project-item_description">
                                    {!! $project->getTranslate('short_description') !!}
                                </div>
                            </a>
                        </div>
                    @endforeach
                <div class="col-md-12">
                    <a href="project.html"><div class="btn btn__blue btn__center">{{ trans('base.all_project') }}</div></a>
                </div>
            </div>
                @foreach($projects as $project)
                    <div class="project-popup_wrap clearfix" data-popup-id="{{ $project->id }}">
                        <img class="project-popup_item-img" src="{{ $project->img }}" alt="Item">
                        <div class="col-md-3">
                            <h3 class="project-item_title project-item_title-in-popup">{{ $project->getTranslate('title') }}</h3>
                            <div class="project-item_description">
                                {!! $project->getTranslate('short_description') !!}
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="project-item_full-description">
                                {!! $project->getTranslate('description') !!}
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
@endif

@if( count($company) !== 0 AND $categories_data['company']->active == 1)
    <div class="aboutus-section" style="background-image: url('{{ asset('/img/frontend/bg-about-us.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('/img/frontend/logo.png') }}" alt="Gidrobud">
                    <h1 class="title section-title section-title_about">{{ $company->getTranslate('title') }}</h1>
                    <div class="section-description section-description_about-us">
                        {!! $company->getTranslate('short_description')  !!}
                    </div>
                    <div class="btn btn__yellow callback">{{ trans('base.callback') }}</div>
                </div>
                <div class="col-md-6">
                    <div class="dashed-block">
                        {{ $company->getAttributeTranslate('Слоган') ? $company->getAttributeTranslate('Слоган') : '' }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endif
@if( count($worth) !== 0 AND $categories_data['worth']->active == 1)
    <div class="advertising-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="statistic clearfix">
                        @foreach($worth as $worth_item)
                            <li class="col-md-4 statistic-item-wrap_about-us">
                                <div class="statistic-item statistic-item_about-us" style="background-image: url('{{ $worth_item->img }}');">
                                    <div class="statistic-item_subtitle statistic-item_subtitle-about-us">
                                        {{ $worth_item->getTranslate('title') }}
                                    </div>
                                    <div class="statistic-item_subscribe-about-us">
                                        {!! $worth_item->getTranslate('short_description') !!}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="shadow-block"></div>
                </div>
            </div>
        </div>
    </div>
@endif
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
@endsection