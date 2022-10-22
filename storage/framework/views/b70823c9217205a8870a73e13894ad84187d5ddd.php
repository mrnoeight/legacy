

<?php $__env->startSection('title', 'Client Account'); ?>

<?php $__env->startSection('hidden_page', 'Client Account'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-p2-client-dashboard">
    <input type="hidden" id="page-id" value="page-p2-client-dashboard" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <!-- <div class="content-wrap type-2">
                <header>
                    <h4 class="main-heading type-3">Manage Project</h4>
                </header>

                <figure class="no-item type-2">
                    <img src="<?php echo e(asset('assets/img/bg/role-empty.svg')); ?>" alt="role empty">
                    <figcaption>
                        <b>Your project is emty. Add project to see details!</b>
                        <a href="<?php echo e(route('client_new_project')); ?>" class="btn-border-gold type-3 cta" role="button">add new project<i
                                class="icon-plus"></i></a>
                    </figcaption>
                </figure>
            </div> -->

            <div class="content-wrap type-2">
                <header>
                    <h4 class="main-heading type-3">Manage Project</h4>
                    <a href="<?php echo e(route('client_casting_board')); ?>" class="sub-link">View All</a>
                </header>

                <ul class="project-list type-2">
                <?php $__currentLoopData = $client->company->post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $post->loadCount('prole');
                            $post->loadCount('submissions');
                        ?>
                    <li>
                        <div class="project-header">
                        <figure>
                            <div class="img-wrap"><img src="<?php echo e($post->thumb_url); ?>" alt="<?php echo e($post->name); ?>"/></div>
                            <figcaption class="project-name">
                            <b class="title" title="Sweet Home Movie"><a href="<?php echo e(route('client_project_detail', ['id' => $post->id])); ?>"><?php echo e($post->name); ?></a></b>
                            <a class="sublink" href="<?php echo e(route('client_project_detail', ['id' => $post->id])); ?>"><?php echo e($post->type); ?></a>
                            <span>|</span>
                            <a class="sublink" href="<?php echo e(route('client_project_detail', ['id' => $post->id])); ?>"><?php echo e($post->genre); ?></a>
                            </figcaption>
                        </figure>
                        <ul class="info">
                            <li><b><?php echo e(tk1FormatDate($post->start_casting_date)); ?></b><i>in <?php echo e(tk1BetweenDates($post->start_casting_date, $post->end_casting_date)); ?></i></li>
                            <li><b><?php echo e($post->producer); ?></b><i><?php echo e($post->director); ?></i></li>
                            <li><b><?php echo e($post->prole_count); ?></b><i>Roles</i></li>
                            <li><b><?php echo e($post->submissions_count); ?></b><i>Submitted</i></li>
                        </ul>
                        <div class="btn-wrap">
                            <strong class="status <?php echo e(tk1StatusPostColor($post->status)); ?>"><?php echo e($post->status); ?></strong>
                            <button class="btn-more"><i></i></button>
                            <ul class="row-ctr">
                            <li><a href="#" role="button" class="btn-pending"><b>Pending Project</b></a></li>
                            <li><a href="#" role="button" class="flex-center btn-archive"><b>Archive Project</b></a></li>
                            <li><a href="#" role="button" class="flex-center btn-delete"><b>Delete Project</b></a></li>
                            </ul>
                        </div>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            

            <div class="content-wrap type-2">
                <header>
                    <h4 class="main-heading type-3">Recommended talent</h4>
                    <a href="#" class="sub-link">View All</a>
                </header>

                <div class="casting-board pd-ctr pb-0 pt-0 dir-col">
                    <ul class="list-post col-6">
                        <li class="item casting-card type-4">
                            <a href="10-talent-details.html" class="img-wrap"><img class="main-img"
                                    src="<?php echo e(asset('assets/img/our-talent/recommended-1.png')); ?>" alt="Afamefuna"></a>
                            <div class="content">
                                <h5 class="heading">Afamefuna</h5>
                                <p class="info">
                                    <span>Age:&nbsp;20-40</span>
                                    <span>Actress | Model | MC</span>
                                </p>
                                <a role="button" class="btn-border-gold type-2 cta" href="#">view profile</a>
                            </div>
                        </li>
                        <li class="item casting-card type-4">
                            <a href="10-talent-details.html" class="img-wrap"><img class="main-img"
                                    src="<?php echo e(asset('assets/img/our-talent/recommended-2.png')); ?>" alt="Cecilia"></a>
                            <div class="content">
                                <h5 class="heading">Cecilia</h5>
                                <p class="info">
                                    <span>Age:&nbsp;20-40</span>
                                    <span>Actress | Model | MC</span>
                                </p>
                                <a role="button" class="btn-border-gold type-2 cta" href="#">view profile</a>
                            </div>
                        </li>
                        <li class="item casting-card type-4">
                            <a href="10-talent-details.html" class="img-wrap"><img class="main-img"
                                    src="<?php echo e(asset('assets/img/our-talent/recommended-3.png')); ?>" alt="Farrokh"></a>
                            <div class="content">
                                <h5 class="heading">Farrokh</h5>
                                <p class="info">
                                    <span>Age:&nbsp;20-40</span>
                                    <span>Actress | Model | MC</span>
                                </p>
                                <a role="button" class="btn-border-gold type-2 cta" href="#">view profile</a>
                            </div>
                        </li>
                        <li class="item casting-card type-4">
                            <a href="10-talent-details.html" class="img-wrap"><img class="main-img"
                                    src="<?php echo e(asset('assets/img/our-talent/recommended-4.png')); ?>" alt="Afamefuna"></a>
                            <div class="content">
                                <h5 class="heading">Harrison</h5>
                                <p class="info">
                                    <span>Age:&nbsp;20-40</span>
                                    <span>Actress | Model | MC</span>
                                </p>
                                <a role="button" class="btn-border-gold type-2 cta" href="#">view profile</a>
                            </div>
                        </li>
                        <li class="item casting-card type-4">
                            <a href="10-talent-details.html" class="img-wrap"><img class="main-img"
                                    src="<?php echo e(asset('assets/img/our-talent/recommended-5.png')); ?>" alt="Afamefuna"></a>
                            <div class="content">
                                <h5 class="heading">Alexandre</h5>
                                <p class="info">
                                    <span>Age:&nbsp;20-40</span>
                                    <span>Actress | Model | MC</span>
                                </p>
                                <a role="button" class="btn-border-gold type-2 cta" href="#">view profile</a>
                            </div>
                        </li>
                        <li class="item casting-card type-4">
                            <a href="10-talent-details.html" class="img-wrap"><img class="main-img"
                                    src="<?php echo e(asset('assets/img/our-talent/recommended-6.png')); ?>" alt="Yvonne"></a>
                            <div class="content">
                                <h5 class="heading">Yvonne</h5>
                                <p class="info">
                                    <span>Age:&nbsp;20-40</span>
                                    <span>Actress | Model | MC</span>
                                </p>
                                <a role="button" class="btn-border-gold type-2 cta" href="#">view profile</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="content-wrap type-2">
                <header>
                    <h4 class="main-heading type-3">Talents Services</h4>
                    <a href="#" class="sub-link">View All</a>
                </header>

                <div class="casting-board pd-ctr pb-0 pt-0 dir-col">
                    <ul class="list-post col-3">
                        <li class="item casting-card type-5">
                            <a href="#" class="img-wrap"><img class="main-img" src="<?php echo e(asset('assets/img/talent-services/service-1.png')); ?>"
                                    alt="Casting Services"></a>
                            <div class="content">
                                <h6 class="sub-heading">Casting Services</h6>
                                <h5 class="heading">Casting Session</h5>
                                <a role="button" class="btn-gold-arrow cta" href="#">book now</a>
                            </div>
                        </li>
                        <li class="item casting-card type-5">
                            <a href="#" class="img-wrap"><img class="main-img" src="<?php echo e(asset('assets/img/talent-services/service-2.png')); ?>"
                                    alt="Studdio Service"></a>
                            <div class="content">
                                <h6 class="sub-heading">Studdio Service</h6>
                                <h5 class="heading">Video Reel</h5>
                                <a role="button" class="btn-gold-arrow cta" href="#">book now</a>
                            </div>
                        </li>
                        <li class="item casting-card type-5">
                            <a href="#" class="img-wrap"><img class="main-img" src="<?php echo e(asset('assets/img/talent-services/service-3.png')); ?>"
                                    alt="Photography Service"></a>
                            <div class="content">
                                <h6 class="sub-heading">Photography Service</h6>
                                <h5 class="heading">Headshot</h5>
                                <a role="button" class="btn-gold-arrow cta" href="#">book now</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </article>


</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_dashboard.blade.php ENDPATH**/ ?>