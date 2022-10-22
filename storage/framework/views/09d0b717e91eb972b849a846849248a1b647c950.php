<!doctype html>
<html>

<head>
    <title>Primal Performance Lab</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="vi" />

    <meta name="title" content="Primal Performance Lab" />
    <meta name="description"
        content="<?php echo e(__('meta_desc')); ?>" />
    <meta name="keywords"
        content="fitness sports data science training boxing kickboxing muaythai Vietnam Saigon yoga" />
    <meta name="author" content="Primal Performance Lab" />

    <meta property="og:title" content="Primal Performance Lab" />
    <meta property="og:description"
        content="<?php echo e(__('meta_desc')); ?>" />
    <meta property="og:url"
        content="fitness sports data science training boxing kickboxing muaythai Vietnam Saigon yoga" />
    <meta property="og:image" content="img/banner/1.jpg" />

    <meta name="viewport"
        content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="img/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon/favicon-16x16.png">
    <link rel="manifest" href="img/icon/site.webmanifest">

    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>" />
    <!--[if IE]><link rel="stylesheet" href="css/ie.css"/><![endif]-->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2M6DEF2WKG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-2M6DEF2WKG');
    </script>
</head>

<body class="js-preload">
    <h1 class="hidden">Home</h1>
    <!-- HEADER -->
    <header id="main-header">
        <div class="main-ctr wrap-1600">
            <div class="logo-wrap">
                <a href="<?php echo e(route('home')); ?>" class="logo"><img src="img/bg/logo.png" alt="primal logo" /></a>
            </div>
            <nav class="btn-lang">
                <a href="<?php echo e(route('home_vn')); ?>"><img src="img/flag/vi.jpg" alt="vietnamese" /></a>
                <a href="<?php echo e(route('home')); ?>"><img src="img/flag/en.jpg" alt="english" /></a>
            </nav>
        </div>
    </header>
    <!-- END HEADER -->

    <!-- MAIN PAGE -->
    <main id="page-home">
        <input type="hidden" id="page-id" value="page-home" />
        <div class="wrap-1600">
            <section class="heading-slider">
                <ul class="item-wrap">
                    <!-- <li class="item"><h3>Data Science, Coaching & Technology Driven.</h3></li> -->
                    <li class="item">
                        <h3><?php echo e(__('rotate_text1')); ?></h3>
                    </li>
                    <li class="item">
                        <h3><?php echo e(__('rotate_text2')); ?></h3>
                    </li>
                    <li class="item">
                        <h3><?php echo e(__('rotate_text3')); ?></h3>
                    </li>
                    <li class="item">
                        <h3><?php echo e(__('rotate_text4')); ?></h3>
                    </li>
                </ul>
            </section>

            <div class="main-content">
                <p><?php echo e(__('copy1')); ?></p>
                <p><?php echo e(__('copy2')); ?></p>
            </div>

            <form autocomplete="off" id="form-signup" class="form" data-url="<?php echo e(route('newsletter')); ?>">
                <div class="dflex">
                    <div class="input-wrap">
                        <label><?php echo e(__('fullname')); ?> <i>*</i></label>
                        <input type="text" name="name" class="input-txt js-required" rq-txt="<?php echo e(__('fullname_err')); ?>" />
                        <span class="warning"><?php echo e(__('fullname_err')); ?></span>
                    </div>

                    <div class="input-wrap">
                        <label><?php echo e(__('email')); ?> <i>*</i></label>
                        <input type="email" name="email" class="input-txt js-required js-email" rq-txt="<?php echo e(__('email_err')); ?>"
                            ivl-txt="<?php echo e(__('email_ivl')); ?>" />
                        <span class="warning"><?php echo e(__('email_err')); ?></span>
                    </div>

                    <div class="btn-wrap">
                        <label>&nbsp;</label>
                        <button class="btn-main btn-submit js-reset"><?php echo e(__('submit')); ?></button>
                    </div>
                </div>
                <p class="warning-server">Server Error!!!</p>
                <i class="note"><?php echo e(__('not_share')); ?></i>
            </form>
        </div>

        <section class="bg-slider">
            <ul class="item-wrap">
                <li class="item"><img src="img/banner/1.jpg" alt="Primal system methodology."></li>
                <li class="item"><img src="img/banner/2.jpg" alt="Total-body performance."></li>
                <li class="item"><img src="img/banner/3.jpg" alt="Team Workout Focus."></li>
                <li class="item"><img src="img/banner/4.jpg" alt="Data Science, Coaching & Technology Driven."></li>
                <li class="item"><img src="img/banner/5.jpg" alt="Primal system methodology."></li>
                <li class="item"><img src="img/banner/6.jpg" alt="Total-body performance."></li>
                <li class="item"><img src="img/banner/7.jpg" alt="Team Workout Focus."></li>
                <li class="item"><img src="img/banner/8.jpg" alt="Data Science, Coaching & Technology Driven."></li>
                <li class="item"><img src="img/banner/9.jpg" alt="Primal system methodology."></li>
                <li class="item"><img src="img/banner/10.jpg" alt="Total-body performance."></li>
            </ul>
        </section>
    </main>
    <!-- END MAIN PAGE -->

    <!-- FOOTER -->
    <footer class="main-footer">
        <div class="wrap wrap-1600">
            <nav>
                <h5 class="hidden">Social Channels</h5>
                <ul class="social-link">
                    <li><a href="https://www.facebook.com/primalperformancelab" target="_blank"><img
                                src="img/social/fb.png" alt="facebook logo" />
                            <h6 class="hidden">facebook</h6>
                        </a></li>
                    <li><a href="https://www.instagram.com/primalperformancelab/" target="_blank"><img
                                src="img/social/ins.png" alt="youtube logo" />
                            <h6 class="hidden">instagram</h6>
                        </a></li>
                </ul>
            </nav>
        </div>
    </footer>
    <!-- END FOOTER -->

    <!-- POPUP -->
    <div id="popup-loading">
        <div class="dot-wrap">
            <b></b><b></b><b></b><b></b><b></b>
            <b></b><b></b><b></b><b></b><b></b>
        </div>
    </div>
    <!-- END POPUP -->

    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="<?php echo e(asset('js/lib/jquery.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/lib/jquery.touch.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/lib/tween.js')); ?>"></script>
    <script type="text/javascript" defer src="<?php echo e(asset('js/main.js')); ?>"></script>
    <!-- Unexpected case-->
    <noscript>
        <div>For full functionality of this site it is necessary to enable JavaScript. Here are the <a
                href="http://www.enable-javascript.com/" target="_blank">instructions how to enable JavaScript in your
                web browser</a>.
        </div>
    </noscript>
</body>

</html><?php /**PATH C:\xampp2\htdocs\primal8\resources\views/index.blade.php ENDPATH**/ ?>