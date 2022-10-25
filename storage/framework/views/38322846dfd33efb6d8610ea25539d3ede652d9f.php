

<?php $__env->startSection('title', 'Tien ich'); ?>

<?php $__env->startSection('hidden_page', 'Tien ich'); ?>

<?php $__env->startSection('content'); ?>

<!-- MAIN PAGE -->
<main id="pFacilities">
    <div class="bannerSubPage go-up">
        <img class="lazyload pc" data-src="<?php echo e($oPage->banner_url); ?>" alt="">
        <img class="lazyload mb" data-src="<?php echo e($oPage->banner_mb_url); ?>" alt="">
        <div class="container stagger-down">
            <h2 class="mainTt"><?php echo nl2br($oPage->head_title1); ?></h2>
            <div class="copy">
                <p><?php echo e($oPage->head_desc1); ?>

                </p>
            </div>
        </div>
    </div>

    <section id="PrivateLegacyclub" class="section aboutUsWrap">
        <div class="slideAbout">
            <?php $__currentLoopData = $oSliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item" style="background: url(<?php echo e($s->banner_url); ?>) center no-repeat"
                data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical">
                <img data-src="<?php echo e($s->banner_url); ?>" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt"><?php echo nl2br($s->head_title1); ?></h2>
                        <p><?php echo e($s->head_desc1); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <?php $__currentLoopData = $oMidSliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item" style="background: url(<?php echo e($s->banner_url); ?>) center no-repeat"
                data-paroller-factor="0.4" data-paroller-type="background" data-paroller-direction="vertical">
                <img data-src="<?php echo e($s->banner_url); ?>" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt"><?php echo nl2br($s->head_title1); ?></h2>
                        <p><?php echo e($s->head_desc1); ?>

                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <h2 class="mainTt"><?php echo nl2br($oPage->mid_title1); ?></h2>
                <p><?php echo nl2br($oPage->mid_desc1); ?>

                </p>
            </div>
            <div class="sliderUtiWrap">
                <div class="sliderUti">
                    <?php 
                        $i = 0;
                    ?>
                    <?php $__currentLoopData = $healths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="hDot" indexSlider="<?php echo e($i++); ?>">
                        <div data-popup="popup_<?php echo e($s->block_name); ?>" class="item">
                            <img data-src="<?php echo e($s->banner_url); ?>" alt="" class="lazyload">
                            <h2><?php echo nl2br($s->head_title1); ?></h2>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <h2 class="mainTt"><?php echo nl2br($oPage->info1); ?></h2>
                <p><?php echo nl2br($oPage->info2); ?></p>
            </div>
            <div class="sliderUtiWrap">
                <div class="sliderUti">
                    <?php 
                        $i = 0;
                    ?>
                    <?php $__currentLoopData = $entertainments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="hDot" indexSlider="<?php echo e($i++); ?>">
                        <div class="item">
                            <img data-src="<?php echo e($s->banner_url); ?>" alt="" class="lazyload">
                            <h2><?php echo nl2br($s->head_title1); ?></h2>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                <h2 class="mainTt"><?php echo nl2br($oPage->info3); ?></h2>
                <p><?php echo nl2br($oPage->info4); ?>

                </p>
            </div>
            <div class="sliderUtiWrap">
                <div class="sliderUti sliderBusiness">
                    <?php 
                        $i = 0;
                    ?>
                    <?php $__currentLoopData = $business; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="hDot" indexSlider="0">
                        <div class="item">
                            <img data-src="<?php echo e($s->banner_url); ?>" alt="" class="lazyload">
                            <h2><?php echo nl2br($s->head_title1); ?></h2>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
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
            <?php $__currentLoopData = $pool; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item" style="background: url(<?php echo e($s->banner_url); ?>) center no-repeat">
                <img data-src="<?php echo e($s->banner_mb_url); ?>" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt"><?php echo nl2br($s->head_title1); ?></h2>
                        <p><?php echo nl2br($s->info1); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div id="popup_gym" class="popup">
        <div class="btnClose jsClosePopupUti"></div>
        <div class="slideAboutPopup">
            <?php $__currentLoopData = $gym; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item" style="background: url(<?php echo e($s->banner_url); ?>) center no-repeat">
                <img data-src="<?php echo e($s->banner_mb_url); ?>" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt"><?php echo nl2br($s->head_title1); ?></h2>
                        <p><?php echo nl2br($s->info1); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div id="popup_sauna" class="popup">
        <div class="btnClose jsClosePopupUti"></div>
        <div class="slideAboutPopup">
            <?php $__currentLoopData = $sauna; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item" style="background: url(<?php echo e($s->banner_url); ?>) center no-repeat">
                <img data-src="<?php echo e($s->banner_mb_url); ?>" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt"><?php echo nl2br($s->head_title1); ?></h2>
                        <p><?php echo nl2br($s->info1); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div id="popup_playground" class="popup">
        <div class="btnClose jsClosePopupUti"></div>
        <div class="slideAboutPopup">
            <?php $__currentLoopData = $playground; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item" style="background: url(<?php echo e($s->banner_url); ?>) center no-repeat">
                <img data-src="<?php echo e($s->banner_mb_url); ?>" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt"><?php echo nl2br($s->head_title1); ?></h2>
                        <p><?php echo nl2br($s->info1); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div id="popup_yoga" class="popup">
        <div class="btnClose jsClosePopupUti"></div>
        <div class="slideAboutPopup">
            <?php $__currentLoopData = $yoga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item" style="background: url(<?php echo e($s->banner_url); ?>) center no-repeat">
                <img data-src="<?php echo e($s->banner_mb_url); ?>" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt"><?php echo nl2br($s->head_title1); ?></h2>
                        <p><?php echo nl2br($s->info1); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/web/tienich.blade.php ENDPATH**/ ?>