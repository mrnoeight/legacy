<?php $__env->startSection('title', 'Talent Casting Board'); ?>

<?php $__env->startSection('hidden_page', 'Talent Casting Board'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-p2-talent-billboard">
    <input type="hidden" id="page-id" value="page-p2-talent-billboard" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap type-2 casting-board">
                <header>
                    <h4 class="main-heading type-3">Casting Billboard</h4>
                    <!-- <a href="#" class="sub-link txt-upcase">View All</a> -->
                </header>

                <div class="wrap-form">
                    <form class="form-search" id="form-search">
                        <div class="input-wrap">
                            <div class="holder">
                                <input name="search" id="search" type="text" class="input" autocomplete="off" />
                                <label class="txt-label" for="search">search for project/roles</label>
                            </div>
                            <p class="warning"></p>
                        </div>
                    </form>

                    <form class="form-filter" id="form-filter">
                        <strong>Filter:</strong>
                        <div class="input-wrap input-sel-box">
                            <div class="holder">
                                <input type="text" class="input static" readonly>
                                <label class="txt-label">By Location&nbsp;<span></span></label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li><label><input type="checkbox" name="location[0]" value="Ho chi minh"><b>Ho chi
                                            minh</b></label></li>
                                <li><label><input type="checkbox" name="location[1]" value="Ha Noi"><b>Ha
                                            Noi</b></label></li>
                                <li><label><input type="checkbox" name="location[2]" value="Da Nang"><b>Da
                                            Nang</b></label></li>
                                <li><label><input type="checkbox" name="location[3]" value="Hoi An"><b>Hoi
                                            An</b></label></li>
                                <li><label><input type="checkbox" name="location[4]" value="Hue"><b>Hue</b></label></li>
                            </ul>
                        </div>
                        <div class="input-wrap input-sel-box">
                            <div class="holder">
                                <input type="text" class="input static" readonly>
                                <label class="txt-label">By project type&nbsp;<span></span></label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li><label><input type="checkbox" name="project[0]" value="Featured Film"><b>Featured
                                            Film</b></label></li>
                                <li><label><input type="checkbox" name="project[1]" value="Film OTT"><b>Film
                                            OTT</b></label></li>
                                <li><label><input type="checkbox" name="project[1]" value="Short Film"><b>Short
                                            Film</b></label></li>
                                <li><label><input type="checkbox" name="project[1]" value="TV OTT"><b>TV OTT</b></label>
                                </li>
                                <li><label><input type="checkbox" name="project[1]" value="TV Broadcast"><b>TV
                                            Broadcast</b></label></li>
                                <li><label><input type="checkbox" name="project[1]"
                                            value="Webdrama"><b>Webdrama</b></label></li>
                                <li><label><input type="checkbox" name="project[1]" value="Music Video"><b>Music
                                            Video</b></label></li>
                                <li><label><input type="checkbox" name="project[1]"
                                            value="Commercial"><b>Commercial</b></label></li>
                            </ul>
                        </div>
                        <div class="input-wrap input-sel-box">
                            <div class="holder">
                                <input type="text" class="input static" readonly>
                                <label class="txt-label">By role type&nbsp;<span></span></label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li><label><input type="checkbox" name="role[0]" value="Leading"><b>Leading</b></label>
                                </li>
                                <li><label><input type="checkbox" name="role[1]"
                                            value="Supporting"><b>Supporting</b></label></li>
                                <li><label><input type="checkbox" name="role[2]" value="Cameo"><b>Cameo</b></label></li>
                                <li><label><input type="checkbox" name="role[3]"
                                            value="Dayplayer"><b>Dayplayer</b></label></li>
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
                        <div class="input-wrap input-sel">
                            <div class="holder">
                                <input type="hidden" name="sort-role" />
                                <input id="sort-role" type="text" class="input" autocomplete="off" readonly />
                                <label class="txt-label" for="sort-role">Sort By Role</label>
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
                                <label class="txt-label" for="sort-age">Sort By Age</label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li data-value="Young to Old">Young to Old</li>
                                <li data-value="Old to Young">Old to Young</li>
                            </ul>
                        </div>
                        <button class="btn-icon" type="submit"></button>
                    </form>
                </div>

                <ul class="list-post col-2">
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="item casting-card type-3">
                        <div class="content">
                            <b class="tag <?php echo e(tk1DisplayTags($role->post->types)); ?>"><?php echo e(tk1DisplayTypes($role->post->types)); ?></b>
                            <h5><a href="<?php echo e(route('talent_role_detail', ['id'=>$role->id])); ?>" class="heading"><?php echo e($role->name); ?></a></h5>
                            <h6><a href="<?php echo e(route('talent_project', ['id'=>$role->post_id])); ?>" class="gold-txt"><?php echo e($role->post->name); ?></a></h6>
                            <p class="info">
                                <span><b class="city">Type:</b>&nbsp;<?php echo e($role->role_type); ?></span>
                                <span><b class="age">Age:</b>&nbsp;<?php echo e($role->age_range); ?></span>
                                <span><b class="gender">Gender:</b>&nbsp;<?php echo e($role->gender); ?></span>
                            </p>
                            <p class="desc"><?php echo e(Str::words($role->description, 20, '...')); ?></p>
                            <footer>
                                <time datetime="<?php echo e($role->post->expired_date); ?>"><span class="mb-480-hide">Submissions Due&nbsp;</span> <?php echo e(tk1FormatDate($role->post->expired_date)); ?></time>
                                <span><?php echo e($role->post->city_name); ?></span>
                            </footer>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

        </div>
    </article>
</main>
<!-- END MAIN PAGE -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_casting_board_all.blade.php ENDPATH**/ ?>