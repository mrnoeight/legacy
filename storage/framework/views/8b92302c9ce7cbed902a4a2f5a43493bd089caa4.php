<?php $__env->startSection('title', 'Post Detail'); ?>

<?php $__env->startSection('hidden_page', 'Post Detail'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-post-details">
    <input type="hidden" id="page-id" value="page-post-details" />

    <section class="details-banner">
        <header class="top-ctr">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('casting_board')); ?>">Casting Board</a></li>
            </ul>
            <time datetime="20/04/2021"><span class="mb-hide">Posted Date:&nbsp;</span><?php echo e($published_at); ?></time>
        </header>
        <h1 class="heading"><?php echo e($post->name); ?></h1>
        <div class="gray-ctr">
            <ul class="tag">
                <?php $__currentLoopData = $post->types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>#<?php echo e($type->tag_name); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <nav class="share">
                <h5>Share:</h5>
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
        <a href="#" class="logo-wrap"><img src="<?php echo e($post->company->thumb_url); ?>" alt="<?php echo e($post->company->name); ?>" /></a>
        <p class="info">
            <span><i class="city">City:&nbsp;</i><?php echo e($post->city_name); ?></span>
            <span><i class="gender">Gender:&nbsp;</i><?php echo e($post->gender); ?></span>
            <span><i class="age">Age:&nbsp;</i><?php echo e($post->age); ?></span>
            <span><i class="exp">Expire on:</i>&nbsp;<?php echo e($date); ?></span>
        </p>
        <footer class="center-cta">
            <a href="#" role="button" class="btn-gold-arrow cta">Apply now</a>
        </footer>
    </section>

    <article class="main-article">
        <h4 class="hidden"><?php echo e($post->name); ?></h4>
        <div class="wrap-1200 article-wrap">
            <aside class="aside-slider">
                <h5 class="hidden">Aside Slider</h5>
                <div class="slider">
                    <div class="place-holder">
                        <img src="<?php echo e(asset('assets/img/casting-board/large-1.jpg')); ?>" alt="image name" />
                        <ul class="item-wrap">
                            <li class="item"><img src="<?php echo e(asset('assets/img/casting-board/large-1.jpg')); ?>" alt="image name" /></li>
                            <li class="item"><img src="<?php echo e(asset('assets/img/casting-board/large-1.jpg')); ?>" alt="image name" /></li>
                            <li class="item"><img src="<?php echo e(asset('assets/img/casting-board/large-1.jpg')); ?>" alt="image name" /></li>
                            <li class="item"><img src="<?php echo e(asset('assets/img/casting-board/large-1.jpg')); ?>" alt="image name" /></li>
                            <li class="item"><img src="<?php echo e(asset('assets/img/casting-board/large-1.jpg')); ?>" alt="image name" /></li>
                        </ul>
                    </div>
                    <ul class="paging">
                        <li role="button" data-index="0" class="js-active"></li>
                        <li role="button" data-index="1"></li>
                        <li role="button" data-index="2"></li>
                        <li role="button" data-index="3"></li>
                        <li role="button" data-index="4"></li>
                    </ul>
                    <a href="#" role="button" class="btn-prev"><span></span></a>
                    <a href="#" role="button" class="btn-next"><span></span></a>
                </div>
            </aside>
            <div class="content">
                <h6>Job Descriptions</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Massa id neque aliquam vestibulum morbi blandit cursus risus at. Vel quam
                    elementum pulvinar etiam non quam lacus suspendisse. Quis enim lobortis scelerisque fermentum dui.
                </p>
                <p>Velit aliquet sagittis id consectetur purus ut. Nisl purus in mollis nunc sed. Sed turpis tincidunt
                    id aliquet risus feugiat in ante.</p>
                <p>Consectetur adipiscing elit duis tristique sollicitudin nibh. Odio tempor orci dapibus ultrices in
                    iaculis nunc sed augue. Magna etiam tempor orci eu lobortis elementum nibh. Donec ac odio tempor
                    orci.</p>
                <p>Sed vulputate odio ut enim. Ut eu sem integer vitae justo eget magna fermentum. Lacus luctus accumsan
                    tortor posuere ac ut consequat. Eget aliquet nibh praesent tristique magna sit amet purus gravida.
                    Porta lorem mollis aliquam ut porttitor leo a. Fermentum et sollicitudin ac orci. Risus nec feugiat
                    in fermentum posuere urna nec.</p>
                <h6>Requirements</h6>
                <ul>
                    <li>Quis vel eros donec ac. Sed viverra tellus in hac habitasse.</li>
                    <li>Viverra adipiscing at in tellus integer feugiat scelerisque.</li>
                    <li>Fames ac turpis egestas sed tempus urna et pharetra pharetra.</li>
                    <li>Vulputate dignissim suspendisse in est ante in.</li>
                    <li>Quam lacus suspendisse faucibus interdum posuere lorem.</li>
                    <li>Placerat orci nulla pellentesque dignissim enim sit amet.</li>
                    <li>Ut eu sem integer vitae.</li>
                    <li>Mi tempus imperdiet nulla malesuada pellentesque elit.</li>
                    <li>Nulla malesuada pellentesque elit eget gravida cum sociis natoque.</li>
                </ul>
                <h6>How To Apply</h6>
                <p>Venenatis a condimentum vitae sapien pellentesque habitant morbi tristique. Elit sed vulputate mi sit
                    amet mauris commodo. Non consectetur a erat nam at lectus. Adipiscing at in tellus integer feugiat
                    scelerisque varius morbi.</p>
                <h6>Payment</h6>
                <p>Mattis enim ut tellus elementum sagittis vitae et leo. Libero id faucibus nisl tincidunt eget nullam
                    non nisi. Morbi non arcu risus quis.</p>
                <p>Faucibus in ornare quam viverra orci sagittis. Tortor dignissim convallis aenean et tortor at risus
                    viverra. Maecenas volutpat blandit aliquam etiam erat velit scelerisque.</p>
                <a href="#" role="button" class="btn-gold-arrow cta">Apply now</a>
            </div>
        </div>
    </article>

    <section class="casting-board pd-ctr pt-0">
        <div class="wrap wrap-1200">
            <header class="banner">
                <h4 class="heading">Other Hot Jobs</h4>
            </header>

            <ul class="list-post">
            <?php
                $count = 0;
            ?>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $types = $post->types;
                    $arr = array();
                    foreach ($types as $k=>$v) {
                        $arr[] = $v->tag_name;
                    }
                    $str_type = implode(', ', $arr);

                    switch ($str_type) {
                        case 'TVC' :
                            $class_tag = 'tvc';
                            break;
                        case 'Movie' :
                            $class_tag = 'movie';
                            break;
                        case 'Music Video' :
                            $class_tag = 'music-video';
                            break;
                        case 'Commercial' :
                            $class_tag = 'commercial';
                            break;
                        default :
                            $class_tag = 'music-video';
                    }
                    
                    $count++;
                    if ($count > 4)
                        break;
                ?>
                <li class="item casting-card">
                    <div class="img-wrap"><img class="main-img" src="<?php echo e($post->thumb_url); ?>"
                            alt="<?php echo e($post->name); ?>" /></div>
                    <div class="content">
                        <b class="tag <?php echo e($class_tag); ?>"><?php echo e($str_type); ?></b>
                        <img class="logo" src="<?php echo e($post->company->thumb_url); ?>" alt="<?php echo e($post->company->name); ?>" />
                        <h5 class="heading"><?php echo e($post->name); ?></h5>
                        <p class="info">
                            <span><i class="city">City:&nbsp;</i><?php echo e($post->city_name); ?></span>
                            <span><i class="gender">Gender:&nbsp;</i><?php echo e($post->gender); ?></span>
                            <span><i class="age">Age:&nbsp;</i><?php echo e($post->age); ?></span>
                        </p>
                        <p class="desc"><?php echo e($post->short_desc); ?></p>
                        <a href="<?php echo e(route('casting_detail', $post->slug)); ?>" role="button" class="btn-txt-arrow cta">Apply now</a>
                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </section>

</main>
<!-- END MAIN PAGE -->

<!-- FOOTER -->
<section class="how-it-works">
    <div class="wrap wrap-1200">
        <header>
            <h4 class="heading">How Take1 Works?</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s.</p>
        </header>
        <ul class="step">
            <li class="deco">
                <h5 class="number">3</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s.</p>
            </li>
            <li class="deco flip">
                <h5 class="number">2</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s.</p>
            </li>
            <li>
                <h5 class="number">1</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s.</p>
            </li>
        </ul>
        <footer>
            <h4 class="heading">Action!</h4>
        </footer>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/post_detail.blade.php ENDPATH**/ ?>