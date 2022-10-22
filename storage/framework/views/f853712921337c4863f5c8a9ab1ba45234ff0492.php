<?php $__env->startSection('title', 'Client Profile Edit'); ?>

<?php $__env->startSection('hidden_page', 'Client Profile Edit'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-p2-client-info">
    <input type="hidden" id="page-id" value="page-p2-client-info" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">

            <div class="content-wrap redo-wrap type-2 p2-header-wrap">
                <header>
                    <h4 class="main-heading type-4">Client Information</h4>
                </header>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                    <li><a href="48-p2-client-info-profile.html" class="active">Profile</a></li>
                    <li><a href="48-p2-client-info-account.html">Account Info</a></li>
                    <li><a href="48-p2-client-info-pw.html">Password</a></li>
                    <li><a href="48-p2-client-info-mbs.html">Membership Plan</a></li>
                </ul>
            </div>

            <form autocomplete="off" id="form-profile" class="form-ctr" data-url="">
                <div class="row-content dflex type-2">
                    <div class="row-header full-w"><strong>General Information</strong></div>
                    <div class="intro-img">
                        <div class="main-img file-wrap upload-img redo-input">
                            <div class="holder">
                                <input type="file" name="upload-img" accept="image/*" />
                                <div class="state-upload" style="display: none;">
                                    <figure class="border-plus">
                                        <figcaption><b>Drag File to Upload<br />or <i>Browse</i></b></figcaption>
                                    </figure>
                                </div>
                                <figure class="state-change" style="display: block;">
                                    <img src="<?php echo e($client->company->thumb_url); ?>" alt="<?php echo e($client->company->name); ?>">
                                    <figcaption><b>Click to change</b></figcaption>
                                </figure>
                            </div>
                            <p class="warning"></p>
                        </div>
                    </div>

                    <div class="right-wrap">
                        <div class="row-content dgrid col-2">
                            <div class="input-wrap redo-input full-w js-active">
                                <label>Company Name *</label>
                                <div class="holder">
                                    <input name="name" type="text" class="input js-required" autocomplete="off"
                                        required-txt="Enter the Company Name" placeholder="Company Name"
                                        value="<?php echo e($client->company->name); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input js-active">
                                <label>Email *</label>
                                <div class="holder">
                                    <input name="email" type="text" class="input js-required js-email"
                                        autocomplete="off" required-txt="Enter the Email"
                                        email-txt="Please enter a valid email address" placeholder="Email"
                                        value="<?php echo e($client->email); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input js-active">
                                <label>Phone *</label>
                                <div class="holder">
                                    <input name="phone" type="text" class="input js-required js-num" autocomplete="off"
                                        required-txt="Enter the Phone Number" placeholder="Phone Number"
                                        value="<?php echo e($client->company->tel); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input js-active">
                                <label>Website</label>
                                <div class="holder">
                                    <input name="website" type="text" class="input" autocomplete="off"
                                        placeholder="Website" value="<?php echo e($client->company->website); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input js-active">
                                <label>Facebook</label>
                                <div class="holder">
                                    <input name="facebook" type="text" class="input" autocomplete="off"
                                        placeholder="Website" value="<?php echo e($client->company->facebook); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input full-w js-active">
                                <label>Address *</label>
                                <div class="holder">
                                    <input name="address" type="text" class="input js-required" autocomplete="off"
                                        required-txt="Enter the Company Address" placeholder="Company Address"
                                        value="<?php echo e($client->company->address); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-content type-2">
                    <div class="row-header"><strong>Introduction</strong></div>
                    <div class="input-wrap redo-input">
                        <div class="holder">
                            <div class="input"><textarea name="submit-note"
                                    autocomplete="off"><?php echo e($client->company->todo); ?></textarea>
                            </div>
                        </div>
                        <p class="warning"></p>
                    </div>
                </div>

                <div class="row-content type-2">
                    <div class="row-header"><strong>Casting Information</strong></div>
                    <div class="dgrid col-2">
                        <div class="input-wrap redo-input js-active">
                            <label>Director’s name *</label>
                            <div class="holder">
                                <input name="director-name" type="text" class="input js-required" autocomplete="off"
                                    required-txt="Please enter Director’s Name" placeholder="Director’s name"
                                    value="<?php echo e($client->company->director_name); ?>" />
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="input-wrap redo-input js-active">
                            <label>Producer’s Name</label>
                            <div class="holder">
                                <input name="producer-name" type="text" class="input" autocomplete="off"
                                    placeholder="Producer’s name" value="<?php echo e($client->company->producer_name); ?>" />
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="input-wrap redo-input js-active">
                            <label>Contact Person</label>
                            <div class="holder">
                                <input name="contact-person" type="text" class="input" autocomplete="off"
                                    placeholder="Contact Person" value="<?php echo e($client->company->cast_name); ?>" />
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="input-wrap redo-input js-active">
                            <label>Phone</label>
                            <div class="holder">
                                <input name="contact-phone" type="text" class="input js-num" maxlength="10"
                                    autocomplete="off" placeholder="+84 xxx xxx xxx" value="<?php echo e($client->company->cast_phone); ?>" />
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="input-wrap redo-input js-active">
                            <label>Email</label>
                            <div class="holder">
                                <input name="contact-email" type="text" class="input js-email" autocomplete="off"
                                    email-txt="Please enter a valid email address" placeholder="Your Email"
                                    value="<?php echo e($client->company->cast_email); ?>" />
                            </div>
                            <p class="warning"></p>
                        </div>
                    </div>
                </div>

                <div class="row-content">
                    <p class="warning-server">Submission Failed show here!</p>
                    <div class="btn-flex-wrap">
                        <a href="<?php echo e(route('client_profile')); ?>" class="btn-gray type-2">Cancel</a>
                        <a href="#" role="button" class="btn-gold type-2 btn-submit">Save Profile</a>
                    </div>
                </div>
            </form>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_profile_edit_new.blade.php ENDPATH**/ ?>