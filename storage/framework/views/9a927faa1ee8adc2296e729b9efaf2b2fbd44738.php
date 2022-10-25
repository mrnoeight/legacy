

<?php $__env->startSection('title', 'Thu vien'); ?>

<?php $__env->startSection('hidden_page', 'Thu vien'); ?>

<?php $__env->startSection('content'); ?>

<!-- MAIN PAGE -->
<main id="pGallery">
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

    <section class="section galleryWrap">
        <div class="container">
            <div class="ttPage">
                <h2 class="mainTt animate"><?php echo nl2br($oPage->mid_title1); ?></h2>
            </div>
        </div>
        <div class="slideGalleryWrap animate">
            <div class="slideGalleryPage lightgallery">
                <?php $__currentLoopData = $oPhotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <div class="item" style="background: url(<?php echo e($photo->banner_url); ?>) center no-repeat">
                        <img data-src="<?php echo e(asset('assets/images/thumb2.gif')); ?>" class="lazyload" />
                        <span class="linkLg" data-src="<?php echo e($photo->banner_url); ?>"
                            data-sub-html="<p><?php echo e($photo->head_title1); ?></p>"></span>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
            

        </div>

    </section>
    <div class="spaceH"></div>
    <section class="section galleryWrap">
        <div class="container">
            <div class="ttPage">
                <h2 class="mainTt animate"><?php echo nl2br($oPage->mid_desc1); ?></h2>
            </div>
        </div>
        <div class="slideGalleryWrap animate">
            <div class="slideGalleryPage lightgallery">
                <?php $__currentLoopData = $oVideos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <div class="item" style="background: url(<?php echo e($video->banner_url); ?>) center no-repeat">
                        <img data-src="<?php echo e(asset('assets/images/thumb2.gif')); ?>" class="lazyload" />
                        <span class="linkLg video" data-src="<?php echo e($video->block_name); ?>"
                            data-sub-html="<p><?php echo e($video->head_title1); ?></p>"></span>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>

        </div>

    </section>
    <div class="spaceH"></div>

</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/web/gallery.blade.php ENDPATH**/ ?>