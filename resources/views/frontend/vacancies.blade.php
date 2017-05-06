@extends('ws-app')

@section('content')
    @if($categories_data['vacancies']->active == 1)
        <div class="container">
            <div class="row">
                <div class="content-section content-section_vacantios">
                    <div class="row content-section-top">
                        <div class="col-md-6">
                            <h1 class="title section-title section-title_content">{{ $categories_data['vacancies']->getTranslate('title') }}</h1>
                            {!! $categories_data['vacancies']->getTranslate('short_description') !!}
                        </div>
                        <ul class="col-sm-12 col-md-6 services-menu-wrap">
                            @forelse($vacancies as $vacancy)
                                <li class="vacantions-menu_item" data-id="vacantion-{{ $vacancy->id }}">
                                    <div class="vertical">{{ $vacancy->getTranslate('title') }}</div>
                                </li>
                            @empty
                                {{ trans('base.vacancies_no') }}
                             @endforelse
                        </ul>
                    </div>
                    @if(count($vacancies) !== 0)
                        <div class="row">
                            @foreach($vacancies as $vacancy)
                                <div class="col-md-6 vacantions-item_wrap">
                                    <div id="vacantion-{{ $vacancy->id }}" class="vacantions-item">
                                        <h1 class="title section-title section-title_service-item">{{ $vacancy->getTranslate('title') }}</h1>
                                        {!! $vacancy->getTranslate('short_description') !!}
                                        <div class="btn btn__blue btn__blue-in-vacantion">{{ trans('base.send_vac') }}</div>
                                    </div>
                                </div>

                                <div data-id="vacantion-{{ $vacancy->id }}" class="vacantions-resume-popup" style="display: none;">
                                    <h1 class="title section-title section-title_service-form">{{ trans('base.send_vac_to') }} {{ $vacancy->getTranslate('title') }}</h1>
                                    <form action="" id="vacantion-form-{{ $vacancy->id }}" method="post">
                                        <input type="text" name="name" placeholder="{{ trans('base.fio') }}">
                                        <input type="number" name="phone" placeholder="{{ trans('base.tel') }}">
                                        <input type="text" name="specialty" placeholder="{{ trans('base.spec') }}">
                                        <input type="text" name="experience" placeholder="{{ trans('base.dosv') }}">
                                        <textarea rows="8" name="text" placeholder="{{ trans('base.self') }}"></textarea>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <input type="hidden" name="vacancy" value="{{ $vacancy->getTranslate('title') }}"/>
                                        <button type="submit" id="{{ $vacancy->id }}" class="btn btn__blue submit-vacantion">{{ trans('base.send') }}</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endsection