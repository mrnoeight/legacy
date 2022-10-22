

<?php $__env->startSection('title', 'Talent Detail'); ?>

<?php $__env->startSection('hidden_page', 'Talent Detail'); ?>

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
                <li><a href="<?php echo e(route('talent_profile')); ?>" class="active">Profile</a></li>
                    <li><a href="<?php echo e(route('talent_account')); ?>">Account Info</a></li>
                    <li><a href="<?php echo e(route('talent_password')); ?>">Password</a></li>
                    <li><a href="<?php echo e(route('talent_membership')); ?>">Membership Plan</a></li>
                </ul>
            </div>

            <section class="details-banner theme-white">
                <form id="form-profile" class="intro-wrap form-ctr intro-content" data-url="<?php echo e(route('talent_profile_update')); ?>">
                    <div class="intro-img">
                        <div class="main-img file-wrap upload-img">
                            <div class="holder">
                                <input type="file" name="upload-img[0]" accept="image/*">
                                <figure class="state-change">
                                    <img src="<?php echo e($talent->cover_url); ?>" alt="Non Smiling Headshot">
                                    <figcaption><b>Click to Change</b><span>Non Smiling Headshot</span></figcaption>
                                </figure>
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="sub-img">
                            <div class="file-wrap upload-img">
                                <div class="holder">
                                    <input type="file" name="upload-img[1]" accept="image/*">
                                    <figure class="state-change">
                                        <?php if($talent->cover_headshot_url != ''): ?>
                                        <img src="<?php echo e($talent->cover_headshot_url); ?>" alt="Smiling Headshot">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('assets/img/our-talent/subimg-1.jpg')); ?>" alt="Smiling Headshot">
                                        <?php endif; ?>
                                        <figcaption><b class="type-2">Click to Change</b><span>Smiling Headshot</span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="file-wrap upload-img">
                                <div class="holder">
                                    <input type="file" name="upload-img[2]" accept="image/*">
                                    <figure class="state-change">
                                        <?php if($talent->cover_fullbody_url != ''): ?>
                                        <img src="<?php echo e($talent->cover_fullbody_url); ?>" alt="Profile Full Body">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('assets/img/our-talent/subimg-2.jpg')); ?>" alt="Profile Full Body">
                                        <?php endif; ?>
                                        
                                        <figcaption><b class="type-2">Click to Change</b><span>Profile Full Body</span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="file-wrap upload-img">
                                <div class="holder">
                                    <input type="file" name="upload-img[3]" accept="image/*">
                                    <figure class="state-change">
                                        <?php if($talent->cover_anglebody_url != ''): ?>
                                        <img src="<?php echo e($talent->cover_anglebody_url); ?>" alt="3/4 Angle Body">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('assets/img/our-talent/subimg-3.jpg')); ?>" alt="3/4 Angle Body">
                                        <?php endif; ?>
                                        
                                        <figcaption><b class="type-2">Click to Change</b><span>3/4 Angle Body<br>(facing
                                                2 o clock or 10 o clock, cropped at the knees.)</span></figcaption>
                                    </figure>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="file-wrap upload-img">
                                <div class="holder">
                                    <input type="file" name="upload-img[4]" accept="image/*">
                                    <figure class="state-change">
                                        <?php if($talent->cover_face_fullbody_url != ''): ?>
                                        <img src="<?php echo e($talent->cover_face_fullbody_url); ?>" alt="Full Body">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('assets/img/our-talent/subimg-4.jpg')); ?>" alt="Full Body">
                                        <?php endif; ?>
                                        
                                        <figcaption><b class="type-2">Click to Change</b><span>Full Body (facing
                                                forward)</span></figcaption>
                                    </figure>
                                </div>
                                <p class="warning"></p>
                            </div>
                        </div>
                        <p class="note">
                            <i>Try Take1’s professional headshot photography service</i>
                            <a href="#">Contact Us</a>
                        </p>
                    </div>
                    <div class="intro-content">
                        <div class="row-content">
                            <div class="row-header"><b>PUBLIC INFORMATION</b><i>Viewed by clients</i></div>
                            <div class="dgrid col-2">
                                <div class="input-wrap redo-input js-active">
                                    <label>Stage name</label>
                                    <div class="holder">
                                        <input name="stage-name" type="text" class="input js-required"
                                            autocomplete="off" required-txt="Enter your Stage Name" value="<?php echo e($talent->stage_name); ?>"
                                            placeholder="Stage Name">
                                    </div>
                                    <p class="warning"></p>
                                </div>

                                <div class="input-wrap input-sel redo-input js-active">
                                    <label>Gender</label>
                                    <div class="holder">
                                        <input type="hidden" name="gender" value="<?php echo e($talent->gender); ?>">
                                        <input type="text" class="input js-required" autocomplete="off"
                                            required-txt="Select your Gender" value="Male" placeholder="Your Gender"
                                            readonly="">
                                    </div>
                                    <p class="warning"></p>
                                    <ul class="opt-list">
                                        <li data-value="Male" class="js-active">Male</li>
                                        <li data-value="Female">Female</li>
                                        <li data-value="LGBT">Not Specify</li>
                                    </ul>
                                </div>

                                <div class="input-wrap input-sel redo-input js-active">
                                    <label>City</label>
                                    <div class="holder">
                                        <input type="hidden" name="city" value="<?php echo e($talent->hometown); ?> -- <?php echo e($talent->city_id); ?>">
                                        <input type="text" class="input js-required" autocomplete="off"
                                            required-txt="Select your City" placeholder="Your City" value="<?php echo e($talent->hometown); ?>"
                                            readonly="">
                                    </div>
                                    <p class="warning"></p>
                                    <ul class="opt-list">
                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li data-value="<?php echo e($city->name); ?> -- <?php echo e($city->id); ?>"><?php echo e($city->name); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>

                                <div class="input-wrap redo-input js-active">
                                    <label>Address</label>
                                    <div class="holder">
                                        <input name="address" type="text" class="input js-required" autocomplete="off"
                                            required-txt="Enter your Address" placeholder="Your Address"
                                            value="<?php echo e($talent->address); ?>">
                                    </div>
                                    <p class="warning"></p>
                                </div>


                                <div class="input-wrap redo-input js-active">
                                    <label>Height (cm)</label>
                                    <div class="holder">
                                        <input name="height" type="text" class="input js-num js-required"
                                            autocomplete="off" maxlength="3" required-txt="Enter your Height"
                                            placeholder="Your Height" value="<?php echo e($talent->height); ?>">
                                    </div>
                                    <p class="warning"></p>
                                </div>

                                <div class="input-wrap redo-input js-active">
                                    <label>Weight (kg)</label>
                                    <div class="holder">
                                        <input name="weight" type="text" class="input js-num js-required"
                                            autocomplete="off" maxlength="3" required-txt="Enter your Weight"
                                            placeholder="Your Weight" value="<?php echo e($talent->weight); ?>">
                                    </div>
                                    <p class="warning"></p>
                                </div>

                                <div class="input-wrap redo-input js-active">
                                    <label>Age Range</label>
                                    <div class="holder dgrid col-2">
                                        <input name="age-range-from" type="text" class="input js-num js-required"
                                            autocomplete="off" maxlength="2" required-txt="Enter your Age Range"
                                            placeholder="XX" value="<?php echo e($talent->age_from); ?>">
                                        <input name="age-range-to" type="text" class="input js-num js-required"
                                            autocomplete="off" maxlength="2" required-txt="Enter your Age Range"
                                            placeholder="XX" value="<?php echo e($talent->age_to); ?>">
                                    </div>
                                    <p class="warning"></p>
                                </div>

                                <div class="input-wrap input-sel-box redo-input">
                                    <label>Language Spoken</label>
                                    <div class="holder">
                                        <input type="text" class="input static"
                                            placeholder="Please select your languages"
                                            value="English, Vietnamese, French" readonly="">
                                    </div>
                                    <p class="warning"></p>
                                    <ul class="opt-list">
                                        <li><label><input type="checkbox" name="language[0]" value="English"
                                                    checked=""><b>English</b></label></li>
                                        <li><label><input type="checkbox" name="language[1]" value="Vietnamese"
                                                    checked=""><b>Vietnamese</b></label></li>
                                        <li><label><input type="checkbox" name="language[2]"
                                                    value="Chinese"><b>Chinese</b></label></li>
                                        <li><label><input type="checkbox" name="language[3]"
                                                    value="French"><b>French</b></label></li>
                                        <li><label><input type="checkbox" name="language[4]" value="Spanish"
                                                    checked=""><b>Spanish</b></label></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row-content">
                            <div class="row-header"><b>PRIVATE INFORMATION</b><i>Viewed by Take 1 Only</i></div>
                            <div class="dgrid col-2">

                                <div class="input-wrap redo-input js-active">
                                    <label>First Name</label>
                                    <div class="holder">
                                        <input name="first-name" type="text" class="input js-required"
                                            autocomplete="off" required-txt="Enter your First Name"
                                            placeholder="First Name" value="<?php echo e($talent->first_name); ?>">
                                    </div>
                                    <p class="warning"></p>
                                </div>

                                <div class="input-wrap redo-input js-active">
                                    <label>Last Name</label>
                                    <div class="holder">
                                        <input name="last-name" type="text" class="input js-required" autocomplete="off"
                                            required-txt="Enter your Last Name" placeholder="Last Name" value="<?php echo e($talent->last_name); ?>">
                                    </div>
                                    <p class="warning"></p>
                                </div>

                                <div class="input-wrap redo-input js-active">
                                    <label>Birthday</label>
                                    <div class="holder">
                                        <input type="text" name="birthday" class="input js-required js-min js-date"
                                            maxlength="10" autocomplete="off" required-txt="Enter your Birthday"
                                            date-txt="Enter a valid Birthday" value="<?php echo e($talent->birthday); ?>"
                                            placeholder="DD / MM / YYYY">
                                    </div>
                                    <p class="warning"></p>
                                </div>

                                <div class="compound-wrap">
                                    <div class="input-wrap input-sel redo-input js-active">
                                        <label>Country Code</label>
                                        <div class="holder">
                                            <input type="hidden" name="phone-code" value="(+84)">
                                            <input type="text" class="input js-required bg-icon"
                                                style="background-image: url(<?php echo e(asset('assets/img/flag/vi.jpg')); ?>)" autocomplete="off"
                                                value="(+84)" readonly="">
                                        </div>
                                        <ul class="opt-list">
                                            <li class="has-icon js-active" data-value="(+84)">
                                                <img src="<?php echo e(asset('assets/img/flag/vi.jpg')); ?>" alt="vn">
                                                <i>(+84)</i>
                                            </li>
                                            <li class="has-icon" data-value="(+86)">
                                                <img src="<?php echo e(asset('assets/img/flag/cn.jpg')); ?>" alt="cn">
                                                <i>(+86)</i>
                                            </li>
                                            <li class="has-icon" data-value="(+44)">
                                                <img src="<?php echo e(asset('assets/img/flag/en.jpg')); ?>" alt="en">
                                                <i>(+44)</i>
                                            </li>
                                            <li class="has-icon" data-value="(+33)">
                                                <img src="<?php echo e(asset('assets/img/flag/fr.jpg')); ?>" alt="fr">
                                                <i>(+33)</i>
                                            </li>
                                            <li class="has-icon" data-value="(+07)">
                                                <img src="<?php echo e(asset('assets/img/flag/ru.jpg')); ?>" alt="ru">
                                                <i>(+07)</i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="input-wrap redo-input js-active">
                                        <label>Phone Number</label>
                                        <div class="holder">
                                            <input name="phone-number" type="tel" maxlength="12"
                                                class="input js-required js-min js-num" data-min="10" autocomplete="off"
                                                required-txt="Enter your phone number"
                                                min-txt="Phone number must be at least ten characters"
                                                placeholder="XX XXXX XXXX" value="<?php echo e($talent->phone_number); ?>">
                                        </div>
                                        <p class="warning"></p>
                                    </div>
                                </div>

                                <div class="input-wrap redo-input js-active">
                                    <label>Email</label>
                                    <div class="holder">
                                        <input name="email" type="text" class="input js-required js-email"
                                            autocomplete="off" data-min="2" required-txt="Enter your Email Address"
                                            email-txt="Please enter a valid email address" placeholder="Email Address"
                                            value="<?php echo e($talent->email); ?>">
                                    </div>
                                    <p class="warning"></p>
                                </div>

                                <div class="input-wrap redo-input js-active">
                                    <label>Country</label>
                                    <div class="holder">
                                        <input name="country" type="text" class="input js-required" autocomplete="off"
                                            required-txt="Enter your Country" placeholder="Country" value="<?php echo e($talent->country); ?>">
                                    </div>
                                    <p class="warning"></p>
                                </div>

                                <div class="file-wrap single-file redo-input full-w">
                                    <label>Your resume</label>
                                    <div class="holder">
                                        <input type="file" name="talent-cv" accept="image/*,application/pdf">
                                        <p class="input js-active"><?php echo e($talent->CV_url); ?></p>
                                        <a href="#" role="button" class="btn-upload"><b>upload</b></a>
                                    </div>
                                    <div class="s-note">JPG, PNG or PDF file type are recommended. Maximum file size is
                                        10 MB.</div>
                                    <p class="warning"></p>
                                </div>

                            </div>
                        </div>

                        <div class="row-content">
                            <p class="warning-server">Submission Failed show here!</p>
                            <div class="btn-grid-wrap">
                                <a href="<?php echo e(route('talent_profile')); ?>" class="btn-gray type-2">Cancel</a>
                                <a href="#" role="button" class="btn-gold type-2 btn-submit">Save</a>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </article>
</main>

<!-- END MAIN PAGE -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_profile_edit.blade.php ENDPATH**/ ?>