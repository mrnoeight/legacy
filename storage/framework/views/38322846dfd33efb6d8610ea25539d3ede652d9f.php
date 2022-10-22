

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
                <h2 class="mainTt">tiện ích <br />
                    sức khoẻ</h2>
                <p>Trải nghiệm phòng gym hiện đại, khu vực yoga ngoài trời và không gian riêng tư dành cho gia đình được
                    lấp đầy bởi không gian tươi mát. Tất cả tiện ích tại Lancaster Legacy đều chú trọng yếu tố sức khỏe
                    thể chất và tinh thần của cư dân
                </p>
            </div>
            <div class="sliderUtiWrap">
                <div class="sliderUti">
                    <?php 
                        $i = 0;
                    ?>
                    <?php $__currentLoopData = $healths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="hDot" indexSlider="<?php echo e($i++); ?>">
                        <div data-popup="idUtiHere" class="item">
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
                <h2 class="mainTt">giải trí</h2>
                <p>Không gian BBQ ấm cúng, khu vực thưởng rượu đầy sang trọng cùng chuỗi tiện ích độc đáo theo chủ đề
                    Sài Gòn xưa sẽ được tái hiện ngay tại Lancaster Legacy. Tất cả được kết hợp để tạo nên chất sống đầy
                    thi vị giữa đô thị năng động.</p>
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
                <h2 class="mainTt">BUSINESS</h2>
                <p>Không gian sống đủ đầy tại Lancaster Legacy được bổ sung thêm các tiện ích phục vụ công việc như
                    phòng họp, phòng sáng tạo... Mở ra cánh cửa thành công cho mọi gia chủ.
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


    <div id="idUtiHere" class="popup">
        <div class="btnClose jsClosePopupUti"></div>
        <div class="slideAboutPopup">
            <div class="item" style="background: url(<?php echo e(asset('assets/images/demo/42.jpg')); ?>) center no-repeat">
                <img data-src="<?php echo e(asset('assets/images/demo/8-mb.jpg')); ?>" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">Bể bơi vô cực</h2>
                        <p>Hồ bơi vô cực được xây dựng theo tiêu chuẩn thi đấu với 4 làn bơi riêng biệt cùng độ cao hoàn
                            hảo để tận hưởng trọn vẹn cảnh sắc tuyệt đẹp của Sài Gòn về đêm hoặc sớm bình minh.</p>
                    </div>
                </div>
            </div>
            <div class="item" style="background: url(<?php echo e(asset('assets/images/demo/22.jpg')); ?>) center no-repeat">
                <img data-src="<?php echo e(asset('assets/images/demo/8-mb.jpg')); ?>" class="lazyload" />
                <div class="container">
                    <div class="copy">
                        <h2 class="mainTt">Lorem ipsum dolor sit amet</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. At nisi nulla nibh lectus donec.
                            Vitae faucibus donec non volutpat accumsan. Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. At nisi nulla nibh lectus donec. Vitae faucibus donec non volutpat
                            accumsan.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/web/tienich.blade.php ENDPATH**/ ?>