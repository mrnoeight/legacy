

<?php $__env->startSection('title', 'Project Detail'); ?>

<?php $__env->startSection('hidden_page', 'Project Detail'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-p2-client-project-details">
    <input type="hidden" id="page-id" value="page-p2-client-project-details" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap redo-wrap type-2 p2-header-wrap">
                <header>
                    <ul class="breadcrumb full-w">
                        <li><a href="<?php echo e(route('client_casting_board')); ?>">Manage Project</a></li>
                        <li>Project Detail</li>
                    </ul>
                    <h4 class="main-heading type-4"><?php echo e($post->name); ?></h4>
                </header>
                <ul class="info">
                    <li><strong class="blue"><?php echo e($post->status); ?></strong></li>
                    <li><?php echo e($post->type); ?></li>
                    <li><?php echo e($post->genre); ?></li>
                </ul>
                <div class="btn-flex-wrap">
                    <a href="<?php echo e(route('client_edit_project', ['id'=>$post->id])); ?>" class="btn-border-gold cta" role="button"><i class="icon-plus"></i>edit project</a>
                    <a href="<?php echo e(route('client_new_role', ['id'=>$post->id])); ?>" class="btn-border-gold cta" role="button"><i class="icon-plus"></i>add new role</a>
                    <a href="#" class="btn-gold-arrow cta" role="button">Publish</a>
                </div>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                    <li><a href="#" class="active">Project details</a></li>
                    <li><a href="<?php echo e(route('client_manage_role', ['id'=>$post->id])); ?>">Manage Roles (<?php echo e($post->prole->count()); ?>)</a></li>
                </ul>
            </div>
            
            <div class="content-wrap redo-wrap">
                <figure class="img-info">
                    <div class="img-wrap"><img src="<?php echo e($post->thumb_url); ?>" alt="<?php echo e($post->name); ?>"/></div>
                    <figcaption>
                        <p>Posted Date: <?php echo e(tk1FormatDate2($post->created_at)); ?></p>
                        <h5><?php echo e($post->name); ?></h5>
                        <p><b>Internal Project Name:</b> <?php echo e($post->internal_name); ?></p>
                        <p><b>Project type:</b> <?php echo e($post->type); ?></p>
                        <p><b>Genre:</b> <?php echo e($post->genre); ?></p>
                        <p><b>Location:</b><?php echo e($post->other_location); ?></p>
                    </figcaption>
                </figure>
            </div>

            <div class="content-wrap redo-wrap">
                <h5 class="heading">Project Summary</h5>
                <p class="txt"><?php echo e($post->description); ?></p>
            </div>

            <div class="content-wrap redo-wrap">
                <h5 class="heading">Project Timeline</h5>
                <div class="dgrid col-2">
                    <div class="full-w">
                        <h6 class="sub-heading">Deadline for Talent Submissions</h6>
                        <time datetime="<?php echo e(tk1FormatDate2($post->expired_date)); ?>"><?php echo e(tk1FormatDate2($post->expired_date)); ?></time>
                    </div>
                    <div>
                        <h6 class="sub-heading">Start Day of Casting</h6>
                        <time datetime="<?php echo e(tk1FormatDate2($post->start_casting_date)); ?>"><?php echo e(tk1FormatDate2($post->start_casting_date)); ?></time>
                    </div>
                    <div>
                        <h6 class="sub-heading">End Day of Casting</h6>
                        <time datetime="<?php echo e(tk1FormatDate2($post->end_casting_date)); ?>"><?php echo e(tk1FormatDate2($post->end_casting_date)); ?></time>
                    </div>
                    <div>
                        <h6 class="sub-heading">Start Day of Rehearsal</h6>
                        <time datetime="<?php echo e(tk1FormatDate2($post->start_rehearsal_date)); ?>"><?php echo e(tk1FormatDate2($post->start_rehearsal_date)); ?></time>
                    </div>
                    <div>
                        <h6 class="sub-heading">End Day of Rehearsal</h6>
                        <time datetime="<?php echo e(tk1FormatDate2($post->end_rehearsal_date)); ?>"><?php echo e(tk1FormatDate2($post->end_rehearsal_date)); ?></time>
                    </div>
                    <div>
                        <h6 class="sub-heading">Start Day of Principle Photography</h6>
                        <time datetime="<?php echo e(tk1FormatDate2($post->start_photo_date)); ?>"><?php echo e(tk1FormatDate2($post->start_photo_date)); ?></time>
                    </div>
                    <div>
                        <h6 class="sub-heading">End Day of Principle Photography</h6>
                        <time datetime="<?php echo e(tk1FormatDate2($post->end_photo_date)); ?>"><?php echo e(tk1FormatDate2($post->end_photo_date)); ?></time>
                    </div>
                </div>
            </div>

            <div class="content-wrap redo-wrap">
                <h5 class="heading">Casting Contact</h5>
                <div class="dgrid col-2">
                    <div>
                        <h6 class="sub-heading">Director’s Name</h6>
                        <p><?php echo e($post->director); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Producer’s Name</h6>
                        <p><?php echo e($post->producer); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Contact Person</h6>
                        <p><?php echo e($post->contact_name); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Phone</h6>
                        <p><?php echo e($post->contact_phone); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">email</h6>
                        <p><?php echo e($post->contact_email); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_project_detail.blade.php ENDPATH**/ ?>