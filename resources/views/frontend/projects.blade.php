@extends('ws-app')

@section('content')
    @if( count($projects) !== 0 AND $categories_data['projects']->active == 1)
        <div class="container">
            <div class="row">
                <div class="content-section">
                    <div class="col-sm-12 col-md-6">
                        <h1 class="title section-title section-title_content">{{ $categories_data['projects']->getTranslate('title')}}</h1>
                        {!! $categories_data['projects']->getTranslate('short_description') !!}
                    </div>
                    <div class="project-btn-wrapper col-sm-12 col-md-6">
                        @foreach($projects as $project)
                            @if($project->getAttributeTranslate('Категория'))
                                <div class="col-sm-4 col-md-4">
                                    <div class="btn btn__green btn__yellow btn__category" data-category-id="{{ $project->getAttributeTranslate('Категория') }}">{{ trans('base.category') }} {{ $project->getAttributeTranslate('Категория') }}</div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row project-content">
                @foreach($projects as $project)
                    <div class="project-category" data-project-category="{{ $project->getAttributeTranslate('Категория') }}">
                        <div class="col-sm-6 col-md-3 project-item_wrap">
                            <a href="#" class="project-item show-project-item" data-project-id="{{ $project->id }}" >
                                <div class="project-item_img" style="background-image: url('{{ asset($project->img) }}');"></div>
                                <h3 class="project-item_title">{{ $project->getTranslate('title') }}</h3>
                                <div class="project-item_description">
                                    {!! $project->getTranslate('short_description') !!}
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            @foreach($projects as $project)
                <div class="project-popup_wrap clearfix" data-popup-id="{{ $project->id }}">
                    <img class="project-popup_item-img" src="{{ asset($project->img) }}" alt="Item">
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
    @endif
@endsection