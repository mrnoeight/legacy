

<?php $__env->startSection('title', 'Client Profile'); ?>

<?php $__env->startSection('hidden_page', 'Client Profile'); ?>

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
                    <li><a href="#" class="active">Profile</a></li>
                    <li><a href="<?php echo e(route('client_account_info')); ?>">Account Info</a></li>
                    <li><a href="<?php echo e(route('client_password')); ?>">Password</a></li>
                    <li><a href="<?php echo e(route('client_membership')); ?>">Membership Plan</a></li>
                </ul>
            </div>

            <div class="content-wrap redo-wrap">
                <header>
                    <h5 class="heading">General Information</h5>
                    <a href="<?php echo e(route('client_profile_edit')); ?>" role="button"
                        class="pencil-link"><span>Edit</span></a>
                </header>
                <figure class="img-info">
                    <div class="img-wrap"><img src="<?php echo e($client->company->thumb_url); ?>" alt="<?php echo e($client->company->name); ?>" /></div>
                    <figcaption class="dgrid col-2">
                        <div class="full-w">
                            <h6 class="sub-heading">Company Name</h6>
                            <p><?php echo e($client->company->name); ?></p>
                        </div>
                        <div>
                            <h6 class="sub-heading">Email</h6>
                            <p><?php echo e($client->company->company_email); ?></p>
                        </div>
                        <div>
                            <h6 class="sub-heading">Phone</h6>
                            <p><?php echo e($client->company->tel); ?></p>
                        </div>
                        <div>
                            <h6 class="sub-heading">Website</h6>
                            <p><?php echo e($client->company->website); ?></p>
                        </div>
                        <div>
                            <h6 class="sub-heading">Facebook</h6>
                            <p><?php echo e($client->company->facebook); ?></p>
                        </div>
                        <div class="full-w">
                            <h6 class="sub-heading">Address</h6>
                            <p><?php echo e($client->company->address); ?></p>
                        </div>
                    </figcaption>
                </figure>
            </div>

            <div class="content-wrap redo-wrap">
                <header>
                    <h5 class="heading">Introduction</h5>
                    <a href="<?php echo e(route('client_profile_edit')); ?>" role="button"
                        class="pencil-link"><span>Edit</span></a>
                </header>
                <p class="txt"><?php echo e($client->company->todo); ?></p>
            </div>

            <div class="content-wrap redo-wrap">
                <header>
                    <h5 class="heading">Casting Contact</h5>
                    <a href="<?php echo e(route('client_profile_edit')); ?>" role="button"
                        class="pencil-link"><span>Edit</span></a>
                </header>
                <div class="dgrid col-2">
                    <div>
                        <h6 class="sub-heading">Director’s Name</h6>
                        <p><?php echo e($client->company->director_name); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Producer’s Name</h6>
                        <p><?php echo e($client->company->producer_name); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Contact Person</h6>
                        <p><?php echo e($client->company->cast_name); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Phone</h6>
                        <p><?php echo e($client->company->cast_phone); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Email</h6>
                        <p><?php echo e($client->company->cast_email); ?></p>
                    </div>
                </div>
            </div>

            <ul class="break-list content-wrap">
                <lh class="header">
                    <h3 class="main-heading">Movie Preferences</h3>
                    <a href="<?php echo e(route('client_profile_edit')); ?>" class="sub-link" role="button">Add More</a>
                </lh>
                <li class="exp">
                    <figure class="movie">
                        <img src="<?php echo e(asset('assets/img/news/project-poster.jpg')); ?>" alt="Sister Sister (2019)" />
                        <figcaption>
                            <h4 class="heading">
                                <span>Walker (TV Series) 2021</span>
                                <a href="#" class="pencil-link btn-edit-exp" data-url="json/get-exp.json"
                                    role="button"><span>Edit</span></a>
                            </h4>
                            <p><b>C18 | 104 min | Drama, Thriller</b></p>
                            <p>A late night radio talk show host offers a room to a runaway teen at her opulent home,
                                what she doesn't bargain for is the eighteen year old has ulterior motives which forces
                                Kim to face her darkest secrets.</p>
                            <p><strong>Director:</strong> Kathy
                                Uyen&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<strong>Stars:</strong> Thanh Hang, Chi Pu,
                                Lanh Thanh</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="exp">
                    <figure class="movie">
                        <img src="<?php echo e(asset('assets/img/news/project-poster-2.jpg')); ?>" alt="The Housemaid (2016)" />
                        <figcaption>
                            <h4 class="heading">
                                <span>The Housemaid (2016)</span>
                                <a href="#" class="pencil-link btn-edit-exp" data-url="json/get-exp.json"
                                    role="button"><span>Edit</span></a>
                            </h4>
                            <p><b>C18 | 104 min | Drama, Thriller</b></p>
                            <p>A late night radio talk show host offers a room to a runaway teen at her opulent home,
                                what she doesn't bargain for is the eighteen year old has ulterior motives which forces
                                Kim to face her darkest secrets.</p>
                            <p><strong>Director:</strong> Derek
                                Nguyenn&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<strong>Stars:</strong> Thanh Hang, Chi Pu,
                                Lanh Thanh</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="exp">
                    <figure class="movie">
                        <img src="<?php echo e(asset('assets/img/news/project-2.png')); ?>" alt="The Sunflower (2021)" />
                        <figcaption>
                            <h4 class="heading">
                                <span>The Sunflower (2021)</span>
                                <a href="#" class="pencil-link btn-edit-exp" data-url="json/get-exp.json"
                                    role="button"><span>Edit</span></a>
                            </h4>
                            <p><b>C18 | 104 min | Romance, Comedy</b></p>
                            <p>A late night radio talk show host offers a room to a runaway teen at her opulent home,
                                what she doesn't bargain for is the eighteen year old has ulterior motives which forces
                                Kim to face her darkest secrets.</p>
                            <p><strong>Director:</strong> Derek
                                Nguyenn&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<strong>Stars:</strong> Thanh Hang, Chi Pu,
                                Lanh Thanh</p>
                        </figcaption>
                    </figure>
                </li>
            </ul>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_profile_new.blade.php ENDPATH**/ ?>