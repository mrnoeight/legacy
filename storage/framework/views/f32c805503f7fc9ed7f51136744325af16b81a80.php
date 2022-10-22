

<?php $__env->startSection('title', 'Casting Board'); ?>

<?php $__env->startSection('hidden_page', 'Casting Board'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-redo-project-breakdown">
    <input type="hidden" id="page-id" value="page-redo-project-breakdown" />
    <section class="details-banner wrap-1200">
        <header class="top-ctr">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('casting_board')); ?>">Casting Board</a></li>
                <li><?php echo e($post->name); ?></li>
            </ul>
            <time datetime="<?php echo e(tk1FormatDate2($post->created_at)); ?>"><span class="mb-hide">Posted
                    Date:&nbsp;</span><?php echo e(tk1FormatDate2($post->created_at)); ?></time>
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
                        <li>#Commercial</li>
                        <li>#Romantic</li>
                    </ul>
                    <nav class="share">
                        <h5>Share:</h5>
                        <ul>
                            <li><a href="#">
                                    <img class="icon" src="<?php echo e(asset('assets/img/social/facebook.svg')); ?>"
                                        alt="facebook" />
                                    <h6 class="hidden">Facebook</h6>
                                </a></li>
                            <li><a href="#">
                                    <img class="icon" src="<?php echo e(asset('assets/img/social/twitter.svg')); ?>"
                                        alt="twitter" />
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
                <li><a href="<?php echo e(route('project_detail', ['id'=>$post->id, 'slug'=>$post->slug])); ?>">Project details</a></li>
                <li><a href="<?php echo e(route('project_break', ['id'=>$post->id, 'slug'=>$post->slug])); ?>" class="active">Character Breakdown (<?php echo e($post->prole->count()); ?>)</a></li>
            </ul>
        </div>
    </article>
    <section class="casting-board">
        <div class="wrap wrap-1200 dir-col">
            <!-- <header class="banner dflex dir-col">
                <form class="form-search" id="form-search">
                    <div class="input-wrap">
                        <div class="holder">
                            <input name="search" id="search" type="text" class="input" autocomplete="off" />
                            <label class="txt-label" for="search">search for roles</label>
                        </div>
                        <p class="warning"></p>
                    </div>
                </form>

                <form class="form-filter" id="form-filter">
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
                    <button class="btn-icon" type="submit">
                        <svg width="21" height="20" viewbox="0 0 21 20" fill="#FFFFFF">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.6364 16.0705H19.9458C20.4254 16.0705 20.813 16.459 20.813 16.9377C20.813 17.4164 20.4253 17.8049 19.9458 17.8049H17.6364C17.26 19.0545 16.1127 19.9729 14.7425 19.9729C13.3724 19.9729 12.2241 19.0545 11.8487 17.8049H0.867195C0.388496 17.8049 0 17.4164 0 16.9377C0 16.459 0.388496 16.0705 0.867195 16.0705H11.8487C12.225 14.8208 13.3724 13.9025 14.7426 13.9025C16.1127 13.9025 17.2609 14.8208 17.6364 16.0705ZM13.4418 16.9377C13.4418 17.6549 14.0254 18.2385 14.7426 18.2385C15.4597 18.2385 16.0434 17.6549 16.0434 16.9377C16.0434 16.2205 15.4598 15.6368 14.7426 15.6368C14.0254 15.6368 13.4418 16.2205 13.4418 16.9377Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.6364 2.19511H19.9458C20.4254 2.19511 20.813 2.58364 20.813 3.06234C20.813 3.54104 20.4254 3.92954 19.9458 3.92954H17.6364C17.2601 5.17917 16.1128 6.09755 14.7426 6.09755C13.3724 6.09755 12.225 5.17917 11.8487 3.9295H0.867195C0.388496 3.9295 0 3.541 0 3.0623C0 2.5836 0.388496 2.19511 0.867195 2.19511H11.8487C12.225 0.945473 13.3724 0.0270996 14.7426 0.0270996C16.1127 0.0270996 17.26 0.945473 17.6364 2.19511ZM13.4418 3.06229C13.4418 3.77948 14.0254 4.3631 14.7426 4.3631C15.4597 4.3631 16.0434 3.77948 16.0434 3.06229C16.0434 2.34509 15.4598 1.76147 14.7426 1.76147C14.0254 1.76147 13.4418 2.34509 13.4418 3.06229Z" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.96435 9.13279H19.9458C20.4254 9.13279 20.813 9.52129 20.813 9.99998C20.813 10.4787 20.4253 10.8672 19.9458 10.8672H8.96431C8.58797 12.1168 7.44061 13.0352 6.07045 13.0352C4.70028 13.0352 3.55297 12.1168 3.17659 10.8672H0.867195C0.388496 10.8672 0 10.4787 0 9.99998C0 9.52129 0.388496 9.13279 0.867195 9.13279H3.17663C3.55297 7.88316 4.70033 6.96478 6.07049 6.96478C7.44065 6.96478 8.58797 7.88316 8.96435 9.13279ZM4.76965 9.99997C4.76965 10.7172 5.35327 11.3008 6.07047 11.3008C6.78766 11.3008 7.37128 10.7172 7.37128 9.99997C7.37128 9.28278 6.78766 8.69916 6.07047 8.69916C5.35327 8.69916 4.76965 9.28278 4.76965 9.99997Z" />
                        </svg>
                    </button>
                </form>
            </header> -->

            <ul class="list-post col-2">
            <?php $__currentLoopData = $post->prole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="item casting-card type-3">
                    <div class="content">
                        <b class="tag <?php echo e(tk1DisplayTags($role->post->types)); ?>"><?php echo e(tk1DisplayTypes($role->post->types)); ?></b>
                        <h5><a href="<?php echo e(route('role_detail', ['id'=>$role->id, 'slug'=>$role->slug])); ?>" class="heading"><?php echo e($role->name); ?></a></h5>
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
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/project_detail_breakdown.blade.php ENDPATH**/ ?>