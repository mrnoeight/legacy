<?php $__env->startSection('title', trans('admin.prole.actions.edit', ['name' => $prole->name])); ?>

<?php $__env->startSection('body'); ?>

    <div class="container-xl">
        <div class="card">

            <prole-form
                :action="'<?php echo e($prole->resource_url); ?>'"
                :data="<?php echo e($prole->toJson()); ?>"
                :gender="<?php echo e(json_encode($genders)); ?>"
                :role_type="<?php echo e(json_encode($role_types)); ?>"
                :company="<?php echo e($company->toJson()); ?>"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> <?php echo e(trans('admin.prole.actions.edit', ['name' => $prole->name])); ?>

                    </div>

                    <div class="card-body">
                        <?php echo $__env->make('admin.prole.components.form-elements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            <?php echo e(trans('brackets/admin-ui::admin.btn.save')); ?>

                        </button>
                    </div>
                    
                </form>

        </prole-form>

        </div>
    
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('brackets/admin-ui::admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/admin/prole/edit.blade.php ENDPATH**/ ?>