

<?php $__env->startSection('title', 'Talent Detail'); ?>

<?php $__env->startSection('hidden_page', 'Talent Detail'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-p2-client-our-talents">
    <input type="hidden" id="page-id" value="page-p2-client-our-talents" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap redo-wrap type-2 p2-header-wrap">
                <header>
                    <ul class="breadcrumb full-w">
                        <li><a href="#">Talent Services</a></li>
                    </ul>
                    <h4 class="main-heading type-4">meet our talents</h4>
                </header>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                    <li><a href="#" class="active">Recommended Talents</a></li>
                    <!-- <li><a href="#">Saved Talents <span class="hl">(25)</span></a>
                    </li> -->
                </ul>
            </div>

            <div class="dflex">
                <div class="p2-form-wrap">
                    <form class="form-search" id="form-search">
                        <div class="input-wrap input-p2">
                            <div class="holder">
                                <input name="search" id="search" type="text" class="input" autocomplete="off" />
                                <label class="txt-label" for="search">search for talent</label>
                            </div>
                            <p class="warning"></p>
                        </div>
                    </form>

                    <form class="form-filter" id="form-filter">
                        <strong style="display:none">Filter:</strong>
                        <strong style="display:none">Sort By</strong>
                        <div class="input-wrap input-sel input-p2">
                            <div class="holder">
                                <input type="hidden" name="sort-gender" />
                                <input id="sort-gender" type="text" class="input" autocomplete="off" readonly />
                                <label class="txt-label" for="sort-gender">Gender</label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li data-value="Male">Male</li>
                                <li data-value="Female">Female</li>
                            </ul>
                        </div>
                        <div class="input-wrap input-sel input-p2">
                            <div class="holder">
                                <input type="hidden" name="sort-age" />
                                <input id="sort-age" type="text" class="input" autocomplete="off" readonly />
                                <label class="txt-label" for="sort-age">Age</label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li data-value="Newest">Newest</li>
                                <li data-value="Oldest">Oldest</li>
                            </ul>
                        </div>
                        <div class="input-wrap input-sel input-p2">
                            <div class="holder">
                                <input type="hidden" name="sort-title" />
                                <input id="sort-title" type="text" class="input" autocomplete="off" readonly />
                                <label class="txt-label" for="sort-title">Job Title</label>
                            </div>
                            <p class="warning"></p>
                            <ul class="opt-list">
                                <li data-value="Title 1">Title 1</li>
                                <li data-value="Title 2">Title 2</li>
                                <li data-value="Title 3">Title 3</li>
                                <li data-value="Title 4">Title 4</li>
                            </ul>
                        </div>
                        <button class="btn-icon" type="submit"></button>
                    </form>


                </div>
                <div class="view-ctr">
                    <strong>View</strong>
                    <a href="#" class="icon-list"><i></i><i></i><i></i></a>
                    <a href="#"
                        class="icon-grid js-active"><i></i><i></i><i></i></a>
                </div>
            </div>

            <div class="content-wrap type-2">

                <div class="casting-board pd-ctr pb-0 pt-0 dir-col">
                    <ul class="list-post col-6">
                    <?php $__currentLoopData = $talents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="item casting-card type-4">
                            <a href="<?php echo e(route('client_talent_detail', ['talent_id'=>$sub->id])); ?>" class="img-wrap">
                                <img class="main-img" src="<?php echo e($sub->cover_url); ?>" alt="<?php echo e($sub->name); ?>">
                            </a>
                            <div class="content">
                                <h5 class="heading"><?php echo e($sub->name); ?></h5>
                                <p class="info">
                                    <span>Age:&nbsp;<?php echo e($sub->age_from); ?> - <?php echo e($sub->age_to); ?></span>
                                    <span><?php echo e($sub->getCareerList(' | ')); ?></span>
                                </p>
                                <a role="button" class="btn-border-gold type-2 cta" href="<?php echo e(route('client_talent_detail', ['talent_id'=>$sub->id])); ?>">view profile</a>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>

        </div>
    </article>
</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_talent_list.blade.php ENDPATH**/ ?>