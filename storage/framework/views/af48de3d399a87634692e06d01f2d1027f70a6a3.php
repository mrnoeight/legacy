

<?php $__env->startSection('title', 'Manage Roles'); ?>

<?php $__env->startSection('hidden_page', 'Manage Roles'); ?>

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
                    <li><strong class="<?php echo e(tk1StatusPostColor($post->status)); ?>"><?php echo e($post->status); ?></strong></li>
                    <li><?php echo e($post->type); ?></li>
                    <li><?php echo e($post->genre); ?></li>
                </ul>
                <div class="btn-flex-wrap">
                    <a href="<?php echo e(route('client_new_role', ['id'=>$post->id])); ?>" class="btn-border-gold cta"
                        role="button"><i class="icon-plus"></i>add new role</a>
                    <a href="#" class="btn-gold-arrow cta" role="button">Publish</a>
                </div>
            </div>

            <div class="content-wrap type-2">
                <div class="xscroll">
                    <ul class="tab-header">
                        <li><a href="<?php echo e(route('client_project_detail', ['id'=>$post->id])); ?>">Project details</a></li>
                        <li><a href="#" class="active">Manage Roles <span
                                    class="hl">(<?php echo e($post->prole->count()); ?>)</span></a></li>
                    </ul>
                </div>

                <div class="p2-form-wrap">
                    <form class="form-search" id="form-search">
                        <div class="input-wrap input-p2">
                            <div class="holder">
                                <input name="search" id="search" type="text" class="input" autocomplete="off" />
                                <label class="txt-label" for="search">search for project</label>
                            </div>
                            <p class="warning"></p>
                        </div>
                    </form>

                    <form class="form-filter" id="form-filter">
                        <strong style="display:none">Filter:</strong>
                        <strong>Sort By</strong>
                        <div class="input-wrap input-sel input-p2">
                            <div class="holder">
                                <input type="hidden" name="sort-type" />
                                <input id="sort-type" type="text" class="input" autocomplete="off" readonly />
                                <label class="txt-label" for="sort-type">Project Type</label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li data-value="Option 1">Option 1</li>
                                <li data-value="Option 2">Option 2</li>
                                <li data-value="Option 3">Option 3</li>
                            </ul>
                        </div>
                        <div class="input-wrap input-sel input-p2">
                            <div class="holder">
                                <input type="hidden" name="sort-date" />
                                <input id="sort-date" type="text" class="input" autocomplete="off" readonly />
                                <label class="txt-label" for="sort-date">Date</label>
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

                <div id="project-list" class="full-w">
                    <ul class="project-list type-2 fix-w">
                        <lh>
                            <div class="project-header type-2">
                                <figure>
                                    <div class="chx-wrap chx-row">
                                        <div class="holder"><input type="checkbox" class="chx-all" name="row" /></div>
                                    </div>
                                    <figcaption class="project-name">ROLE NAME</figcaption>
                                </figure>
                                <ul class="info">
                                    <li>deadline</li>
                                    <li>Salary</li>
                                    <li>Submitted</li>
                                    <li>Selected</li>
                                </ul>
                                <div class="btn-wrap">status</div>
                            </div>
                        </lh>
                        <?php $__currentLoopData = $post->prole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $role->loadCount('submission');
                                $role->loadCount('selected_roles');
                            ?>
                        <li>
                            <div class="project-header">
                                <figure>
                                    <div class="chx-wrap">
                                        <div class="holder"><input type="checkbox" class="chx-row" name="row[4]" />
                                        </div>
                                    </div>
                                    <figcaption class="project-name">
                                        <b class="title" title="<?php echo e($role->name); ?>"><a
                                                href="<?php echo e(route('client_role_detail', ['id'=>$role->id])); ?>"><?php echo e($role->name); ?></a></b>
                                        <span><?php echo e($role->role_type); ?> | <?php echo e($role->gender); ?> | age: <?php echo e($role->age_range); ?></span>
                                    </figcaption>
                                </figure>
                                <ul class="info">
                                    <li><b><?php echo e(tk1FormatDate($role->start_casting_date)); ?></b><i>in <?php echo e(tk1BetweenDates($role->start_casting_date, $role->end_casting_date)); ?></i></li>
                                    <li><b>$<?php echo e($role->role_fee_min); ?></b><!--i>High</i--></li>
                                    <li><b><?php echo e($role->submission_count); ?></b><i>Submitted</i></li>
                                    <li>
                                        <b class="img-talent">
                                            <img src="<?php echo e(asset('assets/img/our-talent/no-avatar.svg')); ?>" alt="No Avatar" />
                                        </b>
                                        <i><?php echo e($role->selected_roles_count); ?> Request</i>
                                    </li>
                                </ul>
                                <div class="btn-wrap">
                                    <strong class="status blue">in progress</strong>
                                    <button class="btn-more"><i></i></button>
                                    <ul class="row-ctr">
                                        <li><a href="#" role="button" class="btn-pending"><b>Pending Project</b></a>
                                        </li>
                                        <li><a href="#" role="button" class="flex-center btn-archive"><b>Archive
                                                    Project</b></a></li>
                                        <li><a href="#" role="button" class="flex-center btn-delete"><b>Delete
                                                    Project</b></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <!-- <nav class="paging-project">
                        <a href="#" role="button" class="btn-prev" title="Previous"><i></i></a>
                        <a href="#" role="button" class="number active" title="page 1"><b>1</b></a>
                        <a href="#" role="button" class="number" title="page 2"><b>2</b></a>
                        <a href="#" role="button" class="number" title="page 3"><b>3</b></a>
                        <b>...</b>
                        <a href="#" role="button" class="number" title="page 3"><b>7</b></a>
                        <a href="#" role="button" class="btn-next" title="Next"><i></i></a>
                    </nav> -->
                </div>
            </div>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_manage_role.blade.php ENDPATH**/ ?>