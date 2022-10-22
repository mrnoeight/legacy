

<?php $__env->startSection('title', 'Talent Password'); ?>

<?php $__env->startSection('hidden_page', 'Talent Password'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-p2-talent-info">
    <input type="hidden" id="page-id" value="page-p2-talent-info" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">

            <div class="content-wrap redo-wrap type-2 p2-header-wrap">
                <header>
                    <h4 class="main-heading type-4">Talent Information</h4>
                </header>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                <li><a href="<?php echo e(route('talent_profile')); ?>">Profile</a></li>
                    <li><a href="<?php echo e(route('talent_account')); ?>">Account Info</a></li>
                    <li><a href="#" class="active">Password</a></li>
                    <li><a href="<?php echo e(route('talent_membership')); ?>">Membership Plan</a></li>
                </ul>
            </div>

            <form autocomplete="off" id="form-profile" class="form-ctr" data-url="json/submit-form-fail.json">
                <div class="row-content type-2">
                    <div class="row-header"><strong>Change Password</strong></div>
                    <div class="dgrid">
                        <div class="input-wrap redo-input">
                            <label>Current Password</label>
                            <div class="holder">
                                <input name="current-pass" type="password" class="input js-required js-min"
                                    autocomplete="off" data-min="2" required-txt="Please enter your password"
                                    min-txt="Password must be at least two characters">
                                <a href="#" role="button" class="btn-show-pw"></a>
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="input-wrap redo-input">
                            <label>Password</label>
                            <div class="holder">
                                <input name="pass" id="account-pass" type="password" class="input js-required js-min"
                                    autocomplete="off" data-min="2" required-txt="Please enter your password"
                                    min-txt="Password must be at least two characters">
                                <a href="#" role="button" class="btn-show-pw"></a>
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="input-wrap redo-input">
                            <label>Confirm your password</label>
                            <div class="holder">
                                <input name="confirm-pass" type="password" class="input js-required js-min js-confirm"
                                    autocomplete="off" data-min="2" data-target="#account-pass"
                                    required-txt="Please enter your confirmation password"
                                    min-txt="Password must be at least two characters" cf-txt="Password mismatch">
                                <a href="#" role="button" class="btn-show-pw"></a>
                            </div>
                            <p class="warning"></p>
                        </div>
                    </div>
                </div>

                <div class="row-content">
                    <p class="warning-server">Submission Failed show here!</p>
                    <div class="btn-flex-wrap">
                        <a href="<?php echo e(route('talent_profile')); ?>" class="btn-gray type-2">Cancel</a>
                        <a href="#" role="button" class="btn-gold type-2 btn-submit">Save</a>
                    </div>
                </div>
            </form>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_profile_password.blade.php ENDPATH**/ ?>