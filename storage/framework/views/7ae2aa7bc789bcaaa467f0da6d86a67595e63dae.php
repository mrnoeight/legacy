

<?php $__env->startSection('title', 'Tien do'); ?>

<?php $__env->startSection('hidden_page', 'Tien do'); ?>

<?php $__env->startSection('content'); ?>

<!-- MAIN PAGE -->
<main id="pProgress">
    <div class="bannerSubPage go-up">
        <img class="lazyload pc" data-src="<?php echo e($oPage->banner_url); ?>" alt="">
        <img class="lazyload mb" data-src="<?php echo e($oPage->banner_mb_url); ?>" alt="">
        <div class="container stagger-down">
            <h2 class="mainTt"><?php echo nl2br($oPage->head_title1); ?></h2>
            <div class="copy">
                <p><?php echo e($oPage->head_desc1); ?></p>
            </div>
        </div>
    </div>
    <section class="section progressWrap">
        <div class="container">
            <div class="progresslist">
                <div data-popup="idProHere" class="item animate">
                    <h3>THÁNG 2 - 2022</h3>
                    <div class="imgPage">
                        <div style="background: url(<?php echo e(asset('assets/images/demo/progress-1.jpg')); ?>) center no-repeat">
                        </div>
                        <img data-src="<?php echo e(asset('assets/images/b.gif')); ?>" class="lazyload" />
                    </div>
                </div>
                <div data-popup="idProHere" class="item animate">
                    <h3>tháng 1 - 2022</h3>
                    <div class="imgPage">
                        <div style="background: url(<?php echo e(asset('assets/images/demo/progress-2.jpg')); ?>) center no-repeat">
                        </div>
                        <img data-src="<?php echo e(asset('assets/images/b.gif')); ?>" class="lazyload" />
                    </div>
                </div>
                <div class="timeLine">
                    <p>2022</p>
                </div>
            </div>
            <div class="progresslist">
                <div data-popup="idProHere" class="item animate">
                    <h3>tháng 11 - 2021</h3>
                    <div class="imgPage">
                        <div style="background: url(<?php echo e(asset('assets/images/demo/progress-3.jpg')); ?>) center no-repeat">
                        </div>
                        <img data-src="<?php echo e(asset('assets/images/b.gif')); ?>" class="lazyload" />
                    </div>
                </div>
                <div data-popup="idProHere" class="item animate">
                    <h3>tháng 12 - 2021</h3>
                    <div class="imgPage">
                        <div style="background: url(<?php echo e(asset('assets/images/demo/progress-4.jpg')); ?>) center no-repeat">
                        </div>
                        <img data-src="<?php echo e(asset('assets/images/b.gif')); ?>" class="lazyload" />
                    </div>
                </div>
                <div data-popup="idProHere" class="item animate">
                    <h3>tháng 6 - 2021</h3>
                    <div class="imgPage">
                        <div style="background: url(<?php echo e(asset('assets/images/demo/progress-3.jpg')); ?>) center no-repeat">
                        </div>
                        <img data-src="<?php echo e(asset('assets/images/b.gif')); ?>" class="lazyload" />
                    </div>
                </div>
                <div data-popup="idProHere" class="item animate">
                    <h3>tháng 5 - 2021</h3>
                    <div class="imgPage">
                        <div style="background: url(<?php echo e(asset('assets/images/demo/progress-4.jpg')); ?>) center no-repeat">
                        </div>
                        <img data-src="<?php echo e(asset('assets/images/b.gif')); ?>" class="lazyload" />
                    </div>
                </div>
                <div class="timeLine">
                    <p>2021</p>
                </div>
            </div>
        </div>
    </section>
    <div class="spaceH"></div>


</main>


<div id="idProHere" class="popup">
    <div class="btnClose jsClosePopupProgress"></div>
    <div class="slideProgressPopup">
        <div class="item">
            <h3>tháng 5 - 2021</h3>
            <div class="img" style="background: url(<?php echo e(asset('assets/images/demo/27.jpg')); ?>) center no-repeat"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="item">
            <h3>tháng 5 - 2021</h3>
            <div class="img" style="background: url(<?php echo e(asset('assets/images/demo/27.jpg')); ?>) center no-repeat"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/web/progress.blade.php ENDPATH**/ ?>