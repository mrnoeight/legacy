@extends('web.layouts.base')

@section('title', 'Tien ich')

@section('hidden_page', 'Tien ich')

@section('content')

<!-- MAIN PAGE -->
<main id="pFacilities">
    <div class="bannerSubPage go-up">
        <img class="lazyload pc" data-src="{{ $oPage->banner_url }}" alt="">
        <img class="lazyload mb" data-src="{{ $oPage->banner_mb_url }}" alt="">
        <div class="container stagger-down">
            <h2 class="mainTt">{!! nl2br($oPage->head_title1) !!}</h2>
            <div class="copy">
                <p>{{ $oPage->head_desc1 }}
                </p>
            </div>
        </div>
    </div>

    <section id="PrivateLegacyclub" class="section aboutUsWrap">
        <div class="slideAbout">
            @foreach ($oSliders as $s)
            <div class="item" style="background: url({{ $s->banner_url }}) center no-repeat"
                data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical">
                <img data-src="{{ $s->banner_url }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">{!! nl2br($s->head_title1) !!}</h2>
                        <p>{{ $s->head_desc1 }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="optionSlider">

            <div class="btnSlider btnSliderPrev">
                <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <circle class=" circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none" />
                </svg>

            </div>
            <div class="btnSlider btnSliderNext">
                <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none" />
                </svg>

            </div>
        </div>
    </section>
    <div class="spaceH"></div>
    <section id="ShoppingCenter" class="section aboutUsWrap">
        <div class="slideAbout">
            @foreach ($oMidSliders as $s)
            <div class="item" style="background: url({{ $s->banner_url }}) center no-repeat"
                data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical">
                <img data-src="{{ $s->banner_url }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">{!! nl2br($s->head_title1) !!}</h2>
                        <p>{{ $s->head_desc1 }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="optionSlider">

            <div class="btnSlider btnSliderPrev">
                <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <circle class=" circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none" />
                </svg>

            </div>
            <div class="btnSlider btnSliderNext">
                <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <circle class="circle" cx="50" cy="50" r="48" stroke="#A3815F" stroke-width="2" fill="none" />
                </svg>

            </div>
        </div>
    </section>

    <section class="utilitiesWrap">
        <div class="container"></div>
        <div id="HealthUtility" class="utilitiesSliderWrap animate">
            <div class="copy">
                <h2 class="mainTt">{!! nl2br($oPage->mid_title1) !!}</h2>
                <p>{!! nl2br($oPage->mid_desc1) !!}
                </p>
            </div>
            <div class="sliderUtiWrap">
                <div class="sliderUti">
                    @php 
                        $i = 0;
                    @endphp
                    @foreach ($healths as $s)
                    <div class="hDot" indexSlider="{{ $i++ }}">
                        <div data-popup="popup_{{ $s->block_name }}" class="item">
                            <img data-src="{{ $s->banner_url }}" alt="" class="lazyload">
                            <h2>{!! nl2br($s->head_title1) !!}</h2>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="opSlideGallery">
                    <div class="btnSlider btnSliderPrev">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class=" circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                fill="none" />
                        </svg>

                    </div>
                    <div class="btnSlider btnSliderNext">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                fill="none" />
                        </svg>

                    </div>

                </div>
            </div>

        </div>
        <div id="Entertainment" class="utilitiesSliderWrap animate">
            <div class="copy">
                <h2 class="mainTt">{!! nl2br($oPage->info1) !!}</h2>
                <p>{!! nl2br($oPage->info2) !!}</p>
            </div>
            <div class="sliderUtiWrap">
                <div class="sliderUti">
                    @php 
                        $i = 0;
                    @endphp
                    @foreach ($entertainments as $s)
                    <div class="hDot" indexSlider="{{ $i++ }}">
                        <div class="item">
                            <img data-src="{{ $s->banner_url }}" alt="" class="lazyload">
                            <h2>{!! nl2br($s->head_title1) !!}</h2>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="opSlideGallery">
                    <div class="btnSlider btnSliderPrev">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class=" circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                fill="none" />
                        </svg>

                    </div>
                    <div class="btnSlider btnSliderNext">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                fill="none" />
                        </svg>

                    </div>

                </div>
            </div>

        </div>
        <div id="Business" class="utilitiesSliderWrap animate">
            <div class="copy">
                <h2 class="mainTt">{!! nl2br($oPage->info3) !!}</h2>
                <p>{!! nl2br($oPage->info4) !!}
                </p>
            </div>
            <div class="sliderUtiWrap">
                <div class="sliderUti sliderBusiness">
                    @php 
                        $i = 0;
                    @endphp
                    @foreach ($business as $s)
                    <div class="hDot" indexSlider="0">
                        <div class="item">
                            <img data-src="{{ $s->banner_url }}" alt="" class="lazyload">
                            <h2>{!! nl2br($s->head_title1) !!}</h2>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                <div class="opSlideGallery">
                    <div class="btnSlider btnSliderPrev">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class=" circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                fill="none" />
                        </svg>

                    </div>
                    <div class="btnSlider btnSliderNext">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                fill="none" />
                        </svg>

                    </div>

                </div>
            </div>

        </div>
    </section>


    <div id="popup_pool" class="popup">
        <div class="btnClose jsClosePopupUti"></div>
        <div class="slideAboutPopup">
            @foreach ($pool as $s)
            <div class="item" style="background: url({{ $s->banner_url }}) center no-repeat">
                <img data-src="{{ $s->banner_mb_url }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">{!! nl2br($s->head_title1) !!}</h2>
                        <p>{!! nl2br($s->info1) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="popup_gym" class="popup">
        <div class="btnClose jsClosePopupUti"></div>
        <div class="slideAboutPopup">
            @foreach ($gym as $s)
            <div class="item" style="background: url({{ $s->banner_url }}) center no-repeat">
                <img data-src="{{ $s->banner_mb_url }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">{!! nl2br($s->head_title1) !!}</h2>
                        <p>{!! nl2br($s->info1) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="popup_sauna" class="popup">
        <div class="btnClose jsClosePopupUti"></div>
        <div class="slideAboutPopup">
            @foreach ($sauna as $s)
            <div class="item" style="background: url({{ $s->banner_url }}) center no-repeat">
                <img data-src="{{ $s->banner_mb_url }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">{!! nl2br($s->head_title1) !!}</h2>
                        <p>{!! nl2br($s->info1) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="popup_playground" class="popup">
        <div class="btnClose jsClosePopupUti"></div>
        <div class="slideAboutPopup">
            @foreach ($playground as $s)
            <div class="item" style="background: url({{ $s->banner_url }}) center no-repeat">
                <img data-src="{{ $s->banner_mb_url }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">{!! nl2br($s->head_title1) !!}</h2>
                        <p>{!! nl2br($s->info1) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="popup_yoga" class="popup">
        <div class="btnClose jsClosePopupUti"></div>
        <div class="slideAboutPopup">
            @foreach ($yoga as $s)
            <div class="item" style="background: url({{ $s->banner_url }}) center no-repeat">
                <img data-src="{{ $s->banner_mb_url }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">{!! nl2br($s->head_title1) !!}</h2>
                        <p>{!! nl2br($s->info1) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="popup_park" class="popup">
        <div class="btnClose jsClosePopupUti"></div>
        <div class="slideAboutPopup">
            @foreach ($park as $s)
            <div class="item" style="background: url({{ $s->banner_url }}) center no-repeat">
                <img data-src="{{ $s->banner_mb_url }}" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">{!! nl2br($s->head_title1) !!}</h2>
                        <p>{!! nl2br($s->info1) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>

@endsection