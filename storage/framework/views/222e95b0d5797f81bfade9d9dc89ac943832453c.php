

<?php $__env->startSection('title', 'Our Talent'); ?>

<?php $__env->startSection('hidden_page', 'Our Talent'); ?>

<?php $__env->startSection('content'); ?>

<main id="page-our-talent">
    <input type="hidden" id="page-id" value="page-our-talent" />
<!--
    <section class="heading-banner">
        <h2 class="heading">Meet our <span class="gold-underline">Talents</span></h2>
        <p>The future of casting is here.  Take1’s industry leading platform allows top casting directors to find the right cast they need from talents across the country at the power of their finger tips.  Have a sneak peak at some of the Take1 Talents that you will have access to.
</p>
        <a href="#" class="btn-gold-arrow cta arrow-type-2" role="button">See how Take1 works</a>
    </section>
-->

    <section class="banner-slider pd-ctr pt-0">
        <h5 class="hidden">Banner Slider</h5>
        <div class="slider">
            <ul class="item-wrap">
                <li class="item bg-alto">
                    <div class="content-card wrap-1200">
                        <img class="main-img" src="<?php echo e(asset('assets/img/banner/hero-slider-2.png')); ?>"
                            alt="All casting profile" />
                        <div class="content">
                            <b class="sub-heading">Perfect Take1 Profile</b>
                            <h6 class="heading heading-40">Collection of Potential Actors Profiles</h6>
                            <a href="#" role="button" class="btn-black-arrow cta">Find out more</a>
                        </div>
                    </div>
                </li>
                <li class="item bg-supernova">
                    <div class="content-card wrap-1200">
                        <img class="main-img" src="<?php echo e(asset('assets/img/banner/hero-slider.png')); ?>"
                            alt="All casting profile" />
                        <div class="content">
                            <h6 class="heading heading-32">Actors for Toyota Tacoma Spec Commercial</h6>
                            <p class="info">
                                <span><i class="city">City:&nbsp;</i>Hochiminh City</span>
                                <span><i class="gender">Gender:&nbsp;</i>Female</span>
                                <span><i class="age">Age:&nbsp;</i>20-40</span>
                            </p>
                            <a href="#" role="button" class="btn-black-arrow cta">Find out more</a>
                        </div>
                        <b class="tag jobs">Hot Jobs in This Month</b>
                    </div>
                </li>
                <li class="item bg-alto">
                    <div class="content-card wrap-1200">
                        <img class="main-img" src="<?php echo e(asset('assets/img/banner/hero-slider-2.png')); ?>"
                            alt="All casting profile" />
                        <div class="content">
                            <b class="sub-heading">Perfect Take1 Profile</b>
                            <h6 class="heading heading-40">Collection of Potential Actors Profiles</h6>
                            <a href="#" role="button" class="btn-black-arrow cta">Find out more</a>
                        </div>
                    </div>
                </li>
                <li class="item bg-supernova">
                    <div class="content-card wrap-1200">
                        <img class="main-img" src="<?php echo e(asset('assets/img/banner/hero-slider.png')); ?>"
                            alt="All casting profile" />
                        <div class="content">
                            <h6 class="heading heading-32">Actors for Toyota Tacoma Spec Commercial</h6>
                            <p class="info">
                                <span><i class="city">City:&nbsp;</i>Hochiminh City</span>
                                <span><i class="gender">Gender:&nbsp;</i>Female</span>
                                <span><i class="age">Age:&nbsp;</i>20-40</span>
                            </p>
                            <a href="#" role="button" class="btn-black-arrow cta">Find out more</a>
                        </div>
                        <b class="tag jobs">Hot Jobs in This Month</b>
                    </div>
                </li>
                <li class="item bg-alto">
                    <div class="content-card wrap-1200">
                        <img class="main-img" src="<?php echo e(asset('assets/img/banner/hero-slider-2.png')); ?>"
                            alt="All casting profile" />
                        <div class="content">
                            <b class="sub-heading">Perfect Take1 Profile</b>
                            <h6 class="heading heading-40">Collection of Potential Actors Profiles</h6>
                            <a href="#" role="button" class="btn-black-arrow cta">Find out more</a>
                        </div>
                    </div>
                </li>
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

    <section class="icon-list">
        <h5 class="hidden">Benifits</h5>
        <ul class="col-wrap wrap-1200">
            <li>
                <div class="img-wrap"><img src="<?php echo e(asset('assets/img/icon-list/1.svg')); ?>" alt="Great Talents" /></div>
                <h5 class="heading">Professional Working Style</h5>
                <p>All Take1 Talents have access to customized workshops, consultations, and tips advice from Take1’s inhouse team of experienced industry professionals to allow them to be their best.</p>
            </li>
            <li class="deco flip">
                <div class="img-wrap"><img src="<?php echo e(asset('assets/img/icon-list/2.svg')); ?>"
                        alt="Friendliness - Enthusiasm" /></div>
                <h5 class="heading">Self Taped Auditions Available</h5>
                <p>In the world we live today, Talent’s have the ability to submit self taped auditions from anywhere they are, and Take1 will help manage this through Take1’s innovative online casting dashboard solution.</p>
            </li>
            <li>
                <div class="img-wrap"><img src="<?php echo e(asset('assets/img/icon-list/3.svg')); ?>"
                        alt="Professional Working Style" /></div>
                <h5 class="heading">The Take1 Studio</h5>
                <p>Talents have access to Take1’s Studio which is designed for filming audition tapes with an inhouse team of coaches to prepare them to be their best.
