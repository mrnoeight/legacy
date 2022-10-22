

<?php $__env->startSection('title', 'Homepage'); ?>

<?php $__env->startSection('hidden_page', 'Homepage'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-home">
    <input type="hidden" id="page-id" value="page-home" />
    <section class="heading-banner">
        <h2 class="heading">Hey there, welcome to <span class="gold-underline">Take1</span></h2>
        <p>The future of casting is here and Take1 offers the best online and on ground casting service solutions for the world we live in today. We are here to help performers find great roles and assist industry professionals in finding great talent.</p>
        <p>Explore our site and learn  more about our online &amp; on ground solutions</p>
<!--         <a href="#how-it-works" class="btn-gold-arrow cta arrow-type-1" role="button">See how Take1 works</a> -->
        <!-- <a class="cta btn-gold-arrow arrow-type-1" role="button" data-poster="img/video/poster-2.jpg" data-src="media/sample.mp4" href="javascript:void(0)" onclick="APP.popup._media.show(this.dataset)">See how Take1 works</a> -->
    </section>

    <section class="fullscr-banner">
        <h5 class="hidden">Sign Up</h5>
        <figure class="halfscr bg-supernova">
            <img src="<?php echo e(asset('assets/img/banner/hero-1.png')); ?>" alt="signup as talent" class="scroll-animator"
                data-start="40" data-range="40" data-tfy="true" data-tfy-from="0" data-tfy-to="30" />
            <figcaption>
                <h6 class="heading">I’m here to find jobs</h6>
                <a href="<?php echo e(route('signup')); ?>#signup-talent" role="button" class="btn-black-arrow cta">signup as talent</a>
            </figcaption>
        </figure>
        <figure class="halfscr bg-shark">
            <img src="<?php echo e(asset('assets/img/banner/hero-2.png')); ?>" alt="signup as client" class="scroll-animator"
                data-start="40" data-range="40" data-tfy="true" data-tfy-from="0" data-tfy-to="30" />
            <figcaption>
                <h6 class="heading">I’m looking for talents</h6>
                <a href="<?php echo e(route('signup')); ?>#signup-client" role="button" class="btn-gold-arrow cta">signup as client</a>
            </figcaption>
        </figure>
    </section>

    <nav class="wrap-1200">
        <h5 class="hidden">Agency List</h5>
        <ul class="agency-list">
            <li><a href="#" target="_blank">
                    <img src="<?php echo e(asset('assets/img/banner/logo-1.png')); ?>" alt="Agency Name" />
                    <h6 class="hidden">Agency Name</h6>
                </a></li>
            <li><a href="#" target="_blank">
                    <img src="<?php echo e(asset('assets/img/banner/logo-2.png')); ?>" alt="Agency Name" />
                    <h6 class="hidden">Agency Name</h6>
                </a></li>
            <li><a href="#" target="_blank">
                    <img src="<?php echo e(asset('assets/img/banner/logo-3.png')); ?>" alt="Agency Name" />
                    <h6 class="hidden">Agency Name</h6>
                </a></li>
            <li><a href="#" target="_blank">
                    <img src="<?php echo e(asset('assets/img/banner/logo-4.png')); ?>" alt="Agency Name" />
                    <h6 class="hidden">Agency Name</h6>
                </a></li>
            <li><a href="#" target="_blank">
                    <img src="<?php echo e(asset('assets/img/banner/logo-5.png')); ?>" alt="Agency Name" />
                    <h6 class="hidden">Agency Name</h6>
                </a></li>
            <li><a href="#" target="_blank">
                    <img src="<?php echo e(asset('assets/img/banner/logo-6.png')); ?>" alt="Agency Name" />
                    <h6 class="hidden">Agency Name</h6>
                </a></li>
        </ul>
    </nav>

    <section class="casting-board type-2">
        <div class="wrap wrap-1200 dir-col">
            <div class="banner">
                <h4 class="heading"><span class="gold-underline">Top</span><br class="mb-hide" /><span
                        class="mb-show-inline">&nbsp;</span>Casting Post</h4>
                <p>Find the role that’s right for you.  Browse through our casting posts from the industry’s leading casting directors and creators.</p>
                <br />
                <!-- <a href="<?php echo e(route('casting_board')); ?>" role="button" class="btn-gold-arrow cta mb-hide">View all
                    post</a> -->
            </div>

            <ul class="list-post col-2">
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <?php
                        $types = $role->post->types;
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
                                $class_tag = 'film';
                                break;
                            case 'Music Video' :
                                $class_tag = 'music';
                                break;
                            case 'Commercial' :
                                $class_tag = 'commercial';
                                break;
                            default :
                                $class_tag = 'commercial';
                        }
                    ?>
                
                <li class="item casting-card type-3">
                    <div class="content">
                        <b class="tag <?php echo e($class_tag); ?>"><?php echo e($str_type); ?></b>
                        <h5><a href="<?php echo e(route('role_detail', ['id'=>$role->id, 'slug'=>$role->slug])); ?>" class="heading"><?php echo e($role->name); ?></a></h5>
                        <h6><a href="<?php echo e(route('project_detail', ['id'=>$role->post_id, 'slug'=>$role->post->slug])); ?>" class="gold-txt"><?php echo e($role->post->name); ?></a></h6>
                        <p class="info">
                            <span><b class="city">Type:</b>&nbsp;<?php echo e($role->role_type); ?></span>
                            <span><b class="age">Age:</b>&nbsp;<?php echo e($role->age_range); ?></span>
                            <span><b class="gender">Gender:</b>&nbsp;<?php echo e($role->gender); ?></span>
                        </p>
                        <p class="desc"><?php echo e(Str::words($role->description, 7, '...')); ?></p>
                        <footer>
                            <time datetime="<?php echo e($role->post->expired_date); ?>"><span class="mb-480-hide">Submissions Due&nbsp;</span><?php echo e(tk1FormatDate($role->post->expired_date)); ?></time>
                            <span><?php echo e($role->post->city_name); ?></span>
                        </footer>
                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="center-cta"><a href="<?php echo e(route('casting_board')); ?>" role="button" class="btn-gold-arrow cta">View all post</a></div>
            <!-- <div class="center-cta"><a href="<?php echo e(route('casting_board')); ?>" role="button"
                    class="btn-gold-arrow cta">View all post</a></div> -->
        </div>
    </section>

    <section class="news-event">
        <div class="wrap wrap-1200">
            <header class="header">
                <h4 class="heading">News and Events</h4>
                <p>Stay up to date with the latest information from Take1 and the industry.</p>
            </header>
            <div id="curator-feed-default-feed-layout"></div>
        </div>
    </section>
</main>
<!-- END MAIN PAGE -->

<?php echo $__env->make('web.partials.how_it_works', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="join-us-footer">
    <div class="wrap-1200">
        <div class="wrap">
            <h4 class="heading">Join Us</h4>
            <div class="content">
                <p>Sign up in just minutes and take your acting career to the next level.</p>
                <div class="btn-wrap">
                    <a href="<?php echo e(route('signup')); ?>#signup-talent" class="btn-gold-arrow cta" role="button">
                        <h5>Sign up as a talent</h5>
                    </a>
                    <span>Or</span>
                    <a href="<?php echo e(route('signup')); ?>#signup-client" class="btn-black-arrow cta" role="button">
                        <h5>Sign up as client</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<script type="text/javascript">
  /* curator-feed-default-feed-layout */
  (function(){
  var i,e,d=document,s="script";i=d.createElement("script");i.async=1;i.charset="UTF-8";
  i.src="https://cdn.curator.io/published/508b9349-b198-4598-ac78-19912d1ccf84.js";
  e=d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
  })();
</script>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/index.blade.php ENDPATH**/ ?>