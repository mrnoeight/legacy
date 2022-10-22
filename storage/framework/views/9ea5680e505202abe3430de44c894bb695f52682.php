<?php $__env->startSection('title', trans('admin.admin-user.actions.edit', ['name' => $adminUser->first_name])); ?>

<?php $__env->startSection('body'); ?>

    <div class="container-xl">

        <div class="card">

            <admin-user-form
                :action="'<?php echo e($adminUser->resource_url); ?>'"
                :data="<?php echo e($adminUser->toJson()); ?>"
                :activation="!!'<?php echo e($activation); ?>'"
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action">

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> <?php echo e(trans('admin.admin-user.actions.edit', ['name' => $adminUser->first_name])); ?>

                    </div>

                    <div class="card-body">

                        <?php echo $__env->make('admin.admin-user.components.form-elements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </div>

                    <div class="card-footer">
	                    <button type="submit" class="btn btn-primary" :disabled="submiting">
		                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            <?php echo e(trans('brackets/admin-ui::admin.btn.save')); ?>

	                    </button>
                    </div>

                </form>

        </admin-user-form>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('brackets/admin-ui::admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/admin/admin-user/edit.blade.php ENDPATH**/ ?>