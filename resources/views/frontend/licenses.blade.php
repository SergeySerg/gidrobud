@extends('ws-app')

@section('content')
    @if($categories_data['licenses']->active == 1)
        <div class="container">
        <div class="row">
            <div class="content-section">
                <div class="col-md-12">
                    <div class="column">
                        <h1 class="title section-title section-title_content">{{ $categories_data['licenses']->getTranslate('title')}}</h1>
                        {!! $categories_data['licenses']->getTranslate('short_description') !!}
                    </div>
                    <div id="license-gallery" class="flex-gallery" style="display:none;">
                        @foreach($licenses as $licens)
                            <img alt="License" src="{{ asset($licens->img) }}"
                                 data-image="{{ asset($licens->img) }}">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection