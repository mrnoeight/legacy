

<?php $__env->startSection('title', 'Requested Roles'); ?>

<?php $__env->startSection('hidden_page', 'Requested Roles'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-p2-client-role-details">
    <input type="hidden" id="page-id" value="page-p2-client-role-details" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap redo-wrap type-2 p2-header-wrap">
                <header>
                    <ul class="breadcrumb full-w">
                        <li><a href="<?php echo e(route('client_casting_board')); ?>">Manage Project</a></li>
                        <li><a href="<?php echo e(route('client_project_detail', ['id'=>$role->post->id])); ?>">Project Details</a></li>
                        <li><a href="<?php echo e(route('client_manage_role', ['id'=>$role->post->id])); ?>">Manage Roles</a></li>
                    </ul>
                    <h4 class="main-heading type-4"><?php echo e($role->name); ?></h4>
                </header>
                <ul class="info">
                    <li><strong class="blue">in process</strong></li>
                    <li><?php echo e($role->role_type); ?></li>
                    <li><?php echo e($role->age_range); ?></li>
                    <li><?php echo e($role->gender); ?></li>
                </ul>
                <time class="time" datetime="<?php echo e(tk1FormatDate2($role->expired_date)); ?>"><span class="mb-480-hide">Submissions Due&nbsp;</span> <?php echo e(tk1FormatDate($role->expired_date)); ?> | Posted
                <?php echo e(tk1FormatDate($role->created_at)); ?></time>
                <div class="btn-flex-wrap">
                    <a href="#" class="btn-border-gold cta" role="button"><i class="icon-plus"></i>add talent</a>
                    <a href="#" class="btn-gold-arrow cta" role="button">Publish</a>
                </div>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                    <li><a href="<?php echo e(route('client_role_detail', ['id'=>$role->id])); ?>">Role details</a></li>
                    <li><a href="<?php echo e(route('client_submitted_role', ['id'=>$role->id])); ?>">Submited <span class="hl">(<?php echo e($role->submission->count()); ?>)</span></a></li>
                    <li><a href="<?php echo e(route('client_requested_role', ['id'=>$role->id])); ?>">Requested <span class="hl">(<?php echo e($role->requested_roles->count()); ?>)</span></a>
                    </li>
                    <li><a href="#" class="active">Selected <span class="hl">(<?php echo e($role->selected_roles->count()); ?>)</span></a></li>
                </ul>
            </div>


            <div class="p2-form-wrap full-w">
                <form class="form-search" id="form-search">
                    <div class="input-wrap input-p2">
                        <div class="holder">
                            <input name="search" id="search" type="text" class="input" autocomplete="off" />
                            <label class="txt-label" for="search">search for talent</label>
                        </div>
                        <p class="warning"></p>
                    </div>
                </form>

                <form class="form-filter" id="form-filter">
                    <strong style="display:none">Filter:</strong>
                    <strong>Sort By</strong>
                    <div class="input-wrap input-sel input-p2">
                        <div class="holder">
                            <input type="hidden" name="sort-response" />
                            <input id="sort-response" type="text" class="input" autocomplete="off" readonly />
                            <label class="txt-label" for="sort-response">Response</label>
                        </div>
                        <p class="warning"></p>
                        <ul class="opt-list">
                            <li data-value="Option 1">Option 1</li>
                            <li data-value="Option 2">Option 2</li>
                        </ul>
                    </div>
                    <div class="input-wrap input-sel input-p2">
                        <div class="holder">
                            <input type="hidden" name="sort-age" />
                            <input id="sort-age" type="text" class="input" autocomplete="off" readonly />
                            <label class="txt-label" for="sort-age">Age</label>
                        </div>
                        <p class="warning"></p>
                        <ul class="opt-list">
                            <li data-value="Newest">Newest</li>
                            <li data-value="Oldest">Oldest</li>
                        </ul>
                    </div>
                    <button class="btn-icon" type="submit"></button>
                </form>
            </div>

            <div id="project-list" class="full-w">
                <ul class="project-list type-2 page-rq">
                    <lh>
                        <div class="project-header type-2">
                            <figure>
                                <div class="chx-wrap">
                                    <div class="holder"><input type="checkbox" class="chx-all" name="row" /></div>
                                </div>
                                <figcaption class="project-name"><b>TALENT</b></figcaption>
                            </figure>
                            <ul class="info">
                                <li>INTERESTED</li>
                                <li>ROUNDS</li>
                                <li>TAKE1 TAPE</li>
                                <li>SELF TAPE</li>
                                <li>AUDITION</li>
                            </ul>
                            <div class="btn-wrap"></div>
                        </div>
                    </lh>
                    <?php $__currentLoopData = $role->selected_roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <div class="project-header">
                            <figure class="flex-center">
                                <div class="chx-wrap">
                                    <div class="holder"><input type="checkbox" class="chx-row" name="row[0]" /></div>
                                </div>
                                <div class="img-wrap"><img src="<?php echo e($sub->registration->cover_url); ?>" alt="<?php echo e($sub->registration->name); ?>" />
                                </div>
                                <figcaption class="project-name">
                                    <b class="title" title="<?php echo e($sub->registration->name); ?>"><a href="<?php echo e(route('client_talent_detail', ['talent_id'=>$sub->id, 'role_id'=>$role->id])); ?>"><?php echo e($sub->registration->name); ?></a></b>
                                    <span><?php echo e($sub->registration->gender); ?> | Age: <?php echo e($sub->registration->age_from); ?> - <?php echo e($sub->registration->age_to); ?></span>
                                </figcaption>
                            </figure>
                            <ul class="info">
                                <li class="rating">
                                    <i class="active"></i>
                                    <i class="active"></i>
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                </li>
                                <li class="round">
                                    <i <?php echo e(tk1GetRound($sub->request_round, 1)); ?>>1</i>
                                    <i <?php echo e(tk1GetRound($sub->request_round, 2)); ?>>2</i>
                                    <i <?php echo e(tk1GetRound($sub->request_round, 3)); ?>>3</i>
                                </li>
                                <li class="tape">
                                    <img src="<?php echo e(asset('assets/img/video/take1-tape.svg')); ?>" alt="Take1 Tape" />
                                    <p>
                                        <strong class="status <?php echo e(tk1GetRoleStatusColor($sub->request_status_take1)); ?>"><?php echo e(tk1GetRoleStatus($sub->request_status_take1)); ?></strong>
                                        <time datetime=""><?php echo e(tk1FormatDate($sub->request_date_take1)); ?></time>
                                    </p>
                                </li>
                                <li class="tape">
                                    <img src="<?php echo e(asset('assets/img/video/self-tape-gray.svg')); ?>" alt="Self Tape" />
                                    <p>
                                        <strong class="status <?php echo e(tk1GetRoleStatusColor($sub->request_status_self)); ?>"><?php echo e(tk1GetRoleStatus($sub->request_status_self)); ?></strong>
                                        <time datetime=""><?php echo e(tk1FormatDate($sub->request_date_self)); ?></time>
                                    </p>
                                </li>
                                <li class="tape">
                                    <img src="<?php echo e(asset('assets/img/video/self-audition-gray.svg')); ?>" alt="Self Audition" />
                                    <p>
                                        <strong class="status <?php echo e(tk1GetRoleStatusColor($sub->request_status_audition)); ?>"><?php echo e(tk1GetRoleStatus($sub->request_status_audition)); ?></strong>
                                        <time datetime=""><?php echo e(tk1FormatDate($sub->request_date_audition)); ?></time>
                                    </p>
                                </li>
                            </ul>
                            <div class="btn-wrap">
                                <button class="btn-more"><i></i></button>
                                <ul class="row-ctr">
                                    <li><a href="#" role="button" class="btn-green type-2 cta">Choose Talent</a></li>
                                    <li><a href="#" role="button" class="btn-red type-2 cta">decline</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                <!-- <nav class="paging-project">
                    <a href="45-p2-client-role-details-requested.html" role="button" class="btn-prev"
                        title="Previous"><i></i></a>
                    <a href="45-p2-client-role-details-requested.html" role="button" class="number active"
                        title="page 1"><b>1</b></a>
                    <a href="45-p2-client-role-details-requested.html" role="button" class="number"
                        title="page 2"><b>2</b></a>
                    <a href="45-p2-client-role-details-requested.html" role="button" class="number"
                        title="page 3"><b>3</b></a>
                    <b>...</b>
                    <a href="45-p2-client-role-details-requested.html" role="button" class="number"
                        title="page 3"><b>7</b></a>
                    <a href="45-p2-client-role-details-requested.html" role="button" class="btn-next"
                        title="Next"><i></i></a>
                </nav> -->
            </div>



        </div>
    </article>
</main>
<!-- END MAIN PAGE -->

<?php echo $__env->make('web.partials.how_it_works', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="join-us-footer">
    <div class="wrap-1200">
        <div class="wrap">
            <h4 class="heading">Join Us</h4>
            <div class="content">
                <p>Create your account now and receive new job notifications immediately in real time!</p>
                <div class="btn-wrap">
                    <a href="<?php echo e(route('signup')); ?>" class="btn-gold-arrow cta" role="button">
                        <h5>Sign up as a talent</h5>
                    </a>
                    <span>Or</span>
                    <a href="<?php echo e(route('signup')); ?>" class="btn-black-arrow cta" role="button">
                        <h5>Sign up as client</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>

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


<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_selected_role.blade.php ENDPATH**/ ?>