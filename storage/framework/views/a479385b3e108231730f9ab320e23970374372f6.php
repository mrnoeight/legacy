<!doctype html>
<html class="no-js" lang="" style="overflow: hidden;">

<!-- HEADER CONFIGURATION -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />

    <!-- SEO -->
    <title><?php echo $__env->yieldContent('title', 'Lancaster Legacy'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Lancaster Legacy'); ?>">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Social Sharing Info -->
    <meta property="og:url" content="" />
    <meta property="og:title" content="<?php echo $__env->yieldContent('title', 'Lancaster Legacy'); ?>" />
    <meta property="og:description" content="<?php echo $__env->yieldContent('description', 'Lancaster Legacy'); ?>" />
    <meta property="og:image" content="<?php echo e(asset('assets/images/share.jpg')); ?>" />
    <meta property="og:image:width" content="600" /> <!-- Full HD: WIDTH -->
    <meta property="og:image:height" content="315" /> <!-- Full HD: HEIGHT -->
    <meta property="fb:app_id" content="" />

    <meta name="webroot" content="." />

    <!-- Viewport and mobile -->
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">

    <!-- FAVICON -->
    <link rel="image_src" href="<?php echo e(asset('assets/images/favicon/favicon.ico')); ?>" />
    <link rel="icon" type="image/gif" href="<?php echo e(asset('assets/images/favicon/favicon.ico')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">

    <link rel="preload" href="<?php echo e(asset('assets/css/pure.css')); ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/pure.css')); ?>">
    </noscript>
    <link rel="preload" href="<?php echo e(asset('assets/css/helper.css')); ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/helper.css')); ?>">
    </noscript>


    <script>
    window.env = {
        HOST: "https://localhost:3000"
    }
    host_url = "<?php echo e(env("APP_URL", "")); ?>";
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">


</head>

<?php
    $oLogo = tk1GetLogo();
    $oFooterLogo = tk1GetFooterLogo();
    $arrMenuText = tk1GetMenu(); 
    $arrFooterText = tk1GetFooter(); 
?>

<body>
    <!-- HEADER / MENU NAVIGATION -->
    <header>
        <div class="container stagger-down">
            <a class="logo" href="<?php echo e(route('home')); ?>">
                <img class="lazyload logo1" data-src="<?php echo e($oLogo->banner_url); ?>"
                    alt="Lancaster-Legacy">
                <!-- <img class="lazyload logo2" data-src="<?php echo e(asset('assets/images/lancaster_legacy_logo2.png')); ?>" alt="Lancaster-Legacy"> -->
            </a>
            <div class="left">
                <nav>
                    <a href="<?php echo e(route('home')); ?>" <?php echo e($menu_active['home']); ?>><?php echo e(isset($arrMenuText['menu_home']) ? $arrMenuText['menu_home'] :  __('Trang ch???')); ?></a>
                    <a href="<?php echo e(route('home')); ?>#locationWrap" <?php echo e($menu_active['location']); ?>><?php echo e(isset($arrMenuText['menu_location']) ? $arrMenuText['menu_location'] : __('V??? tr??')); ?></a>
                    <a href="<?php echo e(route('apartment')); ?>" <?php echo e($menu_active['apartment']); ?>><?php echo e(isset($arrMenuText['menu_apartment']) ? $arrMenuText['menu_apartment'] : __('Th??ng tin c??n h???')); ?></a>
                    <a href="<?php echo e(route('tienich')); ?>" <?php echo e($menu_active['utilities']); ?>><?php echo e(isset($arrMenuText['menu_amenities']) ? $arrMenuText['menu_amenities'] : __('Ti???n ??ch')); ?></a>
                    <a href="<?php echo e(route('gallery')); ?>" <?php echo e($menu_active['gallery']); ?>><?php echo e(isset($arrMenuText['menu_gallery']) ? $arrMenuText['menu_gallery'] : __('Th?? vi???n')); ?></a>

                </nav>
            </div>

            <div class="right">
                <nav>
                    <a href="<?php echo e(route('news')); ?>" <?php echo e($menu_active['news']); ?>><?php echo e(isset($arrMenuText['menu_news']) ? $arrMenuText['menu_news'] : __('Tin t???c')); ?></a>
                    <!-- <a href="#" class="">VR 360 tour</a> -->
                    <a href="<?php echo e(route('lancaster')); ?>" <?php echo e($menu_active['lancaster']); ?>><?php echo e(isset($arrMenuText['menu_lancaster']) ? $arrMenuText['menu_lancaster'] : 'Lancaster By Trung Thuy'); ?></a>
                    <a href="<?php echo e(route('progress')); ?>" <?php echo e($menu_active['progress']); ?>><?php echo e(isset($arrMenuText['menu_progress']) ? $arrMenuText['menu_progress'] :  __('Ti???n ?????')); ?></a>
                    <a href="<?php echo e(route('home')); ?>#infomationWrap" <?php echo e($menu_active['about']); ?>><?php echo e(isset($arrMenuText['menu_contact']) ? $arrMenuText['menu_contact'] :  __('Li??n h???')); ?></a>
                </nav>
                <div class="lang">
                    <?php if(App::isLocale('vi')): ?>
                    <p>VN</p>
                    <a href="<?php echo e(route('change_language', ['language'=>'en'])); ?>">EN</a>
                    <?php else: ?>
                    <p>EN</p>
                    <a href="<?php echo e(route('change_language', ['language'=>'vi'])); ?>">VN</a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </header>

    <header class="fixedHeader">
        <div class="container">
            <div class="left">
                <nav>
                    <a href="<?php echo e(route('home')); ?>" <?php echo e($menu_active['home']); ?>><?php echo e(isset($arrMenuText['menu_home']) ? $arrMenuText['menu_home'] :  __('Trang ch???')); ?></a>
                    <a href="<?php echo e(route('home')); ?>#locationWrap" <?php echo e($menu_active['location']); ?>><?php echo e(isset($arrMenuText['menu_location']) ? $arrMenuText['menu_location'] : __('V??? tr??')); ?></a>
                    <a href="<?php echo e(route('apartment')); ?>" <?php echo e($menu_active['apartment']); ?>><?php echo e(isset($arrMenuText['menu_apartment']) ? $arrMenuText['menu_apartment'] : __('Th??ng tin c??n h???')); ?></a>
                    <a href="<?php echo e(route('tienich')); ?>" <?php echo e($menu_active['utilities']); ?>><?php echo e(isset($arrMenuText['menu_amenities']) ? $arrMenuText['menu_amenities'] : __('Ti???n ??ch')); ?></a>
                    <a href="<?php echo e(route('gallery')); ?>" <?php echo e($menu_active['gallery']); ?>><?php echo e(isset($arrMenuText['menu_gallery']) ? $arrMenuText['menu_gallery'] : __('Th?? vi???n')); ?></a>
                </nav>
            </div>
            <a class="logo" href="<?php echo e(route('home')); ?>"><img
                    data-src="<?php echo e($oLogo->banner_mb_url); ?>" alt="Lancaster-Legacy"
                    class="lazyload"></a>
            <div class="right">
                <nav>
                    <a href="<?php echo e(route('news')); ?>" <?php echo e($menu_active['news']); ?>><?php echo e(isset($arrMenuText['menu_news']) ? $arrMenuText['menu_news'] : __('Tin t???c')); ?></a>
                    <a href="<?php echo e(route('lancaster')); ?>" <?php echo e($menu_active['lancaster']); ?>><?php echo e(isset($arrMenuText['menu_lancaster']) ? $arrMenuText['menu_lancaster'] : 'Lancaster By Trung Thuy'); ?></a>
                    <a href="<?php echo e(route('progress')); ?>" <?php echo e($menu_active['progress']); ?>><?php echo e(isset($arrMenuText['menu_progress']) ? $arrMenuText['menu_progress'] :  __('Ti???n ?????')); ?></a>
                    <a href="<?php echo e(route('home')); ?>#infomationWrap" <?php echo e($menu_active['about']); ?>><?php echo e(isset($arrMenuText['menu_contact']) ? $arrMenuText['menu_contact'] :  __('Li??n h???')); ?></a>
                </nav>
                <div class="lang">
                    <?php if(App::isLocale('vi')): ?>
                    <p>VN</p>
                    <a href="<?php echo e(route('change_language', ['language'=>'en'])); ?>">EN</a>
                    <?php else: ?>
                    <p>EN</p>
                    <a href="<?php echo e(route('change_language', ['language'=>'vi'])); ?>">VN</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <header class="menuMobile">
        <a class="logo" href="<?php echo e(route('home')); ?>"><img
                data-src="<?php echo e($oLogo->banner_mb_url); ?>" alt="" class="lazyload"></a>
        <div class="container">
            <div class="hamburger-menu js_menuMobile">
                <div class="bar"></div>
            </div>
            <div class="lang">
                <?php if(App::isLocale('vi')): ?>
                <p>VN</p>
                <a href="<?php echo e(route('change_language', ['language'=>'en'])); ?>">EN</a>
                <?php else: ?>
                <p>EN</p>
                <a href="<?php echo e(route('change_language', ['language'=>'vi'])); ?>">VN</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="navMobile">
            <nav class="menufix">
                <ul>
                    <li>
                        <a href="<?php echo e(route('home')); ?>" <?php echo e($menu_active['home']); ?>><?php echo e(isset($arrMenuText['menu_home']) ? $arrMenuText['menu_home'] :  __('Trang ch???')); ?></a>
                        <span class="subMb js-subMenuMb"><img data-src="<?php echo e(asset('assets/images/ar-1.png')); ?>"
                                class="lazyload"></span>
                        <div class="submenu">
                            <a href="<?php echo e(route('home')); ?>#overviewWrap">T???ng quan d??? ??n</a>
                            <a href="<?php echo e(route('home')); ?>#aboutUsWrap">V??i n??t v??? T???p ??o??n Trung Thu???</a>
                            <a href="<?php echo e(route('home')); ?>#galleryWrap">H??nh ???nh d??? ??n</a>
                            <a href="<?php echo e(route('home')); ?>#partnerWrap">?????i t??c</a>
                            <a href="<?php echo e(route('home')); ?>#infomationWrap">Li??n h???</a>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo e(route('home')); ?>#locationWrap" <?php echo e($menu_active['location']); ?>><?php echo e(isset($arrMenuText['menu_location']) ? $arrMenuText['menu_location'] : __('V??? tr??')); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('apartment')); ?>" <?php echo e($menu_active['apartment']); ?>><?php echo e(isset($arrMenuText['menu_apartment']) ? $arrMenuText['menu_apartment'] : __('Th??ng tin c??n h???')); ?></a>
                        <span class="subMb js-subMenuMb"><img data-src="<?php echo e(asset('assets/images/ar-1.png')); ?>"
                                class="lazyload"></span>
                        <div class="submenu">
                            <a href="<?php echo e(route('apartment')); ?>#masterplan">Masterplan</a>
                            <a href="<?php echo e(route('apartment')); ?>#floorplan">M???t b???ng ti???n ??ch</a>
                            <a href="<?php echo e(route('apartment')); ?>#rooftop">M???t b???ng to??</a>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo e(route('tienich')); ?>" <?php echo e($menu_active['utilities']); ?>><?php echo e(isset($arrMenuText['menu_amenities']) ? $arrMenuText['menu_amenities'] : __('Ti???n ??ch')); ?></a>
                        <span class="subMb js-subMenuMb"><img data-src="<?php echo e(asset('assets/images/ar-1.png')); ?>"
                                class="lazyload"></span>
                        <div class="submenu">
                            <a href="<?php echo e(route('tienich')); ?>#PrivateLegacyclub">Private Legacy club</a>
                            <a href="<?php echo e(route('tienich')); ?>#ShoppingCenter">Trung t??m th????ng m???i</a>
                            <a href="<?php echo e(route('tienich')); ?>#HealthUtility">Ti???n ??ch s???c kho???</a>
                            <a href="<?php echo e(route('tienich')); ?>#Entertainment">Gi???i tr?? </a>
                            <a href="<?php echo e(route('tienich')); ?>#Business">Business</a>
                        </div>
                    </li>
                    <li><a href="<?php echo e(route('gallery')); ?>" <?php echo e($menu_active['gallery']); ?>><?php echo e(isset($arrMenuText['menu_gallery']) ? $arrMenuText['menu_gallery'] : __('Th?? vi???n')); ?></a></li>

                    <li><a href="<?php echo e(route('news')); ?>" <?php echo e($menu_active['news']); ?>><?php echo e(isset($arrMenuText['menu_news']) ? $arrMenuText['menu_news'] : __('Tin t???c')); ?></a></li>
                    <!-- <li><a href="#" class="">VR 360 tour</a></li> -->
                    <li>
                        <a href="<?php echo e(route('lancaster')); ?>" <?php echo e($menu_active['lancaster']); ?>><?php echo e(isset($arrMenuText['menu_lancaster']) ? $arrMenuText['menu_lancaster'] : 'Lancaster By Trung Thuy'); ?></a>
                        <span class="subMb js-subMenuMb"><img data-src="<?php echo e(asset('assets/images/ar-1.png')); ?>"
                                class="lazyload"></span>
                        <div class="submenu">
                            <a href="<?php echo e(route('lancaster')); ?>#LancasterTheMaster">Lancaster The Master</a>
                            <a href="<?php echo e(route('lancaster')); ?>#LancasterClub">Lancaster Club</a>
                            <a href="<?php echo e(route('lancaster')); ?>#ConsultingTeam">?????i ng?? t?? v???n</a>
                        </div>
                    </li>
                    <li><a href="<?php echo e(route('progress')); ?>" <?php echo e($menu_active['progress']); ?>><?php echo e(isset($arrMenuText['menu_progress']) ? $arrMenuText['menu_progress'] :  __('Ti???n ?????')); ?></a></li>
                    <li><a href="<?php echo e(route('home')); ?>#infomationWrap" <?php echo e($menu_active['about']); ?>><?php echo e(isset($arrMenuText['menu_contact']) ? $arrMenuText['menu_contact'] :  __('Li??n h???')); ?></a>
                    </li>
                </ul>

            </nav>
        </div>
    </header>

    <?php echo $__env->yieldContent('content'); ?>

    <!-- FOOTER -->
    <footer class="pd1">
        <div class="container">
            <div class="topFooter">
                <div class="item">
                    <p><?php echo e(isset($arrFooterText['footer_invest']) ? $arrFooterText['footer_invest'] : '?????U T?? V?? PH??T TRI???N'); ?></p>
                    <img data-src="<?php echo e($oFooterLogo->banner_url); ?>" alt="Trung-Thuy-Group"
                        class="lazyload" />
                </div>
                <div class="item">
                    <div class="itemText">
                        <p><strong><?php echo e(isset($arrFooterText['footer_address']) ? $arrFooterText['footer_address'] :  '?????A CH??? D??? ??N'); ?></strong></p>
                        <p><?php echo e(isset($arrFooterText['footer_add_con']) ? $arrFooterText['footer_add_con'] : '230 Nguy???n Tr??i, P. Nguy???n C?? Trinh, Qu???n 1, Tp. H??? Ch?? Minh'); ?></p>
                    </div>
                    <div class="itemText">
                        <p><strong><?php echo e(isset($arrFooterText['footer_address_sam']) ? $arrFooterText['footer_address_sam'] : '?????A CH??? NH?? M???U'); ?></strong></p>
                        <p><?php echo e(isset($arrFooterText['footer_address_sam_con']) ? $arrFooterText['footer_address_sam_con'] : 'T??a nh?? Miss ??o D??i, 21 Nguy???n Trung Ng???n, P. B???n Ngh??, Qu???n 1, Tp. H??? Ch?? Minh'); ?></p>
                    </div>
                </div>
                <div class="item">
                    <div class="itemText">
                        <p><strong><?php echo e(isset($arrFooterText['footer_email']) ? $arrFooterText['footer_email'] : 'EMAIL'); ?></strong></p>
                        <p><a href="mailto:<?php echo e(isset($arrFooterText['footer_email_con']) ? $arrFooterText['footer_email_con'] : 'ttg@ttgvn.com'); ?>"><?php echo e(isset($arrFooterText['footer_email_con']) ? $arrFooterText['footer_email_con'] : 'ttg@ttgvn.com'); ?></a></p>
                    </div>
                    <div class="itemText">
                        <p><strong><?php echo e(isset($arrFooterText['footer_hotline']) ? $arrFooterText['footer_hotline'] : 'HOTLINE'); ?></strong></p>
                        <p><?php echo e(isset($arrFooterText['footer_hotline_con']) ? $arrFooterText['footer_hotline_con'] : '(+84) 933 09 09 09'); ?></p>
                    </div>
                </div>
            </div>
            <div class="botFooter">
                <div class="textFt">
                    <div class="item">
                        <p>
                            <?php echo e(isset($arrFooterText['footer_copyright']) ? $arrFooterText['footer_copyright'] : 'B???n quy???n ?? 2022 C??NG TY C??? PH???N B???T ?????NG S???N EMPIRE LAND.'); ?><br />
                            <?php echo e(isset($arrFooterText['footer_copyright2']) ? $arrFooterText['footer_copyright2'] : 'T???t c??? quy???n ???????c b???o l??u. Gi???y ph??p ??KKD s??? 0316476518, do S??? KH??T TP.HCM c???p ng??y
                            18/11/2021.'); ?>

                        </p>
                    </div>
                    <div class="item">
                        <p>
                            <?php echo isset($arrFooterText['footer_notice']) ?  nl2br($arrFooterText['footer_notice']) : ''; ?> <?php echo e(isset($arrFooterText['footer_text']) ? $arrFooterText['footer_text'] : 'T??i li???u ch??? d??ng v???i m???c ????ch tham kh???o. H??nh ???nh, s?? ????? k??? thu???t,
                            b??? tr?? n???i ngo???i th???t hay th??ng tin m?? t??? ch??? nh???m m???c ????ch minh ho???, kh??ng ph???i l?? th??ng
                            tin hi???n th???c hay cam k???t ph??p l??. Th??ng tin ch??nh th???c c??n c??? tr??n h???p ?????ng.'); ?>

                        </p>
                    </div>
                </div>
                <div class="share">
                    <a href="https://www.facebook.com/LancasterbyTrungThuy/" target="_blank"><img
                            data-src="<?php echo e(asset('assets/images/ico-fb.png')); ?>" class="lazyload" /></a>
                    <a href="https://www.youtube.com/channel/UCrcWCZlgmHcgQV6L02e75kg" target="_blank"><img
                            data-src="<?php echo e(asset('assets/images/ico-yt.png')); ?>" class="lazyload" /></a>
                    <a href="https://vn.linkedin.com/company/trungthuygroup" target="_blank"><img
                            data-src="<?php echo e(asset('assets/images/ico-in.png')); ?>" class="lazyload" /></a>
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
        <a class="item ttg" href="https://trungthuy.com/" target="_blank"></a>
        <a class="item vr360" href="#"></a>
        <a class="item messenger" href="#"></a>
        <a class="pdf" href="#">
            <div class="copy">
                <p>click to download</p>
                <h2>e - brochure</h2>
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
    </div>

    <div id="FloorPlanDetail" class="floorPlanDetailPu">
        <div class="container">
            <div class="left">
                <div class="btnBack js-closefloorplandetail"><span></span></div>
                <div class="top">
                    <p><img class="lazyload btnBackAr js-closefloorplandetail"
                            data-src="<?php echo e(asset('assets/images/btn-back.png')); ?>" alt=""> M???t b???ng to?? / to?? b / t???ng 8 -
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
                    <img data-src="<?php echo e(asset('assets/images/demo/43.jpg')); ?>" class="lazyload" />

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
                    <p>V??? tr?? c??n h??? <img data-src="<?php echo e(asset('assets/images/lb.png')); ?>" class="lazyload" /></p>
                    <img data-src="<?php echo e(asset('assets/images/demo/44.jpg')); ?>" class="lazyload" />
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
            <div class="layer2" style="background: url(<?php echo e(asset('assets/images/loading2.png')); ?>) bottom no-repeat"></div>
        </div>

    </div>


    <!-- Default JS files -->
    <script>
    function randomVersion() {
        return '?v=' + (+new Date()) + (99 * Math.random() << 0);
    }


    //	Polyfills

    /*


    Array
        prototype:
            first
            last
            randomIndex
            randomElement

        method:
            getRandom
            getHalfRandom
            shuffle
            moveIndex

    String
        prototype:
            isEmpty
            replaceAt

    */

    //Object.assign
    "function" != typeof Object.assign && Object.defineProperty(Object, "assign", {
        value: function(e, t) {
            "use strict";
            if (null == e) throw new TypeError("Cannot convert undefined or null to object");
            for (var n = Object(e), r = 1; r < arguments.length; r++) {
                var o = arguments[r];
                if (null != o)
                    for (var c in o) Object.prototype.hasOwnProperty.call(o, c) && (n[c] = o[c])
            }
            return n
        },
        writable: !0,
        configurable: !0
    });

    //String.includes
    String.prototype.includes || (String.prototype.includes = function(t, e) {
        "use strict";
        return "number" != typeof e && (e = 0), !(e + t.length > this.length) && -1 !== this.indexOf(t, e)
    });

    //Array.find
    Array.prototype.find || Object.defineProperty(Array.prototype, "find", {
        value: function(r) {
            if (null == this) throw TypeError('"this" is null or not defined');
            var t = Object(this),
                e = t.length >>> 0;
            if ("function" != typeof r) throw TypeError("predicate must be a function");
            for (var i = arguments[1], o = 0; o < e;) {
                var n = t[o];
                if (r.call(i, n, o, t)) return n;
                o++
            }
        },
        configurable: !0,
        writable: !0
    });



    Object.defineProperties(Array.prototype, {

        first: {
            get: function() {
                if (this.length == 0) return null;
                return this[0];
            },
        },

        last: {
            get: function() {
                if (this.length == 0) return null;
                return this[this.length - 1];
            },
        },

        randomIndex: {
            get: function() {
                return Math.floor(Math.random() * this.length);
            },
        },

        randomElement: {
            get: function() {
                return this[this.randomIndex]
            },
        },

    });





    Object.assign(Array.prototype, {

        getRandom: function(n) {
            var result = new Array(n),
                len = this.length,
                taken = new Array(len);
            if (n > len)
                throw new RangeError("getRandom: more elements taken than available");
            while (n--) {
                var x = Math.floor(Math.random() * len);
                result[n] = this[x in taken ? taken[x] : x];
                taken[x] = --len in taken ? taken[len] : len;
            }
            return result;
        },

        getHalfRandom: function() {
            var n = Math.ceil(this.length / 2);
            return this.getRandom(n);
        },


        shuffle: function() {
            var i = this.length,
                j, temp;
            if (i == 0) return this;
            while (--i) {
                j = Math.floor(Math.random() * (i + 1));
                temp = this[i];
                this[i] = this[j];
                this[j] = temp;
            }
            return this;
        },

        moveIndex: function(oldIndex, newIndex) {
            // return Math.floor(Math.random() * this.length);
            if (newIndex >= this.length) {
                var k = newIndex - this.length + 1;
                while (k--) {
                    this.push(undefined);
                }
            }
            this.splice(newIndex, 0, this.splice(oldIndex, 1)[0]);
            return this; // for testing
        },
    })



    Object.assign(String.prototype, {

        isEmpty: function() {
            return this === null || this.match(/^ *$/) !== null;
        },
        replaceAt: function() {
            return this.substr(0, index) + replacement + this.substr(index + replacement.length);
        },

    })
    </script>

    <script>
    /* GLoader - version 1.6.2
- Description: preload external Image, JS & CSS files
- Date: Aug 12, 2017
- Author: Duy Nguyen <duynguyen@wearetopgroup.com>
- Contributor: Tam Lam <tamlam@wearetopgroup.com>
================================================== */
    var GLoader = {
        version: '1.7',

        // Load script: JS or CSS
        tmpScriptData: [],
        loadScript: function(url, callback) {
            if (!url)
                if (callback) callback();

            // url += randomVersion();
            url = host_url + "/" + url;
            url = url.replace("/tin-tuc-chi-tiet", "");
            //alert(url);

            var done = false;
            var fileType = url.indexOf('.js') > -1 ? 'js' : 'css';
            var result = {
                status: false,
                message: ''
            };
            var script = fileType == 'js' ?
                document.createElement('script') :
                document.createElement('link');

            script.setAttribute('data-loader', 'GLoader');
            if (fileType == 'js') {
                // script.setAttribute('async', "");
                script.setAttribute('type', 'text/javascript');
                if (isLocal) {
                    script.setAttribute('src', url);
                } else {
                    embedJsToHTML();
                }
            } else {
                script.setAttribute('rel', 'stylesheet');
                script.setAttribute('type', 'text/css');
                script.setAttribute('href', url);
            }


            function embedJsToHTML() {

                GLoader.loadFile(url, {
                    onComplete: onLoad,
                    onError: handleError
                });

                function onLoad(content) {
                    // GLoader.tmpScriptData.push({"name": GLoader.getFileName(url), "content": content})
                    GLoader.embedScript(script, GLoader.getFileName(url), content)
                    // script.innerHTML = content;
                    if (callback) callback(result);
                }
            };

            if (fileType == 'js') {
                document.body.appendChild(script);
            } else {
                document.head.appendChild(script);

                script.onload = handleLoad;
                script.onreadystatechange = handleReadyStateChange;
                script.onerror = handleError;
            }

            if (isLocal) {

                // events
                script.onload = handleLoad;
                script.onreadystatechange = handleReadyStateChange;
                script.onerror = handleError;
            }


            function handleLoad() {
                if (!done) {
                    done = true;

                    result.status = true;
                    result.message = 'Script was loaded successfully';

                    if (callback) callback(result);
                }
            }

            function handleReadyStateChange() {
                var state;

                if (!done) {
                    state = script.readyState;
                    if (state === 'complete') {
                        handleLoad();
                    }
                }
            }

            function handleError() {
                //console.log("error");
                if (!done) {
                    done = true;
                    result.status = false;
                    result.message = 'Failed to load script.';
                    if (callback) callback(result);
                }
            }
        },

        // check file existed:
        isExisted: function(filePath) {
            var scope = this;

            var existed = false;
            var fileName = scope.getFileName(filePath);

            var _name = "js_" + fileName;

            if (document.getElementsByName(_name).length != 0) return true;

            var scripts = document.getElementsByTagName('script');

            for (var i = 0; i < scripts.length; i++) {
                if (scripts[i].src) {
                    var src = scripts[i].src;
                    var currentFileName = scope.getFileName(src);

                    if (currentFileName.toLowerCase() == fileName.toLowerCase()) {
                        existed = true;
                    }

                } else {

                }
            }
            return existed;
        },

        embedScript: function(node, nameJs, data) {
            // node
            var _name = node.getAttribute('name') || "";

            if (_name.isEmpty()) {
                var _name = "js_" + nameJs;
                node.setAttribute('name', name);
            }

            if (!isLocal)
                node.removeAttribute('name');

            node.textContent = data;
        },

        // Load list of scripts:
        loadScripts: function(array, options) {

            var options = options || {};

            var onComplete = options['onComplete'] || null,
                onProcess = options['onProcess'] || null;

            if (array.length == 0) {
                if (onComplete) onComplete();
                return;
            }

            if (isLocal) {
                var count = 0;
                var total = array.length;
                GLoader.loadScript(array[count], _onComplete);

                function _onComplete(result) {
                    if (onProcess) onProcess(count / total);
                    // console.log(count / total);
                    count++;

                    if (count == total) {
                        result.status = true;
                        result.message = "All scripts were loaded.";
                        if (onProcess) onProcess(1);
                        if (onComplete) onComplete(result);
                    } else {

                        if (GLoader.isExisted(array[count])) {
                            console.log("[GLoader] The script \"" + array[count] +
                            "\" was existed -> Skipped.");
                            if (_onComplete) _onComplete();
                        } else {
                            GLoader.loadScript(array[count], _onComplete);
                        }
                    }
                }
                return;
            } else {

                var listCss = array.filter(function(url) {
                    return url.indexOf('.css') > -1
                }).map(function(url) {
                    return GLoader.loadScript(url);
                })

            }

            var listJs = [];
            var list = [];
            var index = 0;

            for (var i = 0; i < array.length; i++) {

                var url = array[i];

                if (url.indexOf('.js') <= -1) continue;

                var _name = "js_" + GLoader.getFileName(url);

                if (GLoader.isExisted(GLoader.getFileName(url))) continue;

                var script = document.createElement('script');
                script.setAttribute('name', _name);
                script.setAttribute('data-loader', 'GLoader');
                script.setAttribute('type', 'text/javascript');
                document.body.appendChild(script);

                listJs.push(array[i]);

                list.push({
                    id: index,
                    url: url,
                    name: _name,
                })

                index++;
            }

            var idAdded = -1;

            var listLoaded = [];

            this.loadMultiFile(listJs, {
                maxQueue: 7,
                onProgress: function(process, _url, data) {
                    var itemLoaded = list.find(function(_item) {
                        return _item.url == _url;
                    })

                    itemLoaded.data = data;
                    listLoaded.push(itemLoaded);
                    checkEmbed(itemLoaded);

                    if (onProcess != null) onProcess(process);

                },
                onComplete: function() {

                    if (onComplete) onComplete();

                    // console.log('complete');
                }

            })


            function checkEmbed(itemLoaded) {

                var idNext = listLoaded.find(function(_item) {
                    return _item.id == idAdded + 1
                })

                if (idNext) {
                    listLoaded.sort(function(a, b) {
                        return a.id - b.id;
                    });

                    embed();
                }
            }


            function embed() {
                // console.log("embed !!");
                for (var i = 0; i < listLoaded.length; i++) {
                    var item = listLoaded[i];
                    // console.log('item.id', item.id, idAdded);
                    if (item.id != idAdded + 1) return;

                    idAdded++;

                    // document.getElementsByName(item.name)[0].innerHTML = item.data;
                    GLoader.embedScript(document.getElementsByName(item.name)[0], item.name, item.data)

                    listLoaded.shift();
                    i--;

                }
            }

            // var result = { status: false, message: '' };
            // var count = 0;
            // var total = array.length;
            // //console.log("loadScripts")
            // this.loadScript(array[count], onComplete);

            // function onComplete(result) {
            // 	count++;
            // 	// console.log(count, total)
            // 	if (count == total) {
            // 		result.status = true;
            // 		result.message = 'All scripts were loaded.';
            // 		if (callback) callback(result);
            // 	} else {
            // 		if (GLoader.isExisted(array[count])) {
            // 			console.log(
            // 				'[GLoader] The script "' +
            // 				array[count] +
            // 				'" was existed -> Skipped.'
            // 			);
            // 			onComplete();
            // 		} else {
            // 			GLoader.loadScript(array[count], onComplete);
            // 		}
            // 	}
            // }
        },

        // load single photos
        // url: String, options: Object
        loadPhoto: function(url, options, callback) {
            var img = new Image();
            img.onload = function() {
                if (typeof callback != 'undefined') callback(url);
            };
            img.onerror = function() {
                if (typeof callback != 'undefined') callback(null);
            };
            img.src = url;
        },

        // load multiple photos
        // urls: Array, options: Object
        loadPhotos: function(urls, options, callback) {
            var array = urls;
            var count = 0;
            var total = array.length;
            var result = {
                status: false,
                message: ''
            };
            var photos = [];

            var currentURL = array[count];
            this.loadPhoto(currentURL, options, onComplete);

            function onComplete(url) {
                count++;
                //console.log(count, total)
                if (count == total) {
                    result.status = true;
                    result.message = 'All photos were loaded.';
                    result.photos = photos;
                    if (callback) callback(result);
                } else {
                    photos.push(url);
                    currentURL = array[count];
                    GLoader.loadPhoto(currentURL, options, onComplete);
                }
            }
        },

        loadFile: function(url, options) {

            options = options != undefined ? options : {};

            var onProgress = options.hasOwnProperty("onProgress") ? options['onProgress'] : null;
            var onComplete = options.hasOwnProperty("onComplete") ? options['onComplete'] : null;
            var onError = options.hasOwnProperty("onError") ? options['onError'] : null;
            var responseType = options.hasOwnProperty("responseType") ? options['responseType'] : 'text';

            var req = new XMLHttpRequest();
            req.open('GET', url, true);
            req.responseType = responseType;


            req.onprogress = function(e) {
                var progress = e.loaded / e.total;
                // downloaded = e.loaded;
                if (onProgress != null) onProgress(progress);
            };

            req.onreadystatechange = function() {

                if (req.readyState == 2) {
                    // response headers received
                }

                if (req.readyState == 3) {
                    // loading
                }
                if (req.readyState == 4) {
                    // request finished
                }
            };

            req.onload = function() {

                // console.log("req");
                // console.log(req);
                // console.log(req.DONE);

                // console.log(parseInt(req.status.toString()) );
                // console.log(req.readyState === req.DONE);
                // console.log(parseInt(req.status.toString()) < 400);

                if (req.readyState === req.DONE) {
                    if (parseInt(req.status.toString()) < 400) {
                        if (onComplete != null) onComplete(req.response, url);
                        return;
                    }
                }

                if (onError != null) onError('Status error ' + this.status, "", url);

            };

            req.onerror = function(err) {
                // Error
                console.log(err);
                if (onError != null) onError('Loading error');
            };

            req.send();
        },

        loadMultiFile: function(urls, options) {
            var scope = this;

            options = options != undefined ? options : {};

            var onProgress = options.hasOwnProperty("onProgress") ? options['onProgress'] : null;
            var onComplete = options.hasOwnProperty("onComplete") ? options['onComplete'] : null;
            var onError = options.hasOwnProperty("onError") ? options['onError'] : null;

            var maxQueue = options.hasOwnProperty("maxQueue") ? options['maxQueue'] : 5;

            var responseType = options.hasOwnProperty("responseType") ? options['responseType'] : 'text';

            var currentQueueCount = 0,
                currentIdLoading = 0,
                idComplete = 0;

            var count = 0;

            if (urls.length == 0 || urls == null) {
                _onComplete();
            }

            if (urls.length < maxQueue) {
                //length < maxQueue
                for (let i = 0; i < urls.length; i++) {
                    var url = urls[i];
                    scope.loadFile(url, {
                        // onProgress: _onProgress,
                        responseType: responseType,
                        onError: _onError,
                        onComplete: onCompleteSmallQuality,
                    });
                }
            } else {
                //load per [maxQueue] each
                loadedInQueue();
            }

            function loadedInQueue() {
                //
                if (currentIdLoading < urls.length) {

                    if (currentQueueCount < maxQueue) {

                        currentQueueCount++;

                        var urlLoading = urls[currentIdLoading];
                        currentIdLoading++;

                        scope.loadFile(urlLoading, {
                            responseType: responseType,
                            onComplete: __onComplete,
                            // onProgress: _onProgress,
                            onError: _onError,
                        });

                        loadedInQueue();
                    }
                }
            }


            function _onProgress(url, data) {
                idComplete++;
                var precent = (idComplete) / (urls.length);

                if (onProgress) onProgress(precent, url, data);
            }

            function _onError(errorString, data, _url) {
                if (onError) onError(errorString);

                if (typeof data != "undefined")
                    __onComplete(data, _url);
            }

            function onCompleteSmallQuality(data, _url) {
                count++;

                _onProgress(_url, data);
                if (count >= urls.length) {
                    _onComplete();
                }

                // else {
                //     loadedInQueue();
                // };
            }

            function __onComplete(data, _url) {
                currentQueueCount--;

                _onProgress(_url, data);

                if (currentIdLoading >= urls.length && currentQueueCount == 0) {
                    _onComplete();
                } else {
                    loadedInQueue();
                };
            }

            function _onComplete() {
                // console.log("complete");
                if (onComplete) onComplete();
            }


        },


        getFileName: function(path) {
            if (path.indexOf('?') > -1) {
                path = path.substring(0, path.indexOf('?'));
            }

            var startIndex = (path.indexOf('\\') >= 0 ? path.lastIndexOf('\\') : path.lastIndexOf('/'));
            var filename = path.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
            return filename
        },


    };
    </script>

    <!-- S??? d???ng 1 trong 2 lazyload b??n d?????i -->
    <!-- <script type="text/javascript" async src="<?php echo e(asset('assets/js/vendor/lazysizes/lazysizes.min.js')); ?>"></script>-->

    <script type="text/javascript" async src="<?php echo e(asset('assets/js/digitop/lazyloadCustom.js')); ?>"></script>
    <script type="text/javascript" async src="<?php echo e(asset('assets/js/main.js')); ?>" async></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" async src="<?php echo e(asset('assets/js/function.js')); ?>" async></script> -->

</body>

</html><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/web/layouts/base.blade.php ENDPATH**/ ?>