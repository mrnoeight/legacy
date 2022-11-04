@extends('web.layouts.base')

@section('title') {{ $oPage->seo_title }} @endsection

@section('description') {{ $oPage->seo_description }} @endsection

@section('content')
<!-- MAIN PAGE -->
<main id="pHome">
    <section id="bannerPage" class="bannerPage  go-up">
        <div class="img" style="background: url({{ $oPage->banner_url }}) bottom no-repeat"
            data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical"></div>
        <!-- <div class="imgMb" style="background: url({{ $oPage->banner_mb_url }}) bottom no-repeat"
            data-paroller-factor="-0.2" data-paroller-type="background" data-paroller-direction="vertical"></div> -->
        <div  class="imgMb" >
            <img src="{{ $oPage->banner_mb_url }}" />
        </div>

        <!-- <div class="container">
            <div class="titleBanner stagger-down">
                <h3 class="subTt">{{ $oPage->head_tag1 }}</h3>
                <h2 class="mainTt">{!! nl2br($oPage->head_title1) !!}</h2>
            </div>

        </div> -->
    </section>
    <section class="bannerText stagger-down">
        <div class="container">
            <div class="titleBanner stagger-down">
                <h3 class="subTt">{{ $oPage->head_tag1 }}</h3>
                <h2 class="mainTt">{!! nl2br($oPage->head_title1) !!}</h2>
            </div>
            <div class="copy">
                <p>{{ $oPage->head_desc1 }} </p>
            </div>
        </div>
    </section>
    <section id="overviewWrap" class="section overviewWrap pd1">
        <div class="container">
            <div class="ttPage animate">
                <h2 class="mainTt">{!! nl2br($oPage->mid_title1) !!}</h2>
                <p>{{ $oPage->mid_desc1 }}</p>
            </div>
        </div>
        <div class="img parallax animate"
            data-image-src="{{ tk1IsMobile() ? $oPage->middle_banner_mb_url : $oPage->middle_banner_url }}"
            data-parallax="scroll" data-bleed="0" data-speed="0.4"></div>
        <div class="container">
            <div class="overviewInfo">
                <div class="item">
                    <h3>{{ $oPage->info1 }} <span>m<sup>2</sup></span></h3>
                    <p>{!! nl2br($arrText['area']) !!}</p>
                </div>
                <div class="item">
                    <h3>{{ $oPage->info2 }}</h3>
                    <p>{!! nl2br($arrText['block']) !!}</p>
                </div>
                <div class="item">
                    <h3>{{ $oPage->info3 }}</h3>
                    <p>{!! nl2br($arrText['floor']) !!}</p>
                </div>
                <div class="item">
                    <h3>{{ $oPage->info4 }}</h3>
                    <p>{!! nl2br($arrText['apartment']) !!}</p>
                </div>
                <div class="item">
                    <h3>{{ $oPage->info5 }}</h3>
                    <p>{!! nl2br($arrText['basement']) !!}</p>
                </div>
            </div>
        </div>
    </section>

    

    <!-- vị trí dự án --------------------------------------------------------------------------------->
    <span id="locationWrap"></span>
		<section  class="section locationWrap">
			<div class="container">
				<div class="ttPage animate">
					<h2 class="mainTt">{!! nl2br($arrText['location']) !!}</h2>
				</div>
			</div>
			<img class="map pc" src="{{ $app->getLocale() == 'en' ? $oPage->map_en_url : $oPage->map_url }}" />
            <img class="map mb" src="{{ $app->getLocale() == 'en' ? $oPage->map_en_mb_url : $oPage->map_mb_url }}" />
		</section>
    <!-- <section class="section locationWrap">
        <div class="container mb">
            <div class="ttPage animate">
                <h2 class="mainTt">{!! nl2br($arrText['location']) !!}</h2>
            </div>
        </div>
        <div id="imgChange" class="img animate" style="background: url({{ asset('assets/images/demo/map.gif') }}) center no-repeat"
            data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical">
            <img data-src="{{ asset('assets/images/demo/2-mb.jpg')}}" alt="" class="lazyload">
            <div class="videoMap">
                <video autoplay="autoplay" loop="loop" muted defaultMuted playsinline>
                    <source src="{{ asset('assets/videos/map.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="container desk">
            <h2 class="mainTt animate">{!! nl2br($arrText['location']) !!}</h2>
            <div class="itemLocationList">
                <div class="itemLocation active">
                    <img data-src="{{ asset('assets/images/b.gif') }}" alt="" class="lazyload">
                    <div class="info"></div>
                    <div data-mb="{{ asset('assets/images/demo/2-mb.jpg')}}" data="video" class="item js-changeImg active"
                        style="background: #242021">

                        <div>
                            <img data-src="{{ asset('assets/images/ico-location.png') }}" alt="" class="lazyload">
                        </div>
                    </div>
                </div>
                @foreach ($oLocations as $location)
                <div class="itemLocation">
                    <img data-src="{{ asset('assets/images/b.gif') }}" alt="" class="lazyload">
                    <ul class="info">
                        @php
                            $lines = explode("\n", $location->info1);
                        @endphp
                        @foreach ($lines as $line)
                        <li>{{ $line }}</li>
                        @endforeach
                    </ul>
                    <div data-mb="{{ $location->banner_mb_url }}" data="{{ $location->banner_url }}" class="item js-changeImg"
                        style="background: url({{ $location->banner_url }}) center no-repeat">
                        <div>
                            @php
                                $lines = explode("\n", $location->head_title1);
                            @endphp
                            <h4>{{ $lines[0] }}</h4>
                            <p>{{ isset($lines[1]) ? $lines[1] : '' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                
                
            </div>
        </div>
    </section> -->

    <!-- Hình ảnh dự án --------------------------------------------------------------------------------->

    <section id="galleryWrap" class="section galleryWrap pd1">
        <div class="container">
            <div class="ttPage">
                <h2 class="mainTt animate">{!! nl2br($arrText['photo']) !!}</h2>
            </div>
        </div>
        <div class="slideGalleryWrap animate">
            <div class="slideGallery lightgallery">
                @foreach ($oGalleries as $gallery)
                <div>
                    <div class="item" style="background: url({{ $gallery->banner_url }}) center no-repeat">
                        <img data-src="{{ asset('assets/images/thumb1.gif') }}" class="lazyload" />
                        <span class="linkLg" data-src="{{ $gallery->banner_url }}"
                            data-sub-html="<p>{{ $gallery->head_title1 }}</p>"></span>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="opSlideGallery">
                <div id="prevGallery" class="btnSlider btnSliderPrev">
                    <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <circle class=" circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none" />
                    </svg>

                </div>
                <div id="nextGallery" class="btnSlider btnSliderNext">
                    <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none" />
                    </svg>

                </div>

            </div>

        </div>

    </section>


    <!-- Về dự án --------------------------------------------------------------------------------->

    <section id="aboutUsWrap" class="section aboutUsWrap">
        <div class="slideAbout">
            @foreach ($oSliders as $slider)
            <div class="item" style="background: url({{ $slider->banner_url }}) center no-repeat"
                data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical">
                <img data-src="{{ $slider->banner_mb_url }}" class="lazyload" />
                <div class="container first">
                    <div class="copy">
                        <h3 class="subTt">{{ $slider->head_tag1 }}</h3>
                        <h2 class="mainTt">{!! nl2br($slider->head_title1) !!}</h2>
                        <p>{{ $slider->head_desc1 }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        <div class="optionSlider">

            <div id="prevAbout" class="btnSlider btnSliderPrev">
                <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <circle class=" circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none" />
                </svg>

            </div>
            <div id="nextAbout" class="btnSlider btnSliderNext">
                <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2" fill="none" />
                </svg>

            </div>
        </div>
    </section>

    

    <!-- Đối tác --------------------------------------------------------------------------------->

    <section id="partnerWrap" class="section partnerWrap pd1">
        <div class="container">
            <div class="ttPage animate">
                <h2 class="mainTt">{!! nl2br($arrText['partner']) !!}</h2>
            </div>
            <div class="partnerList">
                @foreach ($oPartners as $partner)
                <div class="item">
                    <img data-src="{{ $partner->banner_url }}" class="lazyload" />
                    <p>{{ $partner->head_title1 }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    




    <section id="infomationWrap" class="section infomationWrap pd1">
        <div class="ttPage animate">
            <h3 class="subTt">{!! nl2br($arrText['register']) !!}</h3>
            <h2 class="mainTt">{!! nl2br($arrText['lancaster']) !!}</h2>
        </div>
        <div class="container animate">
            <form id="frmRegistration" method="POST">
                <input type="hidden" name="custLang" id="custLang" value="{{ $app->getLocale() }}" />
                <div class="ctIp">
                    <input type="text" name="custName" class="o2o-name" id="custName" placeholder="{!! $arrText['name'] !!}" />
                    <span class="erro" id="custNameErr"></span>
                </div>
                <div class="ctIp">
                    <input type="text" name="custPhone" class="o2o-phone" id="custPhone" placeholder="{!! $arrText['phone'] !!}" />
                    <span class="erro" id="custPhoneErr"></span>
                </div>
                <div class="ctIp">
                    <input type="text" name="custEmail" id="custEmail" class="o2o-email" placeholder="{!! $arrText['Email'] !!}" />
                    <span class="erro" id="custEmailErr"></span>
                </div>
                
                <div class="btnWrap">
                    <button class="btnSlider style2 btnSliderNext js_Submit">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class="circle" cx="50" cy="50" r="48" stroke="#fff" stroke-width="2" fill="none" />
                        </svg>
                    </button>
                </div>
            </form>

        </div>
    </section>
</main>
<!-- MAIN PAGE -->
@endsection