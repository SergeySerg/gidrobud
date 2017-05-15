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
                                <div class="statistic-item" style="background-image: url('{{ asset($report_item-> img)}}');">
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
                                <div class="project-item_img" style="background-image: url('{{ $project->getAttributeTranslate('Картинка') }}');"></div>
                                <h3 class="project-item_title">{{ $project->getTranslate('title') }}</h3>
                                <div class="project-item_description">
                                    {!! $project->getTranslate('short_description') !!}
                                </div>
                            </a>
                        </div>
                    @endforeach
                <div class="col-md-12">
                    <a href="/{{ App::getLocale() }}/projects"><div class="btn btn__blue btn__center">{{ trans('base.all_project') }}</div></a>
                </div>
            </div>
                @foreach($projects as $project)
                    <div class="project-popup_wrap clearfix" data-popup-id="{{ $project->id }}">
                        <img class="project-popup_item-img" src="{{ $project->getAttributeTranslate('Картинка') }}" alt="{ $project->getTranslate('title') }}">
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

@include('frontend.worth')

@if( count($services) !== 0 AND $categories_data['services']->active == 1)
    <div class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 center">
                    <h1 class="title section-title section-title_services">{{ trans('base.prod_services') }}</h1>
                </div>
                @foreach($services as $service)
                    <div class="col-md-4 project-item_wrap">
                        <a href="/{{ App::getLocale() }}/services#{{ $service->id }}" class="project-item services-item">
                            <h3 class="services-item_title services-item_title-main">{{ $service->getTranslate('title') }}</h3>
                            <div class="project-item_description services-item_description">
                                {!! $service->getTranslate('short_description')  !!}
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-md-4">
                    <a href="/{{ App::getLocale() }}/projects"><div class="btn btn__blue btn__services">{{ trans('base.more') }}</div></a>
                </div>
            </div>
        </div>
    </div>
@endif


    <div class="license-orderers-section">
        <div class="container">
            @if( count($licenses) !== 0 AND $categories_data['licenses']->active == 1)
                <div class="row">
                    <div class="col-md-12 center">
                        <h1 class="title section-title section-title_license">{{ trans('base.licenses_sertif') }}</h1>
                        <div class="license-description">
                            {!! $categories_data['licenses']->getTranslate('short_description') !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-carousel">
                            @foreach($licenses as $license)
                                <div class="license-item" style="background-image: url('{{ $license->img }}');"></div>
                            @endforeach
                        </div>
                        <a href="/{{ App::getLocale() }}/licenses"><div class="btn btn__blue btn__center">{{ trans('base.all_licenses') }}</div></a>
                    </div>
                </div>
            @endif

            @if( count($customers) !== 0 AND $categories_data['customers']->active == 1)
                <div class="row">
                    <div class="col-md-12 center">
                        <h1 class="title section-title section-title_orderers">{{ trans('base.customers') }}</h1>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-carousel">
                            @foreach($customers as $customer)
                                <div class="orderers-item" style="background-image: url('{{ $customer->img }}');"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection