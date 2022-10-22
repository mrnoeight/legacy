

<?php $__env->startSection('title', 'Project Detail'); ?>

<?php $__env->startSection('hidden_page', 'Project Detail'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-p2-talent-proj-dts">
    <input type="hidden" id="page-id" value="page-p2-talent-proj-dts" />
    <article class="main-article pd-ctr pb-0">
        <div class="wrap-1200 article-wrap">

            <div class="content-wrap redo-wrap type-2 p2-header-wrap">
                <header>
                    <ul class="breadcrumb full-w">
                        <li><a href="<?php echo e(route('casting_board')); ?>">Billboard</a></li>
                        <li><a href="#">Project Details</a></li>
                    </ul>
                </header>
            </div>

            <div class="content-wrap redo-wrap">
                <figure class="img-info">
                    <div class="img-wrap"><img src="<?php echo e($post->thumb_url); ?>" alt="<?php echo e($post->name); ?>" /></div>
                    <figcaption>
                        <p>Posted Date: <?php echo e(tk1FormatDate2($post->created_at)); ?></p>
                        <h5><?php echo e($post->name); ?></h5>
                        <!-- <p><b>Internal Project Name:</b> The Secret Movie</p> -->
                        <p><b>Project type:</b> <?php echo e($post->type); ?></p>
                        <p><b>Genre:</b> <?php echo e($post->genre); ?></p>
                        <p><b>Location:</b> <?php echo e($post->city_name); ?></p>
                    </figcaption>
                </figure>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                    <li><a href="<?php echo e(route('talent_project_detail', ['id'=>$post->id])); ?>">Project details</a></li>
                    <li><a href="#" class="active">Character Breakdown <span
                                class="hl">( <?php echo e($post->prole->count()); ?> )</span></a></li>
                </ul>
            </div>
        </div>
    </article>

    <section class="casting-board">
        <div class="wrap wrap-1200 dir-col">
            <header class="banner dflex dir-col">
                <!-- <form class="form-search" id="form-search">
                    <div class="input-wrap">
                        <div class="holder">
                            <input name="search" id="search" type="text" class="input" autocomplete="off" />
                            <label class="txt-label" for="search">search for roles</label>
                        </div>
                        <p class="warning"></p>
                    </div>
                </form> -->

                <!-- <form class="form-filter" id="form-filter">
                    <strong>Filter:</strong>
                    <div class="input-wrap input-sel-box">
                        <div class="holder">
                            <input type="text" class="input static" readonly>
                            <label class="txt-label">By role type&nbsp;<span></span></label>
                        </div>
                        <p class="warning"></p>
                        <ul class="opt-list">
                            <li><label><input type="checkbox" name="role[0]" value="Leading"><b>Leading</b></label></li>
                            <li><label><input type="checkbox" name="role[1]"
                                        value="Supporting"><b>Supporting</b></label></li>
                            <li><label><input type="checkbox" name="role[2]" value="Cameo"><b>Cameo</b></label></li>
                            <li><label><input type="checkbox" name="role[3]" value="Dayplayer"><b>Dayplayer</b></label>
                            </li>
                            <li><label><input type="checkbox" name="role[4]" value="5 &amp; Under"><b>5 &amp;
                                        Under</b></label></li>
                            <li><label><input type="checkbox" name="role[5]"
                                        value="Background"><b>Background</b></label></li>
                            <li><label><input type="checkbox" name="role[6]"
                                        value="Speciality"><b>Speciality</b></label></li>
                            <li><label><input type="checkbox" name="role[7]" value="Model"><b>Model</b></label></li>
                            <li><label><input type="checkbox" name="role[8]" value="Other"><b>Other</b></label></li>
                        </ul>
                    </div>
                    <strong>Sort:</strong>
                    <div class="input-wrap input-sel">
                        <div class="holder">
                            <input type="hidden" name="sort-role" />
                            <input id="sort-role" type="text" class="input" autocomplete="off" readonly />
                            <label class="txt-label" for="sort-role">By Role</label>
                        </div>
                        <p class="warning"></p>
                        <ul class="opt-list">
                            <li data-value="Newest Role">Newest Role</li>
                            <li data-value="Recommended Role">Recommended Role</li>
                            <li data-value="Hottest Role">Hottest Role</li>
                        </ul>
                    </div>
                    <div class="input-wrap input-sel">
                        <div class="holder">
                            <input type="hidden" name="sort-age" />
                            <input id="sort-age" type="text" class="input" autocomplete="off" readonly />
                            <label class="txt-label" for="sort-age">By Age</label>
                        </div>
                        <p class="warning"></p>
                        <ul class="opt-list">
                            <li data-value="Young to Old">Young to Old</li>
                            <li data-value="Old to Young">Old to Young</li>
                        </ul>
                    </div>
                    <button class="btn-icon" type="submit"></button>
                </form> -->
            </header>

            <ul class="list-post col-2">
            <?php $__currentLoopData = $post->prole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="item casting-card type-3">
                    <div class="content">
                        <b class="tag <?php echo e(tk1DisplayTags($role->post->types)); ?>"><?php echo e(tk1DisplayTypes($role->post->types)); ?></b>
                        <h5><a href="<?php echo e(route('talent_role_detail', ['id'=>$role->id])); ?>" class="heading"><?php echo e($role->name); ?></a></h5>
                        <p class="info">
                            <span><b class="city">Type:</b>&nbsp;<?php echo e($role->role_type); ?></span>
                            <span><b class="age">Age:</b>&nbsp;<?php echo e($role->age_range); ?></span>
                            <span><b class="gender">Gender:</b>&nbsp;<?php echo e($role->gender); ?></span>
                        </p>
                        <p class="desc"><?php echo e(Str::words($role->description, 18, '...')); ?></p>
                        <footer>
                            <time datetime="<?php echo e($role->expired_date); ?>"><span class="mb-480-hide">Submissions Due&nbsp;</span> <?php echo e(tk1FormatDate($role->expired_date)); ?></time>
                            <span><?php echo e($role->city_name); ?></span>
                        </footer>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </section>
</main>
<!-- END MAIN PAGE -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_project_breakdown.blade.php ENDPATH**/ ?>