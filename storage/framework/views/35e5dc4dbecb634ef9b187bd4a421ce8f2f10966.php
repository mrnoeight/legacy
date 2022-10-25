

<?php $__env->startSection('title', trans('admin.block-info.actions.edit', ['name' => $blockInfo->id])); ?>

<?php $__env->startSection('body'); ?>

    <div class="container-xl">
        <div class="card">

            <block-info-form
                :action="'<?php echo e($blockInfo->resource_url . '?block_type='.$_GET['block_type']); ?>'"
                :data="<?php echo e($blockInfo->toJsonAllLocales()); ?>"
                :locales="<?php echo e(json_encode($locales)); ?>"
                :send-empty-locales="false"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> <?php echo e(trans('admin.block-info.actions.edit', ['name' => $blockInfo->id])); ?>

                    </div>

                    <div class="card-body">
                    <?php if($_GET['block_type'] == 'buildingA' || $_GET['block_type'] == 'buildingB' || $_GET['block_type'] == 'buildingC'): ?>
                        <?php echo $__env->make('admin.block-info.components.apartment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif($_GET['block_type'] == 'video'): ?>
                        <?php echo $__env->make('admin.block-info.components.video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif($_GET['block_type'] == 'news'): ?>
                        <?php echo $__env->make('admin.block-info.components.news', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif($_GET['block_type'] == 'progress'): ?>
                        <?php echo $__env->make('admin.block-info.components.progress', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif($_GET['block_type'] == 'basic_service' || $_GET['block_type'] == 'enhance_service' || $_GET['block_type'] == 'butler_service'): ?>
                        <?php echo $__env->make('admin.block-info.components.service', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif($_GET['block_type'] == 'member_card'): ?>
                        <?php echo $__env->make('admin.block-info.components.member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif($_GET['block_type'] == 'consultant'): ?>
                        <?php echo $__env->make('admin.block-info.components.consultant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(in_array($_GET['block_type'], array('home_text', 'apartment_text', 'menu_text', 'footer_text'))): ?>
                        <?php echo $__env->make('admin.block-info.components.text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(in_array($_GET['block_type'], array('lancaster_text'))): ?>
                        <?php echo $__env->make('admin.block-info.components.text_lancaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(in_array($_GET['block_type'], array('slider_home'))): ?>
                        <?php echo $__env->make('admin.block-info.components.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(in_array($_GET['block_type'], array('gallery_home', 'partner', 'master_gallery'))): ?>
                        <?php echo $__env->make('admin.block-info.components.block_image', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(in_array($_GET['block_type'], array('f_pool', 'f_yoga', 'f_playground', 'f_sauna', 'f_gym', 'f_park'))): ?>
                        <?php echo $__env->make('admin.block-info.components.amenities', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(in_array($_GET['block_type'], array('health_utilities', 'entertainment', 'business'))): ?>
                        <?php echo $__env->make('admin.block-info.components.utilities', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php echo $__env->make('brackets/admin-ui::admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/admin/block-info/edit.blade.php ENDPATH**/ ?>