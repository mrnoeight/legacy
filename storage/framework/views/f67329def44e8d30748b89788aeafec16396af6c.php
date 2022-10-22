

<?php $__env->startSection('title', 'Role Submission'); ?>

<?php $__env->startSection('hidden_page', 'Role Submission'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-redo-role-submit">
    <input type="hidden" id="page-id" value="page-redo-role-submit" />
    <section class="details-banner wrap-1200">
        <header class="top-ctr">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('casting_board')); ?>">Casting Board</a></li>
                <li><a href="<?php echo e(route('role_detail', ['id'=>$role->id, 'slug'=>$role->slug])); ?>">Role Details</a></li>
                <li><a href="#">Role Submission</a></li>
            </ul>
        </header>

        <div class="intro-wrap no-img">
            <div class="intro-content">
                <h3 class="heading">Customize Submission</h3>
                <p class="gold-hl">Upgrade to a&nbsp;<a href="#">Premium Membership</a>&nbsp;in order to submit to this
                    role and unlock unlimited submissions!</p>
                <span class="s-note">Changes made here will only apply to this submission. Your profile will not be
                    affected.</span>
            </div>
        </div>
    </section>

    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap redo-wrap">
                <h5 class="heading"><?php echo e($role->name); ?></h5>
                <ul class="info">
                    <li><strong class="yellow">recommend</strong></li>
                    <li><?php echo e($role->role_type); ?></li>
                    <li><?php echo e($role->age_range); ?></li>
                    <li><?php echo e($role->gender); ?></li>
                </ul>
                <time class="time" datetime="<?php echo e($role->created_at); ?>"><span class="mb-480-hide">Submissions Due&nbsp;</span> <?php echo e(tk1FormatDate($role->post->expired_date)); ?> | Work <?php echo e(tk1FormatDate($role->start_casting_date)); ?> | Posted
                    <?php echo e(tk1FormatDate($role->created_at)); ?></time>
                <p class="txt"><?php echo e($role->summary); ?></p>
                <h6 class="sub-heading">Request Media</h6>
                <ul class="gray-hl">
                    <li>
                        <figure>
                            <img src="<?php echo e(asset('assets/img/video/take1-tape.svg')); ?>" alt="Take1 Tape" />
                            <figcaption>Take1 Tape</figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="<?php echo e(asset('assets/img/video/self-tape.svg')); ?>" alt="Self Tape" />
                            <figcaption>Self Tape</figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="<?php echo e(asset('assets/img/video/self-audition.svg')); ?>" alt="Self Audition" />
                            <figcaption>Self Audition</figcaption>
                        </figure>
                    </li>
                </ul>
            </div>

            <form id="form-role-submit" data-url="<?php echo e(route('apply_role', ['id'=>$role->id])); ?>">
                <input type="hidden" name="role_id" value="<?php echo e($role->id); ?>" />   
                <div class="content-wrap redo-wrap">
                    <h5 class="heading">1. Confirm Your Location</h5>
                    <h6 class="sub-heading">Primary Working Location</h6>
                    <div class="input-wrap input-sel">
                        <div class="holder">
                            <input type="hidden" name="submit-location" />
                            <input name="submit-location" id="submit-location" type="text" class="input js-required"
                                autocomplete="off" required-txt="Select your location" readonly />
                            <label class="txt-label" for="submit-location">Select Your Location</label>
                        </div>
                        <p class="warning"></p>
                        <ul class="opt-list">
                            
                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li data-value="<?php echo e($city->name); ?> -- <?php echo e($city->id); ?>"><?php echo e($city->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="content-wrap redo-wrap review-media">
                    <h5 class="heading">2. Review Your Media</h5>
                    <span class="s-note">This media will be attached to the submission.</span>
                    <div class="chx-wrap">
                        <div class="holder">
                            <input type="checkbox" id="submit-img-all" class="chx-all" />
                            <label for="submit-img-all"><strong>Photo</strong></label>
                        </div>
                        <p class="warning"></p>
                    </div>
                    <div class="chx-wrap chx-media js-required js-min js-max" data-min="2" data-max="5"
                        required-txt="Please submit your image" min-txt="Need at least 2 images"
                        max-txt="Maximum 5 images allowed">
                        <div class="flex-wrap">
                            <ul class="holder">
                                <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="item">
                                    <input type="checkbox" name="submit-img[<?php echo e($k); ?>]" id="submit-img-<?php echo e($k); ?>" value="<?php echo e($k); ?>" />
                                    <label for="submit-img-<?php echo e($k); ?>"><img src="<?php echo e($v); ?>"
                                            alt="Img Alt" /></label>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <a href="#" class="add-link" title="add more image"><img src="<?php echo e(asset('assets/img/form/more-img.svg')); ?>"
                                    alt="add more image" /></a>
                        </div>
                        <p class="warning"></p>
                    </div>

                    <div class="chx-wrap">
                        <div class="holder">
                            <input type="checkbox" id="submit-vid-all" class="chx-all" />
                            <label for="submit-vid-all"><strong>Video</strong></label>
                        </div>
                        <p class="warning"></p>
                    </div>
                    <div class="chx-wrap chx-media js-required" required-txt="Please submit your video">
                        <div class="flex-wrap">
                            <ul class="holder">
                                <li class="item">
                                    <input type="checkbox" name="submit-vid[0]" id="submit-vid-0" value="Vid ID" />
                                    <label for="submit-vid-0"><img src="<?php echo e(asset('assets/img/our-talent/submit-vid-1.png')); ?>"
                                            alt="Vid Alt" /></label>
                                </li>
                                <li class="item">
                                    <input type="checkbox" name="submit-vid[1]" id="submit-vid-1" value="Vid ID" />
                                    <label for="submit-vid-1"><img src="<?php echo e(asset('assets/img/our-talent/submit-vid-2.png')); ?>"
                                            alt="Vid Alt" /></label>
                                </li>
                                <li class="item">
                                    <input type="checkbox" name="submit-vid[2]" id="submit-vid-2" value="Vid ID" />
                                    <label for="submit-vid-2"><img src="<?php echo e(asset('assets/img/our-talent/submit-vid-3.png')); ?>"
                                            alt="Vid Alt" /></label>
                                </li>
                            </ul>
                            <a href="#" class="add-link" title="add more video"><img src="<?php echo e(asset('assets/img/form/more-vid.svg')); ?>"
                                    alt="add more video" /></a>
                        </div>
                        <p class="warning"></p>
                    </div>
                </div>

                <div class="content-wrap redo-wrap">
                    <h5 class="heading">3. Add a Submission note</h5>
                    <h6 class="sub-heading">Submission Note Instructions:</h6>
                    <p class="txt">This is an ongoing casting call - you are welcome to submit at any point. If
                        submitting a piece that correlates with a specific holiday, submit at least three weeks in
                        advance of that holiday.</p>
                    <h6 class="sub-heading">Your Introduction</h6>
                    <div class="input-wrap">
                        <div class="holder">
                            <div class="input"><textarea name="submit-note"
                                    autocomplete="off"></textarea>
                            </div>
                        </div>
                        <p class="warning"></p>
                    </div>
                </div>
                <div class="btn-wrap">
                    <a href="<?php echo e(route('role_detail', ['id'=>$role->id, 'slug'=>$role->slug])); ?>" class="btn-txt">Cancel</a>
                    <a href="#" role="button" class="btn-gold-arrow btn-submit js-reset">Submit To Role</a>
                </div>
                <p class="warning-server"></p>
            </form>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/role_submit.blade.php ENDPATH**/ ?>