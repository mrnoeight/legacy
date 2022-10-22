

<?php $__env->startSection('title', 'Talent Membership'); ?>

<?php $__env->startSection('hidden_page', 'Talent Membership'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-p2-talent-info">
    <input type="hidden" id="page-id" value="page-p2-talent-info" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap redo-wrap type-2 p2-header-wrap">
                <header>
                    <h4 class="main-heading type-4">Talent Account</h4>
                </header>
            </div>

            <div class="xscroll">
                <ul class="tab-header">
                    <li><a href="<?php echo e(route('talent_profile')); ?>">Profile</a></li>
                    <li><a href="<?php echo e(route('talent_account')); ?>">Account Info</a></li>
                    <li><a href="<?php echo e(route('talent_password')); ?>">Password</a></li>
                    <li><a href="#" class="active">Membership Plan</a></li>
                </ul>
            </div>

            <div class="content-wrap redo-wrap">
                <header>
                    <h5 class="heading">Membership Plan</h5>
                </header>
                <ul class="dgrid col-3">
                    <li class="item-plan type-2">
                        <figure class="logo-wrap"><img src="<?php echo e(asset('assets/img/bg/logo.svg')); ?>" alt="take1">
                            <figcaption>BASIC</figcaption>
                        </figure>
                        <div class="content">
                            <p class="txt-center"><strong>Free /</strong>&nbsp;&nbsp;<b>month</b></p>
                            <p>Lorem ipsum dolor sit amet, conse adipiscing elit, sed do eiusmod temp...</p>
                            <?php if($talent->member_type == 'free'): ?>
                            <a href="#" role="button" class="cta btn-disable type-2">CURRENT PLAN</a>
                            <?php else: ?>
                            <a href="#" role="button" class="cta btn-disable type-2">DOWNGRADE TO THIS PLAN</a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('talent_plan')); ?>" class="arrow-link"><i>More Details</i></a>
                        </div>
                    </li>

                    <li class="item-plan type-2">
                        <figure class="logo-wrap theme-dark"><img src="<?php echo e(asset('assets/img/bg/logo.svg')); ?>"
                                alt="take1">
                            <figcaption>PLUS</figcaption>
                        </figure>
                        <div class="content">
                            <i class="tag yellow">recommend</i>
                            <p class="txt-center"><strong>9.50$ /</strong>&nbsp;&nbsp;<b>month</b></p>
                            <p>Lorem ipsum dolor sit amet, conse adipiscing elit, sed do eiusmod temp...</p>
                            <?php if($talent->member_type == 'plus'): ?>
                            <a href="#" role="button" class="cta btn-disable type-2">CURRENT PLAN</a>
                            <?php elseif($talent->member_type == 'premium'): ?>
                            <a href="#" role="button" class="cta type-2 btn-disable" data-id="1" data-name="plus"
                                data-price="<?php echo e(number_format($data['amount_plus'])); ?>" data-time="">DOWNGRADE TO THIS PLAN</a>
                            <?php else: ?>
                            <a href="#" role="button" class="cta type-2  btn-gold btn-payment" data-id="1"
                                data-name="Plus" data-price="<?php echo e(number_format($data['amount_plus'])); ?> VND"
                                >UPGRADE TO THIS PLAN</a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('talent_plan')); ?>" class="arrow-link"><i>More Details</i></a>
                        </div>
                    </li>

                    <li class="item-plan type-2">
                        <figure class="logo-wrap theme-dark"><img src="<?php echo e(asset('assets/img/bg/logo.svg')); ?>"
                                alt="take1">
                            <figcaption>PREMIUM</figcaption>
                        </figure>
                        <div class="content">
                            <p class="txt-center"><strong>16.50$ /</strong>&nbsp;&nbsp;<b>month</b></p>
                            <p>Lorem ipsum dolor sit amet, conse adipiscing elit, sed do eiusmod temp...</p>
                            <?php if($talent->member_type == 'premium'): ?>
                            <a href="#" role="button" class="cta btn-disable type-2">CURRENT PLAN</a>
                            <?php else: ?>
                            <a href="#" role="button" class="cta btn-gold type-2 btn-payment" data-id="2"
                                data-name="Premium" data-price="<?php echo e(number_format($data['amount_premium'])); ?> VND"
                                >UPGRADE TO THIS
                                PLAN</a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('talent_plan')); ?>" class="arrow-link"><i>More Details</i></a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="content-wrap redo-wrap">
                <h5 class="heading">purchase details</h5>
                <div class="dgrid col-2">
                    <div>
                        <h6 class="sub-heading">Purchase Date</h6>
                        <p>September 16, 2021</p>
                    </div>
                    <div>
                        <h6 class="sub-heading">Next Billing Date</h6>
                        <p>None</p>
                    </div>
                </div>
            </div>



        </div>
    </article>
</main>
<!-- END MAIN PAGE -->

<div id="popup-payment" class="popup-content">
    <div class="main-content">
        <a href="#" role="button" class="btn-close"><i></i></a>
        <section class="heading-wrap">
            <h3 class="heading-32">Let’s Get Your Payment Info</h3>
        </section>

        <div class="payment-info">
            <figure class="logo-wrap"><img src="<?php echo e(asset('assets/img/bg/logo.svg')); ?>" alt="take1">
                <figcaption class="payment-name">PLUS</figcaption>
            </figure>
            <div class="content">
                <p><b>Monthly Digital Subscription:</b>&nbsp;<strong class="payment-price">$16.50</strong></p>
                <span>(Renews on <time class="payment-time"><?php echo e(tk1AddDay(Carbon\Carbon::now(), 30)); ?></time> for <i
                        class="payment-price">$16.50</i> plus sales tax where applicable)</span>
            </div>
        </div>

        
            <!-- <p class="warning-server">Server errors show here!!!</p> -->
            <input type="hidden" name="payment-id" />



            <div class="btn-wrap">
                <a href="#" class="btn-close btn-txt">Cancel</a>
                <a href="#" role="button" class="btn-gold-arrow btn-submit js-reset btn-payment-popup-payoo">purchase
                    now</a>
            </div>
        
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_membership.blade.php ENDPATH**/ ?>