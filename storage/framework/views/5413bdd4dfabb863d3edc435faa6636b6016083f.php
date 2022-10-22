

<?php $__env->startSection('title', 'Submitted Roles'); ?>

<?php $__env->startSection('hidden_page', 'Submitted Roles'); ?>

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
                    <a href="#" class="btn-border-gold cta" role="button"><i class="icon-plus"></i>add talent</a>
                    <a href="#" class="btn-gold-arrow cta" role="button">Publish</a>
                </div>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                    <li><a href="<?php echo e(route('client_role_detail', ['id'=>$role->id])); ?>">Role details</a></li>
                    <li><a href="#" class="active">Submited <span class="hl">(<?php echo e($role->submission->count()); ?>)</span></a></li>
                    <li><a href="<?php echo e(route('client_requested_role', ['id'=>$role->id])); ?>">Requested <span class="hl">(<?php echo e($role->requested_roles->count()); ?>)</span></a>
                    </li>
                    <li><a href="<?php echo e(route('client_selected_role', ['id'=>$role->id])); ?>">Selected <span class="hl">(<?php echo e($role->selected_roles->count()); ?>)</span></a></li>
                </ul>
            </div>

            <div class="dflex">
                <div class="p2-form-wrap">
                    <form class="form-search" id="form-search">
                        <div class="input-wrap input-p2">
                            <div class="holder">
                                <input name="search" id="search" type="text" class="input" autocomplete="off" />
                                <label class="txt-label" for="search">search for talent</label>
                            </div>
                            <p class="warning"></p>
                        </div>
                    </form>

                    <form class="form-filter" id="form-filter">
                        <strong style="display:none">Filter:</strong>
                        <strong style="display:none">Sort By</strong>
                        <div class="input-wrap input-sel input-p2">
                            <div class="holder">
                                <input type="hidden" name="sort-gender" />
                                <input id="sort-gender" type="text" class="input" autocomplete="off" readonly />
                                <label class="txt-label" for="sort-gender">Gender</label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li data-value="Male">Male</li>
                                <li data-value="Female">Female</li>
                            </ul>
                        </div>
                        <div class="input-wrap input-sel input-p2">
                            <div class="holder">
                                <input type="hidden" name="sort-age" />
                                <input id="sort-age" type="text" class="input" autocomplete="off" readonly />
                                <label class="txt-label" for="sort-age">Age</label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li data-value="Newest">Newest</li>
                                <li data-value="Oldest">Oldest</li>
                            </ul>
                        </div>
                        <button class="btn-icon" type="submit"></button>
                    </form>


                </div>
                <div class="view-ctr">
                    <strong>View</strong>
                    <a href="<?php echo e(route('client_submitted_role', ['id'=>$role->id, 'list'=>'list'])); ?>" class="icon-list"><i></i><i></i><i></i></a>
                    <a href="#"
                        class="icon-grid js-active"><i></i><i></i><i></i></a>
                </div>
            </div>

            <div id="project-list" class="full-w">
                <div class="casting-board project-list">
                    <ul class="list-post col-6">
                        <?php $__currentLoopData = $role->submission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="item casting-card type-4">
                            <a href="#" class="img-wrap">
                                <img class="main-img" src="<?php echo e($sub->registration->cover_url); ?>" alt="<?php echo e($sub->registration->name); ?>">
                                <!-- <strong class="status yellow">recommend</strong> -->
                            </a>
                            <div class="content">
                                <h5 class="heading"><?php echo e($sub->registration->name); ?></h5>
                                <p class="info">
                                    <span>Age:&nbsp;<?php echo e($sub->registration->age_from); ?> - <?php echo e($sub->registration->age_to); ?></span>
                                    <span><?php echo e($sub->registration->getCareerList(' | ')); ?></span>
                                </p>
                                <div class="btn-wrap">
                                    <?php if($sub->status == 'PENDING'): ?>
                                    <a href="#" role="button" class="btn-action">Action<i></i></a>
                                    <form class="row-ctr" data-url="<?php echo e(route('client_action_request')); ?>">
                                        <input type="hidden" name="sub-id" value="<?php echo e($sub->id); ?>" />
                                        <input type="hidden" id="talent-action-<?php echo e($sub->id); ?>" name="talent-action" value="" />
                                        <div class="chx-wrap">
                                            <div class="holder">
                                                <input type="checkbox" name="hire-take1-tape" id="chx-take1-tape-7">
                                                <label for="chx-take1-tape-7"><img src="<?php echo e(asset('assets/img/video/take1-tape.svg')); ?>"
                                                        alt="Take1 Tape">Take1 Tape</label>
                                            </div>
                                            <p class="warning"></p>
                                        </div>
                                        <div class="chx-wrap">
                                            <div class="holder">
                                                <input type="checkbox" name="hire-self-tape" id="chx-self-tape-7">
                                                <label for="chx-self-tape-7"><img src="<?php echo e(asset('assets/img/video/self-tape.svg')); ?>"
                                                        alt="Self Tape">Self Tape</label>
                                            </div>
                                            <p class="warning"></p>
                                        </div>
                                        <div class="chx-wrap">
                                            <div class="holder">
                                                <input type="checkbox" name="hire-self-audition"
                                                    id="chx-self-audition-7">
                                                <label for="chx-self-audition-7"><img src="<?php echo e(asset('assets/img/video/self-audition.svg')); ?>"
                                                        alt="Self Audition">Self Audition</label>
                                            </div>
                                            <p class="warning"></p>
                                        </div>
                                        <a href="#" role="button" data-id="<?php echo e($sub->id); ?>" class="btn-gold type-2 btn-submit btnRequest cta">request</a>
                                        <a href="#" role="button" data-id="<?php echo e($sub->id); ?>" class="btn-red type-2 btnDecline cta">decline</a>
                                    </form>
                                    <?php else: ?>
                                    <strong class="status <?php echo e(tk1GetRoleStatusColor($sub->status)); ?>"><?php echo e($sub->status); ?></strong>
                                    <?php endif; ?> 
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <!-- <nav class="paging-project">
                    <a href="45-p2-client-role-details-submitted-grid.html" role="button" class="btn-prev"
                        title="Previous"><i></i></a>
                    <a href="45-p2-client-role-details-submitted-grid.html" role="button" class="number active"
                        title="page 1"><b>1</b></a>
                    <a href="45-p2-client-role-details-submitted-grid.html" role="button" class="number"
                        title="page 2"><b>2</b></a>
                    <a href="45-p2-client-role-details-submitted-grid.html" role="button" class="number"
                        title="page 3"><b>3</b></a>
                    <b>...</b>
                    <a href="45-p2-client-role-details-submitted-grid.html" role="button" class="number"
                        title="page 3"><b>7</b></a>
                    <a href="45-p2-client-role-details-submitted-grid.html" role="button" class="btn-next"
                        title="Next"><i></i></a>
                </nav> -->
            </div>



        </div>
    </article>
</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_submitted_role.blade.php ENDPATH**/ ?>