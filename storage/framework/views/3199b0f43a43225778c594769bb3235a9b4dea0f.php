    <!-- HEADER -->
    <?php
        if (!isset($menu_active)) {
            $menu_active = ['casting_board'=>'', 'our_talent'=>'', 'talent_service'=>'', 'casting_service'=>'', 'about_us'=>''];
        }
            
    ?>

    <?php if(isset($client)): ?>
    <header id="main-header" class="theme-dark">
    <?php elseif(isset($talent)): ?>
    <header id="main-header" class="theme-gold">
    <?php else: ?>
    <header id="main-header">
    <?php endif; ?>
        <div class="main-ctr wrap-1200">
            <div class="logo-wrap">
                <a href="<?php echo e(route('home')); ?>" role="button"
                    class="btn-mb"><span></span><span></span><span></span></a>
                <a href="<?php echo e(route('home')); ?>" class="logo">
                    <?php if(isset($talent)): ?>
                    <img src="<?php echo e(asset('assets/img/bg/logo-black.svg')); ?>" alt="Take1 logo" />
                    <?php else: ?>
                    <img src="<?php echo e(asset('assets/img/bg/logo.svg')); ?>" alt="Take1 logo" />
                    <?php endif; ?>
                </a>
            </div>
            <?php if(isset($client)): ?>
            <nav class="main-menu">
                <h4 class="heading">Menu</h4>
                <ul class="top-menu">
                    <li class="top-item"><a href="<?php echo e(route('client_casting_board')); ?>" class="active">
                            <h5>MANAGE PROJECT </h5>
                        </a></li>
                    <li class="top-item"><a href="<?php echo e(route('client_talent_list')); ?>">
                            <h5>talent services</h5>
                        </a></li>
                    <li class="top-item"><a href="#">
                            <h5>lookboard</h5>
                        </a></li>
                </ul>
            </nav>
            <?php elseif(isset($talent)): ?>
            <nav class="main-menu">
                <h4 class="heading">Menu</h4>
                <ul class="top-menu">
                    <!-- SWITCH HERE -->
                    <li class="top-item"><a href="<?php echo e(route('talent_casting_board')); ?>"><h5>CASTING BILLBOARDS</h5></a></li>
                    <li class="top-item"><a href="<?php echo e(route('talent_manage_role')); ?>" ><h5>MANAGE ROLES </h5></a></li>
                    <li class="top-item"><a href="#" ><h5>LOOKBOARD</h5></a></li>
                </ul>
            </nav>
            <?php else: ?>
            <nav class="main-menu">
                <h4 class="heading">Menu</h4>
                <ul class="top-menu">
                    <li class="top-item"><a href="<?php echo e(route('casting_board')); ?>" <?php echo e($menu_active['casting_board']); ?>>
                            <h5>CASTING BOARD</h5>
                        </a></li>
                    <li class="top-item"><a href="<?php echo e(route('our_talent')); ?>" <?php echo e($menu_active['our_talent']); ?>>
                            <h5>MEET OUR TALENTS</h5>
                        </a></li>
                    <li class="top-item has-sub">
                        <a href="<?php echo e(route('talent_service')); ?>" <?php echo e($menu_active['talent_service']); ?>>
                            <h5>TALENT SERVICES</h5>
                            <b role="button" class="icon-sub"><i></i></b>
                        </a>
                        <div class="sub-menu">
                            <h5 class="title">
                                <a href="<?php echo e(route('talent_service')); ?>" <?php echo e($menu_active['talent_service']); ?>>TALENT SERVICES</a>
                            </h5>
                            <ul class="aside">
                                <li class="sub-item">
                                    <a href="<?php echo e(route('talent_service')); ?>" <?php echo e($menu_active['talent_service']); ?>>
                                        <h6>Taped Coach &amp; Casting Auditions</h6>
                                    </a>
                                    <div class="sub-cta">
                                        <p class="txt-gray">Talent can book Take1 Studio time at our HCMC location to
                                            receive coaching, record, edit and upload link of their audition
                                            performances for nation wide casting calls.</p>
                                    </div>
                                </li>
                                <li class="sub-item">
                                    <a href="<?php echo e(route('talent_service')); ?>" <?php echo e($menu_active['talent_service']); ?>>
                                        <h6>Online Reader &amp; Acting Coach Support</h6>
                                    </a>
                                    <div class="sub-cta">
                                        <p class="txt-gray">Talents can sign up to find available talent readers or
                                            acting coaches to practice, rehearse and be coached online.</p>
                                    </div>
                                </li>
                                <li class="sub-item">
                                    <a href="<?php echo e(route('talent_service')); ?>" <?php echo e($menu_active['talent_service']); ?>>
                                        <h6>Talent Contract &amp; Deals Consultation</h6>
                                    </a>
                                    <div class="sub-cta">
                                        <p class="txt-gray">Talents can receive online consultation from our talent
                                            managers for contract terms, rates, and negotiation advice</p>
                                    </div>
                                </li>
                                <li class="sub-item">
                                    <a href="<?php echo e(route('talent_service')); ?>" <?php echo e($menu_active['talent_service']); ?>>
                                        <h6>Headshot Photography</h6>
                                    </a>
                                    <div class="sub-cta">
                                        <p class="txt-gray">Talents can book additional headshot photography with
                                            experienced Take1 makeup/hair/stylists to capture many looks and character
                                            portrayals to add to their Online Take1 talent profile.</p>
                                    </div>
                                </li>
                                <li class="sub-item">
                                    <a href="<?php echo e(route('talent_service')); ?>" <?php echo e($menu_active['talent_service']); ?>>
                                        <h6>Studio Rentals</h6>
                                    </a>
                                    <div class="sub-cta">
                                        <p class="txt-gray">Talents can book Take1 Studio time for their own shooting,
                                            teleprompter, camera/editor, makeup/hair, stylist, lighting to build their
                                            professional talent video reel.</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="main-cta">
                                <ul class="list-bullet">
                                    <li>Taped Coach &amp; Casting Auditions</li>
                                    <li>Online Reader &amp; Acting Coach Support</li>
                                    <li>Talent Contract &amp; Deals Consultation</li>
                                    <li>Headshot Photography</li>
                                    <li>Studio Rentals</li>
                                </ul>
                                <a href="<?php echo e(route('signup')); ?>#signup-talent" role="button" class="btn-gold cta type-2">JOIN as a
                                    talent</a>
                            </div>
                        </div>
                    </li>
                    <li class="top-item has-sub">
                        <a href="<?php echo e(route('casting_service')); ?>" <?php echo e($menu_active['casting_service']); ?>>
                            <h5>CASTING SERVICES</h5>
                            <b role="button" class="icon-sub"><i></i></b>
                        </a>
                        <div class="sub-menu">
                            <h5 class="title">
                                <a href="<?php echo e(route('casting_service')); ?>" <?php echo e($menu_active['casting_service']); ?>>CASTING SERVICES</a>
                            </h5>
                            <ul class="aside">
                                <li class="sub-item">
                                    <a href="<?php echo e(route('casting_service')); ?>" <?php echo e($menu_active['casting_service']); ?>>
                                        <h6>Book your Talent</h6>
                                    </a>
                                    <div class="sub-cta">
                                        <p class="txt-gray">Submit your roles into the Take1 casting job board, manage
                                            talent profiles that match your roles you need, and organize auditions so
                                            you can book your talent today</p>
                                    </div>
                                </li>
                                <li class="sub-item">
                                    <a href="<?php echo e(route('casting_service')); ?>" <?php echo e($menu_active['casting_service']); ?>>
                                        <h6>Your Casting Dashboard</h6>
                                    </a>
                                    <div class="sub-cta">
                                        <p class="txt-gray">Manage and organize casting projects. Mix, Match, &amp; View
                                            talents. And receive Talent recommendations from our Take1 Platform.</p>
                                    </div>
                                </li>
                                <li class="sub-item">
                                    <a href="<?php echo e(route('casting_service')); ?>" <?php echo e($menu_active['casting_service']); ?>>
                                        <h6>The Take1 Studio</h6>
                                    </a>
                                    <div class="sub-cta">
                                        <p class="txt-gray">We offer full casting and talent services in a professional
                                            daylight studio featuring full camera & lighting equipment together with an
                                            experienced crew.</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="main-cta">
                                <ul class="list-bullet">
                                    <li>Book your Talent</li>
                                    <li>Your Casting Dashboard</li>
                                    <li>The Take1 Studio</li>
                                </ul>
                                <a href="<?php echo e(route('signup')); ?>#signup-client" role="button" class="btn-gold cta type-2">JOIN as a
                                    client</a>
                            </div>
                        </div>
                    </li>
                    <li class="top-item has-sub">
                        <a href="<?php echo e(route('about')); ?>" <?php echo e($menu_active['about_us']); ?>>
                            <h5>ABOUT US</h5>
                            <b role="button" class="icon-sub"><i></i></b>
                        </a>
                        <div class="sub-menu type-mini">
                            <h5 class="title"><a href="<?php echo e(route('about')); ?>" <?php echo e($menu_active['about_us']); ?>>ABOUT US</a></h5>
                            <ul class="aside">
                                <li class="sub-item">
                                    <a href="<?php echo e(route('about')); ?>" <?php echo e($menu_active['about_us']); ?>>
                                        <h6>About Us</h6>
                                    </a>
                                </li>
                                <li class="sub-item">
                                    <a href="<?php echo e(config('app.url')); ?>/news-events">
                                        <h6>News & Event</h6>
                                    </a>
                                </li>
                            </ul>
                            <div class="main-cta">
                                <div class="wrap">
                                    <ul class="list-bullet type-2">
                                        <li><a href="<?php echo e(route('about')); ?>" <?php echo e($menu_active['about_us']); ?>>About Us</a></li>
                                        <li><a href="<?php echo e(config('app.url')); ?>/news-events">News & Event</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <?php endif; ?>


            <?php if(Auth::check()): ?>
            <?php
            $user = Auth::user();
            ?>
            <?php if($user->type == \App\Models\Registration::TALENT): ?>
            <div class="user-logged">
                <div class="wrap-noti">
                    <button class="notibell js-active"><i></i></button>
                    <div class="panel">
                        <header>
                        <p>
                            <strong>Notification</strong>&nbsp;
                            <a href="#" role="button" class="btn-read-all">Mark As Read All</a>
                        </p>
                        <nav>
                            <button class="js-active btn-toggle">All</button>
                            <button class="btn-toggle">Unread</button>
                        </nav>
                        </header>
                        <ul>
                            <!-- SWITCH HERE -->
                            <?php $__currentLoopData = $user->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('talent_role_request', ['id'=>$m->request_id, 'role_id'=>$m->prole_id])); ?>" class="item js-active">
                                    <div class="img-wrap"><img src="<?php echo e($m->company->thumb_url); ?>" alt="<?php echo e($m->type); ?>" /></div>
                                    <p class="content">
                                        <strong><?php echo e($m->type); ?></strong>
                                        <span><?php echo e($m->message); ?></span>
                                        <time datetime=""><?php echo e(tk1BetweenDates(date("Y/m/d"), $m->created_at)); ?> ago</time>
                                    </p>
                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="wrap-panel">
                    <a href="<?php echo e(route('talent_profile')); ?>" role="button" class="btn-active">
                        <div class="img-wrap-circle"><img src="<?php echo e($user->cover_url); ?>" alt="<?php echo e($user->name); ?>"/></div>
                        <b><?php echo e($user->name); ?></b>
                    </a>
                    <div class="user-panel">
                        <figure>
                        <div class="img-wrap-circle"><img src="<?php echo e($user->cover_url); ?>" alt="<?php echo e($user->name); ?>"/></div>
                        <figcaption>
                            <b><?php echo e($user->name); ?></b>
                            <i><?php echo e($user->location); ?></i>
                        </figcaption>
                        </figure>
                        <a href="<?php echo e(route('talent_manage_role')); ?>" role="button" class="btn-gold cta">role management</a>
                        <nav>
                            <h5 class="hidden">User Profile</h5>
                            <ul>
                                <li><a href="<?php echo e(route('talent_profile')); ?>">
                                        <h6>Your Profile</h6>
                                    </a></li>
                                <li><a href="<?php echo e(route('talent_account')); ?>">
                                        <h6>Account Information</h6>
                                    </a></li>
                                <li><a href="<?php echo e(route('talent_membership')); ?>">
                                        <h6>Membership Plan</h6>
                                    </a></li>
                                
                                <li><a href="<?php echo e(route('logout')); ?>">
                                        <h6>Sign out</h6>
                                    </a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="user-logged">
                <div class="wrap-noti">
                    <button class="notibell js-active"><i></i></button>
                    <div class="panel">
                        <header>
                            <p>
                                <strong>Notification</strong>&nbsp;
                                <a href="#" role="button" class="btn-read-all">Mark As Read All</a>
                            </p>
                            <nav>
                                <button class="js-active btn-toggle">All</button>
                                <button class="btn-toggle">Unread</button>
                            </nav>
                        </header>
                        <ul>
                            <?php $__currentLoopData = $user->company->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('client_requested_role', ['id'=>$m->prole_id])); ?>" class="item js-active">
                                    <div class="img-wrap"><img src="<?php echo e($m->registration->cover_url); ?>" alt="<?php echo e($m->type); ?>" /></div>
                                    <p class="content">
                                        <strong><?php echo e($m->type); ?></strong>
                                        <span><?php echo e($m->message); ?></span>
                                        <time datetime=""><?php echo e(tk1BetweenDates(date("Y/m/d"), $m->created_at)); ?> ago</time>
                                    </p>
                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="wrap-panel">
                    <a href="<?php echo e(route('client_profile')); ?>" role="button" class="btn-active">
                        <div class="img-wrap-circle"><img src="<?php echo e($user->company->thumb_url); ?>" alt="<?php echo e($user->company->name); ?>" /></div>
                        <b><?php echo e($user->company->name); ?></b>
                    </a>
                    <div class="user-panel">
                        <figure>
                            <div class="img-wrap-circle"><img src="<?php echo e($user->company->thumb_url); ?>" alt="<?php echo e($user->company->name); ?>" /></div>
                            <figcaption>
                                <b><?php echo e($user->company->name); ?></b>
                                <i>VIETNAM</i>
                            </figcaption>
                        </figure>
                        <a href="<?php echo e(route('client_dashboard')); ?>" role="button" class="btn-gold cta">project management</a>
                        <nav>
                            <h5 class="hidden">User Profile</h5>
                            <ul>
                                <li><a href="<?php echo e(route('client_profile')); ?>">
                                        <h6>Your Profile</h6>
                                    </a></li>
                                <li><a href="<?php echo e(route('client_account_info')); ?>">
                                        <h6>Account Information</h6>
                                    </a></li>
                                <li><a href="<?php echo e(route('client_membership')); ?>">
                                    <h6>Membership & Billing</h6>
                                </a></li>
                                <li><a href="<?php echo e(route('logout')); ?>">
                                        <h6>Sign out</h6>
                                    </a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php else: ?>
            <nav class="btn-wrap">
                <h5 class="hidden">User</h5>
                <a href="<?php echo e(config('app.url')); ?>/signup" role="button" class="btn-user">
                    <h6>sign up</h6>
                </a>
                <a href="<?php echo e(config('app.url')); ?>/login" role="button" class="btn-txt">
                    <h6>log in</h6>
                </a>
                <a href="#" role="button" class="btn-lang">
                    <img src="<?php echo e(asset('assets/img/flag/en.svg')); ?>" alt="en flag" />
                </a>
                <a href="<?php echo e(config('app.url')); ?>/login" role="button" class="btn-user-mb"></a>
            </nav>
            <?php endif; ?>
        </div>
    </header>

    <header id="mb-header">
        <h4 class="heading">Menu</h4>
        <ul class="top-menu">
            <li class="top-item"><a href="<?php echo e(route('casting_board')); ?>" <?php echo e($menu_active['casting_board']); ?>>
                    <h5>CASTING BOARD</h5>
                </a></li>
            <li class="top-item"><a href="<?php echo e(route('our_talent')); ?>" <?php echo e($menu_active['our_talent']); ?>>
                    <h5>MEET OUR TALENTS</h5>
                </a></li>
            <li class="top-item has-sub">
                <a href="<?php echo e(route('talent_service')); ?>" <?php echo e($menu_active['talent_service']); ?>>
                    <h5>TALENT SERVICES</h5>
                    <b role="button" class="icon-sub"><i></i></b>
                </a>
                <div class="sub-menu">
                    <!--h5 class="title">
		                		<a href="<?php echo e(route('talent_service')); ?>" <?php echo e($menu_active['talent_service']); ?>>TALENT SERVICES</a>
		                </h5-->
                    <ul class="aside">
                        <li class="sub-item">
                            <a href="<?php echo e(route('talent_service')); ?>" <?php echo e($menu_active['talent_service']); ?>>
                                <h6>Taped Coach & Casting Auditions</h6>
                            </a>
                            <div class="sub-cta">
                                <p class="txt-gray">Talent can book Take1 Studio time at our HCMC location to receive
                                    coaching, record, edit and upload link of their audition performances for nation
                                    wide casting calls.</p>
                            </div>
                        </li>
                        <li class="sub-item">
                            <a href="<?php echo e(route('talent_service')); ?>" <?php echo e($menu_active['talent_service']); ?>>
                                <h6>Online Reader &amp; Acting Coach Support</h6>
                            </a>
                            <div class="sub-cta">
                                <p class="txt-gray">Talents can sign up to find available talent readers or acting
                                    coaches to practice, rehearse and be coached online.</p>
                            </div>
                        </li>
                        <li class="sub-item">
                            <a href="<?php echo e(route('talent_service')); ?>" <?php echo e($menu_active['talent_service']); ?>>
                                <h6>Talent Contract &amp; Deals Consultation</h6>
                            </a>
                            <div class="sub-cta">
                                <p class="txt-gray">Talents can receive online consultation from our talent managers for
                                    contract terms, rates, and negotiation advice.</p>
                            </div>
                        </li>
                        <li class="sub-item">
                            <a href="<?php echo e(route('talent_service')); ?>" <?php echo e($menu_active['talent_service']); ?>>
                                <h6>Studio Rentals</h6>
                            </a>
                            <div class="sub-cta">
                                <div class="wrap">
                                    <p class="txt-gray">Talents can book Take1 Studio time for their own shooting,
                                        teleprompter, camera/editor, makeup/hair, stylist, lighting to build their
                                        professional talent video reel.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="main-cta">
                        <ul class="list-bullet">
                            <li>Taped Coach & Casting Auditions</li>
                            <li>Online Reader & Acting Coach Support</li>
                            <li>Talent Contract & Deals Consultation</li>
                            <li>Headshot Photography</li>
                            <li>Studio Rentals</li>
                        </ul>
                        <a href="<?php echo e(route('signup')); ?>#signup-talent" role="button" class="btn-gold cta type-2">JOIN as a talent</a>
                    </div>
                </div>
            </li>
            <li class="top-item has-sub">
                <a href="<?php echo e(route('casting_service')); ?>" <?php echo e($menu_active['casting_service']); ?>>
                    <h5>CASTING SERVICES</h5>
                    <b role="button" class="icon-sub"><i></i></b>
                </a>
                <div class="sub-menu">
                    <!--h5 class="title">
		                		<a href="<?php echo e(route('talent_service')); ?>" <?php echo e($menu_active['talent_service']); ?>>CASTING SERVICES</a>
		                </h5-->
                    <ul class="aside">
                        <li class="sub-item">
                            <a href="<?php echo e(route('casting_service')); ?>" <?php echo e($menu_active['casting_service']); ?>>
                                <h6>Book your Talent</h6>
                            </a>
                            <div class="sub-cta">
                                <div class="wrap">
                                    <p class="txt-gray">Submit your roles into the Take1 casting job board, manage
                                        talent profiles that match your roles you need, and organize auditions so you
                                        can book your talent today.</p>
                                </div>
                            </div>
                        </li>
                        <li class="sub-item">
                            <a href="<?php echo e(route('casting_service')); ?>" <?php echo e($menu_active['casting_service']); ?>>
                                <h6>Your Casting Dashboard</h6>
                            </a>
                            <div class="sub-cta">
                                <div class="wrap">
                                    <p class="txt-gray">Manage and organize casting projects. Mix, Match, &amp; View
                                        talents. And receive Talent recommendations from our Take1 Platform.</p>
                                </div>
                            </div>
                        </li>
                        <li class="sub-item">
                            <a href="<?php echo e(route('casting_service')); ?>" <?php echo e($menu_active['casting_service']); ?>>
                                <h6>The Take1 Studio</h6>
                            </a>
                            <div class="sub-cta">
                                <div class="wrap">
                                    <p class="txt-gray">We offer full casting and talent services in a professional
                                        daylight studio featuring full camera &amp; lighting equipment together with an
                                        experienced crew.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="main-cta">
                        <ul class="list-bullet">
                            <li>Book your Talent</li>
                            <li>Your Casting Dashboard</li>
                            <li>The Take1 Studio</li>
                        </ul>
                        <a href="<?php echo e(route('signup')); ?>#signup-talent" role="button" class="btn-gold cta type-2">JOIN as a talent</a>
                    </div>
                </div>
            </li>
            <li class="top-item has-sub">
                <a href="<?php echo e(route('about')); ?>" <?php echo e($menu_active['about_us']); ?>>
                    <h5>ABOUT US</h5>
                    <b role="button" class="icon-sub"><i></i></b>
                </a>
                <div class="sub-menu type-mini">
                    <!--h5 class="title"><a href="<?php echo e(route('about')); ?>" <?php echo e($menu_active['about_us']); ?>>ABOUT US</a></h5-->
                    <ul class="aside">
                        <li class="sub-item">
                            <a href="<?php echo e(route('about')); ?>" <?php echo e($menu_active['about_us']); ?>>
                                <h6>About Us</h6>
                            </a>
                        </li>
                        <li class="sub-item">
                            <a href="<?php echo e(config('app.url')); ?>/news-events">
                                <h6>News & Event</h6>
                            </a>
                        </li>
                    </ul>
                    <div class="main-cta">
                        <div class="wrap">
                            <ul class="list-bullet type-2">
                                <li><a href="<?php echo e(route('about')); ?>" <?php echo e($menu_active['about_us']); ?>>About Us</a></li>
                                <li><a href="<?php echo e(config('app.url')); ?>/news-events">News & Event</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </header>
    <div id="mb-overlay"></div>
    <!-- END HEADER --><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/partials/header_menu.blade.php ENDPATH**/ ?>