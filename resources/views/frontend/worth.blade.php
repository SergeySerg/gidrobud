{{-- Worth section--}}
@if( count($worth) !== 0 AND $categories_data['worth']->active == 1)
    <div class="advertising-section @if(!Request::is(App::getLocale())) advertising-section_in-content @endif">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="statistic clearfix">
                        @foreach($worth as $worth_item)
                            <li class="col-md-4 statistic-item-wrap_about-us">
                                <div class="statistic-item statistic-item_about-us" style="background-image: url('{{ asset($worth_item->img) }}');">
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
{{-- /Worth section--}}