<?php $__env->startSection('title', 'Create Edit Project'); ?>

<?php $__env->startSection('hidden_page', 'Create Edit Project'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-p2-client-edit-project">
    <input type="hidden" id="page-id" value="page-p2-client-edit-project" />
    <article class="main-article pd-ctr pt-0">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap type-2">
                <header>
                    <ul class="breadcrumb full-w ">
                        <li><a href="<?php echo e(route('client_casting_board')); ?>">Manage Project</a></li>
                        <li>Edit Project </li>
                    </ul>
                    <h4 class="main-heading type-4">Edit project</h4>
                </header>
                <form autocomplete="off" id="form-project" class="form-ctr" data-url="">
                    <div class="row-content dflex type-2">
                        <div class="row-header full-w"><strong>General project Information</strong></div>
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
                                        <img src="<?php echo e($post->thumb_url); ?>" alt="<?php echo e($post->name); ?>">
                                        <figcaption><b>Click to change</b></figcaption>
                                    </figure>
                                </div>
                                <p class="warning"></p>
                            </div>
                        </div>

                        <div class="right-wrap">
                            <div class="row-content dgrid col-2">
                                <div class="input-wrap redo-input full-w js-active">
                                    <label>Project Name *</label>
                                    <div class="holder">
                                        <input name="title" type="text" class="input js-required" autocomplete="off"
                                            required-txt="Enter the Project Name" placeholder="Project Name"
                                            value="<?php echo e($post->name); ?>" />
                                    </div>
                                    <p class="warning"></p>
                                </div>

                                <!-- <div class="input-wrap redo-input full-w js-active">
                                    <label>Internal Project Name *</label>
                                    <div class="holder">
                                        <input name="internal-name" type="text" class="input js-required"
                                            autocomplete="off" required-txt="Enter the Project Name"
                                            placeholder="Internal Project Name" value="<?php echo e($post->internal_name); ?>" />
                                    </div>
                                    <p class="warning"></p>
                                </div> -->

                                <div class="input-wrap input-sel redo-input js-active">
                                    <label>Project Type *</label>
                                    <div class="holder">
                                        <input type="hidden" name="type" value="<?php echo e($post->type); ?>" />
                                        <input type="text" class="input js-required" autocomplete="off"
                                            required-txt="Select your Project Type" placeholder="Project Type"
                                            value="<?php echo e($post->type); ?>" readonly />
                                    </div>
                                    <p class="warning"></p>
                                    <ul class="opt-list">
                                        <li data-value="Film OTT">Film OTT</li>
                                        <li data-value="Short Film">Short Film</li>
                                        <li data-value="TV OTT">TV OTT</li>
                                        <li data-value="TV Broadcast">TV Broadcast</li>
                                        <li data-value="Webdrama">Webdrama</li>
                                        <li data-value="Music Video">Music Video</li>
                                        <li data-value="Commercial" class="js-active">Commercial</li>
                                    </ul>
                                </div>

                                <div class="input-wrap input-sel redo-input js-active">
                                    <label>Genre *</label>
                                    <div class="holder">
                                        <input type="hidden" name="genre" value="<?php echo e($post->genre); ?>" />
                                        <input type="text" class="input js-required" autocomplete="off"
                                            required-txt="Select your Project Genre" placeholder="Project Genre"
                                            value="<?php echo e($post->genre); ?>" readonly />
                                    </div>
                                    <p class="warning"></p>
                                    <ul class="opt-list">
                                        <li data-value="Action">Action</li>
                                        <li data-value="Adventure">Adventure</li>
                                        <li data-value="Comedy" class="js-active">Comedy</li>
                                        <li data-value="Crime & Mystery">Crime & Mystery</li>
                                        <li data-value="Fantasy">Fantasy</li>
                                        <li data-value="Historical">Historical</li>
                                        <li data-value="Horror">Horror</li>
                                        <li data-value="Romance">Romance</li>
                                        <li data-value="Satire">Satire</li>
                                        <li data-value="Science fiction">Science fiction</li>
                                        <li data-value="Speculative">Speculative</li>
                                        <li data-value="Thriller">Thriller</li>
                                        <li data-value="Western">Western</li>
                                    </ul>
                                </div>

                                <div class="input-wrap input-sel-box redo-input full-w">
                                    <label>Shooting Location</label>
                                    <div class="holder">
                                        <input type="text" class="input static"
                                            placeholder="Please select your location" value="Ho Chi Minh, Ha Noi, Hue"
                                            readonly />
                                    </div>
                                    <p class="warning"></p>
                                    <ul class="opt-list">
                                        <li><label><input type="checkbox" name="location[0]" value="Ho chi minh"
                                                    checked><b>Ho chi minh</b></label></li>
                                        <li><label><input type="checkbox" name="location[1]" value="Ha Noi"
                                                    checked><b>Ha Noi</b></label></li>
                                        <li><label><input type="checkbox" name="location[2]" value="Da Nang"><b>Da
                                                    Nang</b></label></li>
                                        <li><label><input type="checkbox" name="location[3]" value="Hoi An"><b>Hoi
                                                    An</b></label></li>
                                        <li><label><input type="checkbox" name="location[4]" value="Hue"
                                                    checked><b>Hue</b></label></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row-content type-2">
                        <div class="row-header"><strong>Project Summary</strong></div>
                        <div class="input-wrap redo-input">
                            <label>Descriptions</label>
                            <div class="holder">
                                <div class="input"><textarea name="summary"
                                        autocomplete="off"><?php echo e($post->description); ?></textarea>
                                </div>
                            </div>
                            <p class="warning"></p>
                        </div>
                    </div>

                    <div class="row-content type-2">
                        <div class="row-header"><strong>Project Timeline</strong></div>
                        <div class="dgrid col-2">
                            <div class="input-wrap redo-input input-date full-w js-active">
                                <label>Deadline for Talent Submissions *</label>
                                <div class="holder">
                                    <input type="text" name="deadline-talent-sub" class="input js-required js-date"
                                        maxlength="10" autocomplete="off"
                                        required-txt="Enter Deadline for Talent Submissions"
                                        date-txt="Enter a valid date" placeholder="dd / mm / yyyy" value="<?php echo e(tk1FormatDate2($post->expired_date)); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date js-active">
                                <label>Start Day of Casting</label>
                                <div class="holder">
                                    <input type="text" name="start-day-casting" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy"
                                        value="<?php echo e(tk1FormatDate2($post->start_casting_date)); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date js-active">
                                <label>End Day of Casting</label>
                                <div class="holder">
                                    <input type="text" name="end-day-casting" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy"
                                        value="<?php echo e(tk1FormatDate2($post->end_casting_date)); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date js-active">
                                <label>Start Day of Rehearsal</label>
                                <div class="holder">
                                    <input type="text" name="start-day-rehearsal" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy"
                                        value="<?php echo e(tk1FormatDate2($post->start_rehearsal_date)); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date js-active">
                                <label>End Day of Rehearsal</label>
                                <div class="holder">
                                    <input type="text" name="end-day-rehearsal" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy"
                                        value="<?php echo e(tk1FormatDate2($post->end_rehearsal_date)); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date js-active">
                                <label>Start Day of Principle Photography</label>
                                <div class="holder">
                                    <input type="text" name="start-day-photo" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy"
                                        value="<?php echo e(tk1FormatDate2($post->start_photo_date)); ?>" />

                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date js-active">
                                <label>End Day of Principle Photography (DD/MM/YYYY)</label>
                                <div class="holder">
                                    <input type="text" name="end-day-photo" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy"
                                        value="<?php echo e(tk1FormatDate2($post->end_photo_date)); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                        </div>
                    </div>

                    <div class="row-content type-2">
                        <div class="row-header"><strong>Casting Contact</strong></div>
                        <div class="dgrid">
                            <div class="input-wrap redo-input js-active">
                                <label>Director’s name *</label>
                                <div class="holder">
                                    <input name="director-name" type="text" class="input js-required" autocomplete="off"
                                        required-txt="Please enter Director’s Name" placeholder="Director’s name"
                                        value="<?php echo e($post->director); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input js-active">
                                <label>Producer’s Name</label>
                                <div class="holder">
                                    <input name="producer-name" type="text" class="input js-required" autocomplete="off"
                                    required-txt="Please enter Producer’s Name" placeholder="Producer’s name" value="<?php echo e($post->producer); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input js-active">
                                <label>Phone</label>
                                <div class="holder">
                                    <input name="contact-phone" type="text" class="input js-num" maxlength="10"
                                        autocomplete="off" required-txt="Please enter phone number"
                                        placeholder="+84 xxx xxx xxx" value="<?php echo e($post->contact_phone); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input js-active">
                                <label>Email</label>
                                <div class="holder">
                                    <input name="contact-email" type="text" class="input js-required js-email"
                                        autocomplete="off" data-min="2"
                                        required-txt="Please enter contact email address"
                                        email-txt="Please enter a valid email address" placeholder="Your Email"
                                        value="<?php echo e($post->contact_email); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row-content">
                        <p class="warning-server">Submission Failed show here!</p>
                        <div class="btn-flex-wrap">
                            <a href="<?php echo e(route('client_casting_board')); ?>" class="btn-gray type-2">Cancel</a>
                            <a href="#" role="button" class="btn-gold type-2 btn-submit">Save Project</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </article>


</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_edit_project.blade.php ENDPATH**/ ?>