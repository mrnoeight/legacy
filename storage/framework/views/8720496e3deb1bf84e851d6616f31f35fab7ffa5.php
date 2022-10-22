

<?php $__env->startSection('title', 'Client Account Info'); ?>

<?php $__env->startSection('hidden_page', 'Client Account Info'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-p2-client-info">
    <input type="hidden" id="page-id" value="page-p2-client-info" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap redo-wrap type-2 p2-header-wrap">
                <header>
                    <h4 class="main-heading type-4">Client Account</h4>
                </header>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                    <li><a href="<?php echo e(route('client_profile')); ?>">Profile</a></li>
                    <li><a href="<?php echo e(route('client_account_info')); ?>">Account Info</a></li>
                    <li><a href="<?php echo e(route('client_password')); ?>">Password</a></li>
                    <li><a href="<?php echo e(route('client_membership')); ?>" class="active">Membership Plan</a></li>
                </ul>
            </div>

            <div class="content-wrap redo-wrap">
                <h5 class="heading">transaction details</h5>
                <!-- <p>You will be redirected to homepage in 5 seconds</p> -->

                <!-- <?php if($result['resultMsg'] == 'SUCCESS'): ?>
                <p>Your transaction is completed successfully.</p>
                <p>You have registered successfully <?php echo e($result['goodsNm']); ?></p>
                <?php else: ?>
                <p><?php echo e($result['resultMsg']); ?></p>
                <p>You can click <a class="payment-load" href="#">here</a> to make payment again.</p>
                <?php endif; ?> -->
                <!-- <div class="dgrid col-2">
                    <div>
                        <h6 class="sub-heading">Purchase Date</h6>
                        <p>September 16, 2021</p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Next Billing Date</h6>
                        <p>None</p>
                    </div>
                </div> -->
            </div>

            <!-- <div class="content-wrap redo-wrap">
                <header>
                    <h5 class="heading">Payment Information</h5>
                    <a href="#" class="btn-gold"><i class="icon-plus"></i>add payment</a>
                </header>
                <ul class="list-payment">
                    <lh>
                        <h6 class="sub-heading">Credit / Debit Card</h6>
                    </lh>
                    <li>
                        <figure>
                            <img src="img/payment/master.png" alt="master card" />
                            <figcaption>
                                <p class="name">Master Card<i class="tag green">default</i></p>
                            </figcaption>
                        </figure>
                        <strong>*** *** *** 989</strong>
                        <div class="btn-wrap">
                            <a href="#" class="btn-txt">Remove</a>
                            <a href="#" role="button" class="btn-border-gold type-2 cta js-disable">set as default</a>
                        </div>
                    </li>
                    <li>
                        <figure>
                            <img src="img/payment/visa.png" alt="visa" />
                            <figcaption>
                                <p class="name">Visa</p>
                            </figcaption>
                        </figure>
                        <strong>*** *** *** 989</strong>
                        <div class="btn-wrap">
                            <a href="#" class="btn-txt">Remove</a>
                            <a href="#" role="button" class="btn-border-gold type-2 cta">set as default</a>
                        </div>
                    </li>
                </ul>
                <hr />
                <ul class="list-payment">
                    <lh>
                        <h6 class="sub-heading">Bank Account</h6>
                    </lh>
                    <li>
                        <figure class="type-2">
                            <img src="img/payment/bank.svg" alt="VPBANK" />
                            <figcaption>
                                <p class="name">VPBANK - NHTMCP VN THINH VUONG<i class="tag green">default</i></p>
                                <p><strong>Kylie Nguyen</strong></p>
                                <p>Ho Chi Minh City</p>
                            </figcaption>
                        </figure>
                        <strong>*** *** *** 989</strong>
                        <div class="btn-wrap">
                            <a href="#" class="btn-txt">Remove</a>
                            <a href="#" role="button" class="btn-border-gold type-2 cta js-disable">set as default</a>
                        </div>
                    </li>
                    <li>
                        <figure class="type-2">
                            <img src="img/payment/bank.svg" alt="SACOMBANK" />
                            <figcaption>
                                <p class="name">SACOMBANK - NHTMCP SAI GON THUONG TIN</p>
                                <p><strong>Kylie Nguyen</strong></p>
                                <p>Ho Chi Minh City</p>
                            </figcaption>
                        </figure>
                        <strong>*** *** *** 989</strong>
                        <div class="btn-wrap">
                            <a href="#" class="btn-txt">Remove</a>
                            <a href="#" role="button" class="btn-border-gold type-2 cta">set as default</a>
                        </div>
                    </li>
                </ul>
            </div> -->

        </div>
    </article>
</main>
<!-- END MAIN PAGE -->

<div id="popup-alert" class="popup-content">
  <div class="main-content">
    <a href="<?php echo e(route('home')); ?>" role="button" class="btn-close"><i></i></a>
    <section class="heading-wrap">
      <h3 class="heading title"></h3>
      <p class="desc"></p>
    </section>
    <div class="html"></div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_payment_callback.blade.php ENDPATH**/ ?>