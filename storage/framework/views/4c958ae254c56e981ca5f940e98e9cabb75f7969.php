<?php $__env->startSection('title', trans('admin.admin-user.actions.edit_password')); ?>

<?php $__env->startSection('body'); ?>

    <div class="container-xl">

        <div class="card">

            <profile-edit-password-form
                :action="'<?php echo e(url('admin/password')); ?>'"
                :data="<?php echo e($adminUser->toJson()); ?>"
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action">

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> <?php echo e(trans('admin.admin-user.actions.edit_password')); ?>

                    </div>

                    <div class="card-body">

                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('password'), 'has-success': fields.password && fields.password.valid }">
                            <label for="password" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'"><?php echo e(trans('admin.admin-user.columns.password')); ?></label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                <input type="password" v-model="form.password" v-validate="'required|min:7'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('password'), 'form-control-success': fields.password && fields.password.valid}" id="password" name="password" placeholder="<?php echo e(trans('admin.admin-user.columns.password')); ?>" ref="password">
                                <div v-if="errors.has('password')" class="form-control-feedback form-text" v-cloak>{{ errors.first('password') }}</div>
                            </div>
                        </div>
                        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('password_confirmation'), 'has-success': fields.password_confirmation && fields.password_confirmation.valid }">
                            <label for="password_confirmation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'"><?php echo e(trans('admin.admin-user.columns.password_repeat')); ?></label>
                            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                <input type="password" v-model="form.password_confirmation" v-validate="'required|confirmed:password|min:7'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('password_confirmation'), 'form-control-success': fields.password_confirmation && fields.password_confirmation.valid}" id="password_confirmation" name="password_confirmation" placeholder="<?php echo e(trans('admin.admin-user.columns.password')); ?>" data-vv-as="password">
                                <div v-if="errors.has('password_confirmation')" class="form-control-feedback form-text" v-cloak>{{ errors.first('password_confirmation') }}</div>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            <?php echo e(trans('brackets/admin-ui::admin.btn.save')); ?>

                        </button>
                    </div>

                </form>

            </profile-edit-password-form>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('brackets/admin-ui::admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/admin/profile/edit-password.blade.php ENDPATH**/ ?>