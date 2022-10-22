<?php $__env->startSection('title', 'Client Update Password'); ?>

<?php $__env->startSection('hidden_page', 'Client Update Password'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-client-pw">
    <input type="hidden" id="page-id" value="page-client-pw" />
    <section class="details-banner theme-dark">
        <header class="top-ctr wrap-1200">
            <ul class="breadcrumb">
                <li><a href="1-home.html">Home</a></li>
                <li><a href="#">Change Password</a></li>
            </ul>
            <time datetime="20/04/2021"><span class="mb-hide">Updated on:&nbsp;</span>20/04/2021</time>
        </header>
        <figure class="cover-img wrap-1200">
            <div class="img-wrap-circle"><img src="img/banner/img-logo.jpg" alt="IMG MODELS" /></div>
            <figcaption>
                <h3 class="name">IMG MODELS VIETNAM</h3>
                <p><i class="pack-name">BASIC</i><span>Member since January 2019</span></p>
            </figcaption>
        </figure>
        <div class="curve-deco type-2"></div>
    </section>

    <article class="main-article pd-ctr no-pd">
        <div class="content-wrap">
            <header class="txt-center">
                <h4 class="main-heading type-2">Change your password</h4>
            </header>
            <form class="login-form" id="login-form" data-url="json/submit-form-fail.json">
                <p class="warning-server">Server errors show here!!!</p>
                <div class="input-wrap">
                    <div class="holder">
                        <input name="current-password" id="current-password" type="password"
                            class="input js-required js-pw" autocomplete="off" maxlength="30"
                            required-txt="Please enter your current password"
                            min-txt="Password must be at least 8 characters" pw-txt="Your password is weak" />
                        <label class="txt-label" for="current-password">Current Password</label>
                        <a href="#" role="button" class="btn-show-pw"></a>
                    </div>
                    <p class="warning"></p>
                </div>
                <div class="input-wrap">
                    <div class="holder">
                        <input name="password" id="password" type="password" class="input js-required js-pw"
                            autocomplete="off" maxlength="30" required-txt="Please enter your new password"
                            min-txt="Password must be at least 8 characters" pw-txt="Your password is weak" />
                        <label class="txt-label" for="password">New Password</label>
                        <a href="#" role="button" class="btn-show-pw"></a>
                    </div>
                    <p class="warning"></p>
                </div>
                <ul class="list-circle">
                    <li>Your password must be between 8 and 30 characters.</li>
                    <li>Your password must contain at least one uppercase and one lowercase letter.</li>
                    <li>Your password must contain at least one number digit (ex: 0123...)</li>
                    <li>Your password must contain at least one special character (ex: $#@!%^&*()...)</li>
                </ul>
                <div class="input-wrap">
                    <div class="holder">
                        <input name="confirm-password" type="password" class="input js-required js-confirm js-pw"
                            autocomplete="off" maxlength="30" data-target="#password"
                            required-txt="Please enter your confirmation password"
                            min-txt="Password must be at least 8 characters" cf-txt="Password mismatch"
                            pw-txt="Your password is weak" />
                        <label class="txt-label" for="confirm-password">Confirm your password</label>
                        <a href="#" role="button" class="btn-show-pw"></a>
                    </div>
                    <p class="warning"></p>
                </div>
                <div class="btn-grid-wrap">
                    <a href="14-talent-ctr.html" role="button" class="btn-gray type-2">Cancel</a>
                    <a href="#" role="button" class="btn-submit type-2 btn-gold">Save</a>
                </div>
            </form>
        </div>
    </article>


</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_password.blade.php ENDPATH**/ ?>