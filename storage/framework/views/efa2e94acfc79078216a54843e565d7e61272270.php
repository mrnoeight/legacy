

<?php $__env->startSection('title', 'Role Detail'); ?>

<?php $__env->startSection('hidden_page', 'Role Detail'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->

<main id="page-redo-role-details">
    <input type="hidden" id="page-id" value="page-redo-role-details" />
    <section class="details-banner wrap-1200">
        <header class="top-ctr">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('casting_board')); ?>">Casting Board</a></li>
                <li><a href="<?php echo e(route('project_detail', ['id'=>$role->post_id, 'slug'=>$role->post->slug])); ?>"><?php echo e($role->post->name); ?></a></li>
                <li><?php echo e($role->name); ?></li>
            </ul>
            <time datetime="<?php echo e(tk1FormatDate2($role->created_at)); ?>"><span class="mb-hide">Posted Date:&nbsp;</span><?php echo e(tk1FormatDate2($role->created_at)); ?></time>
        </header>

        <div class="intro-wrap no-img">
            <div class="intro-content">
                <h3 class="heading"><?php echo e($role->name); ?></h3>
                <div class="info col-1">
                    <h5><b>Project:</b>&nbsp;<a href="<?php echo e(route('project_detail', ['id'=>$role->post_id, 'slug'=>$role->post->slug])); ?>" class="gold-link"><?php echo e($role->post->name); ?></a></h5>
                    <h5><b>Role type:</b>&nbsp;<?php echo e($role->role_type); ?></h5>
                    <h5><b>Genre:</b>&nbsp;<?php echo e($role->gender); ?></h5>
                    <h5><b>Age Range:</b>&nbsp;<?php echo e($role->age_range); ?></h5>
                    <h5><b>Location:</b>&nbsp;<?php echo e($role->city); ?></h5>
                </div>
                <div class="btn-wrap">
                    <a href="<?php echo e(route('role_submission', ['id'=>$role->id])); ?>" class="btn-gold-arrow">Submit To Role</a>
                </div>
            </div>
        </div>
    </section>

    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <ul class="tab-header">
                <li><a href="#" class="active">role details</a></li>
                <li><a href="<?php echo e(route('project_break', ['id'=>$role->post->id, 'slug'=>$role->post->slug])); ?>">role Breakdown (<?php echo e($role->post->prole->count()); ?>)</a></li>
            </ul>

            <div class="content-wrap editor-wrap">
                <h5>Submission deadline</h5>
                <table>
                    <tr>
                        <td colspan="2"><strong>Submission deadline:</strong>&nbsp;<time
                                datetime="<?php echo e(tk1FormatDate2($role->expired_date)); ?>"><?php echo e(tk1FormatDate2($role->expired_date)); ?></time></td>
                    </tr>
                    <tr>
                        <td><strong>Casting start:</strong>&nbsp;<time datetime="<?php echo e(tk1FormatDate2($role->start_casting_date)); ?>"><?php echo e(tk1FormatDate2($role->start_casting_date)); ?></time></td>
                        <td><strong>End: </strong> <time datetime="<?php echo e(tk1FormatDate2($role->end_casting_date)); ?>"><?php echo e(tk1FormatDate2($role->end_casting_date)); ?></time></td>
                    </tr>
                    <tr>
                        <td><strong>Rehearsal start:</strong>&nbsp;<time datetime="<?php echo e(tk1FormatDate2($role->start_rehearsal_date)); ?>"><?php echo e(tk1FormatDate2($role->start_rehearsal_date)); ?></time></td>
                        <td><strong>End: </strong> <time datetime="<?php echo e(tk1FormatDate2($role->end_rehearsal_date)); ?>"><?php echo e(tk1FormatDate2($role->end_rehearsal_date)); ?></time></td>
                    </tr>
                    <tr>
                        <td><strong>Principal Photography start:</strong>&nbsp;<time
                                datetime="<?php echo e(tk1FormatDate2($role->start_photo_date)); ?>"><?php echo e(tk1FormatDate2($role->start_photo_date)); ?></time></td>
                        <td><strong>End: </strong>&nbsp;<time datetime="<?php echo e(tk1FormatDate2($role->end_photo_date)); ?>"><?php echo e(tk1FormatDate2($role->end_photo_date)); ?></time></td>
                    </tr>
                </table>
                <h5>Role Summary</h5>
                <p><?php echo e($role->description); ?></p>
                <!-- <h5>Additional Rate Details</h5>
                <p>Rate will be a buyout. Details upon NDA<br />Upon applying, we will send an NDA to talent.</p>
                <h5>Skills Recommended For This Role</h5>
                <p>Improvisation<br />General</p>
                <h5>Requested Media</h5>
                <p>Photo or video<br />Please include 3 photos of yourself traveling; in the airport, on a plane, or
                    other. Remember, we would like to see the different things that people deal with when traveling.
                    Show us something different!</p>
                <h5>Requesting Submissions From</h5>
                <p>CANADA, UNITED KINGDOM, IRELAND, AUSTRALIA, SPAIN, FRANCE, NEW ZEALAND, MEXICO, SOUTH AFRICA,
                    ARGENTINA, BRAZIL, CHILE, COLOMBIA, PERU, VENEZUELA</p> -->
            </div>

            <div class="content-wrap editor-wrap">
                <h5>Casting Contact</h5>
                <table>
                    <tr>
                        <td><strong>Director’s Name</strong></td>
                        <td><?php echo e($role->post->director); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Producer’s Name</strong></td>
                        <td><?php echo e($role->post->producer); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Contact Person</strong></td>
                        <td><?php echo e($role->post->contact_name); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Phone</strong></td>
                        <td><?php echo e($role->post->contact_phone); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td><?php echo e($role->post->contact_email); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/role_detail_new.blade.php ENDPATH**/ ?>