</p>
            </li>
        </ul>
    </section>


    <section class="casting-board">
        <div class="wrap wrap-1200 dir-col">
            <header class="banner dflex">
                <h4 class="heading"><?php echo e($talents->total()); ?> Perfect Profiles</h4>
                <form class="form-filter" id="form-filter">
                    <strong>Filter:</strong>
                    <div class="input-wrap input-sel-box">
                    <div class="holder">
                        <input type="text" class="input static" readonly="">
                        <label class="txt-label">By gender&nbsp;<span></span></label>
                    </div>
                    <p class="warning"></p>
                    <ul class="opt-list" style="display: none;">
                        <li><label><input type="checkbox" name="gender[0]" value="Male"><b>Male</b></label></li>
                        <li><label><input type="checkbox" name="gender[1]" value="Female"><b>Female</b></label></li>
                    </ul>
                    </div>
                    <div class="input-wrap input-sel-box">
                    <div class="holder">
                        <input type="text" class="input static" readonly="">
                        <label class="txt-label">By role type&nbsp;<span></span></label>
                    </div>
                    <p class="warning"></p>
                    <ul class="opt-list">
                        <?php
                            $arr = $arrInfo['looking_for_role'];
                        ?>
                        <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><label><input type="checkbox" name="role[<?php echo e($k); ?>]" value="<?php echo e($k); ?>"><b><?php echo e($v); ?></b></label></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    </div>
                    <button class="btn-icon" type="submit">Apply</button>
                </form>
            </header>

            <ul class="list-post col-5" id="talentList">
            <?php $__currentLoopData = $talents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $types = $tal->careers;
                    $arr = array();
                    foreach ($types as $k=>$v) {
                        $arr[] = '#'.$v->tag_name;
                    }
                    $str_type = implode(' ', $arr);

                    switch ($str_type) {
                        case '#Actor' :
                            $color = '#FFBB00';
                            break;
                        case '#Actress' :
                            $color = '#FFBB00';
                            break;
                        case '#Model' :
                            $color = '#779A15';
                            break;
                        case '#KOL' :
                            $color = '#F39F00';
                            break;
                        case '#Dancer' :
                            $color = '#F39F00';
                            break;
                        default :
                            $color = '#958A86';
                    }
                ?>
                
                <li class="item">
                    <a href="<?php echo e(route('talent_detail', $tal->id)); ?>" class="casting-card type-2">
                        <div class="img-wrap"><img class="main-img"
                                src="<?php echo e($tal->cover_url); ?>" alt="<?php echo e($tal->name); ?>" /></div>
                        <div class="content">
                            <b class="tag" style="background-color:<?php echo e($color); ?>"><?php echo e($str_type); ?></b>
                            <h5 class="heading"><?php echo e($tal->name); ?></h5>
                            <p class="info">
                                <span><i class="gender">Gender:&nbsp;</i><?php echo e($tal->gender); ?></span>
                                <span><i class="age">Age:&nbsp;</i><?php echo e($tal->age); ?></span>
                            </p>
                        </div>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <?php if( $talents->hasMorePages() ): ?>
            <footer class="center-cta"><a href="#" role="button" id="viewMoreTalent" class="btn-gold-arrow cta">View more Our Talents</a>
            </footer>
            <?php endif; ?>
        </div>
    </section>

    <section class="carousel-holder testimonial pd-ctr pb-0">
        <header class="wrap-1200">
            <h5 class="heading">What Other Client Say?</h5>
            <p>We have been fortunate to work with some great people in the industry and here’s what they had to say about us.  Give us a try, you won’t be disappointed!</p>
        </header>
        <div class="carousel col-3 wrap-1200">
            <ul class="item-wrap">
                <li class="item">
                    <div class="content-card">
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/our-talent/client-1.png')); ?>"
                                alt="Triangle SaiGon" /></div>
                        <div class="content">
                            <h6 class="heading">Triangle SaiGon</h6>
                            <p class="sub-heading">Production House</p>
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
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/our-talent/client-2.png')); ?>"
                                alt="MTV Music Television" /></div>
                        <div class="content">
                            <h6 class="heading">MTV Music Television</h6>
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
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/our-talent/client-3.png')); ?>" alt="1989" />
                        </div>
                        <div class="content">
                            <h6 class="heading">1989</h6>
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
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/our-talent/client-1.png')); ?>"
                                alt="Triangle SaiGon" /></div>
                        <div class="content">
                            <h6 class="heading">Triangle SaiGon</h6>
                            <p class="sub-heading">Production House</p>
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
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/our-talent/client-2.png')); ?>"
                                alt="MTV Music Television" /></div>
                        <div class="content">
                            <h6 class="heading">MTV Music Television</h6>
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
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/our-talent/client-3.png')); ?>" alt="1989" />
                        </div>
                        <div class="content">
                            <h6 class="heading">1989</h6>
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

    <section class="carousel-holder service-board">
        <header class="wrap-1200">
            <h5 class="heading">Casting Services</h5>
            <p>Aside from our online solutions that give you access to our Take1 Talents and helps you manage auditions to select the right cast; we provide other casting support services for your talent needs.</p>
        </header>
        <div class="carousel col-3 wrap-1200">
            <ul class="item-wrap">
                <li class="item">
                    <div class="content-card">
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/our-talent/service-1.jpg')); ?>"
                                alt="Coaching" /></div>
                        <div class="content">
                            <h6 class="heading">Take1 Studio</h6>
                            <p class="desc">We offer full casting and talent services in a professional daylight studio featuring full camera & lighting equipment with an experienced crew. </p>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="content-card">
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/our-talent/service-2.jpg')); ?>"
                                alt="Facility" /></div>
                        <div class="content">
                            <h6 class="heading">Talent Management Team</h6>
                            <p class="desc">Our inhouse team of Talent managers will help with your bookings, scheduling, negotiations, and other supporting needs when on set.</p>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="content-card">
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/our-talent/service-3.jpg')); ?>"
                                alt="Talent" /></div>
                        <div class="content">
                            <h6 class="heading">Coaching</h6>
                            <p class="desc">With Take1’s partnership with ACT Academy, we provide you coaching service support for your talents to ensure the best performance for your cast. If you need a support team, give Take1 a call.  We’ll help you out !</p>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="paging type-2">
                <li role="button" data-index="0"></li>
                <li role="button" data-index="1"></li>
                <li role="button" data-index="2"></li>
            </ul>
            <a href="#" role="button" class="btn-prev" title="prev item"><span></span></a>
            <a href="#" role="button" class="btn-next" title="next item"><span></span></a>
        </div>
        <!-- <footer class="wrap-1200">
            <p>Eu augue ut lectus arcu bibendum at. Sodales ut eu sem integer.</p>
            <a href="#" class="btn-black-arrow">Find out more</a>
        </footer> -->
    </section>
</main>
<!-- END MAIN PAGE -->

<!-- FOOTER -->


<section class="join-us-footer">
    <div class="wrap-1200">
        <div class="wrap">
            <h4 class="heading">Register now and find new Talent !</h4>
            <div class="content">
                <p>Experience your personalized dashboard, receive talent submissions, and manage your auditions in the comfort of your own home. </p>
                <div class="btn-wrap">
                    <a href="<?php echo e(route('signup')); ?>" class="btn-gold-arrow cta" role="button">
                        <h5>sign up as Client</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent.blade.php ENDPATH**/ ?>