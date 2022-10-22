<!doctype html>
<html class="no-js" lang="" style="overflow: hidden;">

<!-- HEADER CONFIGURATION -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />

    <!-- SEO -->
    <title>Lancaster Legacy | Trang chủ</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="TOP Group">

    <!-- Social Sharing Info -->
    <meta property="og:url" content="" />
    <meta property="og:title" content="Lancaster Legacy | Trang chủ" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="/<?php echo e(asset('assets/images/share.jpg')); ?>" />
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

    <link rel="preload" href="<?php echo e(asset('assets/css/pure.css')); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/pure.css')); ?>">
    </noscript>
    <link rel="preload" href="<?php echo e(asset('assets/css/helper.css')); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/helper.css')); ?>">
    </noscript>


    <script>
    window.env = {
        HOST: "https://localhost:3000"
    }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">


</head>

<body>
    <!-- HEADER / MENU NAVIGATION -->
    <header>
        <div class="container stagger-down">
            <a class="logo" href="<?php echo e(route('home')); ?>">
                <img class="lazyload logo1" data-src="<?php echo e(asset('assets/images/lancaster_legacy_logo1.png')); ?>" alt="Lancaster-Legacy">
                <!-- <img class="lazyload logo2" data-src="<?php echo e(asset('assets/images/lancaster_legacy_logo2.png')); ?>" alt="Lancaster-Legacy"> -->
            </a>
            <div class="left">
                <nav>
                    <a href="<?php echo e(route('home')); ?>" <?php echo e($menu_active['home']); ?>><?php echo e(__('Trang chủ')); ?></a>
                    <a href="<?php echo e(route('home')); ?>#locationWrap" <?php echo e($menu_active['location']); ?>><?php echo e(__('Vị trí')); ?></a>
                    <a href="<?php echo e(route('apartment')); ?>" <?php echo e($menu_active['apartment']); ?>><?php echo e(__('Thông tin căn hộ')); ?></a>
                    <a href="<?php echo e(route('tienich')); ?>" <?php echo e($menu_active['utilities']); ?>><?php echo e(__('Tiện ích')); ?></a>
                    <a href="<?php echo e(route('gallery')); ?>" <?php echo e($menu_active['gallery']); ?>><?php echo e(__('Thư viện')); ?></a>

                </nav>
            </div>

            <div class="right">
                <nav>
                    <a href="<?php echo e(route('news')); ?>" <?php echo e($menu_active['news']); ?>><?php echo e(__('Tin tức')); ?></a>
                    <!-- <a href="#" class="">VR 360 tour</a> -->
                    <a href="<?php echo e(route('lancaster')); ?>" <?php echo e($menu_active['lancaster']); ?>>Lancaster By Trung Thuy</a>
                    <a href="<?php echo e(route('progress')); ?>" <?php echo e($menu_active['progress']); ?>><?php echo e(__('Tiến độ')); ?></a>
                    <a href="<?php echo e(route('home')); ?>#infomationWrap" <?php echo e($menu_active['about']); ?>><?php echo e(__('Liên hệ')); ?></a>
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
                    <a href="<?php echo e(route('home')); ?>" <?php echo e($menu_active['home']); ?>><?php echo e(__('Trang chủ')); ?></a>
                    <a href="<?php echo e(route('home')); ?>#locationWrap" <?php echo e($menu_active['location']); ?>><?php echo e(__('Vị trí')); ?></a>
                    <a href="<?php echo e(route('apartment')); ?>" <?php echo e($menu_active['apartment']); ?>><?php echo e(__('Thông tin căn hộ')); ?></a>
                    <a href="<?php echo e(route('tienich')); ?>" <?php echo e($menu_active['utilities']); ?>><?php echo e(__('Tiện ích')); ?></a>
                    <a href="<?php echo e(route('gallery')); ?>" <?php echo e($menu_active['gallery']); ?>><?php echo e(__('Thư viện')); ?></a>
                </nav>
            </div>
            <a class="logo" href="<?php echo e(route('home')); ?>"><img data-src="<?php echo e(asset('assets/images/lancaster_legacy_logo2.png')); ?>"
                    alt="Lancaster-Legacy" class="lazyload"></a>
            <div class="right">
                <nav>
                    <a href="<?php echo e(route('news')); ?>" <?php echo e($menu_active['news']); ?>><?php echo e(__('Tin tức')); ?></a>
                    <a href="<?php echo e(route('lancaster')); ?>" <?php echo e($menu_active['lancaster']); ?>>Lancaster By Trung Thuy</a>
                    <a href="<?php echo e(route('progress')); ?>" <?php echo e($menu_active['progress']); ?>><?php echo e(__('Tiến độ')); ?></a>
                    <a href="<?php echo e(route('home')); ?>#infomationWrap" <?php echo e($menu_active['about']); ?>><?php echo e(__('Liên hệ')); ?></a>
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
        <a class="logo" href="<?php echo e(route('home')); ?>"><img data-src="<?php echo e(asset('assets/images/lancaster_legacy_logo2.png')); ?>" alt=""
                class="lazyload"></a>
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
                        <a href="<?php echo e(route('home')); ?>" <?php echo e($menu_active['home']); ?>><?php echo e(__('Trang chủ')); ?></a>
                        <span class="subMb js-subMenuMb"><img data-src="<?php echo e(asset('assets/images/ar-1.png')); ?>" class="lazyload"></span>
                        <div class="submenu">
                            <a href="<?php echo e(route('home')); ?>#overviewWrap">Tổng quan dự án</a>
                            <a href="<?php echo e(route('home')); ?>#aboutUsWrap">Vài nét về Tập đoàn Trung Thuỷ</a>
                            <a href="<?php echo e(route('home')); ?>#galleryWrap">Hình ảnh dự án</a>
                            <a href="<?php echo e(route('home')); ?>#partnerWrap">Đối tác</a>
                            <a href="<?php echo e(route('home')); ?>#infomationWrap">Liên hệ</a>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo e(route('home')); ?>#locationWrap" <?php echo e($menu_active['location']); ?>><?php echo e(__('Vị trí')); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('apartment')); ?>" <?php echo e($menu_active['apartment']); ?>><?php echo e(__('Thông tin căn hộ')); ?></a>
                        <span class="subMb js-subMenuMb"><img data-src="<?php echo e(asset('assets/images/ar-1.png')); ?>" class="lazyload"></span>
                        <div class="submenu">
                            <a href="<?php echo e(route('apartment')); ?>#masterplan">Masterplan</a>
                            <a href="<?php echo e(route('apartment')); ?>#floorplan">Mặt bằng tiện ích</a>
                            <a href="<?php echo e(route('apartment')); ?>#rooftop">Mặt bằng toà</a>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo e(route('tienich')); ?>" <?php echo e($menu_active['utilities']); ?>><?php echo e(__('Tiện ích')); ?></a>
                        <span class="subMb js-subMenuMb"><img data-src="<?php echo e(asset('assets/images/ar-1.png')); ?>" class="lazyload"></span>
                        <div class="submenu">
                            <a href="<?php echo e(route('tienich')); ?>#PrivateLegacyclub">Private Legacy club</a>
                            <a href="<?php echo e(route('tienich')); ?>#ShoppingCenter">Trung tâm thương mại</a>
                            <a href="<?php echo e(route('tienich')); ?>#HealthUtility">Tiện ích sức khoẻ</a>
                            <a href="<?php echo e(route('tienich')); ?>#Entertainment">Giải trí </a>
                            <a href="<?php echo e(route('tienich')); ?>#Business">Business</a>
                        </div>
                    </li>
                    <li><a href="<?php echo e(route('gallery')); ?>" <?php echo e($menu_active['gallery']); ?>><?php echo e(__('Thư viện')); ?></a></li>

                    <li><a href="<?php echo e(route('news')); ?>" <?php echo e($menu_active['news']); ?>><?php echo e(__('Tin tức')); ?></a></li>
                    <!-- <li><a href="#" class="">VR 360 tour</a></li> -->
                    <li>
                        <a href="<?php echo e(route('lancaster')); ?>" <?php echo e($menu_active['lancaster']); ?>>Lancaster By Trung Thuy</a>
                        <span class="subMb js-subMenuMb"><img data-src="<?php echo e(asset('assets/images/ar-1.png')); ?>" class="lazyload"></span>
                        <div class="submenu">
                            <a href="<?php echo e(route('lancaster')); ?>#LancasterTheMaster">Lancaster The Master</a>
                            <a href="<?php echo e(route('lancaster')); ?>#LancasterClub">Lancaster Club</a>
                            <a href="<?php echo e(route('lancaster')); ?>#ConsultingTeam">Đội ngũ tư vấn</a>
                        </div>
                    </li>
                    <li><a href="<?php echo e(route('progress')); ?>" <?php echo e($menu_active['progress']); ?>><?php echo e(__('Tiến độ')); ?></a></li>
                    <li><a href="<?php echo e(route('home')); ?>#infomationWrap" <?php echo e($menu_active['about']); ?>><?php echo e(__('Liên hệ')); ?></a></li>
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
                    <p>ĐẦU TƯ VÀ PHÁT TRIỂN</p>
                    <img data-src="<?php echo e(asset('assets/images/trung_thuy_group_logo.png')); ?>" alt="Trung-Thuy-Group" class="lazyload" />
                </div>
                <div class="item">
                    <div class="itemText">
                        <p><strong>ĐỊA CHỈ DỰ ÁN</strong></p>
                        <p>230 Nguyễn Trãi, P. Nguyễn Cư Trinh, Quận 1, Tp. Hồ Chí Minh</p>
                    </div>
                    <div class="itemText">
                        <p><strong>ĐỊA CHỈ NHÀ MẪU</strong></p>
                        <p>Tòa nhà Miss Áo Dài, 21 Nguyễn Trung Ngạn, P. Bến Nghé, Quận 1, Tp. Hồ Chí Minh</p>
                    </div>
                </div>
                <div class="item">
                    <div class="itemText">
                        <p><strong>EMAIL</strong></p>
                        <p><a href="mailto:ttg@ttgvn.com">ttg@ttgvn.com</a></p>
                    </div>
                    <div class="itemText">
                        <p><strong>HOTLINE</strong></p>
                        <p>(+84) 933 09 09 09</p>
                    </div>
                </div>
            </div>
            <div class="botFooter">
                <div class="textFt">
                    <div class="item">
                        <p>
                            Bản quyền © 2022 CÔNG TY CỔ PHẦN BẤT ĐỘNG SẢN EMPIRE LAND.<br />
                            Tất cả quyền được bảo lưu. Giấy phép ĐKKD số 0316476518, do Sở KHĐT TP.HCM cấp ngày
                            18/11/2021.
                        </p>
                    </div>
                    <div class="item">
                        <p>
                            <strong>Lưu ý:</strong> Tài liệu chỉ dùng với mục đích tham khảo. Hình ảnh, sơ đồ kỹ thuật,
                            bố trí nội ngoại thất hay thông tin mô tả chỉ nhằm mục đích minh hoạ, không phải là thông
                            tin hiện thực hay cam kết pháp lý. Thông tin chính thức căn cứ trên hợp đồng.
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
                    <p>Mặt bằng toà / <span></span></p>
                    <h2 class="mainTt">căn hộ 1BR+1</h2>
                </div>
                <div class="img">
                    <img data-src="<?php echo e(asset('assets/images/demo/43.jpg')); ?>" class="lazyload" />
                </div>
                <div class="bottom">
                    <div class="item">
                        <p>Loại căn hộ:</p>
                        <h3>OFFICTEL</h3>
                    </div>
                    <div class="item">
                        <p>diện tích thông thủy</p>
                        <h3>55,7m2</h3>
                    </div>
                    <div class="item">
                        <p>diện tích tim tường</p>
                        <h3>49,9m2</h3>
                    </div>
                </div>
            </div>
            <div class="right">
                <img data-src="<?php echo e(asset('assets/images/demo/43.jpg')); ?>" class="lazyload" />
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
    <!-- Được control bởi: main.js -->
    <!-- PRELOADER.show() -->
    <!-- PRELOADER.hide() -->
    <div id="preloader" class="hideld">
        <div class="layer1">
            <!-- <img data-src="<?php echo e(asset('assets/images/loading1.png')); ?>"  class="lazyload"/> -->
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

    <!-- Sử dụng 1 trong 2 lazyload bên dưới -->
    <!-- <script type="text/javascript" async src="<?php echo e(asset('assets/js/vendor/lazysizes/lazysizes.min.js')); ?>"></script>-->
        
    <script type="text/javascript" async src="<?php echo e(asset('assets/js/digitop/lazyloadCustom.js')); ?>"></script>
    <script type="text/javascript" async src="<?php echo e(asset('assets/js/main.js')); ?>" async></script>

</body>

</html><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/web/layouts/base.blade.php ENDPATH**/ ?>