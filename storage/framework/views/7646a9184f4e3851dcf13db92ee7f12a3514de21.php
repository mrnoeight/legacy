

<?php $__env->startSection('title', 'Casting Board'); ?>

<?php $__env->startSection('hidden_page', 'Casting Board'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-project-details">
    <input type="hidden" id="page-id" value="page-project-details" />
    <section class="details-banner wrap-1200">
        <header class="top-ctr">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('casting_board')); ?>">Casting Board</a></li>
                <li><?php echo e($post->name); ?></li>
            </ul>
            <!-- <time datetime="20/04/2021"><span class="mb-hide">Posted Date:&nbsp;</span>20/04/2021</time> -->
        </header>

        <div class="intro-wrap">
            <img class="intro-img" src="<?php echo e($post->thumb_url); ?>" alt="<?php echo e($post->name); ?>" />
            <div class="intro-content">
                <h3 class="heading"><?php echo e($post->name); ?></h3>
                <div class="info col-2">
                    <h5><b>Project type:</b>&nbsp;<?php echo e($post->type); ?></h5>
                    <h5><b>Genre:</b>&nbsp;Romantic</h5>
                    <h5><b>Start Day of Production:</b>&nbsp;<time datetime="<?php echo e($post->start_casting_date); ?>"><?php echo e($post->start_casting_date); ?></time></h5>
                    <h5><b>End Day of Production:</b>&nbsp;<time datetime="<?php echo e($post->end_casting_date); ?>"><?php echo e($post->end_casting_date); ?></time></h5>
                </div>
                <div class="gray-ctr">
                    <ul class="tag">
                        <lh class="hidden">
                            <h5>Tag</h5>
                        </lh>
                        <li>
                            <h6>#Musicvideo</h6>
                        </li>
                        <li>
                            <h6>#TVC</h6>
                        </li>
                        <li>
                            <h6>#Commercial</h6>
                        </li>
                    </ul>
                    <nav class="share">
                        <h5>Share:</h5>
                        <ul>
                            <li><a href="#">
                                    <img class="icon" src="<?php echo e(asset('asset/img/social/facebook.svg')); ?>" alt="facebook" />
                                    <h6 class="hidden">Facebook</h6>
                                </a></li>
                            <li><a href="#">
                                    <img class="icon" src="<?php echo e(asset('asset/img/social/twitter.svg')); ?>" alt="twitter" />
                                    <h6 class="hidden">Twitter</h6>
                                </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap">
                <table>
                    <tbody>
                        <tr>
                            <th>Casting</th>
                            <td>Leading Actor: 4</td>
                            <td>Background Extras: 4</td>
                        </tr>
                        <tr>
                            <th>Director’s Name</th>
                            <td colspan="2">Kylie Nguyen</td>
                        </tr>
                        <tr>
                            <th>Producer’s Name</th>
                            <td colspan="2">Kylie Nguyen</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <ul class="break-list content-wrap">
                <lh>
                    <h3 class="main-heading">Character Breakdown</h3>
                </lh>
                <?php $__currentLoopData = $post->prole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <h4 class="heading"><?php echo e($role->name); ?></h4>
                    <p class="info">
                        <span><b>Type of Role:</b><?php echo e($role->role_type); ?></span>
                        <span><b>Genre:</b><?php echo e($role->gender); ?></span>
                        <span><b>Range of age:</b><?php echo e($role->age_range); ?></span>
                    </p>
                    <p class="desc">
                        <b>Description:</b>
                        <span><?php echo e($role->description); ?></span>
                    </p>
                    <a href="<?php echo e(route('role_detail', ['id'=>$role->id, 'slug'=>$role->slug])); ?>" role="button" class="cta btn-gold-arrow">apply now</a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </article>

    <section class="casting-board pd-ctr pt-0">
        <div class="wrap wrap-1200">
            <header class="banner">
                <h4 class="heading">Recommended Roles</h4>
            </header>
            <ul class="list-post">
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
                <li class="item casting-card">
                    <div class="img-wrap"><img class="main-img" src="<?php echo e($role->thumb_url); ?>"
                            alt="<?php echo e($role->name); ?>" /></div>
                    <div class="content">
                        <b class="tag <?php echo e($class_tag); ?>"><?php echo e($str_type); ?></b>
                        <h5 class="heading"><?php echo e($role->name); ?></h5>
                        <p class="info">
                            <span><i class="city">City:&nbsp;</i><?php echo e($role->city); ?></span>
                            <span><i class="gender">Gender:&nbsp;</i><?php echo e($role->gender); ?></span>
                            <span><i class="age">Age:&nbsp;</i><?php echo e($role->age_range); ?></span>
                        </p>
                        <p class="desc"><?php echo e($role->description); ?></p>
                        <a href="<?php echo e(route('role_detail', ['id'=>$role->id, 'slug'=>$role->slug])); ?>" role="button" class="btn-txt-arrow cta">Apply now</a>
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
            <h4 class="heading">How Take1 Works</h4>
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

<section class="join-us-footer">
    <div class="wrap-1200">
        <div class="wrap">
            <h4 class="heading">Be The First to <br class="mb-hide" />Get New Casting Jobs</h4>
            <div class="content">
                <p>Create your account then you will receice new jobs via email</p>
                <div class="btn-wrap">
                    <a href="#" class="btn-gold-arrow cta" role="button">
                        <h5>Sign up as a talent</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/project_detail.blade.php ENDPATH**/ ?>