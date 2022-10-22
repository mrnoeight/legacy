<shops>
    <shop>
        <username><?php echo e($payment::BUSINESS_NAME); ?></username>
        <shop_id><?php echo e($payment::MER_ID); ?></shop_id>
        <session><?php echo e($data['invoiceNo']); ?></session>
        <shop_title><?php echo e($payment::SHOP_TITLE); ?></shop_title>
        <shop_domain>https://take1.vn</shop_domain>

        <shop_back_url><?php echo e(urlencode(route('payoo_callback'))); ?></shop_back_url>
        <order_no><?php echo e($data['invoiceNo']); ?></order_no>
        <order_cash_amount><?php echo e($data['amount_plus']); ?></order_cash_amount>
        <order_ship_date><?php echo e(Carbon\Carbon::now()->format('d/m/Y')); ?></order_ship_date>
        <order_ship_days>1</order_ship_days>
        <order_description><?php echo e(urlencode('Monthly Digital Subscription for Take1. Renews every month!')); ?></order_description>
        <notify_url><?php echo e(urlencode(route('payoo_notify'))); ?></notify_url>
        <validity_time><?php echo e(Carbon\Carbon::now()->addHour()->format('YmdHis')); ?></validity_time>
        <JsonResponse>TRUE</JsonResponse>
        
        
    </shop>
</shops><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/payoo_shop.blade.php ENDPATH**/ ?>