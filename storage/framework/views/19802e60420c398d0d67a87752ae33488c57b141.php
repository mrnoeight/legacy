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
                            <img src="<?php echo e($tal->cover_url); ?>" alt="<?php echo e($tal->name); ?>" />
                            <!-- <a href="#" role="button" class="btn-star" title="bookmark this talent"></a> -->
                        </div>
                        <figcaption>
                            <h3><?php echo e($tal->name); ?></h3>
                            <a href="<?php echo e(route('talent_detail', ['id' => $tal->id])); ?>" class="gold-link"><i><?php echo e(route('talent_detail', ['id' => $tal->id])); ?></i></a>
                            <p><b>Gender:</b> <?php echo e($tal->gender); ?></p>
                            <p><b>Height:</b> <?php echo e($tal->height); ?> cm</p>
                            <p><b>Weight:</b> <?php echo e($tal->weight); ?> kg</p>
                            <p><b> Location:</b> <?php echo e($tal->hometown); ?></p>
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

                <?php if(isset($role)): ?>
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
                <?php endif; ?>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                    <?php if(isset($role)): ?>
                    <li><a href="<?php echo e(route('client_talent_detail', ['talent_id'=>$tal->id, 'role_id'=>$role->id])); ?>">Profile</a></li>
                    <li><a href="<?php echo e(route('client_talent_experience_detail', ['talent_id'=>$tal->id, 'role_id'=>$role->id])); ?>">Experiences</a></li>
                    <?php else: ?>
                    <li><a href="<?php echo e(route('client_talent_detail', ['talent_id'=>$tal->id])); ?>">Profile</a></li>
                    <li><a href="<?php echo e(route('client_talent_experience_detail', ['talent_id'=>$tal->id])); ?>">Experiences</a></li>
                    <?php endif; ?>
                    <li><a href="#" class="active">Media</a></li>
                    <li><a href="#">Apperance</a></li>
                </ul>
            </div>

            <div class="content-wrap redo-wrap">
                <h5 class="heading">Photo</h5>
                <div class="xscroll">
                    <ul class="media-wrap">
                    <?php $__currentLoopData = $tal->getListGalleryImage(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><img src="<?php echo e($v); ?>" alt="<?php echo e($tal->name); ?>" /></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    </ul>
                </div>
            </div>

            <div class="content-wrap redo-wrap">
                <h5 class="heading">Video</h5>
                <div class="xscroll">
                    <ul class="media-wrap">
                        <li><img src="<?php echo e(asset('assets/img/our-talent/media-1.png')); ?>" alt="talent video" /></li>
                        <li><img src="<?php echo e(asset('assets/img/our-talent/media-2.png')); ?>" alt="talent video" /></li>
                        <li><img src="<?php echo e(asset('assets/img/our-talent/media-3.png')); ?>" alt="talent video" /></li>
                        <li><img src="<?php echo e(asset('assets/img/our-talent/media-4.png')); ?>" alt="talent video" /></li>
                        <li><img src="<?php echo e(asset('assets/img/our-talent/media-5.png')); ?>" alt="talent video" /></li>
                        <li><img src="<?php echo e(asset('assets/img/our-talent/media-6.png')); ?>" alt="talent video" /></li>
                        <li><img src="<?php echo e(asset('assets/img/our-talent/media-7.png')); ?>" alt="talent video" /></li>
                        <li><img src="<?php echo e(asset('assets/img/our-talent/media-8.png')); ?>" alt="talent video" /></li>
                    </ul>
                </div>
            </div>

        </div>
    </article>
</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_talent_detail_media.blade.php ENDPATH**/ ?>