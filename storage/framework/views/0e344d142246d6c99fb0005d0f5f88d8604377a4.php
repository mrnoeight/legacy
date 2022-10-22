<?php $__env->startSection('title', trans('admin.admin-user.actions.edit_profile')); ?>

<?php $__env->startSection('body'); ?>

    <div class="container-xl">

        <div class="card">

            <profile-edit-profile-form
                :action="'<?php echo e(url('admin/profile')); ?>'"
                :data="<?php echo e($adminUser->toJson()); ?>"
                
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action">

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> <?php echo e(trans('admin.admin-user.actions.edit_profile')); ?>

                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="avatar-upload">
                                    <?php echo $__env->make('brackets/admin-ui::admin.includes.avatar-uploader', [
                                        'mediaCollection' => app(\Brackets\AdminAuth\Models\AdminUser::class)->getMediaCollection('avatar'),
                                        'media' => $adminUser->getThumbs200ForCollection('avatar')
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group row align-items-center" :class="{'has-danger': errors.has('first_name'), 'has-success': fields.first_name && fields.first_name.valid }">
                                    <label for="first_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'"><?php echo e(trans('admin.admin-user.columns.first_name')); ?></label>
                                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                        <input type="text" v-model="form.first_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('first_name'), 'form-control-success': fields.first_name && fields.first_name.valid}" id="first_name" name="first_name" placeholder="<?php echo e(trans('admin.admin-user.columns.first_name')); ?>">
                                        <div v-if="errors.has('first_name')" class="form-control-feedback form-text" v-cloak>{{ errors.first('first_name') }}</div>
                                    </div>
                                </div>
                                
                                <div class="form-group row align-items-center" :class="{'has-danger': errors.has('last_name'), 'has-success': fields.last_name && fields.last_name.valid }">
                                    <label for="last_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'"><?php echo e(trans('admin.admin-user.columns.last_name')); ?></label>
                                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                        <input type="text" v-model="form.last_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('last_name'), 'form-control-success': fields.last_name && fields.last_name.valid}" id="last_name" name="last_name" placeholder="<?php echo e(trans('admin.admin-user.columns.last_name')); ?>">
                                        <div v-if="errors.has('last_name')" class="form-control-feedback form-text" v-cloak>{{ errors.first('last_name') }}</div>
                                    </div>
                                </div>
                                
                                <div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
                                    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'"><?php echo e(trans('admin.admin-user.columns.email')); ?></label>
                                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="<?php echo e(trans('admin.admin-user.columns.email')); ?>">
                                        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>{{ errors.first('email') }}</div>
                                    </div>
                                </div>
                                
                                <div class="form-group row align-items-center" :class="{'has-danger': errors.has('language'), 'has-success': fields.language && fields.language.valid }">
                                    <label for="language" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-3'"><?php echo e(trans('admin.admin-user.columns.language')); ?></label>
                                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                        <multiselect v-model="form.language" placeholder="<?php echo e(trans('brackets/admin-ui::admin.forms.select_an_option')); ?>" :options="<?php echo e($locales->toJson()); ?>" open-direction="bottom"></multiselect>
                                        <div v-if="errors.has('language')" class="form-control-feedback form-text" v-cloak>{{ errors.first('language') }}</div>
                                    </div>
                                </div>
                                
                                
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

            </profile-edit-profile-form>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('brackets/admin-ui::admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/admin/profile/edit-profile.blade.php ENDPATH**/ ?>