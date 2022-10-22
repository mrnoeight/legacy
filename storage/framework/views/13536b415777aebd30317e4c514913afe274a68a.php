<?php $__env->startSection('title', trans('admin.post.actions.edit', ['name' => $post->name])); ?>

<?php $__env->startSection('body'); ?>

    <div class="container-xl">

            <post-form
                :action="'<?php echo e($post->resource_url); ?>'"
                :data="<?php echo e($post->toJsonAllLocales()); ?>"
                :company="<?php echo e($company->toJson()); ?>"
                :city="<?php echo e($city->toJson()); ?>"
                :available-tags="<?php echo e($tags->toJson()); ?>"
                :post-type="<?php echo e($post_type->toJson()); ?>"
                :gender="<?php echo e(json_encode($genders)); ?>"
                :project_budget="<?php echo e(json_encode($project_budget)); ?>"
                :locales="<?php echo e(json_encode($locales)); ?>"
                :send-empty-locales="false"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-pencil"></i> <?php echo e(trans('admin.post.actions.edit', ['name' => $post->name])); ?>

                                </div>
                                <div class="card-body">
                                    <?php echo $__env->make('admin.post.components.form-elements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-4">
                            <?php echo $__env->make('admin.post.components.form-elements-right', ['showHistory' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary fixed-cta-button button-save" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-save'"></i>
                        <?php echo e(trans('brackets/admin-ui::admin.btn.save')); ?>

                    </button>

                    <button type="submit" style="display: none" class="btn btn-success fixed-cta-button button-saved" :disabled="submiting" :class="">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-check'"></i>
                        <span><?php echo e(trans('brackets/admin-ui::admin.btn.saved')); ?></span>
                    </button>
                     
                </form>

        </post-form>

    
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('brackets/admin-ui::admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/admin/post/edit.blade.php ENDPATH**/ ?>