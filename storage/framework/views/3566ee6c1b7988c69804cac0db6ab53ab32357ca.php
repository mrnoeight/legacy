<?php $__env->startSection('title', 'Talent Detail'); ?>

<?php $__env->startSection('hidden_page', 'Talent Detail'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-p2-client-talent-details">
    <input type="hidden" id="page-id" value="page-p2-client-talent-details" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">

            <div class="content-wrap type-2 redo-wrap p2-header-wrap">
                <header>
                    <ul class="breadcrumb full-w">
                        <li><a href="#">Talent Services</a></li>
                        <li><a href="46-p2-client-our-talents-recomended.html">Meet Our Talents</a></li>
                    </ul>
                    <div class="flex-center">
                        <h4 class="main-heading type-4">talent details</h4>
                    </div>
                </header>
            </div>

            <div class="flex-header-wrap">
                <div class="content-wrap redo-wrap">
                    <figure class="img-info">
                        <div class="img-wrap">
                            <img src="<?php echo e($talent->cover_url); ?>" alt="<?php echo e($talent->name); ?>" />
                            <!-- <a href="#" role="button" class="btn-star" title="bookmark this talent"></a> -->
                        </div>
                        <figcaption>
                            <h3><?php echo e($talent->name); ?></h3>
                            <a href="<?php echo e(route('talent_detail', ['id' => $talent->id])); ?>" class="gold-link"><i><?php echo e(route('talent_detail', ['id' => $talent->id])); ?></i></a>
                            <p><b>Gender:</b> <?php echo e($talent->gender); ?></p>
                            <p><b>Height:</b> <?php echo e($talent->height); ?> cm</p>
                            <p><b>Weight:</b> <?php echo e($talent->weight); ?> kg</p>
                            <p><b> Location:</b> <?php echo e($talent->hometown); ?></p>
                        </figcaption>
                    </figure>
                    <nav class="share abs-right">
                        <h5>Share</h5>
                        <ul>
                            <li><a href="#">
                                    <img class="icon" src="<?php echo e(asset('assets/img/social/facebook.svg')); ?>" alt="facebook" />
                                    <h6 class="hidden">Facebook</h6>
                                </a></li>
                            <li><a href="#">
                                    <img class="icon" src="<?php echo e(asset('assets/img/social/twitter.svg')); ?>" alt="twitter" />
                                    <h6 class="hidden">Twitter</h6>
                                </a></li>
                        </ul>
                    </nav>
                </div>

                <form class="row-ctr" data-url="json/submit-talent-action-pass.json">
                    <input type="hidden" name="talent-id" value="id-0">
                    <div class="chx-wrap">
                        <div class="holder">
                            <input type="checkbox" name="hire-take1-tape" id="chx-take1-tape">
                            <label for="chx-take1-tape"><img src="<?php echo e(asset('assets/img/video/take1-tape.svg')); ?>" alt="Take1 Tape">Take1
                                Tape</label>
                        </div>
                        <p class="warning"></p>
                    </div>
                    <div class="chx-wrap">
                        <div class="holder">
                            <input type="checkbox" name="hire-self-tape" id="chx-self-tape">
                            <label for="chx-self-tape"><img src="<?php echo e(asset('assets/img/video/self-tape.svg')); ?>" alt="Self Tape">Self
                                Tape</label>
                        </div>
                        <p class="warning"></p>
                    </div>
                    <div class="chx-wrap">
                        <div class="holder">
                            <input type="checkbox" name="hire-self-audition" id="chx-self-audition">
                            <label for="chx-self-audition"><img src="<?php echo e(asset('assets/img/video/self-audition.svg')); ?>"
                                    alt="Self Audition">Self Audition</label>
                        </div>
                        <p class="warning"></p>
                    </div>
                    <a href="#" role="button" class="btn-barley type-2 btn-submit cta">request</a>
                    <a href="#" role="button" class="btn-red type-2 cta">decline</a>
                </form>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                    <li><a href="#" class="active">Profile</a></li>
                    <?php if(isset($role)): ?>
                    <li><a href="<?php echo e(route('client_talent_experience_detail', ['talent_id'=>$talent->id, 'role_id'=>$role->id])); ?>">Experiences</a></li>
                    <li><a href="<?php echo e(route('client_talent_media_detail', ['talent_id'=>$talent->id, 'role_id'=>$role->id])); ?>">Media</a></li>
                    <?php else: ?>
                    <li><a href="<?php echo e(route('client_talent_experience_detail', ['talent_id'=>$talent->id])); ?>">Experiences</a></li>
                    <li><a href="<?php echo e(route('client_talent_media_detail', ['talent_id'=>$talent->id])); ?>">Media</a></li>
                    <?php endif; ?>
                    <li><a href="#">Apperance</a></li>
                </ul>
            </div>

            <div class="content-wrap redo-wrap">
                <h5 class="heading">Introduction</h5>
                <p class="txt"><?php echo e($talent->bio); ?></p>
            </div>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_talent_detail.blade.php ENDPATH**/ ?>