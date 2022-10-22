

<?php $__env->startSection('title', 'Talent Profile'); ?>

<?php $__env->startSection('hidden_page', 'Talent Profile'); ?>

<?php $__env->startSection('content'); ?>

<!-- MAIN PAGE -->
<main id="page-talent-ctr">
    <input type="hidden" id="page-id" value="page-talent-ctr" />
    <section class="details-banner wrap-1200">
        <header class="top-ctr">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li><a href="">Profile</a></li>
            </ul>
            <!-- <time datetime="20/04/2021"><span class="mb-hide">Updated on:&nbsp;</span>20/04/2021</time> -->
        </header>
        <div class="intro-wrap">
            <img class="intro-img" src="<?php echo e($talent->cover_url); ?>" alt="<?php echo e($talent->stage_name); ?>" />
            <div class="intro-content">
                <h4 class="heading"><?php echo e($talent->stage_name); ?></h4>
                <div class="info col-2">
                    <h5 class="full-w"><b>Location:&nbsp;</b><i><?php echo e($talent->address); ?></i></h5>
                    <h5><b>Phone:&nbsp;</b><i><?php echo e($talent->country_code); ?> <?php echo e($talent->phone_number); ?></i></h5>
                    <h5><b>E-mail:&nbsp;</b><i><?php echo e($talent->email); ?></i></h5>
                    <h5><b>Gender:&nbsp;</b><i><?php echo e($talent->gender); ?></i></h5>
                    <h5><b>Age Range:&nbsp;</b><i><?php echo e($talent->age_from); ?> - <?php echo e($talent->age_to); ?></i></h5>
                    <h5><b>Height:</b>&nbsp;<i><?php echo e($talent->height); ?>cm</i></h5>
                    <h5><b>Weight:</b>&nbsp;<i><?php echo e($talent->weight); ?>kg</i></h5>
                    <h5 class="full-w flex-icon"><b>CV:</b>&nbsp;<a target="_blank" href="<?php echo e($talent->CV_url); ?>"><img alt="pdf"
                                src="<?php echo e(asset('assets/img/bg/pdf.svg')); ?>" /><?php echo e($talent->stage_name); ?> CV </a></h5>
                </div>
                <p class="desc"><?php echo e($talent->description); ?></p>
                <ul class="img-list">
                    <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><img src="<?php echo e($v); ?>" alt="<?php echo e($talent->name); ?>" /></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="gray-ctr">
                    <h5 class="link"><a href="<?php echo e(route('talent_detail', ['id' => $talent->id])); ?>"
                            target="_blank"><?php echo e(route('talent_detail', ['id' => $talent->id])); ?></a></h5>
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
                <a href="<?php echo e(route('talent_profile_edit')); ?>" role="button" class="btn-gold-arrow cta">Edit Your
                    Profile</a>
            </div>
        </div>
    </section>

    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap">
                <header>
                    <h4 class="main-heading">Profile Strength: Intermediate</h4>
                </header>
                <div class="pro-meter">
                    <div class="bar">
                        <i style="width: 75%;">
                            <span class="hover-tbl">
                                <img src="<?php echo e(asset('assets/img/bg/golden-cup.svg')); ?>" alt="Intermediate" />
                                <b>Intermediate</b>
                                <span>Members with intermediate profiles see more relevant job recommendations and
                                    refined connection suggestions</span>
                            </span>
                        </i>
                        <ul class="sep">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
                <ul class="pro-suggest">
                    <li>
                        <div class="flex-icon">
                            <img src="<?php echo e(asset('assets/img/bg/location.svg')); ?>" alt="location" />
                            <p>
                                <b>Where are you currently located?</b>
                                <i>Members with an up-to-date location are up to 23x more likely to be found</i>
                            </p>
                        </div>
                        <a href="#" role="button">ADD LOCATION</a>
                    </li>
                    <li>
                        <div class="flex-icon">
                            <img src="<?php echo e(asset('assets/img/bg/location.svg')); ?>" alt="location" />
                            <p>
                                <b>Where are you currently located?</b>
                                <i>Members with an up-to-date location are up to 23x more likely to be found</i>
                            </p>
                        </div>
                        <a href="#" role="button">ADD LOCATION</a>
                    </li>
                </ul>
            </div>

            <div class="content-wrap type-2 carousel-holder">
                <header>
                    <h4 class="main-heading">Recommended Roles</h4>
                    <a href="#" class="sub-link" role="button">View All</a>
                </header>

                <div class="carousel col-4 wrap-1200">
                    <ul class="item-wrap">
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $types = $role->post->types;
                        $arr = array();
                        foreach ($types as $k=>$v) {
                        $arr[] = $v->tag_name;
                        }
                        $str_type = implode(', ', $arr);

                        switch ($str_type) {
                        case 'TVC' :
                        $class_tag = 'tvc';
                        break;
                        case 'Movie' :
                        $class_tag = 'film';
                        break;
                        case 'Music Video' :
                        $class_tag = 'music';
                        break;
                        case 'Commercial' :
                        $class_tag = 'commercial';
                        break;
                        default :
                        $class_tag = 'commercial';
                        }
                        ?>
                        <li class="item">
                            <div class="role-card">
                                <div class="img-wrap"><img class="main-img" src="<?php echo e($role->thumb_url); ?>"
                                        alt="<?php echo e($role->name); ?>" />
                                </div>
                                <div class="content">
                                    <b class="tag <?php echo e($class_tag); ?>"><?php echo e($str_type); ?></b>
                                    <h5 class="heading"><?php echo e($role->name); ?></h5>
                                    <h6 class="sub-heading"><?php echo e($role->post->name); ?></h6>
                                    <p class="info">
                                        <span><b>Type of Role:&nbsp;</b><?php echo e($role->role_type); ?></span>
                                        <span><b>City:&nbsp;</b><?php echo e($role->post->city->name); ?></span>
                                        <span><b>Age Range:&nbsp;</b><?php echo e($role->age_range); ?></span>
                                    </p>
                                    <a href="#" role="button" class="btn-gold-arrow cta">View role details</a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <ul class="paging">
                        <?php
                        $i=0;
                        ?>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li role="button" data-index="<?php echo e($i); ?>"></li>
                        <?php
                        $i++;
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <a href="#" role="button" class="btn-prev" title="prev item"><span></span></a>
                    <a href="#" role="button" class="btn-next" title="next item"><span></span></a>
                </div>

            </div>

            <div class="content-wrap">
                <header>
                    <h4 class="main-heading">Photo</h4>
                    <a href="#" class="sub-link" role="button">View All</a>
                </header>
                <ul class="dflex col-4">
                    <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><img src="<?php echo e($v); ?>" alt="<?php echo e($talent->name); ?>" /></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div class="content-wrap">
                <header>
                    <h4 class="main-heading">Video</h4>
                    <a href="#" class="sub-link" role="button">View All</a>
                </header>
                <ul class="dflex col-2">
                    <li class="vid-wrap">
                        <img class="place-holder" src="<?php echo e(asset('assets/img/video/place-holder.png')); ?> "
                            alt="place holder" />
                        <iframe src="https://www.youtube.com/embed/6ege2DNZla4" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </li>
                    <li class="vid-wrap">
                        <img class="place-holder" src="<?php echo e(asset('assets/img/video/place-holder.png')); ?>"
                            alt="place holder" />
                        <iframe src="https://www.youtube.com/embed/6ege2DNZla4" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </li>
                </ul>
            </div>

            <ul class="break-list content-wrap">
                <lh>
                    <h3 class="main-heading">Career Experiences</h3>
                    <a href="#" class="sub-link" id="btn-add-exp" role="button">Add Experience</a>
                </lh>
                <?php $__currentLoopData = $talent->career_experience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <h4 class="heading"><?php echo e($exp->movie_name); ?> (<?php echo e($exp->project_type); ?>) <?php echo e($exp->exp_year); ?></h4>
                    <p><?php echo e($exp->role_name); ?> | <?php echo e($exp->role_type); ?></p>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <ul class="ref-list content-wrap">
                <lh>
                    <h4 class="main-heading">Casting Preferences</h4>
                    <a href="#" class="sub-link" role="button" id="btn-edit-pref">Edit Preference</a>
                </lh>
                <li>
                    <h4 class="heading">Type of roles i am willing to consider:</h4>
                    <?php
                        $arrUserRole = [];
                    ?>
                    <?php $__currentLoopData = $talent->looking_roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $arrUserRole[] = $v->id;
                        ?>
                    <i><?php echo e($v->tag_name); ?></i>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </li>
                <li>
                    <h4 class="heading">Types of projects I am willing to consider:</h4>
                    <?php
                    $arrUserProject = [];
                    ?>
                    <?php $__currentLoopData = $talent->looking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $arrUserProject[] = $v->id;
                    ?>
                    <i><?php echo e($v->tag_name); ?></i>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </li>
                <li>
                    <h4 class="heading">Language i am speaking:</h4>
                    <?php
                    $arrUserLanguage = [];
                    ?>
                    <?php $__currentLoopData = $talent->speaking_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $arrUserLanguage[] = $v->id;
                    ?>
                    <i><?php echo e($v->tag_name); ?></i>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </li>
            </ul>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->


