

<?php $__env->startSection('title', 'Manage Roles'); ?>

<?php $__env->startSection('hidden_page', 'Manage Roles'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-p2-talent-manage-roles">
    <input type="hidden" id="page-id" value="page-p2-talent-manage-roles" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap redo-wrap type-2 p2-header-wrap">
                <header>
                    <h4 class="main-heading type-4">Manage Roles</h4>
                </header>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                    <li><a href="53-p2-talent-mange-roles.html" class="active">All&nbsp;<span class="hl">(20)</span></a>
                    </li>
                    <li><a href="53-p2-talent-mange-roles-confirm.html">Confirm&nbsp;<span class="hl">(10)</span></a>
                    </li>
                    <li><a href="53-p2-talent-mange-roles-decline.html">Decline&nbsp;<span class="hl">(3)</span></a>
                    </li>
                </ul>
            </div>

            <div class="p2-form-wrap full-w">
                <form class="form-search" id="form-search">
                    <div class="input-wrap input-p2">
                        <div class="holder">
                            <input name="search" id="search" type="text" class="input" autocomplete="off" />
                            <label class="txt-label" for="search">search for role</label>
                        </div>
                        <p class="warning"></p>
                    </div>
                </form>

                <form class="form-filter" id="form-filter">
                    <strong style="display:none">Filter:</strong>
                    <strong>Sort By</strong>
                    <div class="input-wrap input-sel input-p2">
                        <div class="holder">
                            <input type="hidden" name="sort-response" />
                            <input id="sort-response" type="text" class="input" autocomplete="off" readonly />
                            <label class="txt-label" for="sort-response">Response</label>
                        </div>
                        <p class="warning"></p>
                        <ul class="opt-list">
                            <li data-value="Option 1">Option 1</li>
                            <li data-value="Option 2">Option 2</li>
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

            <div id="project-list" class="full-w">
                <ul class="project-list type-2">
                    <lh>
                        <div class="project-header type-2">
                            <figure>
                                <div class="chx-wrap">
                                    <div class="holder"><input type="checkbox" class="chx-all" name="row" /></div>
                                </div>
                                <figcaption class="project-name"><b>ROLE NAME</b></figcaption>
                            </figure>
                            <ul class="info">
                                <li>DEADLINE</li>
                                <li>TAKE1 TAPE</li>
                                <li>SELF TAPE</li>
                                <li>AUDITION</li>
                            </ul>
                            <div class="btn-wrap">REQUEST</div>
                        </div>
                    </lh>
                    <?php $__currentLoopData = $talent->request_roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="item<?php echo e($req->status == 'declined' ? ' js-disable' : ''); ?>" >
                        <div class="project-header">
                            <figure class="flex-center">
                                <div class="chx-wrap">
                                    <div class="holder"><input type="checkbox" class="chx-row" name="row[0]" /></div>
                                </div>
                                <figcaption class="project-name">
                                    <b class="title" title="<?php echo e($req->prole->name); ?>"><a
                                            href="<?php echo e(route('talent_role_request', ['id'=>$req->id, 'role_id'=>$req->prole_id])); ?>"><?php echo e($req->prole->name); ?></a></b>
                                    <span><?php echo e($req->prole->role_type); ?> | <?php echo e($req->prole->gender); ?> | age:
                                        <?php echo e($req->prole->age_range); ?></span>
                                </figcaption>
                            </figure>
                            <ul class="info">
                                <li><b><?php echo e(tk1FormatDate($req->request_expired_date)); ?></b><i>in
                                        <?php echo e(tk1BetweenDates(date("Y/m/d"), $req->request_expired_date)); ?></i></li>
                                <li class="tape<?php echo e($req->status == 'declined' ? ' js-disable' : ''); ?>">
                                    <img src="<?php echo e(asset('assets/img/video/take1-tape.svg')); ?>" alt="Take1 Tape" />
                                    <p>
                                        <strong
                                            class="status <?php echo e(tk1GetRoleStatusColor($req->request_status_take1)); ?>"><?php echo e(tk1GetRoleStatus($req->request_status_take1)); ?></strong>
                                        <time
                                            datetime="<?php echo e($req->request_status_take1); ?>"><?php echo e(tk1FormatDate($req->request_date_take1)); ?></time>
                                    </p>
                                </li>
                                <li class="tape<?php echo e($req->status == 'declined' ? ' js-disable' : ''); ?>">
                                    <?php if($req->self_url != ''): ?>
                                    <button class="btn-play" data-poster="" data-src="<?php echo e($req->self_url); ?>"><img src="<?php echo e(asset('assets/img/video/take1-tape.svg')); ?>" alt="Take1 Tape"/></button>
                                    <?php elseif($req->request_date_self != ''): ?>
                                    <button class="btn-upload" data-id="<?php echo e($req->id); ?>"
                                        data-type="video/mp4,video/ogg,video/webm" data-max="200"><img
                                            src="<?php echo e(asset('assets/img/form/more-vid.svg')); ?>"
                                            alt="Upload Your Video" /></button>
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('assets/img/video/self-tape-gray.svg')); ?>" alt="Self Tape" />
                                    <?php endif; ?>
                                    <p>
                                        <strong
                                            class="status <?php echo e(tk1GetRoleStatusColor($req->request_status_self)); ?>"><?php echo e(tk1GetRoleStatus($req->request_status_self)); ?></strong>
                                        <time
                                            datetime="<?php echo e($req->request_date_self); ?>"><?php echo e(tk1FormatDate($req->request_date_self)); ?></time>
                                    </p>
                                </li>
                                <li class="tape<?php echo e($req->status == 'declined' ? ' js-disable' : ''); ?>">
                                    <?php if($req->audition_url != ''): ?>
                                    <button class="btn-play" data-poster="<?php echo e($req->registration->cover_url); ?>" data-src="<?php echo e($req->audition_url); ?>"><img src="<?php echo e(asset('assets/img/our-talent/submit-img-4.png')); ?>" alt="Submited Video"/></button>
                                    <?php elseif($req->request_date_audition != ''): ?>
                                    <button class="btn-upload" data-id="<?php echo e($req->id); ?>" data-type="audio/mpeg"
                                        data-max="100"><img src="<?php echo e(asset('assets/img/video/self-audition-gray.svg')); ?>"
                                            title="Upload Your Audition" /></button>
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('assets/img/video/self-audition-gray.svg')); ?>" alt="Self Audition" />
                                    <?php endif; ?>
                                    <p>
                                        <strong
                                            class="status <?php echo e(tk1GetRoleStatusColor($req->request_status_audition)); ?>"><?php echo e(tk1GetRoleStatus($req->request_status_audition)); ?></strong>
                                        <time
                                            datetime="<?php echo e($req->request_date_audition); ?>"><?php echo e(tk1FormatDate($req->request_date_audition)); ?></time>
                                    </p>
                                </li>
                            </ul>
                            <div class="btn-wrap">
                                <?php if($req->status == 'requested'): ?>
                                <a href="#" role="button" class="btn-action">Request<i></i></a>
                                <form class="row-ctr" data-url="">
                                    <input type="hidden" name="role-id" value="id-0" />
                                    <a href="#" role="button" class="btn-blue type-2 cta btn-submit responseBut"
                                        data-id="<?php echo e($req->id); ?>" data-answer="confirmed">confirm</a>
                                    <a href="#" role="button" class="btn-red type-2 cta responseBut"
                                        data-id="<?php echo e($req->id); ?>" data-answer="declined">decline</a>
                                </form>
                                <?php else: ?>
                                <strong
                                    class="status <?php echo e(tk1GetRoleStatusColor($req->status)); ?>"><?php echo e($req->status); ?></strong>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                <!-- <nav class="paging-project">
                    <a href="45-p2-client-role-details-requested.html" role="button" class="btn-prev"
                        title="Previous"><i></i></a>
                    <a href="45-p2-client-role-details-requested.html" role="button" class="number active"
                        title="page 1"><b>1</b></a>
                    <a href="45-p2-client-role-details-requested.html" role="button" class="number"
                        title="page 2"><b>2</b></a>
                    <a href="45-p2-client-role-details-requested.html" role="button" class="number"
                        title="page 3"><b>3</b></a>
                    <b>...</b>
                    <a href="45-p2-client-role-details-requested.html" role="button" class="number"
                        title="page 3"><b>7</b></a>
                    <a href="45-p2-client-role-details-requested.html" role="button" class="btn-next"
                        title="Next"><i></i></a>
                </nav> -->
            </div>



        </div>
    </article>
