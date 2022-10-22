<?php $__env->startSection('title', 'Edit Profile'); ?>

<?php $__env->startSection('hidden_page', 'Edit Profile'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-client-profile-edit">
    <input type="hidden" id="page-id" value="page-client-profile-edit" />
    <section class="details-banner theme-dark">
        <header class="top-ctr wrap-1200">
            <ul class="breadcrumb">
                <li><a href="1-home.html">Home</a></li>
                <li><a href="21-client-profile.html">Profile</a></li>
                <li><a href="#">Edit Profile</a></li>
            </ul>
            <time datetime="20/04/2021"><span class="mb-hide">Updated on:&nbsp;</span>20/04/2021</time>
        </header>
        <figure class="cover-img wrap-1200">
            <div class="img-wrap-circle"><img src="<?php echo e($client->company->thumb_url); ?>" alt="<?php echo e($client->name); ?>" /></div>
            <figcaption>
                <h3 class="name"><?php echo e($client->name); ?></h3>
                <p><i class="pack-name">BASIC</i><span>Member since January 2019</span></p>
            </figcaption>
        </figure>
        <div class="curve-deco type-2"></div>
    </section>

    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap type-2">
                <header>
                    <h4 class="main-heading type-2">Edit Profile</h4>
                </header>
                <form id="form-edit" class="form-ctr" data-url="">
                    <div class="row-content dflex">
                        <div class="intro-img">
                            <div class="main-img file-wrap upload-img">
                                <div class="holder">
                                    <input type="file" name="upload-img" accept="image/*" />
                                    <div class="state-upload">
                                        <figure class="border-plus type-2">
                                            <img src="<?php echo e($client->company->thumb_url); ?>" alt="<?php echo e($client->name); ?>" />
                                            <figcaption><b>Click to change Profile Image</b><b>JPG, PNG or PDF. Maximum
                                                    10MB</b></figcaption>
                                        </figure>
                                    </div>
                                    <figure class="state-change">
                                        <img src="<?php echo e(asset('assets/img/bg/1x1.png')); ?>" alt="Change">
                                        <figcaption><b>Click to change</b></figcaption>
                                    </figure>
                                </div>
                                <p class="warning"></p>
                            </div>
                        </div>

                        <div class="right-wrap ">
                            <div class="row-content">
                                <div class="row-header"><b>Company Profile</b></div>
                                <div class="dgrid col-2">
                                    <div class="input-wrap js-active">
                                        <div class="holder">
                                            <input name="address" id="address" type="text" class="input js-required"
                                                autocomplete="off" required-txt="Enter your Company Address"
                                                value="<?php echo e($client->company->address); ?>" />
                                            <label class="txt-label" for="address">Company Address</label>
                                        </div>
                                        <p class="warning"></p>
                                    </div>

                                    <div class="compound-wrap">
                                        <div class="input-wrap input-sel js-active">
                                            <div class="holder">
                                                <input type="hidden" name="phone-code" value="<?php echo e($client->country_code); ?>" />
                                                <input id="phone-code" type="text" class="input js-required bg-icon"
                                                    style="background-image: url(<?php echo e(asset('assets/img/flag/vi.jpg')); ?>)" autocomplete="off"
                                                    value="<?php echo e($client->country_code); ?>" readonly />
                                                <label class="txt-label" for="phone-code">Country Code</label>
                                            </div>
                                            <ul class="opt-list">
                                                <li class="has-icon js-active" data-value="(+84)">
                                                    <img src="<?php echo e(asset('assets/img/flag/vi.jpg')); ?>" alt="vn" />
                                                    <i>(+84)</i>
                                                </li>
                                                <li class="has-icon" data-value="(+86)">
                                                    <img src="<?php echo e(asset('assets/img/flag/cn.jpg')); ?>" alt="cn" />
                                                    <i>(+86)</i>
                                                </li>
                                                <li class="has-icon" data-value="(+44)">
                                                    <img src="<?php echo e(asset('assets/img/flag/en.jpg')); ?>" alt="en" />
                                                    <i>(+44)</i>
                                                </li>
                                                <li class="has-icon" data-value="(+33)">
                                                    <img src="<?php echo e(asset('assets/img/flag/fr.jpg')); ?>" alt="fr" />
                                                    <i>(+33)</i>
                                                </li>
                                                <li class="has-icon" data-value="(+07)">
                                                    <img src="<?php echo e(asset('assets/img/flag/ru.jpg')); ?>" alt="ru" />
                                                    <i>(+07)</i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="input-wrap js-active">
                                            <div class="holder">
                                                <input name="phone-number" id="phone-number" type="tel" maxlength="12"
                                                    class="input js-required js-min js-num" data-min="10"
                                                    autocomplete="off" required-txt="Enter Contact Phone Number"
                                                    min-txt="Phone number must be at least ten characters"
                                                    value="<?php echo e($client->phone_number); ?>" />
                                                <label class="txt-label" for="phone-number">Phone Number</label>
                                            </div>
                                            <p class="warning"></p>
                                        </div>
                                    </div>

                                    <div class="input-wrap js-active">
                                        <div class="holder">
                                            <input name="email" id="email" type="text"
                                                class="input js-required js-email" autocomplete="off" data-min="2"
                                                required-txt="Enter Contact Email Address"
                                                email-txt="Please enter a valid email address"
                                                value="<?php echo e($client->email); ?>" />
                                            <label class="txt-label" for="email">Email Address</label>
                                        </div>
                                        <p class="warning"></p>
                                    </div>

                                    <div class="input-wrap js-active">
                                        <div class="holder">
                                            <input name="website" id="website" type="text" class="input js-required"
                                                autocomplete="off" required-txt="Enter your Company Address"
                                                value="<?php echo e($client->company->website); ?>" />
                                            <label class="txt-label" for="website">Website</label>
                                        </div>
                                        <p class="warning"></p>
                                    </div>

                                    <div class="input-wrap js-active">
                                        <div class="holder">
                                            <input name="facebook" id="facebook" type="text" class="input js-required"
                                                autocomplete="off" required-txt="Enter your Company Address"
                                                value="<?php echo e($client->company->facebook); ?>" />
                                            <label class="txt-label" for="facebook">Facebook</label>
                                        </div>
                                        <p class="warning"></p>
                                    </div>

                                    <div class="input-wrap js-active">
                                        <div class="holder">
                                            <input name="twitter" id="twitter" type="text" class="input js-required"
                                                autocomplete="off" required-txt="Enter your Company Address"
                                                value="<?php echo e($client->company->twitter); ?>" />
                                            <label class="txt-label" for="twitter">Twitter</label>
                                        </div>
                                        <p class="warning"></p>
                                    </div>

                                    <div class="input-wrap js-active">
                                        <div class="holder">
                                            <input name="youtube" id="youtube" type="text" class="input js-required"
                                                autocomplete="off" required-txt="Enter your Company Address"
                                                value="<?php echo e($client->company->youtube); ?>" />
                                            <label class="txt-label" for="youtube">Youtube</label>
                                        </div>
                                        <p class="warning"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-content">
                        <div class="row-header"><b>Casting Information</b></div>
                        <div class="dgrid col-2">
                            <div class="input-wrap js-active">
                                <div class="holder">
                                    <input name="exe-producer" id="exe-producer" type="text" class="input js-required"
                                        autocomplete="off" required-txt="Enter the Executive Producer"
                                        value="<?php echo e($client->company->excutive_producer_name); ?>" />
                                    <label class="txt-label" for="exe-producer">Executive Producer</label>
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap js-active">
                                <div class="holder">
                                    <input name="pro-name" id="pro-name" type="text" class="input js-required"
                                        autocomplete="off" required-txt="Enter the Producer's Name"
                                        value="<?php echo e($client->company->producer_name); ?>" />
                                    <label class="txt-label" for="pro-name">Producer's Name</label>
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap js-active">
                                <div class="holder">
                                    <input name="dir-name" id="dir-name" type="text" class="input js-required"
                                        autocomplete="off" required-txt="Enter the Director's Name"
                                        value="<?php echo e($client->company->director_name); ?>" />
                                    <label class="txt-label" for="dir-name">Director's Name</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row-content">
                        <div class="row-header"><b>Casting Direct Contact</b></div>
                        <div class="dgrid col-2 ">
                            <div class="input-wrap js-active">
                                <div class="holder">
                                    <input name="contact-name" id="contact-name" type="text" class="input js-required"
                                        autocomplete="off" required-txt="Enter Contact Name" value="<?php echo e($client->company->cast_name); ?>" />
                                    <label class="txt-label" for="contact-name">Name</label>
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="compound-wrap">
                                <div class="input-wrap input-sel js-active">
                                    <div class="holder">
                                        <input type="hidden" name="contact-phone-code" value="<?php echo e($client->company->cast_phone_code); ?>" />
                                        <input id="contact-phone-code" type="text" class="input js-required bg-icon"
                                            style="background-image: url(<?php echo e(asset('assets/img/flag/vi.jpg')); ?>)" autocomplete="off"
                                            value="(+84)" readonly />
                                        <label class="txt-label" for="phone-code">Country Code</label>
                                    </div>
                                    <ul class="opt-list">
                                        <li class="has-icon js-active" data-value="(+84)">
                                            <img src="<?php echo e(asset('assets/img/flag/vi.jpg')); ?>" alt="vn" />
                                            <i>(+84)</i>
                                        </li>
                                        <li class="has-icon" data-value="(+86)">
                                            <img src="<?php echo e(asset('assets/img/flag/cn.jpg')); ?>" alt="cn" />
                                            <i>(+86)</i>
                                        </li>
                                        <li class="has-icon" data-value="(+44)">
                                            <img src="<?php echo e(asset('assets/img/flag/en.jpg')); ?>" alt="en" />
                                            <i>(+44)</i>
                                        </li>
                                        <li class="has-icon" data-value="(+33)">
                                            <img src="<?php echo e(asset('assets/img/flag/fr.jpg')); ?>" alt="fr" />
                                            <i>(+33)</i>
                                        </li>
                                        <li class="has-icon" data-value="(+07)">
                                            <img src="<?php echo e(asset('assets/img/flag/ru.jpg')); ?>" alt="ru" />
                                            <i>(+07)</i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="input-wrap js-active">
                                    <div class="holder">
                                        <input name="contact-phone-number" id="contact-phone-number" type="tel"
                                            maxlength="12" class="input js-required js-min js-num" data-min="10"
                                            autocomplete="off" required-txt="Enter Contact Phone Number"
                                            min-txt="Phone number must be at least ten characters" value="<?php echo e($client->company->cast_phone); ?>" />
                                        <label class="txt-label" for="contact-phone-number">Phone Number</label>
                                    </div>
                                    <p class="warning"></p>
                                </div>
                            </div>

                            <div class="input-wrap js-active">
                                <div class="holder">
                                    <input name="contact-email" id="contact-email" type="text"
                                        class="input js-required js-email" autocomplete="off" data-min="2"
                                        required-txt="Enter Contact Email Address"
                                        email-txt="Please enter a valid email address" value="<?php echo e($client->company->cast_email); ?>" />
                                    <label class="txt-label" for="contact-email">Email Address</label>
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap js-active">
                                <div class="holder">
                                    <input name="contact-time" id="contact-time" type="text" class="input js-required"
                                        autocomplete="off" required-txt="Enter Best time to Contact"
                                        value="<?php echo e($client->company->cast_time); ?>" />
                                    <label class="txt-label" for="contact-time">Best time to Contact</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row-content">
                        <p class="warning-server">Submission Failed show here!</p>
                        <div class="btn-grid-wrap">
                            <a href="<?php echo e(route('client_profile')); ?>" class="btn-gray type-2">Cancel</a>
                            <a href="#" role="button" class="btn-gold type-2 btn-submit">Save</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </article>


</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_profile_edit.blade.php ENDPATH**/ ?>