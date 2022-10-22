<?php $__env->startSection('body'); ?>

    <div class="welcome-quote">

	    <blockquote>
		    <?php echo e($quote); ?>

		    <cite>
			    <?php echo e($quoteAuthor); ?>

		    </cite>
	    </blockquote>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('brackets/admin-ui::admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\legacy\vendor\brackets\admin-auth\src/../resources/views/admin/homepage/index.blade.php ENDPATH**/ ?>