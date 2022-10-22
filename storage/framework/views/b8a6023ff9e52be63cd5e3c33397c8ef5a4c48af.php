

<?php $__env->startSection('title', 'Talent Submission History'); ?>

<?php $__env->startSection('hidden_page', 'Talent Submission History'); ?>

<?php $__env->startSection('content'); ?>
<main id="page-talent-submitted">
    <input type="hidden" id="page-id" value="page-talent-submitted" />
    <section class="details-banner wrap-1200">
        <header class="top-ctr">
            <ul class="breadcrumb">
                <li><a href="1-home.html">Home</a></li>
                <li><a href="14-talent-ctr.html">Profile</a></li>
                <li><a href="#">Submission history</a></li>
            </ul>
            <!-- <time datetime="20/04/2021"><span class="mb-hide">Updated on:&nbsp;</span>20/04/2021</time> -->
        </header>
    </section>

    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap type-2">
                <header>
                    <h4 class="main-heading type-2">Submitted Roles</h4>
                    <form class="form-filter">
                        <strong>Filter:</strong>
                        <div class="input-wrap input-sel-box">
                            <div class="holder">
                                <input type="text" class="input static" readonly />
                                <label class="txt-label">By project type&nbsp;<span></span></label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li class="item"><label><input type="checkbox" name="project[0]"
                                            value="Film OTT" /><b>Film OTT</b></label></li>
                                <li class="item"><label><input type="checkbox" name="project[1]"
                                            value="Short Film" /><b>Short Film</b></label></li>
                                <li class="item"><label><input type="checkbox" name="project[2]" value="TV OTT" /><b>TV
                                            OTT</b></label></li>
                                <li class="item"><label><input type="checkbox" name="project[3]"
                                            value="TV Broadcast" /><b>TV Broadcast</b></label></li>
                                <li class="item"><label><input type="checkbox" name="project[4]"
                                            value="Webdrama" /><b>Webdrama</b></label></li>
                                <li class="item"><label><input type="checkbox" name="project[5]"
                                            value="Music Video" /><b>Music Video</b></label></li>
                                <li class="item"><label><input type="checkbox" name="project[6]"
                                            value="Commercial" /><b>Commercial</b></label></li>
                            </ul>
                        </div>
                        <div class="input-wrap input-sel-box">
                            <div class="holder">
                                <input type="text" class="input static" readonly />
                                <label class="txt-label">By role type&nbsp;<span></span></label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li class="item"><label><input type="checkbox" name="role[0]"
                                            value="Leading" /><b>Leading</b></label></li>
                                <li class="item"><label><input type="checkbox" name="role[1]"
                                            value="Supporting" /><b>Supporting</b></label></li>
                                <li class="item"><label><input type="checkbox" name="role[2]"
                                            value="Cameo" /><b>Cameo</b></label></li>
                                <li class="item"><label><input type="checkbox" name="role[3]"
                                            value="Dayplayer" /><b>Dayplayer</b></label></li>
                                <li class="item"><label><input type="checkbox" name="role[4]" value="5 & Under" /><b>5 &
                                            Under</b></label></li>
                                <li class="item"><label><input type="checkbox" name="role[5]"
                                            value="Background" /><b>Background</b></label></li>
                                <li class="item"><label><input type="checkbox" name="role[6]"
                                            value="Speciality" /><b>Speciality</b></label></li>
                                <li class="item"><label><input type="checkbox" name="role[7]"
                                            value="Model" /><b>Model</b></label></li>
                                <li class="item"><label><input type="checkbox" name="role[8]"
                                            value="Other" /><b>Other</b></label></li>
                            </ul>
                        </div>
                        <div class="input-wrap input-sel-box">
                            <div class="holder">
                                <input type="text" class="input static" readonly />
                                <label class="txt-label">By status&nbsp;<span></span></label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li class="item"><label><input type="checkbox" name="status[0]"
                                            value="Invited" /><b>Invited</b></label></li>
                                <li class="item"><label><input type="checkbox" name="status[1]"
                                            value="Pending" /><b>Pending</b></label></li>
                                <li class="item"><label><input type="checkbox" name="status[2]"
                                            value="Declined" /><b>Declined</b></label></li>
                            </ul>
                        </div>
                        <button class="btn-gold type-btn type-2" type="submit">Apply</button>
                    </form>
                    <form class="form-search">
                        <div class="input-wrap">
                            <div class="holder">
                                <input name="search" id="search" type="text" class="input" autocomplete="off" />
                                <label class="txt-label" for="search">search for project/roles</label>
                            </div>
                            <p class="warning"></p>
                        </div>
                    </form>
                </header>

                <section class="casting-board">
                    <ul class="list-post dgrid col-2">

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
                                $class_tag = 'movie';
                                break;
                            case 'Music Video' :
                                $class_tag = 'music-video';
                                break;
                            case 'Commercial' :
                                $class_tag = 'commercial';
                                break;
                            default :
                                $class_tag = 'music-video';
                        }
                    ?>

                        <li class="item casting-card">
                            <div class="img-wrap"><img class="main-img"
                                    src="<?php echo e($role->thumb_url); ?>" alt="<?php echo e($role->name); ?>" /></div>
                            <div class="content">
                                <b class="tag <?php echo e($class_tag); ?>"><?php echo e($str_type); ?></b>
                                <h5 class="heading"><?php echo e($role->name); ?></h5>
                                <h6 class="sub-heading"><?php echo e($role->post->name); ?></h6>
                                <p class="info">
                                    <span><b class="city">Type:</b>&nbsp;<?php echo e($role->role_type); ?></span>
                                    <span><b class="age">Age:</b>&nbsp;<?php echo e($role->age_range); ?></span>
                                    <span><b class="gender">Gender:</b>&nbsp;<?php echo e($role->gender); ?></span>
                                </p>
                                <p class="desc"><?php echo e($role->description); ?></p>
                                <i class="status <?php echo e(tk1StatusColor($role->pivot->status)); ?>"><?php echo e($role->pivot->status); ?></i>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </section>
            </div>
        </div>
    </article>


</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_submit.blade.php ENDPATH**/ ?>