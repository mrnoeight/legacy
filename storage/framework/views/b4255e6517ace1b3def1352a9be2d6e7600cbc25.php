

<?php $__env->startSection('title', 'Talent Membership'); ?>

<?php $__env->startSection('hidden_page', 'Talent Membership'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-p2-talent-info">
    <input type="hidden" id="page-id" value="page-p2-talent-info" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap redo-wrap type-2 p2-header-wrap">
                <header>
                    <h4 class="main-heading type-4">Talent Account</h4>
                </header>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                <li><a href="<?php echo e(route('talent_profile')); ?>">Profile</a></li>
                    <li><a href="<?php echo e(route('talent_account')); ?>">Account Info</a></li>
                    <li><a href="<?php echo e(route('talent_password')); ?>">Password</a></li>
                    <li><a href="<?php echo e(route('talent_membership')); ?>" class="active">Membership Plan</a></li>
                </ul>
            </div>

            <div class="content-wrap redo-wrap">
                <h5 class="heading">payment result</h5>
                <div class="dgrid col-2">
                    <?php if($is_good): ?>
                    <p>You have done payment. You will be redirect in 5 seconds.</p>
                    <?php else: ?>
                    <p>Checksum is not correct. Result failed !</p>
                    <?php endif; ?>
                </div>
            </div>

            

        </div>
    </article>
</main>
<!-- END MAIN PAGE -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_payoo_callback.blade.php ENDPATH**/ ?>