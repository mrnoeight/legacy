

<?php $__env->startSection('title', 'Talent Detail'); ?>

<?php $__env->startSection('hidden_page', 'Talent Detail'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-talent-details">
    <input type="hidden" id="page-id" value="page-talent-details" />
    <section class="details-banner wrap-1200">
        <header class="top-ctr">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('our_talent')); ?>">Meet Our Talents</a></li>
            </ul>
            <!-- <time datetime="20/04/2021"><span class="mb-hide">Updated on:&nbsp;</span>20/04/2021</time> -->
        </header>
        <div class="intro-wrap">
            <img class="intro-img" src="<?php echo e($tal->cover_url); ?>" alt="<?php echo e($tal->name); ?>" />
            <div class="intro-content">
                <h4 class="heading"><?php echo e($tal->stage_name); ?></h4>
                <div class="bar-ctr type-2">
                    <h5 class="link"><a href="<?php echo e(route('talent_detail', ['id' => $tal->id])); ?>" target="_blank"><?php echo e(route('talent_detail', ['id' => $tal->id])); ?></a></h5>
                    <nav class="share">
                    <h5>Share:</h5>
                    <ul>
                        <li><a href="#">
                        <img class="icon" src="<?php echo e(asset('assets/img/social/facebook.svg')); ?>" alt="facebook"/>
                        <h6 class="hidden">Facebook</h6>
                        </a></li>
                        <li><a href="#">
                        <img class="icon" src="<?php echo e(asset('assets/img/social/twitter.svg')); ?>" alt="twitter"/>
                        <h6 class="hidden">Twitter</h6>
                        </a></li>
                    </ul>
                    </nav>
                </div>
                <div class="info col-1">
                    <h5><i class="city">Location:&nbsp;</i><b><?php echo e($tal->hometown); ?></b></h5>
                    <h5><i class="gender">Gender:&nbsp;</i><b><?php echo e($tal->gender); ?></b></h5>
                    <h5><i class="age">Age Range:&nbsp;</i><b><?php echo e($tal->age); ?></b></h5>
                    <h5><i class="bday">Height:</i>&nbsp;<b><?php echo e($tal->height); ?> cm</b></h5>
                    <h5><i class="bday">Weight:</i>&nbsp;<b><?php echo e($tal->weight); ?> kg</b></h5>
                </div>
                <p class="desc"><?php echo e($tal->description); ?></p>
                <ul class="img-list">
                    <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><img src="<?php echo e($v); ?>" alt="<?php echo e($tal->name); ?>" /></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <!-- <div class="bar-ctr mg-ctr mb-0">
                    <h5 class="link"><a href="<?php echo e(route('talent_detail', ['id' => $tal->id])); ?>" target="_blank"><?php echo e(route('talent_detail', ['id' => $tal->id])); ?></a></h5>
                    <nav class="share">
                    <h5>Share:</h5>
                    <ul>
                        <li><a href="#">
                        <img class="icon" src="<?php echo e(asset('assets/img/social/facebook.svg')); ?>" alt="facebook"/>
                        <h6 class="hidden">Facebook</h6>
                        </a></li>
                        <li><a href="#">
                        <img class="icon" src="<?php echo e(asset('assets/img/social/twitter.svg')); ?>" alt="twitter"/>
                        <h6 class="hidden">Twitter</h6>
                        </a></li>
                    </ul>
                    </nav>
                </div> -->
                <div class="btn-wrap">
                    <!-- <a href="#" role="button" class="btn-bookmark" title="bookmark this talent">
                        <svg width="18" height="22">
                            <path
                                d="M12 6V18.97L7.79 17.16L7 16.82L6.21 17.16L2 18.97V6H12ZM16 0H5.99C4.89 0 4 0.9 4 2H14C15.1 2 16 2.9 16 4V17L18 18V2C18 0.9 17.1 0 16 0ZM12 4H2C0.9 4 0 4.9 0 6V22L7 19L14 22V6C14 4.9 13.1 4 12 4Z" />
                        </svg>
                    </a> -->

                    <?php if(Auth::check() && Auth::user()->type == \App\Models\Registration::CLIENT): ?>

                    <a href="#" role="button" class="btn-gold-arrow cta btn-hire">Hire this talent</a>

                    <?php elseif(!Auth::check()): ?>
                    <a href="#" role="button" class="btn-gold-arrow cta btn-login">Hire this talent</a>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap">
                <header>
                    <h4 class="main-heading">Career Experience</h4>
                </header>
                <div class="pro-meter">
                    <div class="bar">
                        <i style="width: 75%;"><span class="float-lbl"><b>Semi - Professional</b></span></i>
                        <ul class="sep">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <p class="pro-cap">
                        <b>amateur</b>
                        <b>Professional</b>
                    </p>
                </div>
            </div>

            <div class="content-wrap">
                <header>
                    <h4 class="main-heading">Photo</h4>
                    <a href="#" class="sub-link" role="button">View All</a>
                </header>
                <ul class="dflex col-4">
                    <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><img src="<?php echo e($v); ?>" alt="<?php echo e($tal->name); ?>" /></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div class="content-wrap">
                <header>
                    <h4 class="main-heading">Video</h4>
                    <a href="#" class="sub-link" role="button">View All</a>
                </header>

            </div>

            <ul class="break-list content-wrap">
                <lh class="header">
                    <h3 class="main-heading">Career Experiences</h3>
                </lh>
                <li class="exp">
                    <h4 class="heading">Walker (TV Series) 2021</h4>
                    <p><b>Thomas</b></p>
                    <p><b>Supporting Role</b></p>
                    <p>Role Summary: A late night radio talk show host offers a room to a runaway teen at her opulent
                        home, what she doesn't bargain for is the eighteen year old has ulterior motives which forces
                        Kim to face her darkest secrets.</p>
                </li>
                <li class="exp">
                    <h4 class="heading">The Secrets We Keep (Featured Film) 2020</h4>
                    <p><b>John</b></p>
                    <p><b>Leading Role</b></p>
                    <p>Role Summary: A late night radio talk show host offers a room to a runaway teen at her opulent
                        home, what she doesn't bargain for is the eighteen year old has ulterior motives which forces
                        Kim to face her darkest secrets.</p>
                </li>
                <li class="exp">
                    <h4 class="heading">TH True Yogurt (Short video) 2020</h4>
                    <p><b>Male Talent</b></p>
                    <p><b>Leading Role</b></p>
                    <p>Role Summary: A late night radio talk show host offers a room to a runaway teen at her opulent
                        home, what she doesn't bargain for is the eighteen year old has ulterior motives which forces
                        Kim to face her darkest secrets.</p>
                </li>
            </ul>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->

