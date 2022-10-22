<?php $__env->startSection('title', 'Client Casting Board'); ?>

<?php $__env->startSection('hidden_page', 'Client Casting Board'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-client-casting-board">
    <input type="hidden" id="page-id" value="page-client-casting-board" />
    <section class="details-banner theme-dark">
        <header class="top-ctr wrap-1200">
            <ul class="breadcrumb">
                <li><a href="1-home.html">Home</a></li>
                <li><a href="21-client-profile.html">Profile</a></li>
                <li><a href="#">Casting Board</a></li>
            </ul>
            <time datetime="20/04/2021"><span class="mb-hide">Updated on:&nbsp;</span>20/04/2021</time>
        </header>
        <figure class="cover-img wrap-1200">
            <div class="img-wrap-circle"><img src="<?php echo e($client->company->thumb_url); ?>" alt="<?php echo e($client->company->name); ?>" /></div>
            <figcaption>
                <h3 class="name"><?php echo e($client->company->name); ?></h3>
                <p><i class="pack-name">BASIC</i><span>Member since January 2019</span></p>
            </figcaption>
        </figure>
        <div class="curve-deco type-2"></div>
    </section>

    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap type-2">
                <header>
                    <h4 class="main-heading type-2">My Casting Board</h4>
                    <form class="form-filter">
                        <strong>Filter:</strong>
                        <div class="input-wrap input-sel-box">
                            <div class="holder">
                                <input type="text" class="input static" readonly />
                                <label class="txt-label">By project type&nbsp;<span></span></label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li class="item"><label><input type="checkbox" name="project[0]"
                                            value="Film OTT" /><b>Film OTT</b></label></li>
                                <li class="item"><label><input type="checkbox" name="project[1]"
                                            value="Short Film" /><b>Short Film</b></label></li>
                                <li class="item"><label><input type="checkbox" name="project[2]" value="TV OTT" /><b>TV
                                            OTT</b></label></li>
                                <li class="item"><label><input type="checkbox" name="project[3]"
                                            value="TV Broadcast" /><b>TV Broadcast</b></label></li>
                                <li class="item"><label><input type="checkbox" name="project[4]"
                                            value="Webdrama" /><b>Webdrama</b></label></li>
                                <li class="item"><label><input type="checkbox" name="project[5]"
                                            value="Music Video" /><b>Music Video</b></label></li>
                                <li class="item"><label><input type="checkbox" name="project[6]"
                                            value="Commercial" /><b>Commercial</b></label></li>
                            </ul>
                        </div>
                        <button class="btn-gold type-btn type-2" type="submit">Apply</button>
                        <a href="<?php echo e(route('client_new_project')); ?>" class="btn-gold-arrow type-2 cta" role="button">POST A NEW
                            PROJECT</a>
                    </form>

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

                <ul class="project-list">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <div class="project-header">
                            <p class="project-name">
                                <b><?php echo e($post->name); ?></b>
                                <a href="24-client-project-details.html">Project details</a>
                                <a href="20-client-new-project.html">Edit Project</a>
                            </p>
                            <b class="tag <?php echo e(tk1DisplayTags($post->types)); ?>"><?php echo e(tk1DisplayTypes($post->types)); ?></b>
                            <ul class="info">
                                <li><b>Genre</b><i><?php echo e($post->genre); ?></i></li>
                                <li><b>Start day</b><time datetime="2021-08-18"><?php echo e($post->start_casting_date); ?></time></li>
                                <li><b>End day</b><time datetime="2023-09-30"><?php echo e($post->end_casting_date); ?></time></li>
                            </ul>
                            <a href="<?php echo e(route('client_new_role', $post->id)); ?>" class="btn-border-gold type-2 cta" role="button"><i
                                    class="icon-plus"></i>add more role</a>
                            <button class="btn-toggle"></button>
                        </div>
                        <div class="role-wrap">
                            <ul class="dgrid col-4">
                                <?php $__currentLoopData = $post->prole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="item role-card">
                                    <a href="#" class="img-wrap"><img class="main-img"
                                            src="<?php echo e($role->thumb_url); ?>" alt="<?php echo e($role->name); ?>" /></a>
                                    <div class="content">
                                        <h5 class="heading"><?php echo e($role->name); ?></h5>
                                        <h6 class="sub-heading"><?php echo e($role->role_type); ?></h6>
                                        <p class="info no-bd">
                                            <span><b>Gender:&nbsp;</b><?php echo e($role->gender); ?></span>
                                            <span><b>City:&nbsp;</b><?php echo e($post->city_name); ?></span>
                                            <span><b>Age Range:&nbsp;</b><?php echo e($role->age_range); ?></span>
                                        </p>
                                        <strong>SUBMITTED TALENT: 8</strong>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </ul>
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
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_casting_board.blade.php ENDPATH**/ ?>