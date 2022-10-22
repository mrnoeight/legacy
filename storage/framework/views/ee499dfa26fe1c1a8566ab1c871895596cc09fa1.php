

<?php $__env->startSection('title', 'Talent Recommendation Roles'); ?>

<?php $__env->startSection('hidden_page', 'Talent Recommendation Roles'); ?>

<?php $__env->startSection('content'); ?>

<!-- MAIN PAGE -->
<main id="page-talent-recommended">
    <input type="hidden" id="page-id" value="page-talent-recommended" />
    <section class="details-banner wrap-1200">
        <header class="top-ctr">
            <ul class="breadcrumb">
                <li><a href="1-home.html">Home</a></li>
                <li><a href="14-talent-ctr.html">Profile</a></li>
                <li><a href="#">Recommended Roles</a></li>
            </ul>
            <time datetime="20/04/2021"><span class="mb-hide">Updated on:&nbsp;</span>20/04/2021</time>
        </header>
    </section>

    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap type-2">
                <header>
                    <h4 class="main-heading type-2">Recommended Roles</h4>
                    <form class="form-search">
                        <div class="input-wrap">
                            <div class="holder">
                                <input name="search" id="search" type="text" class="input" autocomplete="off" />
                                <label class="txt-label" for="search">search for project/roles</label>
                            </div>
                            <p class="warning"></p>
                        </div>
                    </form>
                </header>

                <ul class="item-wrap dgrid col-4">
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
                    ?>
                    <li class="item">
                        <div class="role-card">
                            <div class="img-wrap"><img class="main-img" src="<?php echo e($role->thumb_url); ?>"
                                    alt="<?php echo e($role->name); ?>" /></div>
                            <div class="content">
                                <b class="tag <?php echo e($class_tag); ?>"><?php echo e($str_type); ?></b>
                                <h5 class="heading"><?php echo e($role->name); ?></h5>
                                <h6 class="sub-heading"><?php echo e($role->post->name); ?></h6>
                                <p class="info">
                                    <span><b class="city">Type:</b>&nbsp;<?php echo e($role->role_type); ?></span>
                                    <span><b class="age">Age:</b>&nbsp;<?php echo e($role->age_range); ?></span>
                                    <span><b class="gender">Gender:</b>&nbsp;<?php echo e($role->gender); ?></span>
                                </p>
                                <a href="<?php echo e(route('role_detail', ['id'=>$role->id, 'slug'=>$role->slug])); ?>" role="button" class="btn-gold-arrow cta">View role details</a>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

            </div>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_recommendation.blade.php ENDPATH**/ ?>