@extends('ws-app')

@section('content')
    @if( count($services) !== 0 AND $categories_data['services']->active == 1)
        <div class="container">
        <div class="row">
            <div class="content-section clearfix">
                <div class="col-md-6">
                    <h1 class="title section-title section-title_content">{{ $categories_data['services']->getTranslate('title') }}</h1>
                {!! $categories_data['services']->getTranslate('short_description') !!}
                </div>
                <ul class="col-md-6 services-menu-wrap">
                    @foreach($services as  $key => $service)
                        <li class="services-menu_item @if($key == 0)active @endif" data-services-id="{{ $service->id }}">{{ $service->getTranslate('title') }}</li>
                    @endforeach
                </ul>
                <div class="col-md-12">
                    @foreach($services as $service)
                        <div class="services-page-item" data-services-item-id="{{ $service->id }}">
                            <div class="column column_services">
                                <h1 class="title section-title section-title_service-item">{{ $service->getTranslate('title') }}</h1>
                                {!! $service->getTranslate('description') !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection