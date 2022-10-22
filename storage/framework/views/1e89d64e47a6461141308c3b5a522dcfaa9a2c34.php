<?php $__env->startSection('title', trans('admin.block-info.actions.create')); ?>

<?php $__env->startSection('body'); ?>

    <div class="container-xl">

                <div class="card">
        
        <block-info-form
            :action="'<?php echo e(url('admin/block-infos?block_type='.$_GET['block_type'])); ?>'"
            :locales="<?php echo e(json_encode($locales)); ?>"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> <?php echo e(trans('admin.block-info.actions.create')); ?>

                </div>

                <div class="card-body">
                <?php if($_GET['block_type'] == 'buildingA' || $_GET['block_type'] == 'buildingB' || $_GET['block_type'] == 'buildingC'): ?>
                    <?php echo $__env->make('admin.block-info.components.apartment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif($_GET['block_type'] == 'video'): ?>
                    <?php echo $__env->make('admin.block-info.components.video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif($_GET['block_type'] == 'news'): ?>
                    <?php echo $__env->make('admin.block-info.components.news', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <?php echo $__env->make('admin.block-info.components.form-elements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        <?php echo e(trans('brackets/admin-ui::admin.btn.save')); ?>

                    </button>
                </div>
                
            </form>

        </block-info-form>

        </div>

        </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('brackets/admin-ui::admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/admin/block-info/create.blade.php ENDPATH**/ ?>