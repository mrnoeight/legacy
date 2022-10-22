<?php $__env->startSection('title', 'Client Account'); ?>

<?php $__env->startSection('hidden_page', 'Client Account'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-client-profile">
    <input type="hidden" id="page-id" value="page-client-profile" />
    <section class="details-banner theme-dark">
        <header class="top-ctr wrap-1200">
            <ul class="breadcrumb">
                <li><a href="1-home.html">Home</a></li>
                <li><a href="#">Profile</a></li>
            </ul>
            <time datetime="20/04/2021"><span class="mb-hide">Updated on:&nbsp;</span>20/04/2021</time>
        </header>
        <figure class="cover-img wrap-1200">
            <div class="img-wrap-circle"><img src="<?php echo e($client->company->thumb_url); ?>" alt="<?php echo e($client->name); ?>" /></div>
            <figcaption>
                <h3 class="name"><?php echo e($client->name); ?></h3>
                <p><i class="pack-name">BASIC</i><span>Member since January 2019</span></p>
            </figcaption>
        </figure>
        <div class="curve-deco type-2"></div>
    </section>

    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap type-2">
                <header>
                    <h4 class="main-heading type-2">Company Profile</h4>
                    <a class="sub-link" role="button" href="<?php echo e(route('client_profile_edit')); ?>">Edit Profile</a>
                </header>
                <h5 class="main-heading">Company Information</h5>
                <div class="dgrid">
                    <b>Address</b><i><?php echo e($client->company->address); ?></i>
                    <b>Phone</b><i><?php echo e($client->company->tel); ?></i>
                    <b>Email</b><i><?php echo e($client->company->company_email); ?></i>
                    <b>Website</b><i><?php echo e($client->company->website); ?></i>
                    <b>Facebook</b><i><?php echo e($client->company->facebook); ?></i>
                    <b>Youtube</b><i><?php echo e($client->company->youtube); ?></i>
                </div>

                <h5 class="main-heading">Casting Information</h5>
                <div class="dgrid">
                    <b>Executive Producer</b><i><?php echo e($client->company->excutive_producer_name); ?></i>
                    <b>Producers Name</b><i><?php echo e($client->company->producer_name); ?></i>
                    <b>Directors Name</b><i><?php echo e($client->company->director_name); ?></i>
                </div>

                <h5 class="main-heading">Casting Direct Contact</h5>
                <div class="dgrid">
                    <b>Name</b><i><?php echo e($client->company->cast_name); ?></i>
                    <b>Phone Number</b><i><?php echo e($client->company->cast_phone); ?></i>
                    <b>E-mail</b><i><?php echo e($client->company->cast_email); ?></i>
                    <b>Best time to Contact</b><i><?php echo e($client->company->cast_time); ?></i>
                </div>
            </div>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_profile.blade.php ENDPATH**/ ?>