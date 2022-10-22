<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.city.columns.name')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="<?php echo e(trans('admin.city.columns.name')); ?>">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('weight'), 'has-success': fields.weight && fields.weight.valid }">
    <label for="weight" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.city.columns.weight')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.weight" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('weight'), 'form-control-success': fields.weight && fields.weight.valid}" id="weight" name="weight" placeholder="<?php echo e(trans('admin.city.columns.weight')); ?>">
        <div v-if="errors.has('weight')" class="form-control-feedback form-text" v-cloak>{{ errors.first('weight') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('country_id'), 'has-success': fields.country_id && fields.country_id.valid }">
    <label for="country_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.city.columns.country_id')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.country_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('country_id'), 'form-control-success': fields.country_id && fields.country_id.valid}" id="country_id" name="country_id" placeholder="<?php echo e(trans('admin.city.columns.country_id')); ?>">
        <div v-if="errors.has('country_id')" class="form-control-feedback form-text" v-cloak>{{ errors.first('country_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('country_code'), 'has-success': fields.country_code && fields.country_code.valid }">
    <label for="country_code" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.city.columns.country_code')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.country_code" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('country_code'), 'form-control-success': fields.country_code && fields.country_code.valid}" id="country_code" name="country_code" placeholder="<?php echo e(trans('admin.city.columns.country_code')); ?>">
        <div v-if="errors.has('country_code')" class="form-control-feedback form-text" v-cloak>{{ errors.first('country_code') }}</div>
    </div>
</div>


<?php /**PATH C:\xampp2\htdocs\take1\resources\views/admin/city/components/form-elements.blade.php ENDPATH**/ ?>