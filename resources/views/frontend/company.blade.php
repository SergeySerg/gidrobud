@extends('ws-app')
@section('content')
    @if( count($company) !== 0 AND $categories_data['company']->active == 1)
        <div class="container">
        <div class="row">
            <div class="content-section">
                <div class="col-md-12">
                    <div class="column">
                        <h1 class="title section-title section-title_content">{{ $company->getTranslate('title') }}</h1>
                        {!! $company->getTranslate('short_description') !!}
                        <div class="content-section_box">
                            {{ $company->getAttributeTranslate('Слоган') ? $company->getAttributeTranslate('Слоган') : '' }}
                        </div>
                        <img src="/img/frontend/project-test.jpg" alt="Test">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @include('frontend.worth')
@endsection