

<?php $__env->startSection('title', 'Client Role Detail'); ?>

<?php $__env->startSection('hidden_page', 'Client Role Detail'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-p2-client-role-details">
    <input type="hidden" id="page-id" value="page-p2-client-role-details" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">

            <div class="content-wrap redo-wrap type-2 p2-header-wrap">
                <header>
                    <ul class="breadcrumb full-w">
                        <li><a href="<?php echo e(route('client_casting_board')); ?>">Manage Project</a></li>
                        <li><a href="<?php echo e(route('client_project_detail', ['id'=>$role->post->id])); ?>">Project Details</a></li>
                        <li><a href="<?php echo e(route('client_manage_role', ['id'=>$role->post->id])); ?>">Manage Roles</a></li>
                    </ul>
                    <h4 class="main-heading type-4"><?php echo e($role->name); ?></h4>
                </header>
                <ul class="info">
                    <li><strong class="blue">in process</strong></li>
                    <li><?php echo e($role->role_type); ?></li>
                    <li><?php echo e($role->age_range); ?></li>
                    <li><?php echo e($role->gender); ?></li>
                </ul>
                <time class="time" datetime="<?php echo e(tk1FormatDate2($role->expired_date)); ?>"><span class="mb-480-hide">Submissions Due&nbsp;</span> <?php echo e(tk1FormatDate($role->expired_date)); ?> | Posted
                <?php echo e(tk1FormatDate($role->created_at)); ?></time>
                <div class="btn-flex-wrap">
                    <a href="<?php echo e(route('client_edit_role', ['id'=>$role->id])); ?>" class="btn-border-gold cta" role="button"><i class="icon-plus"></i>edit role</a>
                    <a href="#" class="btn-border-gold cta" role="button"><i class="icon-plus"></i>add talent</a>
                    <a href="#" class="btn-gold-arrow cta" role="button">Publish</a>
                </div>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                    <li><a class="active" href="#">Role details</a></li>
                    <li><a href="<?php echo e(route('client_submitted_role', ['id'=>$role->id])); ?>">Submited <span class="hl">(<?php echo e($role->submission->count()); ?>)</span></a></li>
                    <li><a href="<?php echo e(route('client_requested_role', ['id'=>$role->id])); ?>">Requested <span class="hl">(<?php echo e($role->requested_roles->count()); ?>)</span></a>
                    </li>
                    <li><a href="<?php echo e(route('client_selected_role', ['id'=>$role->id])); ?>">Selected <span class="hl">(<?php echo e($role->selected_roles->count()); ?>)</span></a></li>
                </ul>
            </div>

            <div class="content-wrap editor-wrap">
                <h5>General Role Information</h5>
                <table>
                    <tr>
                        <td><strong>Project type:</strong>&nbsp;<?php echo e($role->post->type); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Genre:</strong>&nbsp;<?php echo e($role->post->genre); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Budget:</strong>&nbsp;High budget</td>
                    </tr>
                    <tr>
                        <td><strong>Location:</strong>&nbsp;<?php echo e($role->post->other_location); ?></td>
                    </tr>
                </table>

                <h5>Submission deadline</h5>
                <table>
                    <tr>
                        <td colspan="2"><strong>Submission deadline:</strong>&nbsp;<time
                                datetime="<?php echo e(tk1FormatDate($role->expired_date)); ?>"><?php echo e(tk1FormatDate($role->expired_date)); ?></time></td>
                    </tr>
                    <tr>
                        <td><strong>Casting start:</strong>&nbsp;<time datetime="<?php echo e(tk1FormatDate($role->start_casting_date)); ?>"><?php echo e(tk1FormatDate($role->start_casting_date)); ?></time></td>
                        <td><strong>End: </strong> <time datetime="<?php echo e(tk1FormatDate($role->end_casting_date)); ?>"><?php echo e(tk1FormatDate($role->end_casting_date)); ?></time></td>
                    </tr>
                    <tr>
                        <td><strong>Rehearsal start:</strong>&nbsp;<time datetime="<?php echo e(tk1FormatDate($role->start_rehearsal_date)); ?>"><?php echo e(tk1FormatDate($role->start_rehearsal_date)); ?></time></td>
                        <td><strong>End: </strong> <time datetime="<?php echo e(tk1FormatDate($role->end_rehearsal_date)); ?>"><?php echo e(tk1FormatDate($role->end_rehearsal_date)); ?></time></td>
                    </tr>
                    <tr>
                        <td><strong>Principal Photography start:</strong>&nbsp;<time
                                datetime="<?php echo e(tk1FormatDate($role->start_photo_date)); ?>"><?php echo e(tk1FormatDate($role->start_photo_date)); ?></time></td>
                        <td><strong>End: </strong>&nbsp;<time datetime="<?php echo e(tk1FormatDate($role->end_photo_date)); ?>"><?php echo e(tk1FormatDate($role->end_photo_date)); ?></time></td>
                    </tr>
                </table>
                <h5>Role Summary</h5>
                <p>We are looking for international travelers with a passion for flying and seeing the world. We???re
                    looking for anyone and everyone with interesting stories and photos or video of their travels. This
                    is a paid opportunity and it will not require much of your time. Please let me know if you???re
                    interested in learning more. Thank you for your time!!!</p>
                <h5>Additional Rate Details</h5>
                <p>Rate will be a buyout. Details upon NDA<br />Upon applying, we will send an NDA to talent.</p>
                <h5>Skills Recommended For This Role</h5>
                <p>Improvisation<br />General</p>
                <h5>Requested Media</h5>
                <p>Photo or video<br />Please include 3 photos of yourself traveling; in the airport, on a plane, or
                    other. Remember, we would like to see the different things that people deal with when traveling.
                    Show us something different!</p>
                <!-- <h5>Requesting Submissions From</h5>
                <p>CANADA, UNITED KINGDOM, IRELAND, AUSTRALIA, SPAIN, FRANCE, NEW ZEALAND, MEXICO, SOUTH AFRICA,
                    ARGENTINA, BRAZIL, CHILE, COLOMBIA, PERU, VENEZUELA</p> -->
            </div>

            <div class="content-wrap redo-wrap">
                <h5 class="heading">Casting Contact</h5>
                <div class="dgrid col-2">
                    <div>
                        <h6 class="sub-heading">Director???s Name</h6>
                        <p><?php echo e($role->post->director); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Producer???s Name</h6>
                        <p><?php echo e($role->post->producer); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Contact Person</h6>
                        <p><?php echo e($role->contact_name); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Phone</h6>
                        <p><?php echo e($role->contact_phone); ?></p>
                    </div>
                    <div>
                        <h6 class="sub-heading">email</h6>
                        <p><?php echo e($role->contact_email); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_role_detail.blade.php ENDPATH**/ ?>