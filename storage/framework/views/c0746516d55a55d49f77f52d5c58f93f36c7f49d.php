<?php $__env->startSection('title', trans('admin.registration.actions.create')); ?>

<?php $__env->startSection('body'); ?>

    <div class="container-xl">

        
        <registration-form
            :action="'<?php echo e(url('admin/registrations')); ?>?stat=<?php echo e($stat); ?>'"
            :city="<?php echo e($city->toJson()); ?>"
            :experience="<?php echo e($experience->toJson()); ?>"
            :careers="<?php echo e($careers->toJson()); ?>"
            :looking="<?php echo e($looking->toJson()); ?>"
            :statuses="<?php echo e(json_encode($statuses)); ?>"
            :genders="<?php echo e(json_encode($genders)); ?>"
            :looking_roles="<?php echo e($looking_roles->toJson()); ?>"
            :accept_roles="<?php echo e($accept_roles->toJson()); ?>"
            :dances="<?php echo e($dances->toJson()); ?>"
            :martial_arts="<?php echo e($martial_arts->toJson()); ?>"
            :instruments="<?php echo e($instruments->toJson()); ?>"
            :languages="<?php echo e($languages->toJson()); ?>"
            :ethnicities="<?php echo e($ethnicities->toJson()); ?>"
            :nationalities="<?php echo e($nationalities->toJson()); ?>"
            :voice_vocals="<?php echo e($voice_vocals->toJson()); ?>"
            :tattoos="<?php echo e($tattoos->toJson()); ?>"
            :sports="<?php echo e($sports->toJson()); ?>"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus"></i> <?php echo e(trans('admin.registration.actions.create')); ?>

                            </div>
                            <div class="card-body">
                                <?php echo $__env->make('admin.registration.components.form-elements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-4">
                        <?php echo $__env->make('admin.registration.components.form-elements-right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

        </registration-form>

        </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('brackets/admin-ui::admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/admin/registration/create.blade.php ENDPATH**/ ?>