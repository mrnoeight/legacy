<?php $__env->startSection('title', trans('admin.tag.actions.create')); ?>

<?php $__env->startSection('body'); ?>

    <div class="container-xl">

                <div class="card">
        
        <tag-form
            :action="'<?php echo e(url('admin/tags')); ?>'"
            :option-tags="<?php echo e($optionTags); ?>"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> <?php echo e(trans('admin.tag.actions.create')); ?>

                </div>

                <div class="card-body">
                    <?php echo $__env->make('admin.tag.components.form-elements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        <?php echo e(trans('brackets/admin-ui::admin.btn.save')); ?>

                    </button>
                </div>
                
            </form>

        </tag-form>

        </div>

        </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('brackets/admin-ui::admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/admin/tag/create.blade.php ENDPATH**/ ?>