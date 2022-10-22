

<?php $__env->startSection('title', 'Talent Role Request'); ?>

<?php $__env->startSection('hidden_page', 'Talent Role Request'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-p2-talent-role-request">
    <input type="hidden" id="page-id" value="page-p2-talent-role-request" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">

            <div class="content-wrap redo-wrap type-2 p2-header-wrap">
                <header>
                    <ul class="breadcrumb full-w">
                        <li><a href="<?php echo e(route('talent_manage_role')); ?>">Manage Roles</a></li>
                        <li><a href="#">Role Detail</a></li>
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
                    <?php if($req->status == 'requested'): ?>
                    <strong class="status blue js-disable">CONFIRMED</strong>
                    <strong class="status red js-disable">DECLINED</strong>
                    <div class="wrap-ctr">
                        <a href="#" role="button" class="btn-action">Request<i></i></a>
                        <div class="row-ctr dnone">
                            <a href="#" role="button" class="btn-blue type-2 cta responseBut" data-id="<?php echo e($id); ?>" data-answer="confirmed">confirm</a>
                            <a href="#" role="button" class="btn-red type-2 cta responseBut" data-id="<?php echo e($id); ?>" data-answer="declined">decline</a>
                        </div>
                    </div>
                    <?php elseif($req->status == 'confirmed'): ?>
                    <strong class="status blue">CONFIRMED</strong>
                    <?php elseif($req->status == 'declined'): ?>
                    <strong class="status red">DECLINED</strong>
                    <?php endif; ?>
                </div>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                    <li><a href="#" class="active">Submit To Request</a></li>
                    <li><a href="#">Role details</a></li>
                </ul>
            </div>

            <div class="wrap-lock <?php echo e(($req->status == 'confirmed') ? '' : 'js-disable'); ?>">
                <form id="form-role-submit" data-url="<?php echo e(route('talent_response_file')); ?>">
                    <input type="hidden" name="id" value="<?php echo e($req->id); ?>" />
                    <div class="content-wrap redo-wrap">
                        <h5 class="heading">Role Sides</h5>
                        <span class="s-note">Only selected Actors for Auditions will be allowed to see Role Sides and
                            Audition notes. These Role Sides and Audition notes will not be publicly released.</span>
                        <a href="media/sample.pdf" download class="link-download">
                            <span>NCFOM_ROLE_SIDE.pdf</span>
                            <b><i>Download</i></b>
                        </a>
                        <p class="txt"></p>
                        <h5 class="heading">Requested Media</h5>
                        <p class="txt">Photo or video<br />Please include 3 photos of yourself traveling; in the
                            airport, on a plane, or other. Remember, we would like to see the different things that
                            people deal with when traveling. Show us something different!</p>
                        <p class="txt"></p>
                        <h5 class="heading">Audition Note</h5>
                        <p class="txt">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores aperiam culpa
                            repellat? Nesciunt perspiciatis earum sunt, asperiores nemo, recusandae maiores, quaerat
                            labore culpa nam totam quas ratione est cum at. Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Dolor facilis consectetur nesciunt neque quia nostrum totam molestias
                            tempore numquam. Dolorem rem dolore ea facilis libero odit eum quod explicabo sapiente.</p>
                    </div>
                    <div class="content-wrap redo-wrap review-media">
                        <h5 class="heading">Attached Media</h5>
                        <span class="s-note">This media will be attached to the submission.</span>
                        <div class="chx-wrap">
                            <div class="holder">
                                <input type="checkbox" id="submit-img-all" class="chx-all" />
                                <label for="submit-img-all"><strong>Photo</strong></label>
                            </div>
                            <p class="warning"></p>
                        </div>
                        <div class="chx-wrap chx-media js-required js-min js-max" data-min="2" data-max="5"
                            required-txt="Please submit your image" min-txt="Need at least 2 images"
                            max-txt="Maximum 5 images allowed">
                            <div class="flex-wrap">
                                <ul class="holder">
                                    <?php $__currentLoopData = $talent->getListGalleryImage(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="item">
                                        <input type="checkbox" name="submit-img" id="<?php echo e($v); ?>" value="<?php echo e($v); ?>" />
                                        <label for="submit-img-0"><img src="<?php echo e($v); ?>"
                                                alt="Img Alt" /></label>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <a href="#" class="add-link" title="add more image"><img src="<?php echo e(asset('assets/img/form/more-img.svg')); ?>"
                                        alt="add more image" /></a>
                            </div>
                            <p class="warning"></p>
                        </div>

                        <?php if($req->request_date_self != ''): ?>
                        <div class="chx-wrap">
                            <div class="holder">
                                <input type="checkbox" id="submit-vid-all" class="chx-all" />
                                <label for="submit-vid-all"><strong>Self Tape</strong></label>
                            </div>
                            <p class="warning"></p>
                        </div>
                        <div class="chx-wrap chx-media js-required" required-txt="Please submit your self tape">
                            <div class="flex-wrap">
                                <ul class="holder">
                                    <?php if($req->self_url != ''): ?>
                                    <li class="item">
                                        <input type="checkbox" name="submit-vid[0]" id="submit-vid-0" value="<?php echo e($req->self_url); ?>" />
                                        <label for="submit-vid-0"><img src="<?php echo e(asset('assets/img/video/take1-tape.svg')); ?>"
                                                alt="Vid Alt" /></label>
                                    </li>
                                    <?php endif; ?>
                                    
                                </ul>
                                <a href="#" class="add-link" title="add more video"><img src="<?php echo e(asset('assets/img/form/more-vid.svg')); ?>"
                                        alt="add more video" /></a>
                            </div>
                            <p class="warning"></p>
                        </div>
                        <?php endif; ?>

                        <?php if($req->request_date_audition != ''): ?>
                        <div class="chx-wrap">
                            <div class="holder">
                                <input type="checkbox" id="submit-vid-all2" class="chx-all" />
                                <label for="submit-vid-all2"><strong>Audition</strong></label>
                            </div>
                            <p class="warning"></p>
                        </div>
                        <div class="chx-wrap chx-media js-required" required-txt="Please submit your audition">
                            <div class="flex-wrap">
                                <ul class="holder">
                                    <?php if($req->audition_url != ''): ?>
                                    <li class="item">
                                        <input type="checkbox" name="submit-vid[1]" id="submit-vid-1" value="<?php echo e($req->audition_url); ?>" />
                                        <label for="submit-vid-1"><img src="<?php echo e(asset('assets/img/our-talent/submit-img-4.png')); ?>"
                                                alt="Vid Alt" /></label>
                                    </li>
                                    <?php endif; ?>
                                    
                                </ul>
                                <a href="#" class="add-link" title="add more audition"><img src="<?php echo e(asset('assets/img/form/more-vid.svg')); ?>"
                                        alt="add more audition" /></a>
                            </div>
                            <p class="warning"></p>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="btn-wrap">
                        <a href="<?php echo e(route('talent_manage_role')); ?>" class="btn-txt">Cancel</a>
                        <a href="#" id="btn-request" role="button" class="btn-gold-arrow"
                            data-title="Send Your Request Media"
                            data-desc="Are you sure you’re ready to send? You will not be able to edit this response after it has been sent">Send
                            Response</a>
                    </div>
                    <p class="warning-server"></p>
                </form>


            </div>



        </div>
    </article>
</main>
<!-- END MAIN PAGE -->

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
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_choose_role.blade.php ENDPATH**/ ?>