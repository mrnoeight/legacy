<!doctype html>
<html class="no-js" lang="" style="overflow: hidden;">

<!-- HEADER CONFIGURATION -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />

    <!-- SEO -->
    <title>@yield('title', 'Lancaster Legacy')</title>
    <meta name="description" content="@yield('description', 'Lancaster Legacy')">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Social Sharing Info -->
    <meta property="og:url" content="" />
    <meta property="og:title" content="@yield('title', 'Lancaster Legacy')" />
    <meta property="og:description" content="@yield('description', 'Lancaster Legacy')" />
    <meta property="og:image" content="{{ asset('assets/images/share.jpg') }}" />
    <meta property="og:image:width" content="600" /> <!-- Full HD: WIDTH -->
    <meta property="og:image:height" content="315" /> <!-- Full HD: HEIGHT -->
    <meta property="fb:app_id" content="" />

    <meta name="webroot" content="." />

    <!-- Viewport and mobile -->
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">

    <!-- FAVICON -->
    <link rel="image_src" href="{{ asset('assets/images/favicon/favicon.ico') }}" />
    <link rel="icon" type="image/gif" href="{{ asset('assets/images/favicon/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <link rel="preload" href="{{ asset('assets/css/pure.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/pure.css') }}">
    </noscript>
    <link rel="preload" href="{{ asset('assets/css/helper.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/helper.css') }}">
    </noscript>


    <script>
    window.env = {
        HOST: "https://localhost:3000"
    }
    host_url = "{{ env("APP_URL", "") }}";
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">

    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157950355-17"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-157950355-17');
	</script> -->

	<!--Start GTM code-->
	<!-- <script>var dataLayer = [{ 'trackingId': 'UA-157950355-17' }];</script>
	<script src="//crm.twin.vn/scripts/tgtm.js"></script> -->
	<!--End GTM code-->

</head>

@php
    $oLogo = tk1GetLogo();
    $oFooterLogo = tk1GetFooterLogo();
    $arrMenuText = tk1GetMenu(); 
    $arrFooterText = tk1GetFooter(); 
    $arrDisables = tk1GetDisabledPages();
    $arrSidebarText = tk1GetSidebar();
@endphp

