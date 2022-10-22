

<?php $__env->startSection('title', 'Talent Account'); ?>

<?php $__env->startSection('hidden_page', 'Talent Account'); ?>

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
                    <li><a href="#" class="active">Account Info</a></li>
                    <li><a href="<?php echo e(route('talent_password')); ?>">Password</a></li>
                    <li><a href="<?php echo e(route('talent_membership')); ?>">Membership Plan</a></li>
                </ul>
            </div>

            <form autocomplete="off" id="form-profile" class="form-ctr" data-url="json/submit-form-fail.json">
                <div class="row-content type-2">
                    <div class="row-header full-w"><strong>Account Information</strong></div>

                    <div class="dgrid col-2">
                        <div class="input-wrap redo-input full-w js-active">
                            <label>Account Name *</label>
                            <div class="holder">
                                <input name="name" type="text" class="input js-required" autocomplete="off"
                                    required-txt="Enter the Account Name" placeholder="Account Name"
                                    value="<?php echo e($talent->stage_name); ?>" />
                            </div>
                            <p class="warning"></p>
                        </div>

                        <!-- <div class="input-wrap redo-input full-w js-active">
                            <label>Account ID</label>
                            <div class="holder">
                                <input name="id" type="text" class="input" autocomplete="off" placeholder="Account ID"
                                    value="IMG_MODELS_ID" readonly />
                            </div>
                            <p class="warning"></p>
                        </div> -->

                        <div class="input-wrap redo-input js-active">
                            <label>Phone *</label>
                            <div class="holder">
                                <input name="phone" type="text" class="input js-required js-num" autocomplete="off"
                                    required-txt="Enter the Phone Number" placeholder="Phone Number"
                                    value="<?php echo e($talent->phone_number); ?>" />
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="input-wrap redo-input js-active">
                            <label>Email *</label>
                            <div class="holder">
                                <input name="email" type="text" class="input js-required js-email" autocomplete="off"
                                    required-txt="Enter the Email" email-txt="Please enter a valid email address"
                                    placeholder="Email" value="<?php echo e($talent->email); ?>" />
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="input-wrap redo-input full-w js-active">
                            <label>Address *</label>
                            <div class="holder">
                                <input name="address" type="text" class="input js-required" autocomplete="off"
                                    required-txt="Enter the Company Address" placeholder="Company Address"
                                    value="<?php echo e($talent->address); ?>" />
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
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_profile_info.blade.php ENDPATH**/ ?>