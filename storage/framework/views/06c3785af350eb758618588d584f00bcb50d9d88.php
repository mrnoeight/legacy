<div class="form-group row align-items-center" :class="{'has-danger': errors.has('registration_id'), 'has-success': fields.registration_id && fields.registration_id.valid }">
    <label for="registration_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.experience.columns.registration_id')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.registration_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('registration_id'), 'form-control-success': fields.registration_id && fields.registration_id.valid}" id="registration_id" name="registration_id" placeholder="<?php echo e(trans('admin.experience.columns.registration_id')); ?>">
        <div v-if="errors.has('registration_id')" class="form-control-feedback form-text" v-cloak>{{ errors.first('registration_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('movie_name'), 'has-success': fields.movie_name && fields.movie_name.valid }">
    <label for="movie_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.experience.columns.movie_name')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.movie_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('movie_name'), 'form-control-success': fields.movie_name && fields.movie_name.valid}" id="movie_name" name="movie_name" placeholder="<?php echo e(trans('admin.experience.columns.movie_name')); ?>">
        <div v-if="errors.has('movie_name')" class="form-control-feedback form-text" v-cloak>{{ errors.first('movie_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('role_name'), 'has-success': fields.role_name && fields.role_name.valid }">
    <label for="role_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.experience.columns.role_name')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.role_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('role_name'), 'form-control-success': fields.role_name && fields.role_name.valid}" id="role_name" name="role_name" placeholder="<?php echo e(trans('admin.experience.columns.role_name')); ?>">
        <div v-if="errors.has('role_name')" class="form-control-feedback form-text" v-cloak>{{ errors.first('role_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('exp_year'), 'has-success': fields.exp_year && fields.exp_year.valid }">
    <label for="exp_year" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.experience.columns.exp_year')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.exp_year" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('exp_year'), 'form-control-success': fields.exp_year && fields.exp_year.valid}" id="exp_year" name="exp_year" placeholder="<?php echo e(trans('admin.experience.columns.exp_year')); ?>">
        <div v-if="errors.has('exp_year')" class="form-control-feedback form-text" v-cloak>{{ errors.first('exp_year') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('role_type'), 'has-success': fields.role_type && fields.role_type.valid }">
    <label for="role_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.experience.columns.role_type')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.role_type" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('role_type'), 'form-control-success': fields.role_type && fields.role_type.valid}" id="role_type" name="role_type" placeholder="<?php echo e(trans('admin.experience.columns.role_type')); ?>">
        <div v-if="errors.has('role_type')" class="form-control-feedback form-text" v-cloak>{{ errors.first('role_type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('project_type'), 'has-success': fields.project_type && fields.project_type.valid }">
    <label for="project_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.experience.columns.project_type')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.project_type" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('project_type'), 'form-control-success': fields.project_type && fields.project_type.valid}" id="project_type" name="project_type" placeholder="<?php echo e(trans('admin.experience.columns.project_type')); ?>">
        <div v-if="errors.has('project_type')" class="form-control-feedback form-text" v-cloak>{{ errors.first('project_type') }}</div>
    </div>
</div>


<?php /**PATH C:\xampp2\htdocs\take1\resources\views/admin/experience/components/form-elements.blade.php ENDPATH**/ ?>