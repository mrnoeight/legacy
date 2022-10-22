<?php $__env->startSection('title', trans('admin.homepage.actions.create')); ?>

<?php $__env->startSection('body'); ?>

    <div class="container-xl">

                <div class="card">
        
        <homepage-form
            :action="'<?php echo e(url('admin/homepages')); ?>'"
            :locales="<?php echo e(json_encode($locales)); ?>"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> <?php echo e(trans('admin.homepage.actions.create')); ?>

                </div>

                <div class="card-body">
                <?php if($_GET['pg'] == 'apartment'): ?>
                    <?php echo $__env->make('admin.block-info.components.apartment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif($_GET['pg'] == 'video'): ?>
                    <?php echo $__env->make('admin.block-info.components.video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif($_GET['pg'] == 'news'): ?>
                    <?php echo $__env->make('admin.block-info.components.news', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif($_GET['pg'] == 'progress'): ?>
                    <?php echo $__env->make('admin.block-info.components.progress', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif($_GET['pg'] == 'basic_service' || $_GET['pg'] == 'enhance_service' || $_GET['pg'] == 'butler_service'): ?>
                    <?php echo $__env->make('admin.block-info.components.service', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif($_GET['pg'] == 'member_card'): ?>
                    <?php echo $__env->make('admin.block-info.components.member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif($_GET['pg'] == 'consultant'): ?>
                    <?php echo $__env->make('admin.block-info.components.consultant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif($_GET['pg'] == 'home_text'): ?>
                    <?php echo $__env->make('admin.block-info.components.text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <?php echo $__env->make('admin.homepage.components.form-elements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                    
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        <?php echo e(trans('brackets/admin-ui::admin.btn.save')); ?>

                    </button>
                </div>
                
            </form>

        </homepage-form>

        </div>

        </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('brackets/admin-ui::admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/admin/homepage/create.blade.php ENDPATH**/ ?>