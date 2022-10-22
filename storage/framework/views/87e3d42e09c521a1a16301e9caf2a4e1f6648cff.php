<?php $__env->startSection('title', 'Client Payment'); ?>

<?php $__env->startSection('hidden_page', 'Client Payment'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-client-payment">
    <input type="hidden" id="page-id" value="page-client-payment" />
    <section class="details-banner theme-dark">
        <header class="top-ctr wrap-1200">
            <ul class="breadcrumb">
                <li><a href="1-home.html">Home</a></li>
                <li><a href="26-client-account.html">Account</a></li>
                <li><a href="#">Payment</a></li>
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
                <header class="txt-center dir-row">
                    <h4 class="main-heading type-2">Manage Payment Info</h4>
                    <h5 class="sub-txt">Edit your payment details, add a backup, or switch your preferred payment method
                    </h5>
                </header>

                <div class="content-row">
                    <ul class="dflex dir-col">
                        <li>
                            <span class="icon-wrap">
                                <img src="<?php echo e(asset('assets/img/payment/visa-s.png')); ?>" alt="visa" />
                                <strong>*** *** *** 989</strong>
                                <b>PREFERRED PAYMENT</b>
                            </span>
                            <span class="btn-wrap">
                                <a href="28-client-payment-edit.html" role="button" class="btn-edit">Edit</a>
                                <a href="/payment/remove/129922993399" role="button" class="btn-remove"
                                    title="Remove *** *** *** 989" desc="This action can not undo">Remove</a>
                            </span>
                        </li>
                        <li>
                            <span class="icon-wrap"><img src="<?php echo e(asset('assets/img/payment/visa-s.png')); ?>" alt="visa" /><strong>*** ***
                                    *** 568</strong></span>
                            <span class="btn-wrap">
                                <a href="28-client-payment-edit.html" role="button" class="btn-edit">Edit</a>
                                <a href="/payment/remove/129922993399" role="button" class="btn-remove"
                                    title="Remove *** *** *** 568" desc="This action can not undo">Remove</a>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="dflex"><a href="29-client-payment-add.html" role="button" class="btn-gold type-2 cta"><i
                            class="icon-plus"></i>Add payment method</a></div>
            </div>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_payment.blade.php ENDPATH**/ ?>