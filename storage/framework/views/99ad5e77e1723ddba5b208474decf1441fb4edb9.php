<?php $__env->startSection('title', 'Activate account'); ?>

<?php $__env->startSection('hidden_page', 'Activate Account'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-active-account">
    <input type="hidden" id="page-id" value="page-active-account" />
    <section class="heading-banner">
        <h2 class="sub-heading">Your account has been activated!</h2>
        <p>Please set your password to continue to your account page.</p>
    </section>

    <form id="login-form" class="login-form" data-url="<?php echo e(route('password.update')); ?>">
        <p class="warning-server">Server errors show here!!!</p>
        <div class="input-wrap">
            <div class="holder">
                <input name="password" id="account-password" type="password" class="input js-required js-min"
                    autocomplete="off" data-min="6" required-txt="Please enter your password"
                    min-txt="Password must be at least six characters" />
                <label class="txt-label" for="password">Password</label>
                <a href="#" role="button" class="btn-show-pw"></a>
            </div>
            <p class="warning"></p>
        </div>
        <div class="input-wrap">
            <div class="holder">
                <input name="password_confirmation" type="password" class="input js-required js-min js-confirm"
                    autocomplete="off" data-min="6" data-target="#account-password"
                    required-txt="Please enter your confirmation password"
                    min-txt="Password must be at least six characters" cf-txt="Password mismatch" />
                <label class="txt-label" for="password_confirmation">Confirm your password</label>
                <a href="#" role="button" class="btn-show-pw"></a>
            </div>
            <p class="warning"></p>
        </div>
        <input type="hidden" name="token" value="<?php echo e($token); ?>" />
        <input type="hidden" name="email" value="<?php echo e($email); ?>" />
        <a href="#" role="button" class="btn-submit type-2 btn-gold">CREATE YOUR PASSWORD</a>
    </form>

</main>
<!-- END MAIN PAGE -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/activate.blade.php ENDPATH**/ ?>