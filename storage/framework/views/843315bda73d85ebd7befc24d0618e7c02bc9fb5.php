<?php $__env->startSection('title', 'Create New Project'); ?>

<?php $__env->startSection('hidden_page', 'Create New Project'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-p2-client-add-project">
    <input type="hidden" id="page-id" value="page-p2-client-add-project" />
    <article class="main-article pd-ctr pt-0">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap type-2">
                <header>
                    <ul class="breadcrumb full-w">
                        <li><a href="<?php echo e(route('client_casting_board')); ?>">Manage Project</a></li>
                        <li>New Project</li>
                    </ul>
                    <h4 class="main-heading type-4">Add new project</h4>
                </header>
                <form autocomplete="off" id="form-project" class="form-ctr" data-url="">
                    <div class="row-content dflex type-2">
                        <div class="row-header full-w"><strong>General project Information</strong></div>
                        <div class="intro-img">
                            <div class="main-img file-wrap upload-img redo-input">
                                <div class="holder">
                                    <input type="file" name="upload-img" accept="image/*" />
                                    <div class="state-upload">
                                        <figure class="border-plus">
                                            <figcaption><b>Drag File to Upload<br />or <i>Browse</i></b></figcaption>
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

                        <div class="right-wrap">
                            <div class="row-content dgrid col-2">
                                <div class="input-wrap redo-input full-w">
                                    <label>Project Name *</label>
                                    <div class="holder">
                                        <input name="title" type="text" class="input js-required" autocomplete="off"
                                            required-txt="Enter the Project Name" placeholder="Project Name" />
                                    </div>
                                    <p class="warning"></p>
                                </div>

                                <div class="input-wrap redo-input full-w">
                                    <label>Internal Project Name *</label>
                                    <div class="holder">
                                        <input name="internal-name" type="text" class="input" autocomplete="off"
                                            required-txt="Enter the Project Name" placeholder="Internal Project Name" />
                                    </div>
                                    <p class="warning"></p>
                                </div>

                                <div class="input-wrap input-sel redo-input">
                                    <label>Project Type *</label>
                                    <div class="holder">
                                        <input type="hidden" name="type" />
                                        <input type="text" class="input js-required" autocomplete="off"
                                            required-txt="Select your Project Type" placeholder="Project Type"
                                            readonly />
                                    </div>
                                    <p class="warning"></p>
                                    <ul class="opt-list">
                                        <li data-value="Film OTT">Film OTT</li>
                                        <li data-value="Short Film">Short Film</li>
                                        <li data-value="TV OTT">TV OTT</li>
                                        <li data-value="TV Broadcast">TV Broadcast</li>
                                        <li data-value="Webdrama">Webdrama</li>
                                        <li data-value="Music Video">Music Video</li>
                                        <li data-value="Commercial">Commercial</li>
                                    </ul>
                                </div>

                                <div class="input-wrap input-sel redo-input">
                                    <label>Genre *</label>
                                    <div class="holder">
                                        <input type="hidden" name="genre" />
                                        <input type="text" class="input js-required" autocomplete="off"
                                            required-txt="Select your Project Genre" placeholder="Project Genre"
                                            readonly />
                                    </div>
                                    <p class="warning"></p>
                                    <ul class="opt-list">
                                        <li data-value="Action">Action</li>
                                        <li data-value="Adventure">Adventure</li>
                                        <li data-value="Comedy">Comedy</li>
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
                                            placeholder="Please select your location" readonly />
                                    </div>
                                    <p class="warning"></p>
                                    <ul class="opt-list">
                                        <li><label><input type="checkbox" name="location[0]" value="Ho chi minh"><b>Ho
                                                    chi minh</b></label></li>
                                        <li><label><input type="checkbox" name="location[1]" value="Ha Noi"><b>Ha
                                                    Noi</b></label></li>
                                        <li><label><input type="checkbox" name="location[2]" value="Da Nang"><b>Da
                                                    Nang</b></label></li>
                                        <li><label><input type="checkbox" name="location[3]" value="Hoi An"><b>Hoi
                                                    An</b></label></li>
                                        <li><label><input type="checkbox" name="location[4]"
                                                    value="Hue"><b>Hue</b></label></li>
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
                                        autocomplete="off">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi condimentum ultricies tincidunt. Pellentesque lectus eros, vulputate sit amet orci vitae, scelerisque dapibus urna. Praesent in massa in eros euismod vehicula sit amet eu sapien. Vestibulum nec mauris diam. Donec pharetra ex sit amet odio volutpat, in pellentesque nunc consectetur. Curabitur imperdiet urna id odio ornare, eu sagittis dui facilisis. Phasellus nulla neque, dignissim non arcu eu, porttitor lobortis ligula. Nam sodales tellus fringilla metus iaculis semper et faucibus velit. Cras</textarea>
                                </div>
                            </div>
                            <p class="warning"></p>
                        </div>
                    </div>

                    <div class="row-content type-2">
                        <div class="row-header"><strong>Project Timeline</strong></div>
                        <div class="dgrid col-2">
                            <div class="input-wrap redo-input input-date full-w">
                                <label>Deadline for Talent Submissions *</label>
                                <div class="holder">
                                    <input type="text" name="deadline-talent-sub" class="input js-required js-date"
                                        maxlength="10" autocomplete="off"
                                        required-txt="Enter Deadline for Talent Submissions"
                                        date-txt="Enter a valid date" placeholder="dd / mm / yyyy" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date">
                                <label>Start Day of Casting</label>
                                <div class="holder">
                                    <input type="text" name="start-day-casting" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date">
                                <label>End Day of Casting</label>
                                <div class="holder">
                                    <input type="text" name="end-day-casting" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date">
                                <label>Start Day of Rehearsal</label>
                                <div class="holder">
                                    <input type="text" name="start-day-rehearsal" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date">
                                <label>End Day of Rehearsal</label>
                                <div class="holder">
                                    <input type="text" name="end-day-rehearsal" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date">
                                <label>Start Day of Principle Photography</label>
                                <div class="holder">
                                    <input type="text" name="start-day-photo" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy" />

                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date">
                                <label>End Day of Principle Photography (DD/MM/YYYY)</label>
                                <div class="holder">
                                    <input type="text" name="end-day-photo" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy" />
                                </div>
                                <p class="warning"></p>
                            </div>

                        </div>
                    </div>

                    <div class="row-content type-2">
                        <div class="row-header"><strong>Casting Contact</strong></div>
                        <div class="dgrid">
                            <div class="input-wrap redo-input">
                                <label>Director’s name *</label>
                                <div class="holder">
                                    <input name="director-name" type="text" class="input js-required" autocomplete="off"
                                        required-txt="Please enter Director’s Name" placeholder="Director’s name" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input">
                                <label>Producer’s Name</label>
                                <div class="holder">
                                    <input name="producer-name" type="text" class="input" autocomplete="off"
                                        placeholder="Producer’s name" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input">
                                <label>Phone</label>
                                <div class="holder">
                                    <input name="contact-phone-number" type="text" class="input js-num" maxlength="10"
                                        autocomplete="off" required-txt="Please enter Phone"
                                        placeholder="+84 xxx xxx xxx" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input">
                                <label>Email</label>
                                <div class="holder">
                                    <input name="contact-email" type="text" class="input js-required js-email"
                                        autocomplete="off" data-min="2"
                                        required-txt="Please enter contact email address"
                                        email-txt="Please enter a valid email address" placeholder="Your Email" />
                                </div>
                                <p class="warning"></p>
                            </div>
                        </div>
                    </div>


                    <div class="row-content">
                        <p class="warning-server">Submission Failed show here!</p>
                        <div class="btn-flex-wrap">
                            <a href="<?php echo e(route('client_casting_board')); ?>" class="btn-gray type-2">Cancel</a>
                            <a href="#" role="button" class="btn-gold type-2 btn-submit">Create Project</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </article>


</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_new_project.blade.php ENDPATH**/ ?>