</main>
<!-- END MAIN PAGE -->

<div id="popup-loading">
  <div class="dot-wrap">
    <b></b><b></b><b></b><b></b><b></b>
    <b></b><b></b><b></b><b></b><b></b>
  </div>
</div>

<div id="popup-alert" class="popup-content">
  <div class="main-content">
    <a href="#" role="button" class="btn-close"><i></i></a>
    <section class="heading-wrap">
      <h3 class="heading title"></h3>
      <p class="desc"></p>
    </section>
    <div class="html"></div>
  </div>
</div>

<div id="popup-media" class="popup-content theme-dark">
    <div class="main-content">
        <a href="#" role="button" class="btn-close"><i></i></a>
        <div class="vid-wrap"></div>
    </div>
</div>

<div id="popup-upload" class="popup-content theme-dark">
    <form class="main-content" data-url="<?php echo e(route('talent_upload')); ?>">
        <a href="#" role="button" class="btn-close"><i></i></a>
        <div class="wrap-file">
            <div class="wrap-input"><input type="file" name="upload-file" /></div>
            <strong class="txt-info" data-txt="Preparing your file..."></strong>
            <strong class="txt-err" data-size="File is too big."
                data-type="Please select recommended file types"></strong>
        </div>
        <section class="heading-wrap">
            <h3 class="heading">Drag and drop your file to upload</h3>
            <p class="desc">Your file will be private until you send them.</p>
            <div class="s-note">
                <p>Recommended file types: <i class="file-type"></i>. Maximum file size: <i class="file-size"></i> MB.
                </p>
            </div>
        </section>
        <div class="btn-wrap">
            <a href="#" role="button" name="finish" class="btn-gold type-2">Finish Upload</a>
            <a href="#" role="button" name="retry" class="btn-red type-2">Retry Upload</a>
            <a href="#" role="button" name="cancel" class="btn-gray type-2">Cancel Upload</a>
        </div>
    </form>
</div>

<div id="popup-warning" class="popup-content">
  <div class="main-content">
    <a href="#" role="button" class="btn-close"><i></i></a>
    <section class="heading-wrap">
      <h3 class="heading title"></h3>
      <p class="desc"></p>
    </section>

    <div class="btn-grid-wrap">
      <a href="#" role="button" class="btn-cancel btn-gray">Cancel</a>
      <a href="#" role="button" class="btn-submit btn-red">Continue</a>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_manage_role.blade.php ENDPATH**/ ?>