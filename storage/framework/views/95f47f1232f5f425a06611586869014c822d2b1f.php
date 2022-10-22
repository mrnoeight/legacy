

<?php $__env->startSection('title', 'Membership Plan Info'); ?>

<?php $__env->startSection('hidden_page', 'Membership Plan Info'); ?>

<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="https://sandbox.megapay.vn:2810/pg_was/css/payment/layer/paymentClient.css" type="text/css" media="screen">
<script type="text/javascript" src="https://sandbox.megapay.vn:2810/pg_was/js/payment/layer/paymentClient.js"></script>

<!-- START MAIN PAGE -->
<main id="page-p2-client-info">
    <input type="hidden" id="page-id" value="page-p2-client-info" />
    <article class="main-article">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap redo-wrap type-2 p2-header-wrap">
                <header>
                    <ul class="breadcrumb full-w">
                        <li><a href="<?php echo e(route('client_profile')); ?>">Client Account</a></li>
                        <li><a href="<?php echo e(route('client_membership')); ?>">Membership Plan</a></li>
                        <li><a href="#">Details</a></li>
                    </ul>
                    <div class="flex-center">
                        <h4 class="main-heading type-4">Plan Details</h4>
                    </div>
                </header>
            </div>

            <form id="megapayForm" name="megapayForm" method="POST">
                <input type="hidden" name="invoiceNo" value="<?php echo e($data['invoiceNo']); ?>"/>
                <input type="hidden" name="amount" id="amount" value="<?php echo e($data['amount_premium']); ?>"/>
                <input type="hidden" name="description" value="Take 1 Upgrade service fee"/>
                <input type="hidden" name="goodsNm" id="goodsNm" value="Take 1 Plus"/>
                <input type="hidden" name="payType" value="IC"/>
                <input type="hidden" name="currency" value="VND">
                <input type="hidden" name="buyerFirstNm" value="<?php echo e($client->name); ?>">
                <input type="hidden" name="buyerLastNm" value="<?php echo e($client->name); ?>">
                <input type="hidden" name="buyerEmail" value="<?php echo e($client->email); ?>">
                <input type="hidden" name="buyerPhone" value="">
                <input type="hidden" name="buyerAddr" value="">
                <input type="hidden" name="buyerCity" value="">
                <input type="hidden" name="buyerState" value=""/>
                <input type="hidden" name="buyerPostCd" value=""/>
                <input type="hidden" name="buyerCountry" value="vn"/>
                <input type="hidden" name="fee" value=""/>

                <!-- Delivery Info -->
                <input type="hidden" name="receiverFirstNm" value="">
                <input type="hidden" name="receiverLastNm" value="">
                <input type="hidden" name="receiverPhone" value="">
                <input type="hidden" name="receiverAddr" value="">
                <input type="hidden" name="receiverCity" value="">
                <input type="hidden" name="receiverState" value=""/>
                <input type="hidden" name="receiverPostCd" value=""/>
                <input type="hidden" name="receiverCountry" value="VN"/>

                <!------------------------------- Main Value ------------------------------>
                <!-- Call Back URL -->
                <input type="hidden" name="callBackUrl" value="<?php echo e(route('megapay_callback')); ?>"/>
                <!-- Notify URL -->
                <input type="hidden" name="notiUrl" value="<?php echo e(route('megapay_notify')); ?>"/>
                <!-- Merchant ID -->
                <input type="hidden" name="merId" value='<?php echo e($payment::MER_ID); ?>'/>
                <!-- Encode Key -->
                
                <!------------------------------------------------------------------------->

                <input type="hidden" name="reqDomain" value="http://localhost/take1"/>
                <input type="hidden" name="userLanguage" value="EN"/>
                <input type="hidden" name="payToken" id="payToken" value=""/>
                <input type="hidden" name="userId" value="<?php echo e($client->id); ?>"/>
                <input type="hidden" name="payOption" id="payOption" value="PAY_CREATE_TOKEN"/>
                <input type="hidden" name="timeStamp" value="<?php echo e($data['timeStamp']); ?>"/>
                <input type="hidden" name="merchantToken" id="merchantToken" value="<?php echo e($data['premiumToken']); ?>"/>
                <input type="hidden" name="merTrxId" value="<?php echo e($data['merTrxId']); ?>"/>
                <input type="hidden" name="windowType" value=""/>
                <input type='hidden' name='windowColor' value='#0B3B39'/>
                <input type="hidden" name="vaCondition" value="03"/>
                <input type="hidden" name="subappid" id="subappid" value=""/>

                <ul class="dgrid col-3">
                    <li class="item-plan type-2">
                        <figure class="logo-wrap"><img src="<?php echo e(asset('assets/img/bg/logo.svg')); ?>" alt="take1" />
                            <figcaption>BASIC</figcaption>
                        </figure>
                        <div class="content">
                            <p class="txt-center"><strong>Free /</strong>&nbsp;&nbsp;<b>month</b></p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet, conse adipiscing elit, sed do eiusmod temp incididunt ut
                                    labore et dolore magna.</li>
                                <li>Massa id neque aliquam vestibulum morbi blandit cursus risus at.</li>
                                <li>Vel quam elementum pulvinar etiam non quam lacus suspendisse.</li>
                                <li>Quis enim lobortis scelerisque fermentum dui.</li>
                            </ul>

                            <?php if($client->member_type == 'free'): ?>
                            <a href="#" role="button" class="cta btn-disable type-2">CURRENT PLAN</a>
                            <?php else: ?>
                            <a href="#" role="button" class="cta btn-disable type-2">DOWNGRADE TO THIS PLAN</a>
                            <?php endif; ?>
                        </div>
                    </li>

                    <li class="item-plan type-2">
                        <figure class="logo-wrap theme-dark"><img src="<?php echo e(asset('assets/img/bg/logo.svg')); ?>" alt="take1" />
                            <figcaption>PLUS</figcaption>
                        </figure>
                        <div class="content">
                            <i class="tag yellow">recommend</i>
                            <p class="txt-center"><strong>9.50$ /</strong>&nbsp;&nbsp;<b>month</b></p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet, conse adipiscing elit, sed do eiusmod temp incididunt ut
                                    labore et dolore magna.</li>
                                <li>Massa id neque aliquam vestibulum morbi blandit cursus risus at.</li>
                                <li>Vel quam elementum pulvinar etiam non quam lacus suspendisse.</li>
                                <li>Quis enim lobortis scelerisque fermentum dui.</li>
                            </ul>

                            <?php if($client->member_type == 'plus'): ?>
                            <a href="#" role="button" class="cta btn-disable type-2">CURRENT PLAN</a>
                            <?php elseif($client->member_type == 'premium'): ?>
                            <a href="#" role="button" class="cta type-2 btn-disable" data-id="1" data-name="plus"
                                data-price="<?php echo e($data['amount_plus']); ?>" data-time="">DOWNGRADE TO THIS PLAN</a>
                            <?php else: ?>
                            <a href="#" role="button" class="cta type-2  btn-gold btn-payment" data-id="1" data-name="Plus"
                                data-price="<?php echo e(number_format($data['amount_plus'])); ?> VND" data-token="<?php echo e($data['plusToken']); ?>">UPGRADE TO THIS PLAN</a> 
                            <?php endif; ?>
                        </div>
                    </li>

                    <li class="item-plan type-2">
                        <figure class="logo-wrap theme-dark"><img src="<?php echo e(asset('assets/img/bg/logo.svg')); ?>" alt="take1" />
                            <figcaption>PREMIUM</figcaption>
                        </figure>
                        <div class="content">
                            <p class="txt-center"><strong>16.50$ /</strong>&nbsp;&nbsp;<b>month</b></p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet, conse adipiscing elit, sed do eiusmod temp incididunt ut
                                    labore et dolore magna.</li>
                                <li>Massa id neque aliquam vestibulum morbi blandit cursus risus at.</li>
                                <li>Vel quam elementum pulvinar etiam non quam lacus suspendisse.</li>
                                <li>Quis enim lobortis scelerisque fermentum dui.</li>
                            </ul>
                            <?php if($client->member_type == 'premium'): ?>
                            <a href="#" role="button" class="cta btn-disable type-2">CURRENT PLAN</a>
                            <?php else: ?>
                            <a href="#" role="button" class="cta btn-gold type-2 btn-payment" data-id="2"
                                data-name="Premium" data-price="<?php echo e(($data['amount_premium'])); ?> " data-token="<?php echo e($data['premiumToken']); ?>">UPGRADE TO THIS
                                PLAN</a>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </article>
