

<?php $__env->startSection('title', 'Casting Board'); ?>

<?php $__env->startSection('hidden_page', 'Casting Board'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-casting-board">
    <input type="hidden" id="page-id" value="page-casting-board" />
<!--
    <section class="heading-banner">
        <h2 class="heading"><span class="gold-underline">Casting</span> Board</h2>
        <p>Top casting directors and content creators post dozens of new casting calls and auditions every day on Take1’s Casting Board.    Take a sneak peak below at some of the immediately available jobs.
</p>
        <a href="#how-it-works" class="btn-gold-arrow cta arrow-type-2" role="button">See how Take1 works</a>
    </section>
-->

    <section class="banner-slider pd-ctr pt-0">
        <h5 class="hidden">Banner Slider</h5>
        <div class="slider">
            <ul class="item-wrap">
                <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="item bg-supernova">
                    <div class="content-card wrap-1200">
                        <img class="main-img" src="<?php echo e(asset('assets/img/banner/hero-slider.png')); ?>" alt="All casting profile" />
                        <div class="content">
                            <h6 class="heading heading-32"><?php echo e($role->name); ?></h6>
                            <p class="info">
                                <span><i class="city">City:&nbsp;</i><?php echo e($role->post->city_name); ?></span>
                                <span><i class="gender">Gender:&nbsp;</i><?php echo e($role->gender); ?></span>
                                <span><i class="age">Age:&nbsp;</i><?php echo e($role->age_range); ?></span>
                            </p>
                            <a href="<?php echo e(route('role_detail', ['id'=>$role->id, 'slug'=>$role->slug])); ?>" role="button" class="btn-black-arrow cta">Find out more</a>
                        </div>
                        <b class="tag jobs">Hot Jobs in This Month</b>
                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <ul class="paging">
                <li role="button" data-index="0" class="js-active"></li>
                <li role="button" data-index="1"></li>
                <li role="button" data-index="2"></li>
                <li role="button" data-index="3"></li>
                <li role="button" data-index="4"></li>
            </ul>
            <a href="#" role="button" class="btn-prev"><span></span></a>
            <a href="#" role="button" class="btn-next"><span></span></a>
        </div>
    </section>


    <section class="casting-board">
        <div class="wrap wrap-1200 dir-col">
        <header class="banner dflex dir-col">
          <h4 class="heading"><?php echo e($roles->total()); ?>+ Jobs Posted</h4>
          <form class="form-search" id="form-search">
            <div class="input-wrap">
              <div class="holder">
                <input name="search" id="search" type="text" class="input" value="<?php echo e($search); ?>" autocomplete="off"/>
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
                <label class="txt-label">By Location&nbsp;<span><?php echo e(is_array($city) ? '('.count($city).')' : ''); ?></span></label>
              </div>
              <p class="warning"></p>
              <ul class="opt-list">
                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><label><input type="checkbox" <?php echo e(is_array($city) && in_array($c->id, $city) ? 'checked="checked"' : ''); ?> name="location[<?php echo e($c->id); ?>]" value="<?php echo e($c->name); ?>"><b><?php echo e($c->name); ?></b></label></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
            <div class="input-wrap input-sel-box">
              <div class="holder">
                <input type="text" class="input static" readonly>
                <label class="txt-label">By project type&nbsp;<span></span></label>
              </div>
              <p class="warning"></p>
              <ul class="opt-list">
                <li><label><input type="checkbox" name="project[0]" value="Featured Film"><b>Featured Film</b></label></li>
                <li><label><input type="checkbox" name="project[1]" value="Film OTT"><b>Film OTT</b></label></li>
                <li><label><input type="checkbox" name="project[1]" value="Short Film"><b>Short Film</b></label></li>
                <li><label><input type="checkbox" name="project[1]" value="TV OTT"><b>TV OTT</b></label></li>
                <li><label><input type="checkbox" name="project[1]" value="TV Broadcast"><b>TV Broadcast</b></label></li>
                <li><label><input type="checkbox" name="project[1]" value="Webdrama"><b>Webdrama</b></label></li>
                <li><label><input type="checkbox" name="project[1]" value="Music Video"><b>Music Video</b></label></li>
                <li><label><input type="checkbox" name="project[1]" value="Commercial"><b>Commercial</b></label></li>
              </ul>
            </div>
            <div class="input-wrap input-sel-box">
              <div class="holder">
                <input type="text" class="input static" readonly>
                <label class="txt-label">By role type&nbsp;<span></span></label>
              </div>
              <p class="warning"></p>
              <ul class="opt-list">
                <li><label><input type="checkbox" name="role[0]" value="Leading"><b>Leading</b></label></li>
                <li><label><input type="checkbox" name="role[1]" value="Supporting"><b>Supporting</b></label></li>
                <li><label><input type="checkbox" name="role[2]" value="Cameo"><b>Cameo</b></label></li>
                <li><label><input type="checkbox" name="role[3]" value="Dayplayer"><b>Dayplayer</b></label></li>
                <li><label><input type="checkbox" name="role[4]" value="5 &amp; Under"><b>5 &amp; Under</b></label></li>
                <li><label><input type="checkbox" name="role[5]" value="Background"><b>Background</b></label></li>
                <li><label><input type="checkbox" name="role[6]" value="Speciality"><b>Speciality</b></label></li>
                <li><label><input type="checkbox" name="role[7]" value="Model"><b>Model</b></label></li>
                <li><label><input type="checkbox" name="role[8]" value="Other"><b>Other</b></label></li>
              </ul>
            </div>
            <div class="input-wrap input-sel">
              <div class="holder">
                <input type="hidden" name="sort-role"/>
                <input id="sort-role" type="text" class="input" autocomplete="off" readonly/>
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
                <input type="hidden" name="sort-age"/>
                <input id="sort-age" type="text" class="input" autocomplete="off" readonly/>
                <label class="txt-label" for="sort-age">Sort By Age</label>
              </div>
              <p class="warning"></p>
              <ul class="opt-list">
                <li data-value="Young to Old">Young to Old</li>
                <li data-value="Old to Young">Old to Young</li>
              </ul>
            </div>
            <button class="btn-icon" type="submit">Apply</button>
          </form>
        </header>

            <ul class="list-post col-2" id="jobList">
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="item casting-card type-3">
                    <div class="content">
                        <b class="tag <?php echo e(tk1DisplayTags($role->post->types)); ?>"><?php echo e(tk1DisplayTypes($role->post->types)); ?></b>
                        <h5><a href="<?php echo e(route('role_detail', ['id'=>$role->id, 'slug'=>$role->slug])); ?>" class="heading"><?php echo e($role->name); ?></a></h5>
                        <h6><a href="<?php echo e(route('project_detail', ['id'=>$role->post_id, 'slug'=>$role->post->slug])); ?>" class="gold-txt"><?php echo e($role->post->name); ?></a></h6>
                        <p class="info">
                            <span><b class="city">Type:</b>&nbsp;<?php echo e($role->role_type); ?></span>
                            <span><b class="age">Age:</b>&nbsp;<?php echo e($role->age_range); ?></span>
                            <span><b class="gender">Gender:</b>&nbsp;<?php echo e($role->gender); ?></span>
                        </p>
                        <p class="desc"><?php echo e(Str::words($role->description, 7, '...')); ?></p>
                        <footer>
                            <time datetime="<?php echo e($role->post->expired_date); ?>"><span class="mb-480-hide">Submissions Due&nbsp;</span> <?php echo e(tk1FormatDate($role->post->expired_date)); ?></time>
                            <span><?php echo e($role->post->city_name); ?></span>
                        </footer>
                    </div>
                </li>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </ul>
            
            <?php if($roles->total() == 0): ?>
            <p>No results matching your search. Try using fewer filters.</p>
            <?php endif; ?>

            <?php if($morePage == 1): ?>
            <footer class="center-cta"><a href="#" role="button"  id="viewMoreJob" class="btn-gold-arrow cta">See more jobs</a></footer>
            <?php endif; ?>
        </div>
    </section>

    <section class="carousel-holder testimonial">
        <header class="wrap-1200">
            <h5 class="heading">What Our Talents Say?</h5>
            <p>Don’t hear it just from us, check out some of the comments from talents that actively use Take1 to help them find the roles that fit them best.</p>
        </header>
        <div class="carousel col-3 wrap-1200">
            <ul class="item-wrap">
                <li class="item">
                    <div class="content-card">
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/talent/hero-1.jpg')); ?>" alt="Johny Tri Nguyen" /></div>
                        <div class="content">
                            <h6 class="heading">Johny Tri Nguyen</h6>
                            <p class="sub-heading">Movie Actor</p>
                            <ul class="rating">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <p class="desc">I got so many auditions from this site to be in I’m actually getting ready
                                for one this Saturday and one next Saturday and Sunday and on Thursday 🤞❤️💯 good luck
                                to me thanks</p>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="content-card">
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/talent/hero-2.jpg')); ?>" alt="Lavonne Burgs" /></div>
                        <div class="content">
                            <h6 class="heading">Lavonne Burgs</h6>
                            <p class="sub-heading">Movie Actor</p>
                            <ul class="rating">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <p class="desc">Walked the runway for the Miss California Nation competition and was a life
                                changer. Looking forward to more projects in the coming future.</p>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="content-card">
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/talent/hero-3.jpg')); ?>" alt="Joshua Stephens" /></div>
                        <div class="content">
                            <h6 class="heading">Joshua Stephens</h6>
                            <p class="sub-heading">Movie Actor</p>
                            <ul class="rating">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <p class="desc">I love all casting I just did my first HORROR MOVIE yesterday and got to
                                work with a lot of really great people!!! I am so thankful for this opportunitie... </p>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="content-card">
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/talent/hero-1.jpg')); ?>" alt="Johny Tri Nguyen" /></div>
                        <div class="content">
                            <h6 class="heading">Johny Tri Nguyen</h6>
                            <p class="sub-heading">Movie Actor</p>
                            <ul class="rating">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <p class="desc">I got so many auditions from this site to be in I’m actually getting ready
                                for one this Saturday and one next Saturday and Sunday and on Thursday 🤞❤️💯 good luck
                                to me thanks</p>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="content-card">
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/talent/hero-2.jpg')); ?>" alt="Lavonne Burgs" /></div>
                        <div class="content">
                            <h6 class="heading">Lavonne Burgs</h6>
                            <p class="sub-heading">Movie Actor</p>
                            <ul class="rating">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <p class="desc">Walked the runway for the Miss California Nation competition and was a life
                                changer. Looking forward to more projects in the coming future.</p>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="content-card">
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/talent/hero-3.jpg')); ?>" alt="Joshua Stephens" /></div>
                        <div class="content">
                            <h6 class="heading">Joshua Stephens</h6>
                            <p class="sub-heading">Movie Actor</p>
                            <ul class="rating">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <p class="desc">I love all casting I just did my first HORROR MOVIE yesterday and got to
                                work with a lot of really great people!!! I am so thankful for this opportunitie... </p>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="paging">
                <li role="button" data-index="0"></li>
                <li role="button" data-index="1"></li>
                <li role="button" data-index="2"></li>
                <li role="button" data-index="3"></li>
                <li role="button" data-index="4"></li>
                <li role="button" data-index="5"></li>
            </ul>
            <a href="#" role="button" class="btn-prev" title="prev item"><span></span></a>
            <a href="#" role="button" class="btn-next" title="next item"><span></span></a>
        </div>
        
    </section>
</main>
<!-- END MAIN PAGE -->

<!-- FOOTER -->
<?php echo $__env->make('web.partials.how_it_works', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="join-us-footer">
    <div class="wrap-1200">
        <div class="wrap">
            <h4 class="heading">Be The First to <br class="mb-hide" />Get New Casting Jobs</h4>
            <div class="content">
                <p>Create your account now and receive new job notifications immediately in real time!</p>
                <div class="btn-wrap">
                    <a href="<?php echo e(route('signup')); ?>" class="btn-gold-arrow cta" role="button">
                        <h5>Sign up as a talent</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/casting_board.blade.php ENDPATH**/ ?>