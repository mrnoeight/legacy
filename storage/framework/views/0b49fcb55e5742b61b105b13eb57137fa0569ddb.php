

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
            <?php $__currentLoopData = $arrProgress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year=>$arr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="progresslist">
                <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div data-popup="idProHere<?php echo e($p->id); ?>" class="item animate">
                    <h3><?php echo e(__('Tháng')); ?> <?php echo e(\Carbon\Carbon::parse($p->block_date)->formatLocalized('%m - %Y')); ?></h3>
                    <div class="imgPage">
                        <div style="background: url(<?php echo e($p->gallery_url); ?>) center no-repeat">
                        </div>
                        <img data-src="<?php echo e(asset('assets/images/b.gif')); ?>" class="lazyload" />
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <div class="timeLine">
                    <p><?php echo e($year); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
    <div class="spaceH"></div>


</main>

<?php $__currentLoopData = $arrProgress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year=>$arr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div id="idProHere<?php echo e($p->id); ?>" class="popup">
    <div class="btnClose jsClosePopupProgress"></div>
    <div class="slideProgressPopup">
        <?php $__currentLoopData = $p->getListGalleryImage(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
            <h3><?php echo e(__('Tháng')); ?> <?php echo e(\Carbon\Carbon::parse($p->block_date)->formatLocalized('%m - %Y')); ?></h3>
            <div class="img" style="background: url(<?php echo e($v); ?>) center no-repeat"></div>
            <p><?php echo e($p->head_title1); ?></p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/web/progress.blade.php ENDPATH**/ ?>