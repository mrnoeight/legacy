

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
                    <a href="#"
                        class="icon-list js-active"><i></i><i></i><i></i></a>
                    <a href="<?php echo e(route('client_submitted_role', ['id'=>$role->id])); ?>" class="icon-grid"><i></i><i></i><i></i></a>
                </div>
            </div>

            <div id="project-list" class="full-w">

                <ul class="project-list type-2 page-sm">
                    <lh>
                        <div class="project-header type-2">
                            <figure>
                                <div class="chx-wrap">
                                    <div class="holder"><input type="checkbox" class="chx-all" name="row" /></div>
                                </div>
                                <figcaption class="project-name">
                                    <b>Talent</b>
                                    <div class="btn-wrap">
                                        <a href="#" role="button" class="btn-action">Action<i></i></a>
                                        <form class="row-ctr" data-url="<?php echo e(route('client_action_request')); ?>">
                                            <input type="hidden" name="talent-id" value="id-0" />
                                            <div class="chx-wrap">
                                                <div class="holder">
                                                    <input type="checkbox" name="hire-take1-tape" id="chx-take1-tape">
                                                    <label for="chx-take1-tape"><img src="img/video/take1-tape.svg"
                                                            alt="Take1 Tape">Take1 Tape</label>
                                                </div>
                                                <p class="warning"></p>
                                            </div>
                                            <div class="chx-wrap">
                                                <div class="holder">
                                                    <input type="checkbox" name="hire-self-tape" id="chx-self-tape">
                                                    <label for="chx-self-tape"><img src="img/video/self-tape.svg"
                                                            alt="Self Tape">Self Tape</label>
                                                </div>
                                                <p class="warning"></p>
                                            </div>
                                            <div class="chx-wrap">
                                                <div class="holder">
                                                    <input type="checkbox" name="hire-self-audition"
                                                        id="chx-self-audition">
                                                    <label for="chx-self-audition"><img
                                                            src="img/video/self-audition.svg" alt="Self Audition">Self
                                                        Audition</label>
                                                </div>
                                                <p class="warning"></p>
                                            </div>
                                            <a href="#" role="button" class="btn-gold type-2 btn-submit cta">request</a>
                                            <a href="#" role="button" class="btn-red type-2 cta">decline</a>
                                        </form>
                                    </div>
                                </figcaption>

                            </figure>

                            <ul class="info">
                                <li>Career</li>
                                <li>Experiences</li>
                                <li>Appearance</li>
                            </ul>
                            <div class="btn-wrap">Action</div>
                        </div>
                    </lh>
                    <?php $__currentLoopData = $role->submission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <div class="project-header">
                            <figure class="flex-center">
                                <div class="chx-wrap">
                                    <div class="holder"><input type="checkbox" class="chx-row" name="row[0]" /></div>
                                </div>
                                <div class="img-wrap"><img src="<?php echo e($sub->registration->cover_url); ?>" alt="<?php echo e($sub->registration->name); ?>" />
                                </div>
                                <figcaption class="project-name">
                                    <b class="title" title="<?php echo e($sub->registration->name); ?>"><a href="<?php echo e(route('client_talent_detail', ['talent_id'=>$sub->registration_id, 'role_id'=>$role->id])); ?>"><?php echo e($sub->registration->name); ?></a></b>
                                    <span>Male | Age: <?php echo e($sub->registration->age_from); ?> - <?php echo e($sub->registration->age_to); ?> <strong class="status yellow">recommend</strong></span>
                                </figcaption>
                            </figure>
                            <ul class="info">
                                <li><b><?php echo e($sub->registration->getCareerList(' | ')); ?></b><i><?php echo e($sub->registration->hometown); ?></i></li>
                                <!-- <li><b>Professional</b><i>3 years</i></li> -->
                                <li><b>Height: <?php echo e($sub->registration->height); ?> cm</b><i>Weight: <?php echo e($sub->registration->weight); ?> kg</i></li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" role="button" class="btn-action">Action<i></i></a>
                                <form class="row-ctr" data-url="json/submit-talent-action-pass.json">
                                    <input type="hidden" name="talent-id" value="id-0" />
                                    <div class="chx-wrap">
                                        <div class="holder">
                                            <input type="checkbox" name="hire-take1-tape" id="chx-take1-tape-0" />
                                            <label for="chx-take1-tape-0"><img src="<?php echo e(asset('assets/img/video/take1-tape.svg')); ?>"
                                                    alt="Take1 Tape">Take1 Tape</label>
                                        </div>
                                        <p class="warning"></p>
                                    </div>
                                    <div class="chx-wrap">
                                        <div class="holder">
                                            <input type="checkbox" name="hire-self-tape" id="chx-self-tape-0" />
                                            <label for="chx-self-tape-0"><img src="<?php echo e(asset('assets/img/video/self-tape.svg')); ?>"
                                                    alt="Self Tape">Self Tape</label>
                                        </div>
                                        <p class="warning"></p>
                                    </div>
                                    <div class="chx-wrap">
                                        <div class="holder">
                                            <input type="checkbox" name="hire-self-audition" id="chx-self-audition-0" />
                                            <label for="chx-self-audition-0"><img src="<?php echo e(asset('assets/img/video/self-audition.svg')); ?>"
                                                    alt="Self Audition">Self Audition</label>
                                        </div>
                                        <p class="warning"></p>
                                    </div>
                                    <a href="#" role="button" class="btn-gold type-2 btn-submit cta">request</a>
                                    <a href="#" role="button" class="btn-red type-2 cta">decline</a>
                                </form>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </ul>

                <!-- <nav class="paging-project">
                    <a href="45-p2-client-role-details-submitted-list.html" role="button" class="btn-prev"
                        title="Previous"><i></i></a>
                    <a href="45-p2-client-role-details-submitted-list.html" role="button" class="number active"
                        title="page 1"><b>1</b></a>
                    <a href="45-p2-client-role-details-submitted-list.html" role="button" class="number"
                        title="page 2"><b>2</b></a>
                    <a href="45-p2-client-role-details-submitted-list.html" role="button" class="number"
                        title="page 3"><b>3</b></a>
                    <b>...</b>
                    <a href="45-p2-client-role-details-submitted-list.html" role="button" class="number"
                        title="page 3"><b>7</b></a>
                    <a href="45-p2-client-role-details-submitted-list.html" role="button" class="btn-next"
                        title="Next"><i></i></a>
                </nav> -->
            </div>



        </div>
    </article>
</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_submitted_role_list.blade.php ENDPATH**/ ?>