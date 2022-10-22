

<?php $__env->startSection('title', 'Talent Detail'); ?>

<?php $__env->startSection('hidden_page', 'Talent Detail'); ?>

<?php $__env->startSection('content'); ?>

<!-- MAIN PAGE -->
<main id="page-talent-ctr-edit">
    <input type="hidden" id="page-id" value="page-talent-ctr-edit" />
    <section class="details-banner wrap-1200">
        <header class="top-ctr">
            <ul class="breadcrumb">
                <li><a href="1-home.html">Home</a></li>
                <li><a href="14-talent-ctr.html">Profile</a></li>
                <li><a href="#">Edit</a></li>
            </ul>
            <time datetime="20/04/2021"><span class="mb-hide">Updated on:&nbsp;</span>20/04/2021</time>
        </header>

        <form id="form-edit" class="intro-wrap form-ctr intro-content" data-url="">
            <div class="intro-img">

                <!-- <div class="main-img file-wrap upload-img">
                    <div class="holder">
                        <input type="file" name="upload-img[0]" accept="image/*" data-max="10" txt-max="File is too big" txt-type="Please select recommended file types"/>
                        <div class="state-upload">
                            <figure class="border-plus type-2">
                                <img src="<?php echo e($talent->cover_url); ?>" alt="<?php echo e($talent->name); ?>" />
                                <figcaption><b>Click to Change Non Smiling Headshot</b><b>JPG, PNG or PDF. Maximum
                                        10MB</b></figcaption>
                            </figure>
                        </div>
                        <figure class="state-change">
                            <img src="<?php echo e(asset('assets/img/our-talent/profile-10.jpg')); ?>" alt="Change">
                            <figcaption><b>Click to change</b></figcaption>
                        </figure>
                    </div>
                    <p class="s-note">JPG PNG GIF. Maximum 10MB.</p>
                    <p class="warning"></p>
                </div> -->

                <div class="main-img file-wrap upload-img">
                    <div class="holder">
                        <input type="file" name="upload-img[0]" accept="image/*" data-max="10" txt-max="File is too big" txt-type="Please select recommended file types"/>
                        <div class="state-upload">
                            <figure class="border-plus type-2">
                                <img src="<?php echo e($talent->cover_url); ?>" alt="<?php echo e($talent->name); ?>" />
                                <figcaption><b>Click to Change Non Smiling Headshot</b><b>JPG, PNG or PDF. Maximum
                                        10MB</b></figcaption>
                            </figure>
                        </div>
                        <figure class="state-change">
                            <img src="<?php echo e(asset('assets/img/our-talent/profile-10.jpg')); ?>" alt="Change">
                            <figcaption><b>Click to change</b></figcaption>
                        </figure>
                    </div>
                    <p class="s-note">JPG PNG GIF. Maximum 10MB.</p>
                    <p class="warning"></p>
                </div>

                <div class="sub-img">
                    <div class="file-wrap upload-img">
                        <div class="holder">
                            <input type="file" name="upload-img[1]" accept="image/*" data-max="10" txt-max="File is too big" txt-type="Please select recommended file types"/>
                            <div class="state-upload">
                                <figure class="border-plus">
                                    <img src="<?php echo e($talent->cover_headshot_url); ?>" alt="Smiling Headshot" />
                                    <figcaption><b>Smiling Headshot</b></figcaption>
                                </figure>
                            </div>
                            <figure class="state-change">
                                <img src="<?php echo e(asset('assets/img/bg/1x1.png')); ?>" alt="Change">
                                <figcaption><b>Click to change</b></figcaption>
                            </figure>
                        </div>
                        <p class="warning"></p>
                    </div>
                    <div class="file-wrap upload-img">
                        <div class="holder">
                            <input type="file" name="upload-img[2]" accept="image/*" data-max="10" txt-max="File is too big" txt-type="Please select recommended file types"/>
                            <div class="state-upload">
                                <figure class="border-plus">
                                    <img src="<?php echo e($talent->cover_fullbody_url); ?>" alt="Profile Full Body" />
                                    <figcaption><b>Profile Full Body</b></figcaption>
                                </figure>
                            </div>
                            <figure class="state-change">
                                <img src="<?php echo e(asset('assets/img/bg/1x1.png')); ?>" alt="Change">
                                <figcaption><b>Click to change</b></figcaption>
                            </figure>
                        </div>
                        <p class="warning"></p>
                    </div>
                    <div class="file-wrap upload-img">
                        <div class="holder">
                            <input type="file" name="upload-img[3]" accept="image/*" data-max="10" txt-max="File is too big" txt-type="Please select recommended file types"/>
                            <div class="state-upload">
                                <figure class="border-plus">
                                    <img src="<?php echo e($talent->cover_anglebody_url); ?>" alt="3/4 Angle Body" />
                                    <figcaption><b>3/4 Angle Body</b><b>(facing 2 o clock or 10 o clock, cropped at the
                                            knees.)</b></figcaption>
                                </figure>
                            </div>
                            <figure class="state-change">
                                <img src="<?php echo e(asset('assets/img/bg/1x1.png')); ?>" alt="Change">
                                <figcaption><b>Click to change</b></figcaption>
                            </figure>
                        </div>
                        <p class="warning"></p>
                    </div>
                    <div class="file-wrap upload-img">
                        <div class="holder">
                            <input type="file" name="upload-img[4]" accept="image/*" data-max="10" txt-max="File is too big" txt-type="Please select recommended file types"/>
                            <div class="state-upload">
                                <figure class="border-plus">
                                    <img src="<?php echo e($talent->cover_face_fullbody_url); ?>" alt="Full Body" />
                                    <figcaption><b>Full Body</b><b>(facing forward)</b></figcaption>
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


                <p class="note">
                    <i>Try Take1’s professional headshot photography service</i>
                    <a href="#">Contact Us</a>
                </p>
            </div>
            <div class="intro-content">
                <div class="row-content">
                    <div class="row-header"><b>PUBLIC INFORMATION</b><i>Viewed by clients</i></div>
                    <div class="dgrid col-2">
                        <div class="input-wrap js-active">
                            <div class="holder">
                                <input name="stage-name" id="stage-name" type="text" class="input js-required"
                                    autocomplete="off" required-txt="Enter your Stage Name"
                                    value="<?php echo e($talent->stage_name); ?>" />
                                <label class="txt-label" for="stage-name">Stage name</label>
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="input-wrap input-sel js-active">
                            <div class="holder">
                                <input type="hidden" name="gender" value="<?php echo e($talent->gender); ?>" />
                                <input id="gender" type="text" class="input js-required" autocomplete="off"
                                    required-txt="Select your Gender" value="<?php echo e($talent->gender); ?>" readonly />
                                <label class="txt-label" for="gender">Gender</label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li data-value="Male">Male</li>
                                <li data-value="Female">Female</li>
                                <li data-value="LGBT">Not Specify</li>
                            </ul>
                        </div>


                        <div class="input-wrap input-sel js-active">
                            <div class="holder">
                                <input type="hidden" name="citizenship" value="Vietnam" />
                                <input id="citizenship" type="text" class="input js-required" autocomplete="off"
                                    required-txt="Select your Citizenship" value="Vietnam" readonly />
                                <label class="txt-label" for="gender">Citizenship</label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li data-value="Option Value 1">United States</li>
                                <li data-value="Option Value 2">France</li>
                                <li data-value="Option Value 3" class="js-active">Vietnam</li>
                            </ul>
                        </div>

                        <div class="input-wrap input-sel js-active">
                            <div class="holder">
                                <input type="hidden" name="city"
                                    value="<?php echo e($talent->hometown); ?> -- <?php echo e($talent->city_id); ?>" />
                                <input id="city" type="text" class="input js-required" autocomplete="off"
                                    required-txt="Select your City" value="<?php echo e($talent->hometown); ?>" readonly />
                                <label class="txt-label" for="city">City</label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li data-value="<?php echo e($city->name); ?> -- <?php echo e($city->id); ?>"><?php echo e($city->name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <!-- <li data-value="Option Value 1" class="js-active">Ho Chi Minh</li> -->

                            </ul>
                        </div>


                        <div class="input-wrap js-active">
                            <div class="holder">
                                <input name="height" id="height" type="text" class="input js-num js-required"
                                    autocomplete="off" maxlength="3" required-txt="Enter your Height"
                                    value="<?php echo e($talent->height); ?>" />
                                <label class="txt-label" for="height">Height (cm)</label>
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="input-wrap js-active">
                            <div class="holder">
                                <input name="weight" id="weight" type="text" class="input js-num js-required"
                                    autocomplete="off" maxlength="3" required-txt="Enter your Weight"
                                    value="<?php echo e($talent->weight); ?>" />
                                <label class="txt-label" for="height">Weight (kg)</label>
                            </div>
                            <p class="warning"></p>
                        </div>


                        <div class="input-wrap js-active">
                            <div class="holder">
                                <input name="age-range-from" id="age-range-from" type="text"
                                    class="input js-num js-required" autocomplete="off" maxlength="2"
                                    required-txt="Enter your Age Range" value="<?php echo e($talent->age_from); ?>" />
                                <label class="txt-label" for="age-range-from">Age Range - From</label>
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="input-wrap js-active">
                            <div class="holder">
                                <input name="age-range-to" id="age-range-to" type="text"
                                    class="input js-num js-required" autocomplete="off" maxlength="2"
                                    required-txt="Enter your Age Range" value="<?php echo e($talent->age_to); ?>" />
                                <label class="txt-label" for="age-range-to">Age Range - To</label>
                            </div>
                            <p class="warning"></p>
                        </div>
                    </div>
                </div>

                <div class="row-content">
                    <div class="row-header"><b>PRIVATE INFORMATION</b><i>Viewed by Take 1 Only</i></div>
                    <div class="dgrid col-2">

                        <div class="input-wrap js-active">
                            <div class="holder">
                                <input name="first-name" id="first-name" type="text" class="input js-required"
                                    autocomplete="off" required-txt="Enter your First Name"
                                    value="<?php echo e($talent->first_name); ?>" />
                                <label class="txt-label" for="first-name">First Name</label>
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="input-wrap js-active">
                            <div class="holder">
                                <input name="last-name" id="last-name" type="text" class="input js-required"
                                    autocomplete="off" required-txt="Enter your Last Name"
                                    value="<?php echo e($talent->last_name); ?>" />
                                <label class="txt-label" for="last-name">Last Name</label>
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="input-wrap js-active">
                            <div class="holder">
                                <input type="text" id="birthday" name="birthday"
                                    class="input js-required js-min js-date" maxlength="10" autocomplete="off"
                                    required-txt="Enter your Birthday" date-txt="Enter a valid Birthday"
                                    value="14/10/1980" />
                                <label class="txt-label" for="birthday">Birthday (DD/MM/YYYY)</label>
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="compound-wrap">
                            <div class="input-wrap input-sel js-active">
                                <div class="holder">
                                    <input type="hidden" name="phone-code" value="(+84)" />
                                    <input id="phone-code" type="text" class="input js-required bg-icon"
                                        style="background-image: url(<?php echo e(asset('assets/img/flag/vi.jpg')); ?>)"
                                        autocomplete="off" value="(+84)" readonly />
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
                                        class="input js-required js-min js-num" data-min="10" autocomplete="off"
                                        required-txt="Enter your phone number"
                                        min-txt="Phone number must be at least ten characters"
                                        value="<?php echo e($talent->phone_number); ?>" />
                                    <label class="txt-label" for="phone-number">Phone Number</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                        </div>

                        <div class="input-wrap js-active">
                            <div class="holder">
                                <input name="email" id="email" type="text" class="input js-required js-email"
                                    autocomplete="off" data-min="2" required-txt="Enter your Email Address"
                                    email-txt="Please enter a valid email address" value="<?php echo e($talent->email); ?>" />
                                <label class="txt-label" for="email">Email Address</label>
                            </div>
                            <p class="warning"></p>
                        </div>

                        <div class="input-wrap js-active">
                            <div class="holder">
                                <input name="address" id="address" type="text" class="input js-required"
                                    autocomplete="off" required-txt="Enter your address"
                                    value="<?php echo e($talent->address); ?>" />
                                <label class="txt-label" for="address">Address</label>
                            </div>
                            <p class="warning"></p>
                        </div>
                    </div>
                </div>

                <div class="row-content">
                    <div class="row-header"><b>Your Resume</b><i>JPG, PNG or PDF. Maximum 10MB</i></div>
                    <div class="file-wrap upload-file">
                        <div class="holder">
                            <input type="file" name="upload-profile" accept="image/*,application/pdf" multiple />
                            <div class="state-upload">
                                <div class="border-plus"></div>
                                <span>Click or drag and drop file here to upload</span>
                            </div>
                        </div>
                        <ul class="list-file">
                            <?php $__currentLoopData = $resumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="item">
                                <div class="file-info">
                                    <span><?php echo e($resume->file_name); ?></span>
                                    <span><?php echo e($resume->human_readable_size); ?></span>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="row-content">
                    <p class="warning-server">Submission Failed show here!</p>
                    <div class="btn-grid-wrap">
                        <a href="14-talent-ctr.html" class="btn-gray type-2">Cancel</a>
                        <a href="#" role="button" class="btn-gold type-2 btn-submit">Save</a>
                    </div>
                </div>
            </div>
        </form>
    </section>
</main>

<!-- END MAIN PAGE -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/profile_edit.blade.php ENDPATH**/ ?>