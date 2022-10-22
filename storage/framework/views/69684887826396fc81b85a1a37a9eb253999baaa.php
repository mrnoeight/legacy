

<?php $__env->startSection('title', 'Talent Casting Board'); ?>

<?php $__env->startSection('hidden_page', 'Talent Casting Board'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-p2-talent-billboard">
    <input type="hidden" id="page-id" value="page-p2-talent-billboard" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap type-2 casting-board">
                <header>
                    <h4 class="main-heading type-3">Casting Billboard</h4>
                    <a href="<?php echo e(route('talent_casting_board_all')); ?>" class="sub-link txt-upcase">View All</a>
                </header>
                <ul class="list-post col-2">
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="item casting-card type-3">
                        <div class="content">
                            <b class="tag <?php echo e(tk1DisplayTags($role->post->types)); ?>"><?php echo e(tk1DisplayTypes($role->post->types)); ?></b>
                            <h5><a href="<?php echo e(route('talent_role_detail', ['id'=>$role->id])); ?>" class="heading"><?php echo e($role->name); ?></a></h5>
                            <h6><a href="<?php echo e(route('talent_project', ['id'=>$role->post_id])); ?>" class="gold-txt"><?php echo e($role->post->name); ?></a></h6>
                            <p class="info">
                                <span><b class="city">Type:</b>&nbsp;<?php echo e($role->role_type); ?></span>
                                <span><b class="age">Age:</b>&nbsp;<?php echo e($role->age_range); ?></span>
                                <span><b class="gender">Gender:</b>&nbsp;<?php echo e($role->gender); ?></span>
                            </p>
                            <p class="desc"><?php echo e(Str::words($role->description, 20, '...')); ?></p>
                            <footer>
                                <time datetime="<?php echo e($role->post->expired_date); ?>"><span class="mb-480-hide">Submissions Due&nbsp;</span> <?php echo e(tk1FormatDate($role->post->expired_date)); ?></time>
                                <span><?php echo e($role->post->city_name); ?></span>
                            </footer>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div class="content-wrap type-2">
                <header>
                    <h4 class="main-heading type-3">Talents Services</h4>
                    <a href="#" class="sub-link txt-upcase">View All</a>
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
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_casting_board.blade.php ENDPATH**/ ?>