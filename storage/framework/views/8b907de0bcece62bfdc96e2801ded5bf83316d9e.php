<?php $__env->startSection('title', 'Client Account'); ?>

<?php $__env->startSection('hidden_page', 'Client Account'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-client-account">
    <input type="hidden" id="page-id" value="page-client-account" />
    <section class="details-banner theme-dark">
        <header class="top-ctr wrap-1200">
            <ul class="breadcrumb">
                <li><a href="1-home.html">Home</a></li>
                <li><a href="#">Account</a></li>
            </ul>
            <time datetime="20/04/2021"><span class="mb-hide">Updated on:&nbsp;</span>20/04/2021</time>
        </header>
        <figure class="cover-img wrap-1200">
            <div class="img-wrap-circle"><img src="<?php echo e(asset('assets/img/banner/img-logo.jpg')); ?>" alt="IMG MODELS" /></div>
            <figcaption>
                <h3 class="name">IMG MODELS VIETNAM</h3>
                <p><i class="pack-name">BASIC</i><span>Member since January 2019</span></p>
            </figcaption>
        </figure>
        <div class="curve-deco type-2"></div>
    </section>

    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap type-2">
                <header>
                    <h4 class="main-heading type-2">Membership</h4>
                </header>
                <div class="content-row">
                    <h5 class="main-heading">Membership & Billing</h5>
                    <ul class="dflex dir-col">
                        <li><i>castingdepartment@imgvn.com</i><a href="22-client-profile-edit.html">Change account
                                E-mail</a></li>
                        <li><i>************</i><a href="23-client-pw.html">Change Password</a></li>
                        <li><i>(+84) 028 990 990</i><a href="22-client-profile-edit.html">Change Phone Number</a></li>
                        <li><span class="icon-wrap"><img src="<?php echo e(asset('assets/img/payment/visa-s.png')); ?>" alt="visa" /><i>*** *** ***
                                    989</i></span><a href="27-client-payment.html">Manage Payment Info</a></li>
                        <li><i>Your next billing date is September 16, 2021</i><a href="#">Billing Detail</a></li>
                    </ul>
                </div>

                <div class="content-row">
                    <h5 class="main-heading">Package Detail</h5>
                    <ul class="dflex dir-col">
                        <li><i class="pack-name type-2">BASIC</i><a href="30-client-plan.html">Change Package</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_account.blade.php ENDPATH**/ ?>