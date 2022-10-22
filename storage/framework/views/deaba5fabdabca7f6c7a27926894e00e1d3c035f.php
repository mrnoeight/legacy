

<?php $__env->startSection('title', 'Sign Up'); ?>

<?php $__env->startSection('hidden_page', 'Sign Up'); ?>

<?php $__env->startSection('content'); ?>

<?php                                 
$alphabet = range('A', 'Z');
?>

<!-- MAIN PAGE -->
<main id="page-signup">
    <input type="hidden" id="page-id" value="page-signup" />
    <section class="heading-banner">
        <h2 class="sub-heading">Sign Up an <span class="gold-underline">Account</span></h2>
        <p>Sign up for an account now to become part of the Take1 Network. Once a member, Take1 will give you access to
            all of your casting needs.</p>
        <b class="sub-desc">Already member? <a href="<?php echo e(route('login')); ?>" role="button" class="btn-txt">login</a></b>
    </section>

    <section class="fullscr-banner">
        <h5 class="hidden">Sign Up</h5>
        <figure class="halfscr bg-supernova">
            <img src="<?php echo e(asset('assets/img/banner/hero-1.png')); ?>" alt="signup as talent" class="scroll-animator"
                data-start="40" data-range="40" data-tfy="true" data-tfy-from="0" data-tfy-to="30" />
            <figcaption>
                <h6 class="heading">I’m here to find jobs</h6>
                <a href="<?php echo e(route('signup')); ?>" role="button" class="btn-black-arrow btn-signup-talent cta">signup as
                    talent</a>
            </figcaption>
        </figure>
        <figure class="halfscr bg-shark">
            <img src="<?php echo e(asset('assets/img/banner/hero-2.png')); ?>" alt="signup as client" class="scroll-animator"
                data-start="40" data-range="40" data-tfy="true" data-tfy-from="0" data-tfy-to="30" />
            <figcaption>
                <h6 class="heading">I’m looking for talents</h6>
                <a href="<?php echo e(route('signup')); ?>" role="button" class="btn-gold-arrow btn-signup-client cta">signup as
                    client</a>
            </figcaption>
        </figure>
    </section>

    <section class="signup-form signup-talent">
        <header><img src="<?php echo e(asset('assets/img/bg/logo.svg')); ?>" alt="Take1 logo" /></header>
        <div class="main-content">
            <div class="wel-scr">
                <div class="banner">
                    <h4 class="heading">Create a free account to get started!</h4>
                    <p class="desc">We'll ask you about your profile information, your work, your experiences, and your
                        project so we can suggest a right job for you. Ready?</p>
                    <a href="#" role="button" class="cta btn-gold-enter">Yes, let's do this</a>
                </div>
            </div>
            <div class="aside aside-slider">
                <div class="slider">
                    <ol class="num-list item-wrap"></ol>
                </div>
            </div>

            <form class="quest-list" data-url="<?php echo e(route('registration')); ?>">
                <ul class="quest-wrap">
                    <li class="item js-rq-server" data-url="<?php echo e(route('check_email')); ?>">
                        <h5 class="heading">Profile Information</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">What is your email address?</h6>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input name="signup[email]" id="talent-email" type="text"
                                        class="input js-required js-email" autocomplete="off" data-min="2"
                                        required-txt="Enter your Email Address"
                                        email-txt="Please enter a valid email address">
                                    <label class="txt-label" for="talent-email">Email Address</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Profile Information</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">What is your First and Last Name?</h6>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input name="signup[first-name]" id="talent-first-name" type="text"
                                        class="input js-required" autocomplete="off"
                                        required-txt="Enter your First Name" />
                                    <label class="txt-label" for="talent-first-name">First Name</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input name="signup[last-name]" id="talent-last-name" type="text"
                                        class="input js-required" autocomplete="off"
                                        required-txt="Enter your Last Name" />
                                    <label class="txt-label" for="talent-last-name">Last Name</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Profile Information</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">What is your Birthday?</h6>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input type="text" id="talent-birthday" name="signup[birthday]"
                                        class="input js-required js-min js-date" maxlength="10" autocomplete="off"
                                        required-txt="Enter your Birthday" date-txt="Enter a valid Birthday" />
                                    <label class="txt-label" for="talent-birthday">Birthday (DD/MM/YYYY)</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Profile Information</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">Select your gender</h6>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
                                    <script>
                                    ['Male',
                                        'Female',
                                        'Other'
                                    ].forEach((e, i) => document.write(`
                        <li class="item">
                          <input type="radio" name="signup[gender]" id="talent-rad-gender-${i}" value="${e}"/>
                          <label for="talent-rad-gender-${i}"><i>${e}</i><b>${String.fromCharCode(i + 65)}</b></label>
                        </li>`))
                                    </script>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Profile Information</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">What weight are you and how tall are you?</h6>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input type="text" name="signup[weight]" id="talent-weight"
                                        class="input js-required js-num" autocomplete="off" maxlength="3"
                                        required-txt="Enter your Weight" />
                                    <label class="txt-label" for="talent-weight">Weight (kg)</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input type="text" name="signup[height]" id="talent-height"
                                        class="input js-required js-num" autocomplete="off" maxlength="3"
                                        required-txt="Enter your Height" />
                                    <label class="txt-label" for="talent-height">Height (cm)</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Profile Information</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">What about your measurement?</h6>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input type="text" name="signup[chest]" id="talent-chest"
                                        class="input js-required js-num" autocomplete="off" maxlength="3"
                                        required-txt="Enter your Chest measurement" />
                                    <label class="txt-label" for="talent-chest">Chest (cm)</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input type="text" name="signup[waist]" id="talent-waist"
                                        class="input js-required js-num" autocomplete="off" maxlength="3"
                                        required-txt="Enter your Waist measurement" />
                                    <label class="txt-label" for="talent-waist">Waist (cm)</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input type="text" name="signup[hip]" id="talent-hip"
                                        class="input js-required js-num" autocomplete="off" maxlength="3"
                                        required-txt="Enter your Hip measurement" />
                                    <label class="txt-label" for="talent-hip">Hip (cm)</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input type="text" name="signup[shoes]" id="talent-shoes"
                                        class="input js-required js-num" autocomplete="off" maxlength="3"
                                        required-txt="Enter your shoes size" />
                                    <label class="txt-label" for="talent-shoes">Your shoes size (UK)</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Profile Information</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">What is your phone number?</h6>
                            <div class="compound-wrap">
                                <div class="input-wrap input-sel js-active">
                                    <div class="holder">
                                        <input name="signup[phone-code]" id="talent-phone-code" type="text"
                                            class="input js-required bg-icon"
                                            style="background-image: url(<?php echo e(asset('assets/img/flag/vi.jpg')); ?>)"
                                            autocomplete="off" value="(+84)" readonly />
                                        <label class="txt-label" for="talent-phone-code">Country Code</label>
                                    </div>
                                    <ul class="opt-list">
                                        <li class="has-icon js-active" data-value="(+84)">
                                            <img src="<?php echo e(asset('assets/img/flag/vi.jpg')); ?>" alt="vn" />
                                            <i>(+84)</i>
                                        </li>
                                        <li class="has-icon" data-value="(+86)">
                                            <img src="<?php echo e(asset('assets/img/flag/cn.jpg')); ?>" alt="cn" />
                                            <i>(+86)</i>
                                        </li>
                                        <li class="has-icon" data-value="(+44)">
                                            <img src="<?php echo e(asset('assets/img/flag/en.jpg')); ?>" alt="en" />
                                            <i>(+44)</i>
                                        </li>
                                        <li class="has-icon" data-value="(+33)">
                                            <img src="<?php echo e(asset('assets/img/flag/fr.jpg')); ?>" alt="fr" />
                                            <i>(+33)</i>
                                        </li>
                                        <li class="has-icon" data-value="(+07)">
                                            <img src="<?php echo e(asset('assets/img/flag/ru.jpg')); ?>" alt="ru" />
                                            <i>(+07)</i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="input-wrap">
                                    <div class="holder">
                                        <input name="signup[phone-number]" id="talent-phone-number" type="tel"
                                            maxlength="12" class="input js-required js-min js-num" data-min="9"
                                            autocomplete="off" required-txt="Enter your phone number"
                                            min-txt="Phone number must be at least nine characters" />
                                        <label class="txt-label" for="talent-phone-number">Phone Number</label>
                                    </div>
                                    <p class="warning"></p>
                                </div>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Profile Information</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">Provide your parent or guardian name if you are under 18?</h6>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input name="signup[parent-name]" id="talent-parent-name" type="text" class="input"
                                        autocomplete="off" />
                                    <label class="txt-label" for="talent-parent-name">Parent Name</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Address</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">What is your current province where you live at?</h6>
                            <div class="input-wrap input-sel">
                                <div class="holder">
                                    <input name="signup[address-province]" id="talent-address-province" type="text"
                                        class="input js-required" autocomplete="off"
                                        required-txt="Select your current province" readonly />
                                    <label class="txt-label" for="talent-address-province">Select province</label>
                                </div>
                                <p class="warning"></p>
                                <ul class="opt-list">
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li data-value="<?php echo e($city->name); ?> -- <?php echo e($city->id); ?>"><?php echo e($city->name); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <!-- <li class="item">
                        <h5 class="heading">Address</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">About your city?</h6>
                            <div class="input-wrap input-sel">
                                <div class="holder">
                                    <input name="signup[address-city]" id="talent-address-city" type="text"
                                        class="input js-required" autocomplete="off"
                                        required-txt="Select your current city" readonly />
                                    <label class="txt-label" for="talent-address-city">Select an option</label>
                                </div>
                                <p class="warning"></p>
                                <ul class="opt-list">
                                    <li data-value="Option Value 1">Option Name 1</li>
                                    <li data-value="Option Value 2">Option Name 2</li>
                                    <li data-value="Option Value 3">Option Name 3</li>
                                    <li data-value="Option Value 4">Option Name 4</li>
                                    <li data-value="Option Value 5">Option Name 5</li>
                                    <li data-value="Option Value 6">Option Name 6</li>
                                    <li data-value="Option Value 7">Option Name 7</li>
                                    <li data-value="Option Value 8">Option Name 8</li>
                                </ul>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li> -->

                    <li class="item">
                        <h5 class="heading">Address</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">Provide details address</h6>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input name="signup[details-address]" id="talent-details-address" type="text"
                                        class="input js-required" autocomplete="off"
                                        required-txt="Enter your details address" />
                                    <label class="txt-label" for="talent-details-address">House number, street
                                        name...</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Social Media</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">Which are social media channel you using?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-social-media-all" class="chx-all" />
                                    <label for="talent-chx-social-media-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <script>
						                  var options = '',
						                      inputs = '';
						                  [
						                    'facebook',
						                    'tiktok',
						                    'instagram',
						                    'twitter',
						                    'zalo'
						                  ].forEach((e, i) => {
						                    let j = e[0].toUpperCase() + e.slice(1);
						                    options += `<li class="item">
						                      <input type="checkbox" name="signup[social-media][${i}]" id="talent-chx-social-media-${i}" class="js-enael" data-target="#el-talent-${e}-url" value="${e}"/>
						                      <label for="talent-chx-social-media-${i}"><i>${j}</i><b>${String.fromCharCode(i + 65)}</b></label>
						                    </li>`;
						
						                    inputs += `<div class="el-wrap js-hide" id="el-talent-${e}-url">
						                      <h6 class="sub-heading">Your ${j} URL</h6>
						                      <div class="input-wrap">
						                        <div class="holder">
						                          <input type="text" name="signup[${e}-url]" id="talent-${e}-url" class="input js-required" required-txt="Enter your ${j} link" autocomplete="off"/>
						                          <label class="txt-label" for="talent-${e}-url">${e}</label>
						                        </div>
						                        <p class="warning"></p>
						                      </div>
						                    </div>`
						                  });
						                  document.write('<div class="rad-wrap col-4"><ul class="holder">' + options + '</ul><p class="warning"></p></div>' + inputs);
						                </script>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">What is your current occupation?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-current-occupation-all" class="chx-all" />
                                    <label for="talent-chx-current-occupation-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                <?php 
	                                	$arr = $arrInfo['occupation'];
	                                	$i = 0;
	                                ?>
	                                <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                                <li class="item">
					                          <input type="checkbox" name="signup[current-occupation][<?php echo e($i); ?>]" id="talent-chx-current-occupation-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
					                          <label for="talent-chx-current-occupation-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
					                        </li>
					                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <li class="item">
							                      <input type="checkbox" id="talent-chx-other-current-occupation" class="js-enael" data-target="#el-talent-other-current-occupation"/>
							                      <label for="talent-chx-other-current-occupation"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
							                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-other-current-occupation">
                                <h6 class="sub-heading">Please specify your other option</h6>
                                <div class="input-wrap">
                                    <div class="holder">
								                      <input type="text" name="signup[current-occupation-other]" id="talent-other-occupation" class="input js-required" required-txt="Enter your other option" autocomplete="off"/>
								                      <label class="txt-label" for="talent-other-occupation">Other</label>
								                    </div>
								                    <p class="warning"></p>
                                </div>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">Do you have talent management or agency representation?</h6>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
                                    <li class="item">
                                        <input type="radio" name="signup[have-agency]" id="talent-have-agency-a"
                                            class="js-enael" data-target="#el-talent-agency-name" value="Yes" />
                                        <label for="talent-have-agency-a"><i>Yes</i><b>A</b></label>
                                    </li>
                                    <li class="item">
                                        <input type="radio" name="signup[have-agency]" id="talent-have-agency-b"
                                            class="js-disel" data-target="#el-talent-agency-name" value="No" />
                                        <label for="talent-have-agency-b"><i>No</i><b>B</b></label>
                                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-agency-name">
                                <h6 class="sub-heading">Please provide the name of your talent management or agency representation.</h6>
                                <div class="input-wrap">
                                    <div class="holder">
                                        <input type="text" name="signup[agency-name]" id="talent-agency-name"
                                            class="input js-required" required-txt="Enter your talent management or agency representation" autocomplete="off" />
                                        <label class="txt-label" for="talent-agency-name">Agency Name</label>
                                    </div>
                                    <p class="warning"></p>
                                </div>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">What type of work would you like to be considered for?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-work-considered-all" class="chx-all" />
                                    <label for="talent-chx-work-considered-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                <?php 
	                                	$arr = $arrInfo['looking_for'];
	                                	$i = 0;
	                                ?>
	                                <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                	<li class="item">
						                          <input type="checkbox" name="signup[work-considered][<?php echo e($i); ?>]" id="talent-chx-work-considered-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
						                          <label for="talent-chx-work-considered-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
						                        </li>
	                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <li class="item">
								                      <input type="checkbox" id="talent-chx-other-work-considered" class="js-enael" data-target="#el-talent-other-work-considered"/>
								                      <label for="talent-chx-other-work-considered"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
								                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-other-work-considered">
						                  <h6 class="sub-heading">Please specify your other option</h6>
						                  <div class="input-wrap">
						                    <div class="holder">
						                      <input type="text" name="signup[work-considered-other]" id="talent-other-work-considered" class="input js-required" required-txt="Enter your other option" autocomplete="off"/>
						                      <label class="txt-label" for="talent-other-work-considered">Other</label>
						                    </div>
						                    <p class="warning"></p>
						                  </div>
						                </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">What type of role would you like to be considered for?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-role-considered-all" class="chx-all" />
                                    <label for="talent-chx-role-considered-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                <?php 
																	  $arr = $arrInfo['looking_for_role'];
																	  $i = 0;
																	?>
																	<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<li class="item">
																	  <input type="checkbox" name="signup[role-considered][<?php echo e($i); ?>]" id="talent-chx-role-considered-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
																	  <label for="talent-chx-role-considered-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
																	</li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <li class="item">
							                      <input type="checkbox" id="talent-chx-other-role-considered" class="js-enael" data-target="#el-talent-other-role-considered"/>
							                      <label for="talent-chx-other-role-considered"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
							                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-other-role-considered">
						                  <h6 class="sub-heading">Please specify your other option</h6>
						                  <div class="input-wrap">
						                    <div class="holder">
						                      <input type="text" name="signup[role-considered-other]" id="talent-other-role-considered" class="input js-required" required-txt="Enter your other option"  autocomplete="off"/>
						                      <label class="txt-label" for="talent-other-role-considered">Other</label>
						                    </div>
						                    <p class="warning"></p>
						                  </div>
						                </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">Are you willing to be considered for these types of roles?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-type-role-all" class="chx-all" />
                                    <label for="talent-chx-type-role-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                <?php 
																	  $arr = $arrInfo['accept_role'];
																	  $i = 0;
																	?>
																	<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<li class="item">
																	  <input type="checkbox" name="signup[type-role][<?php echo e($i); ?>]" id="talent-chx-type-role-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
																	  <label for="talent-chx-type-role-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
																	</li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																  <li class="item">
							                      <input type="checkbox" id="talent-chx-other-type-role" class="js-enael" data-target="#el-talent-other-type-role"/>
							                      <label for="talent-chx-other-type-role"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
							                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-other-type-role">
						                  <h6 class="sub-heading">Please specify your other option</h6>
						                  <div class="input-wrap">
						                    <div class="holder">
						                      <input type="text" name="signup[type-role-other]" id="talent-other-type-role" class="input js-required" required-txt="Enter your other option" autocomplete="off"/>
						                      <label class="txt-label" for="talent-other-type-role">Other</label>
						                    </div>
						                    <p class="warning"></p>
						                  </div>
						                </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">What is your past work experience?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-past-exp-all" class="chx-all" />
                                    <label for="talent-chx-past-exp-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                <?php 
																		$arr = $arrInfo['experience'];
																		$i = 0;
																	?>
																	<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<li class="item">
																		<input type="checkbox" name="signup[past-exp][<?php echo e($i); ?>]" id="talent-chx-past-exp-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
																		<label for="talent-chx-past-exp-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
																	</li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <li class="item">
																		<input type="checkbox" id="talent-chx-other-past-exp" class="js-enael" data-target="#el-talent-other-past-exp"/>
																		<label for="talent-chx-other-past-exp"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
																	</li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-other-past-exp">
															<h6 class="sub-heading">Please specify your other option</h6>
						                  <div class="input-wrap">
						                    <div class="holder">
						                      <input type="text" name="signup[past-exp-other]" id="talent-other-past-exp" class="input js-required" required-txt="Enter your other option" autocomplete="off"/>
						                      <label class="txt-label" for="talent-other-past-exp">Other</label>
						                    </div>
						                    <p class="warning"></p>
						                  </div>
						                </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">Which languages do you speak?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-speak-language-all" class="chx-all" />
                                    <label for="talent-chx-speak-language-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                <?php 
																	  $arr = $arrInfo['language'];
																	  $i = 0;
																	?>
																	<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<li class="item">
																	  <input type="checkbox" name="signup[speak-language][<?php echo e($i); ?>]" id="talent-chx-speak-language-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
																	  <label for="talent-chx-speak-language-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
																	</li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <li class="item">
							                      <input type="checkbox" id="talent-chx-other-speak-language" class="js-enael" data-target="#el-talent-other-speak-language"/>
							                      <label for="talent-chx-other-speak-language"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
							                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-other-speak-language">
						                  <h6 class="sub-heading">Please specify your other option</h6>
						                  <div class="input-wrap">
						                    <div class="holder">
						                      <input type="text" name="signup[speak-language-other]" id="talent-other-speak-language" class="input js-required" required-txt="Enter your other option" autocomplete="off"/>
						                      <label class="txt-label" for="talent-other-speak-language">Other</label>
						                    </div>
						                    <p class="warning"></p>
						                  </div>
						                </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">What ethnicity are you?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-ethnicity-all" class="chx-all" />
                                    <label for="talent-chx-ethnicity-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                <?php 
																		$arr = $arrInfo['ethnicity'];
																		$i = 0;
																	?>
																	<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<li class="item">
																		<input type="checkbox" name="signup[ethnicity][<?php echo e($i); ?>]" id="talent-chx-ethnicity-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
																		<label for="talent-chx-ethnicity-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
																	</li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <li class="item">
							                      <input type="checkbox" id="talent-chx-other-ethnicity" class="js-enael" data-target="#el-talent-other-ethnicity"/>
							                      <label for="talent-chx-other-ethnicity"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
							                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-other-ethnicity">
						                  <h6 class="sub-heading">Please specify your other option</h6>
						                  <div class="input-wrap">
						                    <div class="holder">
						                      <input type="text" name="signup[ethnicity-other]" id="talent-other-ethnicity" class="input js-required" required-txt="Enter yourother option" autocomplete="off"/>
						                      <label class="txt-label" for="talent-other-ethnicity">Other</label>
						                    </div>
						                    <p class="warning"></p>
						                  </div>
						                </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">How about your Citizenship?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-citizenship-all" class="chx-all" />
                                    <label for="talent-chx-citizenship-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                <?php 
																	  $arr = $arrInfo['nationality'];
																	  $i = 0;
																	?>
																	<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<li class="item">
																	  <input type="checkbox" name="signup[citizenship][<?php echo e($i); ?>]" id="talent-chx-citizenship-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
																	  <label for="talent-chx-citizenship-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
																	</li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <li class="item">
							                      <input type="checkbox" id="talent-chx-other-citizenship" class="js-enael" data-target="#el-talent-other-citizenship"/>
							                      <label for="talent-chx-other-citizenship"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
							                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-other-citizenship">
						                  <h6 class="sub-heading">Please specify your other option</h6>
						                  <div class="input-wrap">
						                    <div class="holder">
						                      <input type="text" name="signup[citizenship-other]" id="talent-other-citizenship" class="input js-required" required-txt="Enter your other option" autocomplete="off"/>
						                      <label class="txt-label" for="talent-other-citizenship">Other</label>
						                    </div>
						                    <p class="warning"></p>
						                  </div>
						                </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">How about your Vocal range?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-vocal-all" class="chx-all" />
                                    <label for="talent-chx-vocal-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                <?php 
																	  $arr = $arrInfo['voice_vocal'];
																	  $i = 0;
																	?>
																	<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<li class="item">
																	  <input type="checkbox" name="signup[vocal][<?php echo e($i); ?>]" id="talent-chx-vocal-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
																	  <label for="talent-chx-vocal-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
																	</li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <li class="item">
								                      <input type="checkbox" id="talent-chx-other-vocal" class="js-enael" data-target="#el-talent-other-vocal"/>
								                      <label for="talent-chx-other-vocal"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
								                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-other-vocal">
						                  <h6 class="sub-heading">Please specify your other option</h6>
						                  <div class="input-wrap">
						                    <div class="holder">
						                      <input type="text" name="signup[vocal-other]" id="talent-other-vocal" class="input js-required" required-txt="Enter your other option" autocomplete="off"/>
						                      <label class="txt-label" for="talent-other-vocal">Other</label>
						                    </div>
						                    <p class="warning"></p>
						                  </div>
						                </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">How about the Instruments you play?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-instruments-all" class="chx-all" />
                                    <label for="talent-chx-instruments-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                <?php 
																	  $arr = $arrInfo['instrument'];
																	  $i = 0;
																	?>
																	<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<li class="item">
																	  <input type="checkbox" name="signup[instruments][<?php echo e($i); ?>]" id="talent-chx-instruments-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
																	  <label for="talent-chx-instruments-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
																	</li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <li class="item">
							                      <input type="checkbox" id="talent-chx-other-instruments" class="js-enael" data-target="#el-talent-other-instruments"/>
							                      <label for="talent-chx-other-instruments"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
							                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-other-instruments">
						                  <h6 class="sub-heading">Please specify your other option</h6>
						                  <div class="input-wrap">
						                    <div class="holder">
						                      <input type="text" name="signup[instruments-other]" id="talent-other-instruments" class="input js-required" required-txt="Enter your other option" autocomplete="off"/>
						                      <label class="txt-label" for="talent-other-instruments">Other</label>
						                    </div>
						                    <p class="warning"></p>
						                  </div>
						                </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">Do you have Visible Tattoos?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-tattoos-all" class="chx-all" />
                                    <label for="talent-chx-tattoos-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                <?php 
																	  $arr = $arrInfo['tattoo'];
																	  $i = 0;
																	?>
																	<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<li class="item">
																	  <input type="checkbox" name="signup[tattoos][<?php echo e($i); ?>]" id="talent-chx-tattoos-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
																	  <label for="talent-chx-tattoos-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
																	</li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <li class="item">
							                      <input type="checkbox" id="talent-chx-other-tattoos" class="js-enael" data-target="#el-talent-other-tattoos"/>
							                      <label for="talent-chx-other-tattoos"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
							                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-other-tattoos">
						                  <h6 class="sub-heading">Please specify your other option</h6>
						                  <div class="input-wrap">
						                    <div class="holder">
						                      <input type="text" name="signup[tattoos-other]" id="talent-other-tattoos" class="input js-required" required-txt="Enter your other option" autocomplete="off"/>
						                      <label class="txt-label" for="talent-other-tattoos">Other</label>
						                    </div>
						                    <p class="warning"></p>
						                  </div>
						                </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">How about the Sports you play?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-sports-all" class="chx-all" />
                                    <label for="talent-chx-sports-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                <?php 
																	  $arr = $arrInfo['sport'];
																	  $i = 0;
																	?>
																	<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<li class="item">
																	  <input type="checkbox" name="signup[sports][<?php echo e($i); ?>]" id="talent-chx-sports-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
																	  <label for="talent-chx-sports-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
																	</li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <li class="item">
							                      <input type="checkbox" id="talent-chx-other-sports" class="js-enael" data-target="#el-talent-other-sports"/>
							                      <label for="talent-chx-other-sports"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
							                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-other-sports">
						                  <h6 class="sub-heading">Please specify your other option</h6>
						                  <div class="input-wrap">
						                    <div class="holder">
						                      <input type="text" name="signup[sports-other]" id="talent-other-sports" class="input js-required" required-txt="Enter your other option" autocomplete="off"/>
						                      <label class="txt-label" for="talent-other-sports">Other</label>
						                    </div>
						                    <p class="warning"></p>
						                  </div>
						                </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">How about your Dancing?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-dancing-all" class="chx-all" />
                                    <label for="talent-chx-dancing-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                <?php 
																	  $arr = $arrInfo['dance'];
																	  $i = 0;
																	?>
																	<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<li class="item">
																	  <input type="checkbox" name="signup[dancing][<?php echo e($i); ?>]" id="talent-chx-dancing-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
																	  <label for="talent-chx-dancing-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
																	</li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                                <li class="item">
							                      <input type="checkbox" id="talent-chx-other-dancing" class="js-enael" data-target="#el-talent-other-dancing"/>
							                      <label for="talent-chx-other-dancing"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
							                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-other-dancing">
						                  <h6 class="sub-heading">Please specify your other option</h6>
						                  <div class="input-wrap">
						                    <div class="holder">
						                      <input type="text" name="signup[dancing-other]" id="talent-other-dancing" class="input js-required" required-txt="Enter your other option" autocomplete="off"/>
						                      <label class="txt-label" for="talent-other-dancing">Other</label>
						                    </div>
						                    <p class="warning"></p>
						                  </div>
						                </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Career Experiences</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">How about your Martial Arts?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="talent-chx-martial-all" class="chx-all" />
                                    <label for="talent-chx-martial-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                <?php 
																	  $arr = $arrInfo['material_art'];
																	  $i = 0;
																	?>
																	<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<li class="item">
																	  <input type="checkbox" name="signup[martial][<?php echo e($i); ?>]" id="talent-chx-martial-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
																	  <label for="talent-chx-martial-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
																	</li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <li class="item">
							                      <input type="checkbox" id="talent-chx-other-martial" class="js-enael" data-target="#el-talent-other-martial"/>
							                      <label for="talent-chx-other-martial"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
							                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-other-martial">
						                  <h6 class="sub-heading">Please specify your other option</h6>
						                  <div class="input-wrap">
						                    <div class="holder">
						                      <input type="text" name="signup[martial-other]" id="talent-other-martial" class="input js-required" required-txt="Enter your other option" autocomplete="off"/>
						                      <label class="txt-label" for="talent-other-martial">Other</label>
						                    </div>
						                    <p class="warning"></p>
						                  </div>
						                </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Upload your profile picture</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">A medium chest and above or close up shot of your face is
                                recommended</h6>
                            <div class="file-wrap upload-img">
                                <div class="holder">
                                    <input type="file" name="signup[profile-picture]" class="full-space"
                                        accept="image/*" data-max="5" txt-max="File is too big" txt-type="Please select recommended file types"/>
                                    <div class="state-upload">
                                        <div class="border-plus"></div>
                                        <strong>Click to add your profile picture</strong>
                                    </div>
                                    <figure class="state-change">
                                        <img src="<?php echo e(asset('assets/img/bg/1x1.png')); ?>" alt="Change">
                                        <figcaption>Click to change</figcaption>
                                    </figure>
                                </div>
                                <p class="s-note">Recommended file types: JPG PNG GIF. Maximum file size: 5MB.</p>
                                <p class="warning"></p>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

