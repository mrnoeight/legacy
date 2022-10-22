<?php $__env->startSection('title', 'Casting Board - Role Detail'); ?>

<?php $__env->startSection('hidden_page', 'Casting Board - Role Detail'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-role-details">
    <input type="hidden" id="page-id" value="page-role-details"/>
    <section class="details-banner wrap-1200">
      <header class="top-ctr">
        <ul class="breadcrumb">
          <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
          <li><a href="<?php echo e(route('casting_board')); ?>">Casting Board</a></li>
          <li><a href="<?php echo e(route('project_detail', ['id'=>$role->post_id, 'slug'=>$role->post->slug])); ?>"><?php echo e($role->post->name); ?></a></li>
          <li><?php echo e($role->name); ?></li>
        </ul>
        <!-- <time datetime="20/04/2021"><span class="mb-hide">Posted Date:&nbsp;</span>20/04/2021</time> -->
      </header>

      <div class="intro-wrap">
        <img class="intro-img" src="<?php echo e($role->thumb_url); ?>" alt="<?php echo e($role->name); ?>"/>
        <div class="intro-content">
          <?php if(session('apply_status')): ?>
          <h4 style="color:red"><?php echo e(session('apply_status')); ?></h4>
          <?php endif; ?>
          <h3 class="heading"><?php echo e($role->name); ?></h3>
          <div class="info col-2">
            <h5><b>Role type:</b>&nbsp;<?php echo e($role->role_type); ?></h5>
            <h5><b>Gender:</b>&nbsp;<?php echo e($role->gender); ?></h5>
            <h5><b>Location:</b>&nbsp;<?php echo e($role->city); ?></h5>
            <h5><b>Age Range:</b>&nbsp;<?php echo e($role->age_range); ?></h5>
            <h5 class="full-w"><b>Specific Requirement:</b>&nbsp;<?php echo e($role->role_requirement); ?></h5>
          </div>
          <p class="desc">
            <b>Description:</b>
            <span><?php echo e($role->description); ?></span>
          </p>
          <div class="gray-ctr">
            <ul class="tag">
              <lh class="hidden"><h5>Tag</h5></lh>
              <li><h6>#Musicvideo</h6></li>
              <li><h6>#TVC</h6></li>
              <li><h6>#Commercial</h6></li>
            </ul>
            <nav class="share">
              <h5>Share:</h5>
              <ul>
                <li><a href="#">
                  <img class="icon" src="<?php echo e(asset('assets/img/social/facebook.svg')); ?>" alt="facebook"/>
                  <h6 class="hidden">Facebook</h6>
                </a></li>
                <li><a href="#">
                  <img class="icon" src="<?php echo e(asset('assets/img/social/twitter.svg')); ?>" alt="twitter"/>
                  <h6 class="hidden">Twitter</h6>
                </a></li>
              </ul>
            </nav>
          </div>
          <a href="<?php echo e(route('apply_role', ['id' => $role->id])); ?>" role="button" class="btn-gold-arrow cta">Apply To This Role</a>
          <!-- <a href="#" role="button" class="btn-disable type-2 cta">Role Applied</a> -->
          <!-- <a href="#" role="button" class="btn-gray-arrow cta">Cancel Request</a> -->
        </div>
      </div>
    </section>

    <section class="casting-board">
      <div class="wrap wrap-1200">
        <header class="banner">
          <h4 class="heading">Recommended Roles</h4>
        </header>
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
                <li class="item casting-card type-3">
                    <!-- <div class="img-wrap"><img class="main-img" src="<?php echo e($role->thumb_url); ?>" alt="<?php echo e($role->name); ?>"/></div> -->
                    <div class="content">
                    <b class="tag <?php echo e($class_tag); ?>"><?php echo e($str_type); ?></b>
                    <h5 class="heading"><?php echo e($role->name); ?></h5>
                    <h6 class="blue-txt"><a href="<?php echo e(route('project_detail', ['id'=>$role->post_id, 'slug'=>$role->post->slug])); ?>"><?php echo e($role->post->name); ?></a></h6>
                    <p class="info">
                            <span><b class="city">Type:</b>&nbsp;<?php echo e($role->role_type); ?></span>
                            <span><b class="age">Age:</b>&nbsp;<?php echo e($role->age_range); ?></span>
                            <span><b class="gender">Gender:</b>&nbsp;<?php echo e($role->gender); ?></span>
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
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/role_detail.blade.php ENDPATH**/ ?>