<div id="popup-talent-add-exp" class="popup-content">
    <div class="main-content">
        <a href="#" role="button" class="btn-close"><i></i></a>
        <section class="heading-wrap">
            <h3 class="heading">Add Experiences</h3>
            <p class="desc">Please tell us about your experiences</p>
        </section>

        <form data-url="<?php echo e(route('talent_add_experience')); ?>">
            <p class="warning-server">Server errors show here!!!</p>
            <div class="input-wrap input-sel">
                <div class="holder">
                    <input type="hidden" name="exp-project-type" />
                    <input id="exp-project-type" type="text" class="input js-required" autocomplete="off"
                        required-txt="Select the Project Type" readonly />
                    <label class="txt-label" for="exp-project-type">Project Type</label>
                </div>
                <p class="warning"></p>
                <ul class="opt-list">
                    <?php
                    $arr = $arrInfo['experience'];
                    ?>
                    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-value="<?php echo e($v); ?>"><?php echo e($v); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="input-wrap input-sel">
                <div class="holder">
                    <input type="hidden" name="exp-type-role" />
                    <input id="exp-type-role" type="text" class="input js-required" autocomplete="off"
                        required-txt="Select the Type of Role" readonly />
                    <label class="txt-label" for="exp-type-role">Type of Role</label>
                </div>
                <p class="warning"></p>
                <ul class="opt-list">
                    <?php
                    $arr = $arrInfo['looking_for_role'];
                    ?>
                    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-value="<?php echo e($v); ?>"><?php echo e($v); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="input-wrap">
                <div class="holder">
                    <input name="exp-movie-name" id="exp-movie-name" type="text" class="input js-required"
                        autocomplete="off" required-txt="Enter the Movie Name" />
                    <label class="txt-label" for="exp-movie-name">Movie Name</label>
                </div>
                <p class="warning"></p>
            </div>
            <div class="input-wrap">
                <div class="holder">
                    <input name="exp-role-name" id="exp-role-name" type="text" class="input js-required"
                        autocomplete="off" required-txt="Enter the Role Name" />
                    <label class="txt-label" for="exp-role-name">Role Name</label>
                </div>
                <p class="warning"></p>
            </div>
            <div class="input-wrap">
                <div class="holder">
                    <input name="exp-year" id="exp-year" type="text" class="input js-required"
                        autocomplete="off" required-txt="Enter year of the role" />
                    <label class="txt-label" for="exp-year">Year</label>
                </div>
                <p class="warning"></p>
            </div>
            <a href="#" role="button" class="btn-submit btn-gold-arrow">Save</a>
        </form>
    </div>
