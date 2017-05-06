@extends('ws-app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="content-section content-section_contact clearfix">
                <div class="col-md-12"><h1 class="title section-title section-title_content">{{ $categories_data['contacts']->getTranslate('title')}}</h1></div>
                <div class="col-md-6 contact-left">
                    {!! $categories_data['contacts']->getTranslate('short_description') !!}
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="address"><b>{{ trans('base.address') }}:</b> <br>
                                {{ $texts->get('address') }}
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="phone">
                                <b>{{ trans('base.telephone') }}:</b><br>
                                {{ $texts->get('telephone_one') }} <br>
                                {{ $texts->get('telephone_second') }}
                            </div>
                        </div>
                        {{--<div class="col-sm-4 col-md-4">
                            <div class="phone">
                                <b>Телефон:</b><br>
                                +38 (044) 00-00-00 <br>
                                +38 (044) 11-11-00
                            </div>
                        </div>--}}
                    </div>
                    <h1 class="title section-title section-title_service-item section-title_contact">{{ trans('base.map') }}</h1>
                    <div class="map">
                        {{--<iframe src="{{ $texts->get('map') }}" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>--}}
                    </div>
                </div>
                <div class="col-md-6 contact-right">
                    <h1 class="title section-title section-title_service-item section-title_contact-callback">{{ trans('base.cal') }} <br> {{ trans('base.connection') }}</h1>
                    <form action="" id="contact-callback" method="post">
                        <input type="text" name="name" placeholder="{{ trans('base.name') }}">
                        <input type="number" name="phone" placeholder="{{ trans('base.tel') }}">
                        <textarea rows="8" name="text" placeholder="{{ trans('base.message') }}"></textarea>
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <button type="submit" id="send" class="btn btn__blue">{{ trans('base.send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection