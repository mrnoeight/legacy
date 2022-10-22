

<?php $__env->startSection('title', 'Talent Profile'); ?>

<?php $__env->startSection('hidden_page', 'Talent Profile'); ?>

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
                    <li><a href="#" class="active">Profile</a></li>
                    <li><a href="<?php echo e(route('talent_account')); ?>">Account Info</a></li>
                    <li><a href="<?php echo e(route('talent_password')); ?>">Password</a></li>
                    <li><a href="<?php echo e(route('talent_membership')); ?>">Membership Plan</a></li>
                </ul>
            </div>

            <section class="details-banner theme-white">
                <div class="intro-wrap">
                    <img class="intro-img" src="<?php echo e($talent->cover_url); ?>" alt="<?php echo e($talent->stage_name); ?>" />    
                    <div class="intro-content">
                        <h4 class="heading"><?php echo e($talent->stage_name); ?></h4>
                        <div class="bar-ctr type-2">
                            <h5 class="link"><a href="<?php echo e(route('talent_detail', ['id' => $talent->id])); ?>" target="_blank"><?php echo e(route('talent_detail', ['id' => $talent->id])); ?></a></h5>
                            <nav class="share">
                                <h5>Share:</h5>
                                <ul>
                                    <li><a href="#">
                                            <img class="icon" src="<?php echo e(asset('assets/img/social/facebook.svg')); ?>" alt="facebook">
                                            <h6 class="hidden">Facebook</h6>
                                        </a></li>
                                    <li><a href="#">
                                            <img class="icon" src="<?php echo e(asset('assets/img/social/twitter.svg')); ?>" alt="twitter">
                                            <h6 class="hidden">Twitter</h6>
                                        </a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="info col-2">
                            <h5 class="full-w"><b>Location:&nbsp;</b><i><?php echo e($talent->address); ?></i></h5>
                            <h5><b>Phone:&nbsp;</b><i><?php echo e($talent->country_code); ?> <?php echo e($talent->phone_number); ?> </i></h5>
                            <h5><b>E-mail:&nbsp;</b><i><?php echo e($talent->email); ?> </i></h5>
                            <h5><b>Gender:&nbsp;</b><i><?php echo e($talent->gender); ?></i></h5>
                            <h5><b>Age Range:&nbsp;</b><i><?php echo e($talent->age_from); ?> - <?php echo e($talent->age_to); ?></i></h5>
                            <h5><b>Height:</b>&nbsp;<i><?php echo e($talent->height); ?>cm</i></h5>
                            <h5><b>Weight:</b>&nbsp;<i><?php echo e($talent->weight); ?>kg</i></h5>
                            <h5 class="full-w flex-icon"><b>CV:</b>&nbsp;<a target="_blank" href="<?php echo e($talent->CV_url); ?>"><img alt="pdf"
                                src="<?php echo e(asset('assets/img/bg/pdf.svg')); ?>" /><?php echo e($talent->stage_name); ?> CV </a></h5>
                        </div>
                        <p class="desc"><?php echo e($talent->description); ?></p>
                        <ul class="img-list">
                            <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><img src="<?php echo e($v); ?>" alt="<?php echo e($talent->name); ?>" /></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="btn-wrap">
                            <a href="<?php echo e(route('talent_profile_edit')); ?>" role="button" class="btn-gold-arrow cta">Edit
                                Your Profile</a>
                        </div>
                    </div>
                </div>
            </section>

            <div class="content-wrap">
                <header>
                    <h4 class="main-heading">Profile Strength: Intermediate</h4>
                </header>
                <div class="pro-meter">
                    <div class="bar">
                        <i style="width: 75%;">
                            <span class="hover-tbl">
                                <img src="<?php echo e(asset('assets/img/bg/golden-cup.svg')); ?>" alt="Intermediate">
                                <b>Intermediate</b>
                                <span>Members with intermediate profiles see more relevant job recommendations and
                                    refined connection suggestions</span>
                            </span>
                        </i>
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
                </div>
                <ul class="pro-suggest">
                    <li>
                        <div class="flex-icon">
                            <img src="<?php echo e(asset('assets/img/bg/location.svg')); ?>" alt="location">
                            <p>
                                <b>Where are you currently located?</b>
                                <i>Members with an up-to-date location are up to 23x more likely to be found</i>
                            </p>
                        </div>
                        <a href="<?php echo e(route('talent_profile_edit')); ?>" role="button">ADD LOCATION</a>
                    </li>
                </ul>
            </div>

            <div class="content-wrap">
                <header>
                    <h4 class="main-heading">Photo</h4>
                    <a href="<?php echo e(route('talent_profile_edit')); ?>" role="button"
                        class="pencil-link"><span>Edit</span></a>
                </header>
                <ul class="x-scroll">
                    <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><img src="<?php echo e($v); ?>" alt="<?php echo e($talent->name); ?>" /></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div class="content-wrap">
                <header>
                    <h4 class="main-heading">Video</h4>
                    <a href="<?php echo e(route('talent_profile_edit')); ?>" role="button"
                        class="pencil-link"><span>Edit</span></a>
                </header>
                <ul class="x-scroll">
                    <li class="vid-wrap">
                        <img class="place-holder" src="<?php echo e(asset('assets/img/video/place-holder.png')); ?>" alt="place holder" />
                        <iframe src="https://www.youtube.com/embed/6ege2DNZla4" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </li>
                    <li class="vid-wrap">
                        <img class="place-holder" src="<?php echo e(asset('assets/img/video/place-holder.png')); ?>" alt="place holder" />
                        <iframe src="https://www.youtube.com/embed/6ege2DNZla4" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </li>
                    <li class="vid-wrap">
                        <img class="place-holder" src="<?php echo e(asset('assets/img/video/place-holder.png')); ?>" alt="place holder" />
                        <iframe src="https://www.youtube.com/embed/6ege2DNZla4" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </li>
                    <li class="vid-wrap">
                        <img class="place-holder" src="<?php echo e(asset('assets/img/video/place-holder.png')); ?>" alt="place holder" />
                        <iframe src="https://www.youtube.com/embed/6ege2DNZla4" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </li>
                    <li class="vid-wrap">
                        <img class="place-holder" src="<?php echo e(asset('assets/img/video/place-holder.png')); ?>" alt="place holder" />
                        <iframe src="https://www.youtube.com/embed/6ege2DNZla4" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </li>
                    <li class="vid-wrap">
                        <img class="place-holder" src="<?php echo e(asset('assets/img/video/place-holder.png')); ?>" alt="place holder" />
                        <iframe src="https://www.youtube.com/embed/6ege2DNZla4" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </li>
                </ul>
            </div>

            <ul class="break-list content-wrap">
                <lh class="header">
                    <h3 class="main-heading">Movie Preferences</h3>
                    <a href="#" class="sub-link" role="button">Add More</a>
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
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_profile.blade.php ENDPATH**/ ?>