</main>
<!-- END MAIN PAGE -->

<div id="popup-payment" class="popup-content">
  <div class="main-content">
    <a href="#" role="button" class="btn-close"><i></i></a>
    <section class="heading-wrap"><h3 class="heading-32">Let’s Get Your Payment Info</h3></section>

    <div class="payment-info">
      <figure class="logo-wrap"><img src="<?php echo e(asset('assets/img/bg/logo.svg')); ?>" alt="take1"><figcaption class="payment-name">PLUS</figcaption></figure>
      <div class="content">
        <p><b>Monthly Digital Subscription:</b>&nbsp;<strong class="payment-price">$16.50</strong></p>
        <span>(Renews on <time class="payment-time"><?php echo e(tk1AddDay(Carbon\Carbon::now(), 30)); ?></time> for <i class="payment-price">$16.50</i> plus sales tax where applicable)</span>
      </div>
    </div>

    <form class="login-form" data-url="" data-event="popup-payment-passed">
      <p class="warning-server">Server errors show here!!!</p>
      <input type="hidden" name="payment-id"/>
      <!-- <div class="dgrid col-2">
        <div class="input-wrap input-card redo-input full-w">
          <label>Card Number *</label>
          <div class="holder">
            <input name="card-number" type="text" class="input js-num js-required" autocomplete="off" required-txt="Enter your Card Number" maxlength="16" placeholder="XXXX XXXX XXXX XXXX"/>
          </div>
          <p class="warning"></p>
        </div>

        <div class="input-wrap redo-input full-w">
          <label>Card Name *</label>
          <div class="holder">
            <input name="card-name" type="text" class="input js-required" autocomplete="off" required-txt="Enter your Card Name" placeholder="Your Card Name"/>
          </div>
          <p class="warning"></p>
        </div>

        <div class="input-wrap redo-input">
          <label>Expiry Date *</label>
          <div class="holder">
            <input name="expiry-date" type="text" class="input js-required js-month" autocomplete="off" maxlength="5" required-txt="Enter your Expiry Date" ivl-txt="Enter a valid month" placeholder="MM / YY"/>
          </div>
          <p class="warning"></p>
        </div>

        <div class="input-wrap redo-input">
          <label>CVC / CVV *</label>
          <div class="holder">
            <input name="card-cvv" type="text" class="input js-num js-required" autocomplete="off" required-txt="Enter your Card CVC / CVV" maxlength="4" placeholder="XYXY"/>
          </div>
          <p class="warning"></p>
        </div>

        <div class="chx-wrap full-w">
          <div class="holder">
            <input type="checkbox" name="save-payment" id="chx-save-payment"/>
            <label for="chx-save-payment"><strong>Save Credit Card For Future Purchases</strong></label>
          </div>
          <p class="warning"></p>
        </div>
      </div> -->


      <div class="btn-wrap">
        <a href="#" class="btn-close btn-txt">Cancel</a>
        <a href="#" role="button" class="btn-gold-arrow btn-submit js-reset btn-payment-popup">purchase now</a>
      </div>
    </form>
  </div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_membership_plan.blade.php ENDPATH**/ ?>