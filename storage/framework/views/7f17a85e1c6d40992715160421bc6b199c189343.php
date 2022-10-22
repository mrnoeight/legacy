

<?php $__env->startSection('title', 'Casting Board'); ?>

<?php $__env->startSection('hidden_page', 'Casting Board'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-redo-project-details">
    <input type="hidden" id="page-id" value="page-redo-project-details" />
    <section class="details-banner wrap-1200">
        <header class="top-ctr">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('casting_board')); ?>">Casting Board</a></li>
                <li><?php echo e($post->name); ?></li>
            </ul>
            <time datetime="<?php echo e(tk1FormatDate2($post->created_at)); ?>"><span class="mb-hide">Posted Date:&nbsp;</span><?php echo e(tk1FormatDate2($post->created_at)); ?></time>
        </header>

        <div class="intro-wrap">
            <img class="intro-img" src="<?php echo e($post->thumb_url); ?>" alt="<?php echo e($post->name); ?>" />
            <div class="intro-content">
                <h3 class="heading"><?php echo e($post->name); ?></h3>
                <div class="info col-1">
                    <h5><b>Project type:</b>&nbsp;<?php echo e(tk1DisplayTypes($post->types)); ?></h5>
                    <h5><b>Genre:</b>&nbsp;<?php echo e($post->genre); ?></h5>
                    <h5><b>Location:</b>&nbsp;<?php echo e($post->city_name); ?></h5>
                </div>
                <div class="gray-ctr">
                    <ul class="tag">
                        <?php $__currentLoopData = $post->types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>#<?php echo e($v->tag_name); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <nav class="share">
                        <h5>Share:</h5>
                        <ul>
                            <li><a href="#">
                                    <img class="icon" src="<?php echo e(asset('assets/img/social/facebook.svg')); ?>" alt="facebook" />
                                    <h6 class="hidden">Facebook</h6>
                                </a></li>
                            <li><a href="#">
                                    <img class="icon" src="<?php echo e(asset('assets/img/social/twitter.svg')); ?>" alt="twitter" />
                                    <h6 class="hidden">Twitter</h6>
                                </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <ul class="tab-header">
                <li><a href="<?php echo e(route('project_detail', ['id'=>$post->id, 'slug'=>$post->slug])); ?>" class="active">Project details</a></li>
                <li><a href="<?php echo e(route('project_break', ['id'=>$post->id, 'slug'=>$post->slug])); ?>">Character Breakdown (<?php echo e($post->prole->count()); ?>)</a></li>
            </ul>

            <div class="content-wrap editor-wrap">
                <h5>Project Summary</h5>
                <p><?php echo e($post->short_desc); ?></p>
            </div>

            <div class="content-wrap editor-wrap">
                <h5>Project timeline</h5>
                <table>
                    <tr>
                        <td colspan="2"><strong>Deadline for Talent Submissions:</strong>&nbsp;<time
                        datetime="<?php echo e(tk1FormatDate2($post->expired_date)); ?>"><?php echo e(tk1FormatDate2($post->expired_date)); ?></time></td>
                    </tr>
                    <tr>
                        <td><strong>Casting start:</strong>&nbsp;<time datetime="<?php echo e(tk1FormatDate2($post->start_casting_date)); ?>"><?php echo e(tk1FormatDate2($post->start_casting_date)); ?></time></td>
                        <td><strong>End: </strong> <time datetime="<?php echo e(tk1FormatDate2($post->end_casting_date)); ?>"><?php echo e(tk1FormatDate2($post->end_casting_date)); ?></time></td>
                    </tr>
                    <tr>
                        <td><strong>Rehearsal start:</strong>&nbsp;<time datetime="<?php echo e(tk1FormatDate2($post->start_rehearsal_date)); ?>"><?php echo e(tk1FormatDate2($post->start_rehearsal_date)); ?></time></td>
                        <td><strong>End: </strong> <time datetime="<?php echo e(tk1FormatDate2($post->end_rehearsal_date)); ?>"><?php echo e(tk1FormatDate2($post->end_rehearsal_date)); ?></time></td>
                    </tr>
                    <tr>
                        <td><strong>Principal Photography start:</strong>&nbsp;<time
                                datetime="<?php echo e(tk1FormatDate2($post->start_photo_date)); ?>"><?php echo e(tk1FormatDate2($post->start_photo_date)); ?></time></td>
                        <td><strong>End: </strong>&nbsp;<time datetime="<?php echo e(tk1FormatDate2($post->end_photo_date)); ?>"><?php echo e(tk1FormatDate2($post->end_photo_date)); ?></time></td>
                    </tr>
                </table>
                <!-- <h5>Additional Notes</h5>
                <p>We are looking for international travelers with a passion for flying and seeing the world. We’re
                    looking for anyone and everyone with interesting stories and photos or video of their travels. This
                    is a paid opportunity and it will not require much of your time. Please let me know if you’re
                    interested in learning more. Thank you for your time!!!</p>
                <h5>Additional Rate Details</h5>
                <p>Rate will be a buyout. Details upon NDA<br />Upon applying, we will send an NDA to talent.</p>
                <h5>Skills Recommended For This Project</h5>
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
                        <td><?php echo e($post->director); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Producer’s Name</strong></td>
                        <td><?php echo e($post->producer); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Contact Person</strong></td>
                        <td><?php echo e($post->contact_name); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Phone</strong></td>
                        <td><?php echo e($post->contact_phone); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td><?php echo e($post->contact_email); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->

<!-- FOOTER -->
<section class="how-it-works">
    <div class="wrap wrap-1200">
        <header>
            <h4 class="heading">How Take1 Works</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s.</p>
        </header>
        <ul class="step">
            <li class="deco">
                <h5 class="number">3</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s.</p>
            </li>
            <li class="deco flip">
                <h5 class="number">2</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s.</p>
            </li>
            <li>
                <h5 class="number">1</h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s.</p>
            </li>
        </ul>
        <footer>
            <h4 class="heading">Action!</h4>
        </footer>
    </div>
</section>

<section class="join-us-footer">
    <div class="wrap-1200">
        <div class="wrap">
            <h4 class="heading">Be The First to <br class="mb-hide" />Get New Casting Jobs</h4>
            <div class="content">
                <p>Create your account then you will receice new jobs via email</p>
                <div class="btn-wrap">
                    <a href="#" class="btn-gold-arrow cta" role="button">
                        <h5>Sign up as a talent</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/project_detail_new.blade.php ENDPATH**/ ?>