</div>

<div id="popup-talent-edit-pref" class="popup-content">
    <div class="main-content">
        <a href="#" role="button" class="btn-close"><i></i></a>
        <section class="heading-wrap">
            <h3 class="heading">Edit Preference</h3>
            <p class="desc">Please tell us about your experiences</p>
        </section>

        <form data-url="<?php echo e(route('talent_preference_edit')); ?>">
            <p class="warning-server">Server errors show here!!!</p>
            <div class="input-wrap input-sel-box">
                <div class="holder">
                    <input type="text" class="input static" readonly />
                    <label class="txt-label">Type of Roles&nbsp;<span>(<?php echo e(count($arrUserRole)); ?>)</span></label>
                </div>
                <p class="warning"></p>
                <ul class="opt-list">
                    <?php
                    $arr = $arrInfo['looking_for_role'];
                    $j =0;
                    ?>
                    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="item"><label><input type="checkbox" name="role[<?php echo e($j++); ?>]" value="<?php echo e($k); ?>"
                                <?php echo e(in_array($k, $arrUserRole) ? 'checked' : ''); ?> /><b><?php echo e($v); ?></b></label></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="input-wrap input-sel-box">
                <div class="holder">
                    <input type="text" class="input static" readonly />
                    <label class="txt-label">Types of projects&nbsp;<span>(<?php echo e(count($arrUserProject)); ?>)</span></label>
                </div>
                <p class="warning"></p>
                <ul class="opt-list">
                    <?php
                    $arr = $arrInfo['looking_for'];
                    $j =0;
                    ?>
                    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="item"><label><input type="checkbox" name="project[<?php echo e($j++); ?>]" value="<?php echo e($k); ?>"
                                <?php echo e(in_array($k, $arrUserProject) ? 'checked' : ''); ?> /><b><?php echo e($v); ?></b></label></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="input-wrap input-sel-box">
                <div class="holder">
                    <input type="text" class="input static" readonly />
                    <label class="txt-label">Speaking
                        Languages&nbsp;<span>(<?php echo e(count($arrUserLanguage)); ?>)</span></label>
                </div>
                <p class="warning"></p>
                <ul class="opt-list">
                    <?php
                    $arr = $arrInfo['language'];
                    $j =0;
                    ?>
                    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="item"><label><input type="checkbox" name="language[<?php echo e($j++); ?>]" value="<?php echo e($k); ?>"
                                <?php echo e(in_array($k, $arrUserLanguage) ? 'checked' : ''); ?> /><b><?php echo e($v); ?></b></label></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <button class="btn-submit btn-gold type-btn type-2" type="submit">Save</button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/profile.blade.php ENDPATH**/ ?>