<body>
    <!-- HEADER / MENU NAVIGATION -->
    <header>
        <div class="container stagger-down">
            <a class="logo" href="{{ route('home') }}">
                <img class="lazyload logo1" data-src="{{ $oLogo->banner_url }}"
                    alt="Lancaster-Legacy">
                <!-- <img class="lazyload logo2" data-src="{{ asset('assets/images/lancaster_legacy_logo2.png') }}" alt="Lancaster-Legacy"> -->
            </a>
            <div class="left">
                <nav>
                    <a href="{{ route('home') }}" {{$menu_active['home']}}>{{ isset($arrMenuText['menu_home']) ? $arrMenuText['menu_home'] :  __('Trang ch???') }}</a>
                    <a href="{{ route('home') }}#locationWrap" {{$menu_active['location']}}>{{ isset($arrMenuText['menu_location']) ? $arrMenuText['menu_location'] : __('V??? tr??')}}</a>
                    @if (!in_array('thong-tin-can-ho', $arrDisables))
                    <a href="{{ route('apartment') }}" {{$menu_active['apartment']}}>{{ isset($arrMenuText['menu_apartment']) ? $arrMenuText['menu_apartment'] : __('Th??ng tin c??n h???')}}</a>
                    @endif
                    @if (!in_array('tien-ich', $arrDisables))
                    <a href="{{ route('tienich') }}" {{$menu_active['utilities']}}>{{ isset($arrMenuText['menu_amenities']) ? $arrMenuText['menu_amenities'] : __('Ti???n ??ch')}}</a>
                    @endif
                    <a href="{{ route('gallery') }}" {{$menu_active['gallery']}}>{{ isset($arrMenuText['menu_gallery']) ? $arrMenuText['menu_gallery'] : __('Th?? vi???n')}}</a>

                </nav>
            </div>

            <div class="right">
                <nav>
                    @if (!in_array('tin-tuc', $arrDisables))
                    <a href="{{ route('news') }}" {{$menu_active['news']}}>{{ isset($arrMenuText['menu_news']) ? $arrMenuText['menu_news'] : __('Tin t???c')}}</a>
                    @endif
                    <!-- <a href="#" class="">VR 360 tour</a> -->
                    <a href="{{ route('lancaster') }}" {{$menu_active['lancaster']}}>{{ isset($arrMenuText['menu_lancaster']) ? $arrMenuText['menu_lancaster'] : 'Lancaster By Trung Thuy' }}</a>
                    <a href="{{ route('progress') }}" {{$menu_active['progress']}}>{{ isset($arrMenuText['menu_progress']) ? $arrMenuText['menu_progress'] :  __('Ti???n ?????')}}</a>
                    <a href="{{ route('home') }}#infomationWrap" {{$menu_active['about']}}>{{ isset($arrMenuText['menu_contact']) ? $arrMenuText['menu_contact'] :  __('Li??n h???')}}</a>
                </nav>
                <div class="lang">
                    @if (App::isLocale('vi'))
                    <p>VN</p>
                    <a href="{{ route('change_language', ['language'=>'en']) }}">EN</a>
                    @else
                    <p>EN</p>
                    <a href="{{ route('change_language', ['language'=>'vi']) }}">VN</a>
                    @endif
                </div>

            </div>
        </div>
    </header>

    <header class="fixedHeader">
        <div class="container">
            <div class="left">
                <nav>
                    <a href="{{ route('home') }}" {{$menu_active['home']}}>{{ isset($arrMenuText['menu_home']) ? $arrMenuText['menu_home'] :  __('Trang ch???') }}</a>
                    <a href="{{ route('home') }}#locationWrap" {{$menu_active['location']}}>{{ isset($arrMenuText['menu_location']) ? $arrMenuText['menu_location'] : __('V??? tr??')}}</a>
                    @if (!in_array('thong-tin-can-ho', $arrDisables))
                    <a href="{{ route('apartment') }}" {{$menu_active['apartment']}}>{{ isset($arrMenuText['menu_apartment']) ? $arrMenuText['menu_apartment'] : __('Th??ng tin c??n h???')}}</a>
                    @endif
                    @if (!in_array('tien-ich', $arrDisables))
                    <a href="{{ route('tienich') }}" {{$menu_active['utilities']}}>{{ isset($arrMenuText['menu_amenities']) ? $arrMenuText['menu_amenities'] : __('Ti???n ??ch')}}</a>
                    @endif
                    <a href="{{ route('gallery') }}" {{$menu_active['gallery']}}>{{ isset($arrMenuText['menu_gallery']) ? $arrMenuText['menu_gallery'] : __('Th?? vi???n')}}</a>
                </nav>
            </div>
            <a class="logo" href="{{ route('home') }}"><img
                    data-src="{{ $oLogo->banner_mb_url }}" alt="Lancaster-Legacy"
                    class="lazyload"></a>
            <div class="right">
                <nav>
                    @if (!in_array('tin-tuc', $arrDisables))
                    <a href="{{ route('news') }}" {{$menu_active['news']}}>{{ isset($arrMenuText['menu_news']) ? $arrMenuText['menu_news'] : __('Tin t???c')}}</a>
                    @endif
                    <a href="{{ route('lancaster') }}" {{$menu_active['lancaster']}}>{{ isset($arrMenuText['menu_lancaster']) ? $arrMenuText['menu_lancaster'] : 'Lancaster By Trung Thuy' }}</a>
                    <a href="{{ route('progress') }}" {{$menu_active['progress']}}>{{ isset($arrMenuText['menu_progress']) ? $arrMenuText['menu_progress'] :  __('Ti???n ?????')}}</a>
                    <a href="{{ route('home') }}#infomationWrap" {{$menu_active['about']}}>{{ isset($arrMenuText['menu_contact']) ? $arrMenuText['menu_contact'] :  __('Li??n h???')}}</a>
                </nav>
                <div class="lang">
                    @if (App::isLocale('vi'))
                    <p>VN</p>
                    <a href="{{ route('change_language', ['language'=>'en']) }}">EN</a>
                    @else
                    <p>EN</p>
                    <a href="{{ route('change_language', ['language'=>'vi']) }}">VN</a>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <header class="menuMobile">
        <a class="logo" href="{{ route('home') }}"><img
                data-src="{{ $oLogo->banner_mb_url }}" alt="" class="lazyload"></a>
        <div class="container">
            <div class="hamburger-menu js_menuMobile">
                <div class="bar"></div>
            </div>
            <div class="lang">
                @if (App::isLocale('vi'))
                <p>VN</p>
                <a href="{{ route('change_language', ['language'=>'en']) }}">EN</a>
                @else
                <p>EN</p>
                <a href="{{ route('change_language', ['language'=>'vi']) }}">VN</a>
                @endif
            </div>
        </div>
        <div class="navMobile">
            <nav class="menufix">
                <ul>
                    <li>
                        <a href="{{ route('home') }}" {{$menu_active['home']}}>{{ isset($arrMenuText['menu_home']) ? $arrMenuText['menu_home'] :  __('Trang ch???') }}</a>
                        <span class="subMb js-subMenuMb"><img data-src="{{ asset('assets/images/ar-1.png') }}"
                                class="lazyload"></span>
                        <div class="submenu">
                            <a href="{{ route('home') }}#overviewWrap">{{__('T???ng quan d??? ??n')}}</a>
                            <a href="{{ route('home') }}#aboutUsWrap">{{__('V??i n??t v??? T???p ??o??n Trung Th???y')}}</a>
                            <a href="{{ route('home') }}#galleryWrap">{{__('H??nh ???nh d??? ??n')}}</a>
                            <a href="{{ route('home') }}#partnerWrap">{{__('?????i t??c')}}</a>
                            <a href="{{ route('home') }}#infomationWrap">{{__('Li??n h???')}}</a>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('home') }}#locationWrap" {{$menu_active['location']}}>{{ isset($arrMenuText['menu_location']) ? $arrMenuText['menu_location'] : __('V??? tr??')}}</a>
                    </li>
                    @if (!in_array('thong-tin-can-ho', $arrDisables))
                    <li>
                        <a href="{{ route('apartment') }}" {{$menu_active['apartment']}}>{{ isset($arrMenuText['menu_apartment']) ? $arrMenuText['menu_apartment'] : __('Th??ng tin c??n h???')}}</a>
                        <span class="subMb js-subMenuMb"><img data-src="{{ asset('assets/images/ar-1.png') }}"
                                class="lazyload"></span>
                        <div class="submenu">
                            <a href="{{ route('apartment') }}">{{__('M???T B???NG TI???N ??CH T???NG TR???T')}}</a>
                            <a href="{{ route('apartment') }}?floorplan=tab1">{{__('M???T B???NG TI???N ??CH T???NG 6')}}</a>
                            <a href="{{ route('apartment') }}?floorplan=tab2">{{__('M???T B???NG TI???N ??CH T???NG 20')}}</a>
                            <a href="{{ route('apartment') }}?floorplan=tab3">{{__('M???T B???NG TI???N ??CH T???NG TH?????NG')}}</a>
                            <!-- <a href="{{ route('apartment') }}#masterplan">Master plan</a>
                            <a href="{{ route('apartment') }}#floorplan">{{ isset($arrMenuText['ground_utility']) ? $arrMenuText['ground_utility'] : 'M???t b???ng ti???n ??ch' }}</a>
                            <a href="{{ route('apartment') }}#rooftop">{{ isset($arrMenuText['floor_plan']) ? $arrMenuText['floor_plan'] : 'M???t b???ng to??' }}</a> -->
                        </div>
                    </li>
                    @endif
                    @if (!in_array('tien-ich', $arrDisables))
                    <li>
                        <a href="{{ route('tienich') }}" {{$menu_active['utilities']}}>{{ isset($arrMenuText['menu_amenities']) ? $arrMenuText['menu_amenities'] : __('Ti???n ??ch')}}</a>
                        <span class="subMb js-subMenuMb"><img data-src="{{ asset('assets/images/ar-1.png') }}"
                                class="lazyload"></span>
                        <div class="submenu">
                            <a href="{{ route('tienich') }}#PrivateLegacyclub">{{__('Phong v??? th?????ng l??u')}}</a>
                            <a href="{{ route('tienich') }}#ShoppingCenter">{{__('Xu h?????ng th???i th?????ng')}}</a>
                            <a href="{{ route('tienich') }}#HealthUtility">{{__('S???c kh???e')}}</a>
                            <a href="{{ route('tienich') }}#Entertainment">{{__('Gi???i tr??')}} </a>
                            <a href="{{ route('tienich') }}#Business">{{__('Business')}}</a>
                        </div>
                    </li>
                    @endif
                    <li><a href="{{ route('gallery') }}" {{$menu_active['gallery']}}>{{ isset($arrMenuText['menu_gallery']) ? $arrMenuText['menu_gallery'] : __('Th?? vi???n')}}</a></li>
                    @if (!in_array('tin-tuc', $arrDisables))
                    <li><a href="{{ route('news') }}" {{$menu_active['news']}}>{{ isset($arrMenuText['menu_news']) ? $arrMenuText['menu_news'] : __('Tin t???c')}}</a></li>
                    @endif
                    <!-- <li><a href="#" class="">VR 360 tour</a></li> -->
                    <li>
                        <a href="{{ route('lancaster') }}" {{$menu_active['lancaster']}}>{{ isset($arrMenuText['menu_lancaster']) ? $arrMenuText['menu_lancaster'] : 'Lancaster By Trung Thuy' }}</a>
                        <span class="subMb js-subMenuMb"><img data-src="{{ asset('assets/images/ar-1.png') }}"
                                class="lazyload"></span>
                        <div class="submenu">
                            <a href="{{ route('lancaster') }}#LancasterTheMaster">{{ isset($arrMenuText['lan.master']) ? $arrMenuText['lan.master'] : __('Lancaster The Master')}}</a>
                            <a href="{{ route('lancaster') }}#LancasterClub">{{ isset($arrMenuText['lan.club']) ? $arrMenuText['lan.club'] : __('Lancaster Club')}}</a>
                            <a href="{{ route('lancaster') }}#ConsultingTeam">{{ isset($arrMenuText['lan.consultant']) ? $arrMenuText['lan.consultant'] : __('?????i ng?? t?? v???n')}}</a>
                        </div>
                    </li>
                    <li><a href="{{ route('progress') }}" {{$menu_active['progress']}}>{{ isset($arrMenuText['menu_progress']) ? $arrMenuText['menu_progress'] :  __('Ti???n ?????')}}</a></li>
                    <li><a href="{{ route('home') }}#infomationWrap" {{$menu_active['about']}}>{{ isset($arrMenuText['menu_contact']) ? $arrMenuText['menu_contact'] :  __('Li??n h???')}}</a>
                    </li>
                </ul>

            </nav>
        </div>
    </header>

    @yield('content')

    <!-- FOOTER -->
    <footer class="pd1">
        <div class="container">
            <div class="topFooter">
                <div class="item">
                    <p>{{ isset($arrFooterText['footer_invest']) ? $arrFooterText['footer_invest'] : '?????U T?? V?? PH??T TRI???N'}}</p>
                    <img data-src="{{ $oFooterLogo->banner_url }}" alt="Trung-Thuy-Group"
                        class="lazyload" />
                </div>
                <div class="item">
                    <div class="itemText">
                        <p><strong>{{isset($arrFooterText['footer_address']) ? $arrFooterText['footer_address'] :  '?????A CH??? D??? ??N'}}</strong></p>
                        <p>{{ isset($arrFooterText['footer_add_con']) ? $arrFooterText['footer_add_con'] : '230 Nguy???n Tr??i, P. Nguy???n C?? Trinh, Qu???n 1, Tp. H??? Ch?? Minh'}}</p>
                    </div>
                    <div class="itemText">
                        <p><strong>{{isset($arrFooterText['footer_address_sam']) ? $arrFooterText['footer_address_sam'] : '?????A CH??? NH?? M???U'}}</strong></p>
                        <p>{{ isset($arrFooterText['footer_address_sam_con']) ? $arrFooterText['footer_address_sam_con'] : 'T??a nh?? Miss ??o D??i, 21 Nguy???n Trung Ng???n, P. B???n Ngh??, Qu???n 1, Tp. H??? Ch?? Minh'}}</p>
                    </div>
                </div>
                <div class="item">
                    <div class="itemText">
                        <p><strong>{{ isset($arrFooterText['footer_email']) ? $arrFooterText['footer_email'] : 'EMAIL'}}</strong></p>
                        <p><a href="mailto:{{isset($arrFooterText['footer_email_con']) ? $arrFooterText['footer_email_con'] : 'ttg@ttgvn.com'}}">{{isset($arrFooterText['footer_email_con']) ? $arrFooterText['footer_email_con'] : 'ttg@ttgvn.com'}}</a></p>
                    </div>
                    <div class="itemText">
                        <p><strong>{{isset($arrFooterText['footer_hotline']) ? $arrFooterText['footer_hotline'] : 'HOTLINE'}}</strong></p>
                        <p>{{ isset($arrFooterText['footer_hotline_con']) ? $arrFooterText['footer_hotline_con'] : '(+84) 933 09 09 09'}}</p>
                    </div>
                </div>
            </div>
            <div class="botFooter">
                <div class="textFt">
                    <div class="item">
                        <p>
                            {{isset($arrFooterText['footer_copyright']) ? $arrFooterText['footer_copyright'] : 'B???n quy???n ?? 2022 C??NG TY C??? PH???N B???T ?????NG S???N EMPIRE LAND.'}}<br />
                            {{isset($arrFooterText['footer_copyright2']) ? $arrFooterText['footer_copyright2'] : 'T???t c??? quy???n ???????c b???o l??u. Gi???y ph??p ??KKD s??? 0316476518, do S??? KH??T TP.HCM c???p ng??y
                            18/11/2021.'}}
                        </p>
                    </div>
                    <div class="item">
                        <p>
                            {!! isset($arrFooterText['footer_notice']) ?  nl2br($arrFooterText['footer_notice']) : '' !!} {{isset($arrFooterText['footer_text']) ? $arrFooterText['footer_text'] : 'T??i li???u ch??? d??ng v???i m???c ????ch tham kh???o. H??nh ???nh, s?? ????? k??? thu???t,
                            b??? tr?? n???i ngo???i th???t hay th??ng tin m?? t??? ch??? nh???m m???c ????ch minh ho???, kh??ng ph???i l?? th??ng
                            tin hi???n th???c hay cam k???t ph??p l??. Th??ng tin ch??nh th???c c??n c??? tr??n h???p ?????ng.'}}
                        </p>
                    </div>
                </div>
                <div class="share">
                    <a href="{{isset($arrFooterText['footer.facebook']) ? $arrFooterText['footer.facebook'] : 'https://www.facebook.com/LancasterbyTrungThuy/'}}" target="_blank"><img
                            data-src="{{ asset('assets/images/ico-fb.png') }}" class="lazyload" /></a>
                    <a href="{{isset($arrFooterText['footer.youtube']) ? $arrFooterText['footer.youtube'] : 'https://www.youtube.com/channel/UCrcWCZlgmHcgQV6L02e75kg'}}" target="_blank"><img
                            data-src="{{ asset('assets/images/ico-yt.png') }}" class="lazyload" /></a>
                    <a href="{{isset($arrFooterText['footer.linkin']) ? $arrFooterText['footer.linkin'] : 'https://vn.linkedin.com/company/trungthuygroup'}}" target="_blank"><img
                            data-src="{{ asset('assets/images/ico-in.png') }}" class="lazyload" /></a>
                </div>
            </div>
        </div>
    </footer>
    <a class="stickyPhone" href="tel:0933090909"></a>

    <div class="sideSticky">
        <div id="scrollTop" class="btnSlider style2 scrollTop">
            <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                <circle class=" circle" cx="50" cy="50" r="48" stroke="#ffffff" stroke-width="2" fill="none" />
            </svg>

        </div>
        @if (!in_array('trungthuy', $arrSidebarText['disables']))
        <a class="item ttg" href="{{ isset($arrSidebarText['trungthuy']) ? $arrSidebarText['trungthuy'] : 'https://trungthuy.com/' }}" target="_blank"></a>
        @endif

        @if (!in_array('vr', $arrSidebarText['disables']))
        <a class="item vr360" href="{{isset($arrSidebarText['vr']) ? $arrSidebarText['vr'] : '#'}}"></a>
        @endif

        @if (!in_array('chat', $arrSidebarText['disables']))
        <a class="item messenger" href="{{isset($arrSidebarText['chat']) ? $arrSidebarText['chat'] : '#'}}"></a>
        @endif

        @if (!in_array('brochure', $arrSidebarText['disables']))
        <a class="pdf" href="{{isset($arrSidebarText['brochure']) ? $arrSidebarText['brochure'] : '#'}}">
            <div class="copy">
                <p>{{isset($arrSidebarText['click']) ? $arrSidebarText['click'] : 'click to download'}}</p>
                <h2>{{isset($arrSidebarText['ebrochure']) ? $arrSidebarText['ebrochure'] : 'e - brochure'}}</h2>
            </div>
            <div class="iconSvg">
                <svg width="1em" height="1em" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.8464 23.6751H3.80371V13.1972" stroke="currentColor" stroke-miterlimit="10" />
                    <path d="M24.0766 20.5133V4.9691L19.6122 1.00061H3.80371V6.24451" stroke="currentColor"
                        stroke-miterlimit="10" />
                    <path d="M17.724 6.24451H1V13.1964H17.724V6.24451Z" stroke="currentColor" stroke-miterlimit="10" />
                    <path d="M19.6123 1.00061V4.9691H24.0767" stroke="currentColor" stroke-miterlimit="10" />
                    <path d="M20.3848 25.0006L20.3848 14.8467" stroke="currentColor" stroke-miterlimit="10" />
                    <path
                        d="M3.16406 11.5492V7.89233H4.85621C5.5719 7.89233 6.15185 8.40793 6.15185 9.04358C6.15185 9.66854 5.59082 10.18 4.88747 10.1948L3.16406 10.2318"
                        stroke="currentColor" stroke-miterlimit="10" />
                    <path
                        d="M9.53358 11.5492H7.67773V7.89233H9.5344C10.5388 7.89233 11.3532 8.70643 11.3532 9.71048V9.73103C11.3524 10.7351 10.5388 11.5492 9.53358 11.5492Z"
                        stroke="currentColor" stroke-miterlimit="10" />
                    <path d="M12.9414 11.5492V7.89233H15.5582" stroke="currentColor" stroke-miterlimit="10" />
                    <path d="M15.3797 9.79193H12.9414" stroke="currentColor" stroke-miterlimit="10" />
                    <path d="M23.1537 22.2314L20.3845 25.0006L17.6152 22.2314" stroke="currentColor" />
                </svg>
            </div>
        </a>
        @endif
    </div>

    <div id="FloorPlanDetail" class="floorPlanDetailPu">
        <div class="container">
            <div class="left">
                <div class="btnBack js-closefloorplandetail"><span></span></div>
                <div class="top">
                    <p><img class="lazyload btnBackAr js-closefloorplandetail"
                            data-src="{{ asset('assets/images/btn-back.png') }}" alt=""> M???t b???ng to?? / to?? b / t???ng 8 -
                        18</p>
                    <h2 class="mainTt">C??n h??? 2 ph??ng ng???</h2>
                </div>
                <div class="bottom">
                    <div class="item">
                        <p>M?? c??n h???: <strong>B08.05</strong></p>
                    </div>
                    <div class="item">
                        <p>Di???n t??ch th??ng th???y: <strong>88,5 m<sup>2</sup></strong></p>
                    </div>
                    <div class="item">
                        <p>S??n th??p: <strong>2,2</strong></p>
                    </div>
                    <div class="item">
                        <p>Di???n t??ch tim t?????ng: <strong>90,5 m<sup>2</sup></strong></p>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="mainImgFP">
                    <img data-src="{{ asset('assets/images/demo/43.jpg') }}" class="lazyload" />

                    <div class="opSlideGallery">
                        <div class="btnSlider style2 btnSliderPrev">
                            <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                                <circle class=" circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                    fill="none" />
                            </svg>

                        </div>
                        <div class="btnSlider style2 btnSliderNext">
                            <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                                <circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                    fill="none" />
                            </svg>

                        </div>

                    </div>
                </div>
                <div class="locaImgFP">
                    <p>V??? tr?? c??n h??? <img data-src="{{ asset('assets/images/lb.png') }}" class="lazyload" /></p>
                    <img data-src="{{ asset('assets/images/demo/44.jpg') }}" class="lazyload" />
                </div>

            </div>
        </div>
    </div>


    <!-- POPUPS / MODALS -->
    <div id="popup" class="helper-hide">
        <div class="holder helper-centerbox register">ABC</div>
        <div class="holder helper-centerbox login">DEF</div>
    </div>


    <!-- PRELOADER -->

    <!-- Default PRELOADER with rotating circle -->
    <!-- ???????c control b???i: main.js -->
    <!-- PRELOADER.show() -->
    <!-- PRELOADER.hide() -->
    <div id="preloader" class="hideld">
        <div class="layer1">
            <!-- <img data-src="assets/images/loading1.png"  class="lazyload"/> -->
            <div class="layer2" style="background: url({{ asset('assets/images/loading2.png') }}) bottom no-repeat"></div>
        </div>

    </div>


    <!-- Default JS files -->
    <script>    
        var path_resource = host_url+'/';
        function randomVersion(){return"?v="+ +new Date+(99*Math.random()<<0)}"function"!=typeof Object.assign&&Object.defineProperty(Object,"assign",{value:function(t,n){"use strict";if(null==t)throw new TypeError("Cannot convert undefined or null to object");for(var e=Object(t),r=1;r<arguments.length;r++){var i=arguments[r];if(null!=i)for(var o in i)Object.prototype.hasOwnProperty.call(i,o)&&(e[o]=i[o])}return e},writable:!0,configurable:!0}),String.prototype.includes||(String.prototype.includes=function(t,n){"use strict";return"number"!=typeof n&&(n=0),!(n+t.length>this.length)&&-1!==this.indexOf(t,n)}),Array.prototype.find||Object.defineProperty(Array.prototype,"find",{value:function(t){if(null==this)throw TypeError('"this" is null or not defined');var n=Object(this),e=n.length>>>0;if("function"!=typeof t)throw TypeError("predicate must be a function");for(var r=arguments[1],i=0;i<e;){var o=n[i];if(t.call(r,o,i,n))return o;i++}},configurable:!0,writable:!0}),Object.defineProperties(Array.prototype,{first:{get:function(){return 0==this.length?null:this[0]}},last:{get:function(){return 0==this.length?null:this[this.length-1]}},randomIndex:{get:function(){return Math.floor(Math.random()*this.length)}},randomElement:{get:function(){return this[this.randomIndex]}}}),Object.assign(Array.prototype,{getRandom:function(t){var n=new Array(t),e=this.length,r=new Array(e);if(e<t)throw new RangeError("getRandom: more elements taken than available");for(;t--;){var i=Math.floor(Math.random()*e);n[t]=this[i in r?r[i]:i],r[i]=--e in r?r[e]:e}return n},getHalfRandom:function(){var t=Math.ceil(this.length/2);return this.getRandom(t)},shuffle:function(){var t,n,e=this.length;if(0==e)return this;for(;--e;)t=Math.floor(Math.random()*(e+1)),n=this[e],this[e]=this[t],this[t]=n;return this},moveIndex:function(t,n){if(n>=this.length)for(var e=n-this.length+1;e--;)this.push(void 0);return this.splice(n,0,this.splice(t,1)[0]),this}}),Object.assign(String.prototype,{isEmpty:function(){return null===this||null!==this.match(/^ *$/)},replaceAt:function(){return this.substr(0,index)+replacement+this.substr(index+replacement.length)}});
        var GLoader={version:"1.7",tmpScriptData:[],loadScript:function(t,n){t||n&&n();var e=!1,o=-1<t.indexOf(".js")?"js":"css",r={status:!1,message:""},s="js"==o?document.createElement("script"):document.createElement("link");function a(){e||(e=!0,r.status=!0,r.message="Script was loaded successfully",n&&n(r))}function l(){e||"complete"===s.readyState&&a()}function i(){e||(e=!0,r.status=!1,r.message="Failed to load script.",n&&n(r))}s.setAttribute("data-loader","GLoader"),"js"==o?(s.setAttribute("type","text/javascript"),isLocal?s.setAttribute("src",t):GLoader.loadFile(t,{onComplete:function(e){GLoader.embedScript(s,GLoader.getFileName(t),e),n&&n(r)},onError:i})):(s.setAttribute("rel","stylesheet"),s.setAttribute("type","text/css"),s.setAttribute("href",t)),"js"==o?document.body.appendChild(s):(document.head.appendChild(s),s.onload=a,s.onreadystatechange=l,s.onerror=i),isLocal&&(s.onload=a,s.onreadystatechange=l,s.onerror=i)},isExisted:function(e){var t=!1,n=this.getFileName(e),e="js_"+n;if(0!=document.getElementsByName(e).length)return!0;for(var o,r=document.getElementsByTagName("script"),s=0;s<r.length;s++)r[s].src&&(o=r[s].src,this.getFileName(o).toLowerCase()==n.toLowerCase()&&(t=!0));return t},embedScript:function(e,t,n){(e.getAttribute("name")||"").isEmpty()&&e.setAttribute("name",name),isLocal||e.removeAttribute("name"),e.textContent=n},loadScripts:function(n,e){var o=(e=e||{}).onComplete||null,r=e.onProcess||null;if(0!=n.length)if(isLocal){var s=0,a=n.length;GLoader.loadScript(n[s],function e(t){r&&r(s/a);s++;s==a?(t.status=!0,t.message="All scripts were loaded.",r&&r(1),o&&o(t)):GLoader.isExisted(n[s])?(console.log('[GLoader] The script "'+n[s]+'" was existed -> Skipped.'),e&&e()):GLoader.loadScript(n[s],e)})}else{n.filter(function(e){return-1<e.indexOf(".css")}).map(function(e){return GLoader.loadScript(e)});for(var t=[],l=[],i=0,u=0;u<n.length;u++){var d,c,p=n[u];p.indexOf(".js")<=-1||(d="js_"+GLoader.getFileName(p),GLoader.isExisted(GLoader.getFileName(p))||((c=document.createElement("script")).setAttribute("name",d),c.setAttribute("data-loader","GLoader"),c.setAttribute("type","text/javascript"),document.body.appendChild(c),t.push(n[u]),l.push({id:i,url:p,name:d}),i++))}var f=-1,m=[];this.loadMultiFile(t,{maxQueue:7,onProgress:function(e,t,n){var o=l.find(function(e){return e.url==t});o.data=n,m.push(o),m.find(function(e){return e.id==f+1})&&(m.sort(function(e,t){return e.id-t.id}),function(){for(var e=0;e<m.length;e++){var t=m[e];if(t.id!=f+1)return;f++,GLoader.embedScript(document.getElementsByName(t.name)[0],t.name,t.data),m.shift(),e--}}()),null!=r&&r(e)},onComplete:function(){o&&o()}})}else o&&o()},loadPhoto:function(e,t,n){var o=new Image;o.onload=function(){void 0!==n&&n(e)},o.onerror=function(){void 0!==n&&n(null)},o.src=e},loadPhotos:function(e,n,o){var r=e,s=0,a=r.length,l={status:!1,message:""},i=[],u=r[s];this.loadPhoto(u,n,function e(t){s++;s==a?(l.status=!0,l.message="All photos were loaded.",l.photos=i,o&&o(l)):(i.push(t),u=r[s],GLoader.loadPhoto(u,n,e))})},loadFile:function(e,t){var n=(t=null!=t?t:{}).hasOwnProperty("onProgress")?t.onProgress:null,o=t.hasOwnProperty("onComplete")?t.onComplete:null,r=t.hasOwnProperty("onError")?t.onError:null,t=t.hasOwnProperty("responseType")?t.responseType:"text",s=new XMLHttpRequest;s.open("GET",e,!0),s.responseType=t,s.onprogress=function(e){e=e.loaded/e.total;null!=n&&n(e)},s.onreadystatechange=function(){s.readyState,s.readyState,s.readyState},s.onload=function(){s.readyState===s.DONE&&parseInt(s.status.toString())<400?null!=o&&o(s.response,e):null!=r&&r("Status error "+this.status,"",e)},s.onerror=function(e){console.log(e),null!=r&&r("Loading error")},s.send()},loadMultiFile:function(o,e){var t=this,r=(e=null!=e?e:{}).hasOwnProperty("onProgress")?e.onProgress:null,n=e.hasOwnProperty("onComplete")?e.onComplete:null,s=e.hasOwnProperty("onError")?e.onError:null,a=e.hasOwnProperty("maxQueue")?e.maxQueue:5,l=e.hasOwnProperty("responseType")?e.responseType:"text",i=0,u=0,d=0,c=0;if(0!=o.length&&null!=o||v(),o.length<a)for(let e=0;e<o.length;e++){var p=o[e];t.loadFile(p,{responseType:l,onError:h,onComplete:g})}else f();function f(){var e;u<o.length&&i<a&&(i++,e=o[u],u++,t.loadFile(e,{responseType:l,onComplete:y,onError:h}),f())}function m(e,t){var n=++d/o.length;r&&r(n,e,t)}function h(e,t,n){s&&s(e),void 0!==t&&y(t,n)}function g(e,t){c++,m(t,e),c>=o.length&&v()}function y(e,t){i--,m(t,e),(u>=o.length&&0==i?v:f)()}function v(){n&&n()}},getFileName:function(e){-1<e.indexOf("?")&&(e=e.substring(0,e.indexOf("?")));var t=0<=e.indexOf("\\")?e.lastIndexOf("\\"):e.lastIndexOf("/"),t=e.substring(t);return 0!==t.indexOf("\\")&&0!==t.indexOf("/")||(t=t.substring(1)),t}};
    </script>

    <!-- S??? d???ng 1 trong 2 lazyload b??n d?????i -->
    <!-- <script type="text/javascript" async src="{{ asset('assets/js/vendor/lazysizes/lazysizes.min.js') }}"></script>-->
    <script type="text/javascript" src="{{ asset('assets/js/vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" async src="{{ asset('assets/js/digitop/lazyloadCustom.js') }}"></script>
    <script type="text/javascript" async src="{{ asset('assets/js/main.js') }}" async></script>
    <script type="text/javascript" src="{{ asset('assets/js/function.js') }}" async></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" async src="{{ asset('assets/js/function.js') }}" async></script> -->

</body>

</html>