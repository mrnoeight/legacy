<!doctype html>
<html>
<head>
    <?php echo $__env->make('web.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <style>
        .crt-post-text {display: none;}
    </style>
</head>


<body class="js-preload">
    <h1 class="hidden"><?php echo $__env->yieldContent('hidden_page'); ?></h1>

    <?php echo $__env->make('web.partials.header_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('web.partials.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/layouts/base.blade.php ENDPATH**/ ?>