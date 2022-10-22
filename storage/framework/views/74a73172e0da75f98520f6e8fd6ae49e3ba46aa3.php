

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('hidden_page', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->

 <main id="page-login">
    <input type="hidden" id="page-id" value="page-login" />
    <section class="heading-banner">
        <h2 class="sub-heading">Log In to <span class="gold-underline">Account</span></h2>
        <p>Hello there !  Enter your email address and password to login and be well on your way.</p>
        <b class="sub-desc">Don’t have an account? <a href="<?php echo e(route('signup')); ?>" role="button" class="btn-txt">Sign up
                here</a></b>
    </section>

    <form id="login-form" class="login-form" data-url="">
        <p class="warning-server">Server errors show here!!!</p>
        <div class="input-wrap">
            <div class="posrel">
                <input name="email" type="text" class="input js-required js-email" autocomplete="off"
                    data-min="2" required-txt="Enter your Email Address"
                    email-txt="Please enter a valid email address" />
                <label class="txt-label" for="email-address">Email Address</label>
            </div>
            <p class="warning">Enter your Email Address</p>
        </div>
        <div class="input-wrap">
            <div class="posrel">
                <input name="password" type="password" class="input js-required js-min" autocomplete="off"
                    data-min="2" required-txt="Please enter your password"
                    min-txt="Password must be at least two characters" />
                <label class="txt-label" for="password">Password</label>
                <a href="#" role="button" class="btn-show-pw"></a>
            </div>
            <p class="warning"></p>
        </div>
        <div class="form-wrap keep-login-wrap">
            <div class="chx-wrap">
                <div class="holder">
                    <input type="checkbox" name="keep-login" id="chx-keep-login">
                    <label for="chx-keep-login">Keep me log in</label>
                </div>
                <p class="warning"></p>
            </div>
            <a href="#" role="button" class="btn-txt">Forgot Password?</a>
        </div>

        <a href="#" role="button" class="btn-submit btn-gold">Log In</a>
        <p class="sep-line"><b>or log in with</b></p>
        <div class="form-wrap col-2">
            <a href="<?php echo e(route('social_login', ['driver'=>'facebook'])); ?>" role="button" class="btn-icon">
                <figure>
                    <img src="<?php echo e(asset('assets/img/social/facebook.svg')); ?>" alt="facebook" />
                    <figcaption>facebook</figcaption>
                </figure>
            </a>
            <a href="<?php echo e(route('social_login', ['driver'=>'google'])); ?>" role="button" class="btn-icon">
                <figure>
                    <img src="<?php echo e(asset('assets/img/social/google.svg')); ?>" alt="google" />
                    <figcaption>google</figcaption>
                </figure>
            </a>
        </div>
    </form>

</main>
<!-- END MAIN PAGE -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/web/login.blade.php ENDPATH**/ ?>