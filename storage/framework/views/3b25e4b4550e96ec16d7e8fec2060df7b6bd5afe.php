

<?php $__env->startSection('title', 'Talent Casting Board'); ?>

<?php $__env->startSection('hidden_page', 'Talent Casting Board'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-p2-talent-role-details">
    <input type="hidden" id="page-id" value="page-p2-talent-role-details" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">

            <div class="content-wrap redo-wrap type-2 p2-header-wrap">
                <header>
                    <ul class="breadcrumb full-w">
                        <li><a href="<?php echo e(route('casting_board')); ?>">Billboard</a></li>
                        <li><a href="#">Role Details</a></li>
                    </ul>
                    <h4 class="main-heading type-4"><?php echo e($role->name); ?></h4>
                </header>
                <ul class="info">
                    <li><strong class="blue">in process</strong></li>
                    <li><?php echo e($role->role_type); ?></li>
                    <li><?php echo e($role->age_range); ?></li>
                    <li><?php echo e($role->gender); ?></li>
                </ul>
                <time class="time" datetime="<?php echo e($role->created_at); ?>"><span class="mb-480-hide">Submissions Due&nbsp;</span> <?php echo e(tk1FormatDate($role->post->expired_date)); ?> | Work <?php echo e(tk1FormatDate($role->start_casting_date)); ?> | Posted
                    <?php echo e(tk1FormatDate($role->created_at)); ?></time>
                <div class="btn-flex-wrap">
                    <a href="52-p2-talent-role-submit.html" class="btn-gold-arrow cta" role="button">Submit to role</a>
                </div>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                    <li><a href="<?php echo e(route('talent_role_detail', ['id'=>$role->id])); ?>">Role details</a></li>
                    <li><a href="#" class="active">Project Information</a></li>
                </ul>
            </div>

            <div class="content-wrap redo-wrap">
                <figure class="img-info">
                    <div class="img-wrap"><img src="<?php echo e($role->post->thumb_url); ?>" alt="<?php echo e($role->post->name); ?>" /></div>
                    <figcaption>
                        <p>Posted Date: <?php echo e(tk1FormatDate2($role->created_at)); ?></p>
                        <h5><?php echo e($role->post->name); ?></h5>
                        <!-- <p><b>Internal Project Name:</b> The Secret Movie</p> -->
                        <p><b>Project type:</b> <?php echo e($role->post->type); ?></p>
                        <p><b>Genre:</b> <?php echo e($role->post->genre); ?></p>
                        <p><b>Location:</b> <?php echo e($role->post->city_name); ?></p>
                    </figcaption>
                </figure>
            </div>

            <div class="content-wrap redo-wrap">
                <h5 class="heading">Project Summary</h5>
                <p class="txt"><?php echo e($role->post->short_desc); ?></p>
            </div>

            <div class="content-wrap redo-wrap">
                <h5 class="heading">Project Timeline</h5>
                <div class="dgrid col-2">
                    <div class="full-w">
                        <h6 class="sub-heading">Deadline for Talent Submissions</h6>
                        <time datetime="<?php echo e(tk1FormatDate2($role->post->expired_date)); ?>"><?php echo e(tk1FormatDate2($role->post->expired_date)); ?></time>
                    </div>
                    <div>
                        <h6 class="sub-heading">Start Day of Casting</h6>
                        <time datetime="<?php echo e(tk1FormatDate2($role->post->start_casting_date)); ?>"><?php echo e(tk1FormatDate2($role->post->start_casting_date)); ?></time>
                    </div>
                    <div>
                        <h6 class="sub-heading">End Day of Casting</h6>
                        <time datetime="<?php echo e(tk1FormatDate2($role->post->end_casting_date)); ?>"><?php echo e(tk1FormatDate2($role->post->end_casting_date)); ?></time>
                    </div>
                    <div>
                        <h6 class="sub-heading">Start Day of Rehearsal</h6>
                        <time datetime="<?php echo e(tk1FormatDate2($role->post->start_rehearsal_date)); ?>"><?php echo e(tk1FormatDate2($role->post->start_rehearsal_date)); ?></time>
                    </div>
                    <div>
                        <h6 class="sub-heading">End Day of Rehearsal</h6>
                        <time datetime="<?php echo e(tk1FormatDate2($role->post->end_rehearsal_date)); ?>"><?php echo e(tk1FormatDate2($role->post->end_rehearsal_date)); ?></time>
                    </div>
                    <div>
                        <h6 class="sub-heading">Start Day of Principle Photography</h6>
                        <time datetime="<?php echo e(tk1FormatDate2($role->post->start_photo_date)); ?>"><?php echo e(tk1FormatDate2($role->post->start_photo_date)); ?></time>
                    </div>
                    <div>
                        <h6 class="sub-heading">End Day of Principle Photography</h6>
                        <time datetime="<?php echo e(tk1FormatDate2($role->post->end_photo_date)); ?>"><?php echo e(tk1FormatDate2($role->post->end_photo_date)); ?></time>
                    </div>
                </div>
            </div>

            <div class="content-wrap redo-wrap">
                <h5 class="heading">Casting Contact</h5>
                <div class="dgrid col-2">
                    <div>
                        <h6 class="sub-heading">Director’s Name</h6>
                        <p><?php echo e($role->post->director); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Producer’s Name</h6>
                        <p><?php echo e($role->post->producer); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Contact Person</h6>
                        <p><?php echo e($role->post->contact_name); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Phone</h6>
                        <p><?php echo e($role->post->contact_phone); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">email</h6>
                        <p><?php echo e($role->post->contact_email); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_project_detail.blade.php ENDPATH**/ ?>