<!--
                    <li class="item">
                        <h5 class="heading">Upload the talent profile</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">Do you currently have a talent profile of photos and resume?</h6>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
                                    <li class="item">
                                        <input type="radio" name="signup[have-profile]" id="talent-have-profile-a"
                                            class="js-enael" data-target="#el-talent-upload-profile" value="Yes" />
                                        <label for="talent-have-profile-a"><i>Yes</i><b>A</b></label>
                                    </li>
                                    <li class="item">
                                        <input type="radio" name="signup[have-profile]" id="talent-have-profile-b"
                                            class="js-disel" data-target="#el-talent-upload-profile" value="No" />
                                        <label for="talent-have-profile-b"><i>No</i><b>B</b></label>
                                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-talent-upload-profile">
                                <h6 class="sub-heading">JPG, PNG or PDF file type are recommended. Maximum file size is
                                    5MB.</h6>
                                <div class="file-wrap upload-file" data-max="3">
                                    <div class="holder">
                                        <input type="file" name="signup[upload-profile]"
                                            accept="image/jpg,image/jpeg,image/png,application/pdf" data-max="5" multiple />
                                        <div class="state-upload">
                                            <div class="border-plus"></div>
                                            <span>Click or drag and drop file here to upload</span>
                                        </div>
                                    </div>
                                    <ul class="list-file"></ul>
                                </div>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>
