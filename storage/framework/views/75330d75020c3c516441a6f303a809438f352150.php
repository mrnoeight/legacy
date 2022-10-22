

<?php $__env->startSection('title', 'Client Account'); ?>

<?php $__env->startSection('hidden_page', 'Client Account'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-p2-client-manage-project">
    <input type="hidden" id="page-id" value="page-p2-client-manage-project" />
    <article class="main-article pd-ctr pt-0">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap type-2">
                <header>
                    <h4 class="main-heading type-4">Manage Project</h4>
                    <a href="<?php echo e(route('client_new_project')); ?>" class="btn-border-gold type-3 cta" role="button">add new project<i class="icon-plus"></i></a>
                </header>

                <ul class="tab-header">
                    <li><a href="#" class="active">All</a></li>
                    <li><a href="#">Active</a></li>
                    <li><a href="#">Pending</a></li>
                    <li><a href="#">Completed</a></li>
                    <li><a href="#">Archive</a></li>
                </ul>

                <div class="p2-form-wrap">
                    <form class="form-search" id="form-search">
                        <div class="input-wrap input-p2">
                            <div class="holder">
                                <input name="search" id="search" type="text" class="input" autocomplete="off"/>
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
                                <input type="hidden" name="sort-type"/>
                                <input id="sort-type" type="text" class="input" autocomplete="off" readonly/>
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
                                <input type="hidden" name="sort-date"/>
                                <input id="sort-date" type="text" class="input" autocomplete="off" readonly/>
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

                <ul class="project-list type-2 fix-w">
                    <lh>
                        <div class="project-header type-2">
                            <figure>
                                <figcaption class="project-name lh">Project Name</figcaption>
                                <div class="img-wrap"></div>
                            </figure>
                            <ul class="info">
                                <li>deadline</li>
                                <li>Production</li>
                                <li>roles</li>
                                <li>Submitted</li>
                            </ul>
                            <div class="btn-wrap">status</div>
                        </div>
                    </lh>
                    <?php $__currentLoopData = $client->company->post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $post->loadCount('prole');
                            $post->loadCount('submissions');
                        ?>
                    <li>
                        <div class="project-header">
                            <figure>
                                <div class="img-wrap"><img src="<?php echo e($post->thumb_url); ?>" alt="<?php echo e($post->name); ?>"/></div>
                                <figcaption class="project-name">
                                    <b class="title" title="<?php echo e($post->name); ?>"><a href="<?php echo e(route('client_project_detail', ['id' => $post->id])); ?>"><?php echo e($post->name); ?></a></b>
                                    <a class="sublink" href="<?php echo e(route('client_project_detail', ['id' => $post->id])); ?>#"><?php echo e($post->type); ?></a>
                                    <span>|</span>
                                    <a class="sublink" href="<?php echo e(route('client_project_detail', ['id' => $post->id])); ?>"><?php echo e($post->genre); ?></a>
                                </figcaption>
                            </figure>
                            <ul class="info">
                                <li><b><?php echo e(tk1FormatDate($post->start_casting_date)); ?></b><i>in <?php echo e(tk1BetweenDates($post->start_casting_date, $post->end_casting_date)); ?></i></li>
                                <li><b><?php echo e($post->producer); ?></b><i><?php echo e($post->director); ?></i></li>
                                <li><b><?php echo e($post->prole_count); ?></b><i>Roles</i></li>
                                <li><b><?php echo e($post->submissions_count); ?></b><i>Submitted</i></li>
                            </ul>
                            <div class="btn-wrap">
                                <strong class="status <?php echo e(tk1StatusPostColor($post->status)); ?>"><?php echo e($post->status); ?></strong>
                                <button class="btn-more"><i></i></button>
                                <ul class="row-ctr">
                                    <li><a href="#" role="button" class="btn-pending"><b>Pending Project</b></a></li>
                                    <li><a href="#" role="button" class="flex-center btn-archive"><b>Archive Project</b></a></li>
                                    <li><a href="#" role="button" class="flex-center btn-delete"><b>Delete Project</b></a></li>
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

                <figure class="no-item type-2">
                    <img src="<?php echo e(asset('assets/img/bg/role-empty.svg')); ?>" alt="role empty">
                    <figcaption>
                        <b>Your project is emty. Add project to see details!</b>
                        <a href="<?php echo e(route('client_new_project')); ?>" class="btn-border-gold type-3 cta" role="button">add new project<i
                                class="icon-plus"></i></a>
                    </figcaption>
                </figure>
            </div>

        </div>
    </article>


</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_project.blade.php ENDPATH**/ ?>