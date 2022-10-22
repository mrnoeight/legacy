

<?php $__env->startSection('title', 'Homepage'); ?>

<?php $__env->startSection('hidden_page', 'Homepage'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="pHome">
    <section id="bannerPage" class="bannerPage  go-up">
        <div class="img" style="background: url(<?php echo e($oPage->banner_url); ?>) bottom no-repeat"
            data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical"></div>
        <div class="imgMb" style="background: url(<?php echo e($oPage->banner_mb_url); ?>) bottom no-repeat"
            data-paroller-factor="-0.2" data-paroller-type="background" data-paroller-direction="vertical"></div>

        <div class="container">
            <div class="titleBanner stagger-down">
                <h3 class="subTt"><?php echo e($oPage->head_tag1); ?></h3>
                <h2 class="mainTt"><?php echo nl2br($oPage->head_title1); ?></h2>
            </div>

        </div>
    </section>
    <section class="bannerText stagger-down">
        <div class="container">
            <div class="copy">
                <p><?php echo e($oPage->head_desc1); ?> </p>
            </div>
        </div>
    </section>
    <section id="overviewWrap" class="section overviewWrap pd1">
        <div class="container">
            <div class="ttPage animate">
                <h2 class="mainTt"><?php echo nl2br($oPage->mid_title1); ?></h2>
                <p><?php echo e($oPage->mid_desc1); ?></p>
            </div>
        </div>
        <div class="img parallax animate" data-image-src="<?php echo e($oPage->middle_banner_url); ?>" data-parallax="scroll"
            data-bleed="0" data-speed="0.4"></div>
        <div class="container">
            <div class="overviewInfo">
                <div class="item">
                    <h3><?php echo e($oPage->info1); ?> <span>m<sup>2</sup></span></h3>
                    <p><?php echo nl2br($arrText['area']); ?></p>
                </div>
                <div class="item">
                    <h3><?php echo e($oPage->info2); ?></h3>
                    <p><?php echo nl2br($arrText['block']); ?></p>
                </div>
                <div class="item">
                    <h3><?php echo e($oPage->info3); ?></h3>
                    <p><?php echo nl2br($arrText['floor']); ?></p>
                </div>
                <div class="item">
                    <h3><?php echo e($oPage->info4); ?></h3>
                    <p><?php echo nl2br($arrText['apartment']); ?></p>
                </div>
                <div class="item">
                    <h3><?php echo e($oPage->info5); ?></h3>
                    <p><?php echo nl2br($arrText['basement']); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Về dự án --------------------------------------------------------------------------------->

    <section id="aboutUsWrap" class="section aboutUsWrap">
        <div class="slideAbout">
            <?php $__currentLoopData = $oSliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item" style="background: url(<?php echo e($slider->banner_url); ?>) center no-repeat"
                data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical">
                <img data-src="<?php echo e($slider->banner_mb_url); ?>" class="lazyload" />
                <div class="container first">
                    <div class="copy">
                        <h3 class="subTt"><?php echo e($slider->head_tag1); ?></h3>
                        <h2 class="mainTt"><?php echo nl2br($slider->head_title1); ?></h2>
                        <p><?php echo e($slider->head_desc1); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
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

    <!-- Hình ảnh dự án --------------------------------------------------------------------------------->

    <section id="galleryWrap" class="section galleryWrap pd1">
        <div class="container">
            <div class="ttPage">
                <h2 class="mainTt animate"><?php echo nl2br($arrText['photo']); ?></h2>
            </div>
        </div>
        <div class="slideGalleryWrap animate">
            <div class="slideGallery lightgallery">
                <?php $__currentLoopData = $oGalleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <div class="item" style="background: url(<?php echo e($gallery->banner_url); ?>) center no-repeat">
                        <img data-src="<?php echo e(asset('assets/images/thumb1.gif')); ?>" class="lazyload" />
                        <span class="linkLg" data-src="<?php echo e($gallery->banner_url); ?>"
                            data-sub-html="<p><?php echo e($gallery->head_title1); ?></p>"></span>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    <!-- Đối tác --------------------------------------------------------------------------------->

    <section id="partnerWrap" class="section partnerWrap pd1">
        <div class="container">
            <div class="ttPage animate">
                <h2 class="mainTt"><?php echo nl2br($arrText['partner']); ?></h2>
            </div>
            <div class="partnerList">
                <?php $__currentLoopData = $oPartners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <img data-src="<?php echo e($partner->banner_url); ?>" class="lazyload" />
                    <p><?php echo e($partner->head_title1); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- vị trí dự án --------------------------------------------------------------------------------->
    <span id="locationWrap"></span>
    <section class="section locationWrap">
        <div class="container mb">
            <div class="ttPage animate">
                <h2 class="mainTt"><?php echo nl2br($arrText['location']); ?></h2>
            </div>
        </div>
        <div id="imgChange" class="img animate" style="background: url(<?php echo e(asset('assets/images/demo/map.gif')); ?>) center no-repeat"
            data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical">
            <img data-src="<?php echo e(asset('assets/images/demo/2-mb.jpg')); ?>" alt="" class="lazyload">
            <div class="videoMap">
                <video autoplay="autoplay" loop="loop" muted defaultMuted playsinline>
                    <source src="<?php echo e(asset('assets/videos/map.mp4')); ?>" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="container desk">
            <h2 class="mainTt animate"><?php echo nl2br($arrText['location']); ?></h2>
            <div class="itemLocationList">
                <div class="itemLocation active">
                    <img data-src="<?php echo e(asset('assets/images/b.gif')); ?>" alt="" class="lazyload">
                    <div class="info"></div>
                    <div data-mb="<?php echo e(asset('assets/images/demo/2-mb.jpg')); ?>" data="video" class="item js-changeImg active"
                        style="background: #242021">

                        <div>
                            <img data-src="<?php echo e(asset('assets/images/ico-location.png')); ?>" alt="" class="lazyload">
                        </div>
                    </div>
                </div>
                <?php $__currentLoopData = $oLocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="itemLocation">
                    <img data-src="<?php echo e(asset('assets/images/b.gif')); ?>" alt="" class="lazyload">
                    <ul class="info">
                        <?php
                            $lines = explode("\n", $location->info1);
                        ?>
                        <?php $__currentLoopData = $lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($line); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <div data-mb="<?php echo e($location->banner_mb_url); ?>" data="<?php echo e($location->banner_url); ?>" class="item js-changeImg"
                        style="background: url(<?php echo e($location->banner_url); ?>) center no-repeat">
                        <div>
                            <?php
                                $lines = explode("\n", $location->head_title1);
                            ?>
                            <h4><?php echo e($lines[0]); ?></h4>
                            <p><?php echo e(isset($lines[1]) ? $lines[1] : ''); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
            </div>
        </div>
    </section>




    <section id="infomationWrap" class="section infomationWrap pd1">
        <div class="ttPage animate">
            <h3 class="subTt"><?php echo nl2br($arrText['register']); ?></h3>
            <h2 class="mainTt"><?php echo nl2br($arrText['lancaster']); ?></h2>
        </div>
        <div class="container animate">
            <form>
                <div class="ctIp">
                    <input type="text" placeholder="<?php echo $arrText['name']; ?>" />
                    <span class="erro"></span>
                </div>
                <div class="ctIp">
                    <input type="text" placeholder="<?php echo $arrText['phone']; ?>" />
                    <span class="erro"></span>
                </div>
                <div class="ctIp">
                    <input type="text" placeholder="<?php echo $arrText['Email']; ?>" />
                    <span class="erro"></span>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/web/index.blade.php ENDPATH**/ ?>