-->
                </ul>

                <div class="progress-ctr">
                    <a href="#" role="button" class="btn-prev" title="previous questtion"></a>
                    <p class="progress-bar"><span><b class="progress-num">0</b>% completed</span><i></i></p>
                    <a href="#" role="button" class="btn-next" title="next questtion"></a>
                </div>
            </form>

            <div class="fin-scr">
                <div class="banner">
                    <img src="<?php echo e(asset('assets/img/bg/firework.svg')); ?>" alt="firework" />
                    <h4 class="heading">Congratulations!</h4>
                    <p class="desc">Thanks for your registration. An activation link has been sent to your email. Please
                        activate your account by clicking on the link and complete your password.</p>
                    <a href="<?php echo e(config('app.url')); ?>" role="button" class="btn-gold-arrow">BACK TO HOMEPAGE</a>
                </div>
            </div>
        </div>
        <footer>Copyright 2020 ©Take1</footer>
    </section>

    <section class="signup-form signup-client">
        <header>
            <div class="curve-deco type-1"></div>
            <img src="<?php echo e(asset('assets/img/bg/logo.svg')); ?>" alt="Take1 logo" />
        </header>
        <div class="main-content">
            <div class="wel-scr">
                <div class="banner">
                    <h4 class="heading"><span class="gold-underline">Join our Take1</span> network</h4>
                    <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et mauris maximus,
                        consectetur orci eget, elementum augue. Duis viverra ex at magna egestas sollicitudin</p>
                    <a href="#" role="button" class="cta btn-gold-enter">Join now</a>
                </div>
            </div>
            <div class="aside aside-slider">
                <div class="slider">
                    <ol class="num-list item-wrap"></ol>
                </div>
            </div>

            <form class="quest-list" data-url="<?php echo e(route('registration_client')); ?>">
                <ul class="quest-wrap">
                    <li class="item js-rq-server" data-url="<?php echo e(route('check_email')); ?>">
                        <h5 class="heading">Profile Information</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">What is your email address?</h6>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input name="signup[email]" id="client-email" type="text"
                                        class="input js-required js-email" autocomplete="off" data-min="2"
                                        required-txt="Enter your Email Address"
                                        email-txt="Please enter a valid email address">
                                    <label class="txt-label" for="client-email">Email Address</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Profile Information</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">Provide your full name</h6>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input name="signup[name]" id="client-name" type="text" class="input js-required"
                                        autocomplete="off" required-txt="Enter Your Name" />
                                    <label class="txt-label" for="client-name">Your Name</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <h6 class="sub-heading">What is your phone number?</h6>
                            <div class="compound-wrap">
                                <div class="input-wrap input-sel js-active">
                                    <div class="holder">
                                        <input name="signup[phone-code]" id="client-phone-code" type="text"
                                            class="input js-required bg-icon"
                                            style="background-image: url(<?php echo e(asset('assets/img/flag/vi.jpg')); ?>)"
                                            autocomplete="off" value="(+84)" readonly />
                                        <label class="txt-label" for="client-phone-code">Country Code</label>
                                    </div>
                                    <ul class="opt-list">
                                        <li class="has-icon js-active" data-value="(+84)">
                                            <img src="<?php echo e(asset('assets/img/flag/vi.jpg')); ?>" alt="vn" />
                                            <i>(+84)</i>
                                        </li>
                                        <li class="has-icon" data-value="(+86)">
                                            <img src="<?php echo e(asset('assets/img/flag/cn.jpg')); ?>" alt="cn" />
                                            <i>(+86)</i>
                                        </li>
                                        <li class="has-icon" data-value="(+44)">
                                            <img src="<?php echo e(asset('assets/img/flag/en.jpg')); ?>" alt="en" />
                                            <i>(+44)</i>
                                        </li>
                                        <li class="has-icon" data-value="(+33)">
                                            <img src="<?php echo e(asset('assets/img/flag/fr.jpg')); ?>" alt="fr" />
                                            <i>(+33)</i>
                                        </li>
                                        <li class="has-icon" data-value="(+07)">
                                            <img src="<?php echo e(asset('assets/img/flag/ru.jpg')); ?>" alt="ru" />
                                            <i>(+07)</i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="input-wrap">
                                    <div class="holder">
                                        <input name="signup[phone-number]" id="client-phone-number" type="tel"
                                            maxlength="12" class="input js-required js-min js-num" data-min="9"
                                            autocomplete="off" required-txt="Enter your phone number"
                                            min-txt="Phone number must be at least nine characters" />
                                        <label class="txt-label" for="client-phone-number">Phone Number</label>
                                    </div>
                                    <p class="warning"></p>
                                </div>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>

                    <li class="item">
                        <h5 class="heading">Company Information</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">Select your Industry</h6>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
                                    <script>
                                    ['Casting Director',
                                        'Production House',
                                        'Agency'
                                    ].forEach((e, i) => document.write(`
                      <li class="item">
                        <input type="radio" name="signup[industry]" id="client-industry-${i}" class="js-disel" data-target="#el-client-other-industry" value="${e}"/>
                        <label for="client-industry-${i}"><i>${e}</i><b>${String.fromCharCode(i + 65)}</b></label>
                      </li>`))
                                    </script>
                                    <li class="item">
                                        <input type="radio" name="signup[industry]" id="client-industry-3"
                                            class="js-enael" data-target="#el-client-other-industry" value="Other" />
                                        <label for="client-industry-3"><i>Other</i><b>l</b></label>
                                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-client-other-industry">
                                <h6 class="sub-heading">Please specify your other option</h6>
                                <div class="input-wrap">
                                    <div class="holder">
                                        <input type="text" name="signup[other-industry]" id="client-other-industry"
                                            class="input js-required" required-txt="Enter your other option" autocomplete="off" />
                                        <label class="txt-label" for="client-other-industry">Other</label>
                                    </div>
                                    <p class="warning"></p>
                                </div>
                            </div>
                            <h6 class="sub-heading">How about your Job Title</h6>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input name="signup[job-title]" id="client-job-title" type="text"
                                        class="input js-required" autocomplete="off"
                                        required-txt="Enter Your Job Title" />
                                    <label class="txt-label" for="client-job-title">Your Job Title</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <h6 class="sub-heading">Please provide your Company Name</h6>
                            <div class="input-wrap">
							                <div class="holder">
							                  <input name="signup[company-name]" id="client-company-name" type="text" class="input js-required" autocomplete="off" required-txt="Enter Your Company Name"/>
							                  <label class="txt-label" for="client-company-name">Your Company Name</label>
							                </div>
							                <p class="warning"></p>
							              </div>
                                          <h6 class="sub-heading">Please provide your Company Address</h6>
                            <div class="input-wrap">
							                <div class="holder">
							                  <input name="signup[address]" id="client-company-address" type="text" class="input js-required" autocomplete="off" required-txt="Enter Your Company Address"/>
							                  <label class="txt-label" for="client-company-address">Your Company Address</label>
							                </div>
							                <p class="warning"></p>
							              </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>
                    <li class="item">
                        <h5 class="heading">Company Information</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">Please provide your Company Website</h6>
                            <div class="input-wrap">
                                <div class="holder">
                                    <input name="signup[website]" id="client-website" type="text"
                                        class="input js-required" autocomplete="off"
                                        required-txt="Enter Your Company Website" />
                                    <label class="txt-label" for="client-website">Your Company Website</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <h6 class="sub-heading">Which are social media channel you using?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="client-chx-social-media-all" class="chx-all" />
                                    <label for="client-chx-social-media-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <script>
						                  var options = '',
						                      inputs = '';
						                  [
						                    'facebook',
						                    'tiktok',
						                    'instagram',
						                    // 'twitter',
						                    'zalo'
						                  ].forEach((e, i) => {
						                    let j = e[0].toUpperCase() + e.slice(1);
						                    options += `<li class="item">
						                      <input type="checkbox" name="signup[social-media][${i}]" id="client-chx-social-media-${i}" class="js-enael" data-target="#el-client-${e}-url" value="${e}"/>
						                      <label for="client-chx-social-media-${i}"><i>${j}</i><b>${String.fromCharCode(i + 65)}</b></label>
						                    </li>`;
						
						                    inputs += `<div class="el-wrap js-hide" id="el-client-${e}-url">
						                      <h6 class="sub-heading">Your ${j} URL</h6>
						                      <div class="input-wrap">
						                        <div class="holder">
						                          <input type="text" name="signup[${e}-url]" id="client-${e}-url" class="input js-required" required-txt="Enter your ${j} link" autocomplete="off"/>
						                          <label class="txt-label" for="client-${e}-url">${e}</label>
						                        </div>
						                        <p class="warning"></p>
						                      </div>
						                    </div>`
						                  });
						                  document.write('<div class="rad-wrap col-4"><ul class="holder">' + options + '</ul><p class="warning"></p></div>' + inputs);
						                </script>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>
                    <li class="item">
                        <h5 class="heading">Other Information</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">How did you know about Take1?</h6>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
                                    <li class="item">
                                        <input type="checkbox" name="signup[know-us]" id="client-know-us-0"
                                            value="A.C.T Academy" />
                                        <label for="client-know-us-0"><i>A.C.T Academy</i><b>a</b></label>
                                    </li>
                                    <li class="item">
                                        <input type="checkbox" name="signup[know-us]" id="client-know-us-1"
                                            class="js-enael" data-target="#el-client-know-us-friend"
                                            value="Friend / Industry contact" />
                                        <label for="client-know-us-1"><i>Friend / Industry contact</i><b>b</b></label>
                                    </li>
                                    <li class="item">
                                        <input type="checkbox" name="signup[know-us]" id="client-know-us-2"
                                            value="Advertisement" />
                                        <label for="client-know-us-2"><i>Advertisement</i><b>c</b></label>
                                    </li>
                                    <li class="item">
                                        <input type="radio" name="signup[know-us]" id="client-know-us-3"
                                            class="js-enael" data-target="#el-client-know-us-other" value="Other" />
                                        <label for="client-know-us-3"><i>Other</i><b>l</b></label>
                                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-client-know-us-friend">
                                <h6 class="sub-heading">Please provide the name of your contact</h6>
                                <div class="input-wrap">
                                    <div class="holder">
                                        <input type="text" name="signup[know-us-friend]" id="client-know-us-friend" class="input" autocomplete="off" />
                                        <label class="txt-label" for="client-other-industry">Friend / Industry contact</label>
                                    </div>
                                    <p class="warning"></p>
                                </div>
                            </div>
                            <div class="el-wrap js-hide" id="el-client-know-us-other">
                                <h6 class="sub-heading">Please specify your other option</h6>
                                <div class="input-wrap">
                                    <div class="holder">
                                        <input type="text" name="signup[know-us-other]" id="client-know-us-other" class="input js-required" required-txt="Enter your other option" autocomplete="off" />
                                        <label class="txt-label" for="client-know-us-other">Other</label>
                                    </div>
                                    <p class="warning"></p>
                                </div>
                            </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>
                    <li class="item">
                        <h5 class="heading">Additional Information</h5>
                        <div class="mb-wrap">
                            <h6 class="sub-heading">Would you like to?</h6>
                            <div class="rad-wrap col-3">
                                <ul class="holder">
                                    <script>
                                    ['Create a casting post',
                                        'Set up a casting session at our studio',
                                        'Both'
                                    ].forEach((e, i) => document.write(`
							                      <li class="item">
							                        <input type="radio" name="signup[todo]" id="client-todo-${i}" value="${e}"/>
							                        <label for="client-todo-${i}"><i>${e}</i><b>${String.fromCharCode(i + 65)}</b></label>
							                      </li>`))
                                    </script>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <h6 class="sub-heading">Which type of project that you are looking for talents?</h6>
                            <div class="chx-wrap">
                                <div class="holder">
                                    <input type="checkbox" id="client-chx-type-project-all" class="chx-all" />
                                    <label for="client-chx-type-project-all">Select All</label>
                                </div>
                                <p class="warning"></p>
                            </div>
                            <div class="rad-wrap col-4">
                                <ul class="holder">
	                                 <?php 
																	  $arr = $arrInfo['looking_for'];
																	  $i = 0;
																	?>
																	<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<li class="item">
																	  <input type="checkbox" name="signup[type-project][<?php echo e($i); ?>]" id="client-chx-type-project-<?php echo e($i); ?>" value="<?php echo e($k); ?>"/>
																	  <label for="client-chx-type-project-<?php echo e($i); ?>"><i><?php echo e($v); ?></i><b><?php echo e($alphabet[$i++]); ?></b></label>
																	</li>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <li class="item">
							                      <input type="checkbox" id="client-chx-other-type-project" class="js-enael" data-target="#el-client-other-type-project"/>
							                      <label for="client-chx-other-type-project"><i>Other</i><b><?php echo e($alphabet[$i]); ?></b></label>
							                    </li>
                                </ul>
                                <p class="warning"></p>
                            </div>
                            <div class="el-wrap js-hide" id="el-client-other-type-project">
						                  <h6 class="sub-heading">Please specify your other option</h6>
						                  <div class="input-wrap">
						                    <div class="holder">
						                      <input type="text" name="signup[type-project-other]" id="client-other-type-project" class="input js-required" required-txt="Enter your other option"  autocomplete="off"/>
						                      <label class="txt-label" for="client-other-type-project">Other</label>
						                    </div>
						                    <p class="warning"></p>
						                  </div>
						                </div>
                            <a href="#" role="button" class="cta btn-gold-enter">Next</a>
                        </div>
                    </li>
                </ul>

                <div class="progress-ctr">
                    <a href="#" role="button" class="btn-prev" title="previous questtion"></a>
                    <p class="progress-bar"><span><b class="progress-num">0</b>% completed</span><i></i></p>
                    <a href="#" role="button" class="btn-next" title="next questtion"></a>
                </div>
            </form>

            <div class="fin-scr">
                <div class="banner">
                    <img src="<?php echo e(asset('assets/img/bg/firework.svg')); ?>" alt="firework" />
                    <h4 class="heading">Congratulations!</h4>
                    <p class="desc">Thanks for your registration. An activation link has been sent to your email. Please
                        activate your account by clicking on the link and complete your password.</p>
                    <a href="<?php echo e(route('home')); ?>" role="button" class="btn-gold-arrow">BACK TO HOMEPAGE</a>
                </div>
            </div>
        </div>
        <footer>Copyright 2020 ©Take1</footer>
        <div class="curve-deco type-2"></div>
    </section>
</main>
<!-- END MAIN PAGE -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/signup.blade.php ENDPATH**/ ?>