<?php echo $__env->make('web.partials.how_it_works', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('web.partials.sign_up', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div id="popup-login" class="popup-content">
    <div class="main-content">
        <a href="#" role="button" class="btn-close"><i></i></a>
        <section class="heading-wrap">
            <h3 class="heading">Log In To Hire This Talent</h3>
            <p class="desc">Don’t have an account? <a href="<?php echo e(route('signup')); ?>" role="button" class="btn-txt">Sign up
                    here</a></p>
        </section>

        <form class="login-form" data-url="<?php echo e(route('login')); ?>">
            <p class="warning-server">Server errors show here!!!</p>
            <div class="input-wrap">
                <div class="posrel">
                    <input name="email" type="text" class="input js-required js-email" autocomplete="off"
                        required-txt="Enter your Email Address" email-txt="Please enter a valid email address" />
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
                        <input type="checkbox" name="keep-login" id="chx-keep-login" />
                        <label for="chx-keep-login">Keep me log in</label>
                    </div>
                    <p class="warning"></p>
                </div>
                <a href="#" role="button" class="btn-txt">Forgot Password?</a>
            </div>

            <a href="#" role="button" class="btn-submit btn-gold">Log In</a>
            <p class="sep-line"><b>or log in with</b></p>
            <div class="form-wrap col-2">
                <a href="#" role="button" class="btn-icon">
                    <figure>
                        <img src="<?php echo e(asset('assets/img/social/facebook.svg')); ?>" alt="facebook" />
                        <figcaption>facebook</figcaption>
                    </figure>
                </a>
                <a href="#" role="button" class="btn-icon">
                    <figure>
                        <img src="<?php echo e(asset('assets/img/social/google.svg')); ?>" alt="google" />
                        <figcaption>google</figcaption>
                    </figure>
                </a>
            </div>
        </form>
    </div>
</div>

<div id="popup-hire" class="popup-content">
    <div class="main-content">
        <a href="#" role="button" class="btn-close"><i></i></a>
        <section class="heading-wrap">
            <h3 class="heading">Hire This Talent By Request Media</h3>
        </section>

        <form class="login-form" data-url="<?php echo e(route('client_hire_request')); ?>" data-event="popup-hire-passed">
            <input type="hidden" name="hire-id" id="hire-id" value="<?php echo e($tal->id); ?>" />
            <p class="warning-server">Server errors show here!!!</p>
            <div class="input-wrap input-sel redo-input">
                <label>Project Name *</label>
                <div class="holder">
                    <input type="hidden" name="hire-project" id="hire-project" />
                    <input type="text" class="input js-required" autocomplete="off" required-txt="Select your project"
                        placeholder="Select a Project" readonly />
                </div>
                <p class="warning"></p>
                <ul class="opt-list" id="hire-project-list">
                <?php if(Auth::check() && Auth::user()->type == \App\Models\Registration::CLIENT): ?>
                <?php $__currentLoopData = Auth::user()->company->post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-value="<?php echo e($post->id); ?>"><?php echo e($post->name); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </ul>
            </div>

            <div class="input-wrap input-sel redo-input">
                <label>Role Name *</label>
                <div class="holder">
                    <input type="hidden" name="hire-role" value="1" />
                    <input type="text" class="input " autocomplete="off" required-txt="Select your role"
                        placeholder="Select a Role" readonly />
                </div>
                <p class="warning"></p>
                <ul class="opt-list"  id="hire-project-role">
                    <li data-value="1">Role Name 1</li>
                    <li data-value="Role Value 2">Role Name 2</li>
                    <li data-value="Role Value 3">Role Name 3</li>
                    <li data-value="Role Value 4">Role Name 4</li>
                    <li data-value="Role Value 5">Role Name 5</li>
                </ul>
            </div>

            <div class="form-wrap">
                <h5 class="sub-heading">Request Media</h5>
                <div class="chx-wrap">
                    <div class="holder">
                        <input type="checkbox" name="hire-take1-tape" id="chx-take1-tape" />
                        <label for="chx-take1-tape"><img src="<?php echo e(asset('assets/img/video/take1-tape.svg')); ?>"
                                alt="Take1 Tape" />Take1 Tape</label>
                    </div>
                    <p class="warning"></p>
                </div>
                <div class="chx-wrap">
                    <div class="holder">
                        <input type="checkbox" name="hire-self-tape" id="chx-self-tape" />
                        <label for="chx-self-tape"><img src="<?php echo e(asset('assets/img/video/self-tape.svg')); ?>"
                                alt="Self Tape" />Self Tape</label>
                    </div>
                    <p class="warning"></p>
                </div>
                <div class="chx-wrap">
                    <div class="holder">
                        <input type="checkbox" name="hire-self-audition" id="chx-self-audition" />
                        <label for="chx-self-audition"><img src="<?php echo e(asset('assets/img/video/self-audition.svg')); ?>"
                                alt="Self Audition" />Self Audition</label>
                    </div>
                    <p class="warning"></p>
                </div>
            </div>

            <div class="input-wrap redo-input">
                <label>Instruction for Talent *</label>
                <div class="holder">
                    <input name="hire-instruction" type="text" class="input js-required" autocomplete="off"
                        required-txt="Enter your Instruction" placeholder="More Description" />
                </div>
                <p class="warning"></p>
            </div>

            <div class="file-wrap single-file redo-input">
                <label>Role Sides</label>
                <div class="holder">
                    <input type="file" name="hire-file" accept="image/*,application/pdf" />
                    <p class="input">Please Select a File to Upload</p>
                    <a href="#" role="button" class="btn-upload"><b>upload</b></a>
                </div>
                <div class="s-note">JPG, PNG or PDF file type are recommended. Maximum file size is 10 MB.</div>
                <p class="warning"></p>
            </div>

            <div class="input-wrap redo-input input-date">
                <label>Deadline for Talent Submissions *</label>
                <div class="holder">
                    <input name="hire-deadline" type="text" class="input js-required js-date" autocomplete="off"
                        required-txt="Enter your Deadline" date-txt="Enter a valid date" placeholder="dd/mm/yyyy"
                        maxlength="10" />
                </div>
                <p class="warning"></p>
            </div>
            <div class="btn-wrap">
                <a href="#" class="btn-close btn-txt">Cancel</a>
                <a href="#" role="button" class="btn-gold-arrow btn-submit js-reset">Send Request</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_detail_new.blade.php ENDPATH**/ ?>