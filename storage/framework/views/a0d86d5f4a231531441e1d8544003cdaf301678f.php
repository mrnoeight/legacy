

<?php $__env->startSection('title', 'Talent Detail'); ?>

<?php $__env->startSection('hidden_page', 'Talent Detail'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-p2-client-talent-details">
    <input type="hidden" id="page-id" value="page-p2-client-talent-details" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">

            <div class="content-wrap type-2 redo-wrap p2-header-wrap">
                <header>
                    <ul class="breadcrumb full-w">
                        <li><a href="#">Talent Services</a></li>
                        <li><a href="46-p2-client-our-talents-recomended.html">Meet Our Talents</a></li>
                    </ul>
                    <div class="flex-center">
                        <h4 class="main-heading type-4">talent details</h4>
                        
                        <?php if($client->company->prole->count() <= 0): ?>
                        <a href="#" class="btn-gold cta btn-none" role="button" data-title="Oops! Project None"
                            data-desc="You don't have any projects created to invite actors."
                            data-cta="CREATE NEW PROJECT" data-url="42-p2-client-project-add.html">hire this talent</a>
                        <?php else: ?>
                        <a href="#" class="btn-gold cta btn-hire" role="button">hire this talent</a>
                        <?php endif; ?>
                    </div>
                </header>
            </div>

            <div class="content-wrap redo-wrap">
                <figure class="img-info">
                    <div class="img-wrap">
                        <img src="<?php echo e($tal->cover_url); ?>" alt="<?php echo e($tal->name); ?>" />
                        <!-- <a href="#" role="button" class="btn-star" title="bookmark this talent"></a> -->
                    </div>
                    <figcaption>
                        <h3><?php echo e($tal->name); ?></h3>
                        <a href="<?php echo e(route('talent_detail', ['id' => $tal->id])); ?>" class="gold-link"><i><?php echo e(route('talent_detail', ['id' => $tal->id])); ?></i></a>
                        <p><b>Gender:</b> <?php echo e($tal->gender); ?></p>
                        <p><b>Height:</b> <?php echo e($tal->height); ?> cm</p>
                        <p><b>Weight:</b> <?php echo e($tal->weight); ?> kg</p>
                        <p><b> Location:</b> <?php echo e($tal->hometown); ?></p>
                    </figcaption>
                </figure>
                <nav class="share abs-right">
                    <h5>Share</h5>
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

            <div class="xscroll">
                <ul class="tab-header">
                    <li><a href="#" class="active">Profile</a></li>
                    <?php if(isset($role)): ?>
                    <li><a href="<?php echo e(route('client_talent_experience_detail', ['talent_id'=>$tal->id, 'role_id'=>$role->id])); ?>">Experiences</a></li>
                    <li><a href="<?php echo e(route('client_talent_media_detail', ['talent_id'=>$tal->id, 'role_id'=>$role->id])); ?>">Media</a></li>
                    <?php else: ?>
                    <li><a href="<?php echo e(route('client_talent_experience_detail', ['talent_id'=>$tal->id])); ?>">Experiences</a></li>
                    <li><a href="<?php echo e(route('client_talent_media_detail', ['talent_id'=>$tal->id])); ?>">Media</a></li>
                    <?php endif; ?>
                    <li><a href="#">Apperance</a></li>
                </ul>
            </div>

            <div class="content-wrap redo-wrap">
                <h5 class="heading">Introduction</h5>
                <p class="txt"><?php echo e($tal->bio); ?></p>
            </div>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->


<div id="popup-hire" class="popup-content">
    <div class="main-content">
        <a href="#" role="button" class="btn-close"><i></i></a>
        <section class="heading-wrap">
            <h3 class="heading">Hire This Talent By Request Media</h3>
        </section>

        <form class="login-form" data-url="<?php echo e(route('client_hire_request')); ?>" data-event="popup-hire-passed">
            <input type="hidden" name="hire-id" id="hire-id" value="<?php echo e($tal->id); ?>" />
            <p class="warning-server">Server errors show here!!!</p>
            <div class="input-wrap input-sel redo-input">
                <label>Project Name *</label>
                <div class="holder">
                    <input type="hidden" name="hire-project" id="hire-project" />
                    <input type="text" class="input js-required" autocomplete="off" required-txt="Select your project"
                        placeholder="Select a Project" readonly />
                </div>
                <p class="warning"></p>
                <ul class="opt-list" id="hire-project-list">
                <?php if(Auth::check() && Auth::user()->type == \App\Models\Registration::CLIENT): ?>
                <?php $__currentLoopData = Auth::user()->company->post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-value="<?php echo e($post->id); ?>"><?php echo e($post->name); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </ul>
            </div>

            <div class="input-wrap input-sel role-select redo-input">
                <label>Role Name *</label>
                <div class="holder">
                    <input type="hidden" id="roleInput2" name="hire-role" value="1" />
                    <input type="text" class="input " id="roleInput" autocomplete="off" required-txt="Select your role"
                        placeholder="Select a Role" readonly />
                </div>
                <p class="warning"></p>
                <ul class="opt-list"  id="hire-project-role">
                    <li data-value="1">Role Name 1</li>
                    <li data-value="Role Value 2">Role Name 2</li>
                    <li data-value="Role Value 3">Role Name 3</li>
                    <li data-value="Role Value 4">Role Name 4</li>
                    <li data-value="Role Value 5">Role Name 5</li>
                </ul>
            </div>

            <div class="form-wrap">
                <h5 class="sub-heading">Request Media</h5>
                <div class="chx-wrap">
                    <div class="holder">
                        <input type="checkbox" name="hire-take1-tape" id="chx-take1-tape" />
                        <label for="chx-take1-tape"><img src="<?php echo e(asset('assets/img/video/take1-tape.svg')); ?>"
                                alt="Take1 Tape" />Take1 Tape</label>
                    </div>
                    <p class="warning"></p>
                </div>
                <div class="chx-wrap">
                    <div class="holder">
                        <input type="checkbox" name="hire-self-tape" id="chx-self-tape" />
                        <label for="chx-self-tape"><img src="<?php echo e(asset('assets/img/video/self-tape.svg')); ?>"
                                alt="Self Tape" />Self Tape</label>
                    </div>
                    <p class="warning"></p>
                </div>
                <div class="chx-wrap">
                    <div class="holder">
                        <input type="checkbox" name="hire-self-audition" id="chx-self-audition" />
                        <label for="chx-self-audition"><img src="<?php echo e(asset('assets/img/video/self-audition.svg')); ?>"
                                alt="Self Audition" />Self Audition</label>
                    </div>
                    <p class="warning"></p>
                </div>
            </div>

            <div class="input-wrap redo-input">
                <label>Instruction for Talent *</label>
                <div class="holder">
                    <input name="hire-instruction" type="text" class="input js-required" autocomplete="off"
                        required-txt="Enter your Instruction" placeholder="More Description" />
                </div>
                <p class="warning"></p>
            </div>

            <div class="file-wrap single-file redo-input">
                <label>Role Sides</label>
                <div class="holder">
                    <input type="file" name="hire-file" accept="image/*,application/pdf" />
                    <p class="input">Please Select a File to Upload</p>
                    <a href="#" role="button" class="btn-upload"><b>upload</b></a>
                </div>
                <div class="s-note">JPG, PNG or PDF file type are recommended. Maximum file size is 10 MB.</div>
                <p class="warning"></p>
            </div>

            <div class="input-wrap redo-input input-date">
                <label>Deadline for Talent Submissions *</label>
                <div class="holder">
                    <input name="hire-deadline" type="text" class="input js-required js-date" autocomplete="off"
                        required-txt="Enter your Deadline" date-txt="Enter a valid date" placeholder="dd/mm/yyyy"
                        maxlength="10" />
                </div>
                <p class="warning"></p>
            </div>
            <div class="btn-wrap">
                <a href="#" class="btn-close btn-txt">Cancel</a>
                <a href="#" role="button" class="btn-gold-arrow btn-submit js-reset">Send Request</a>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_talent_detail_norole.blade.php ENDPATH**/ ?>