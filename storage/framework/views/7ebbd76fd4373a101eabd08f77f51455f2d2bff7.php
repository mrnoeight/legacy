<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.registration.columns.name')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="<?php echo e(trans('admin.registration.columns.name')); ?>">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.registration.columns.email')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="<?php echo e(trans('admin.registration.columns.email')); ?>">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('birthday'), 'has-success': fields.birthday && fields.birthday.valid }">
    <label for="birthday" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.registration.columns.birthday')); ?></label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.birthday" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('birthday'), 'form-control-success': fields.birthday && fields.birthday.valid}" id="birthday" name="birthday" placeholder="<?php echo e(trans('brackets/admin-ui::admin.forms.select_a_date')); ?>"></datetime>
        </div>
        <div v-if="errors.has('birthday')" class="form-control-feedback form-text" v-cloak>{{ errors.first('birthday') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('gender'), 'has-success': fields.gender && fields.gender.valid }">
    <label for="gender" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('Gender')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!-- <input type="text" v-model="form.gender" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('gender'), 'form-control-success': fields.gender && fields.gender.valid}" id="gender" name="gender" placeholder="<?php echo e(trans('admin.post.columns.gender')); ?>"> -->
        <multiselect
            v-model="form.genders"
            :options="genders"
            :multiple="false"
            track-by="id"
            label="name"
            tag-placeholder="<?php echo e(__('Select Gender')); ?>"
            placeholder="<?php echo e(__('Gender')); ?>">
        </multiselect>
        <div v-if="errors.has('gender')" class="form-control-feedback form-text" v-cloak>{{ errors.first('gender') }}</div>
    </div>
</div>

<!-- v-validate="'date_format:yyyy-MM-dd HH:mm:ss'"<div class="form-group row align-items-center" :class="{'has-danger': errors.has('hometown'), 'has-success': fields.hometown && fields.hometown.valid }">
    <label for="hometown" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.registration.columns.hometown')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.hometown" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('hometown'), 'form-control-success': fields.hometown && fields.hometown.valid}" id="hometown" name="hometown" placeholder="<?php echo e(trans('admin.registration.columns.hometown')); ?>">
        <div v-if="errors.has('hometown')" class="form-control-feedback form-text" v-cloak>{{ errors.first('hometown') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('city'), 'has-success': fields.city && fields.city.valid }">
    <label for="city" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.registration.columns.hometown')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!-- <input type="text" v-model="form.city" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('city'), 'form-control-success': fields.city && fields.city.valid}" id="city" name="city" placeholder="<?php echo e(trans('admin.post.columns.city')); ?>"> -->
        <multiselect
            v-model="form.city"
            :options="city"
            :multiple="false"
            track-by="id"
            label="name"
            tag-placeholder="<?php echo e(__('Select City')); ?>"
            placeholder="<?php echo e(__('City')); ?>">
        </multiselect>
        <div v-if="errors.has('city')" class="form-control-feedback form-text" v-cloak>{{ errors.first('city') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address'), 'has-success': fields.address && fields.address.valid }">
    <label for="address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('Address')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('address'), 'form-control-success': fields.address && fields.address.valid}" id="address" name="address" placeholder="<?php echo e(trans('Address')); ?>">
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>{{ errors.first('address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <label for="status" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.registration.columns.status')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.statuses"
            :options="statuses"
            :multiple="false"
            track-by="id"
            label="name"
            tag-placeholder="<?php echo e(__('Select status')); ?>"
            placeholder="<?php echo e(__('Status')); ?>">
        </multiselect>
        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>{{ errors.first('status') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bio'), 'has-success': fields.bio && fields.bio.valid }">
    <label for="bio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.registration.columns.bio')); ?></label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.bio" v-validate="''" id="bio" name="bio" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('bio')" class="form-control-feedback form-text" v-cloak>{{ errors.first('bio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('height'), 'has-success': fields.height && fields.height.valid }">
    <label for="height" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.registration.columns.height')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.height" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('height'), 'form-control-success': fields.height && fields.height.valid}" id="height" name="height" placeholder="<?php echo e(trans('admin.registration.columns.height')); ?>">
        <div v-if="errors.has('height')" class="form-control-feedback form-text" v-cloak>{{ errors.first('height') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('weight'), 'has-success': fields.weight && fields.weight.valid }">
    <label for="weight" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.registration.columns.weight')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.weight" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('weight'), 'form-control-success': fields.weight && fields.weight.valid}" id="weight" name="weight" placeholder="<?php echo e(trans('admin.registration.columns.weight')); ?>">
        <div v-if="errors.has('weight')" class="form-control-feedback form-text" v-cloak>{{ errors.first('weight') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('chest'), 'has-success': fields.chest && fields.chest.valid }">
    <label for="chest" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('Chest')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.chest" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('chest'), 'form-control-success': fields.chest && fields.chest.valid}" id="chest" name="chest" placeholder="<?php echo e(trans('Chest')); ?>">
        <div v-if="errors.has('chest')" class="form-control-feedback form-text" v-cloak>{{ errors.first('chest') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('waist'), 'has-success': fields.waist && fields.waist.valid }">
    <label for="waist" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('Waist')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.waist" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('waist'), 'form-control-success': fields.waist && fields.waist.valid}" id="waist" name="waist" placeholder="<?php echo e(trans('Waist')); ?>">
        <div v-if="errors.has('waist')" class="form-control-feedback form-text" v-cloak>{{ errors.first('waist') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('hip'), 'has-success': fields.hip && fields.hip.valid }">
    <label for="hip" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('Hip')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.hip" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('hip'), 'form-control-success': fields.hip && fields.hip.valid}" id="hip" name="hip" placeholder="<?php echo e(trans('Hip')); ?>">
        <div v-if="errors.has('hip')" class="form-control-feedback form-text" v-cloak>{{ errors.first('hip') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('shoes'), 'has-success': fields.shoes && fields.shoes.valid }">
    <label for="shoes" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('Shoes')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.shoes" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('shoes'), 'form-control-success': fields.shoes && fields.shoes.valid}" id="shoes" name="shoes" placeholder="<?php echo e(trans('Shoes')); ?>">
        <div v-if="errors.has('shoes')" class="form-control-feedback form-text" v-cloak>{{ errors.first('shoes') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tiktok_link'), 'has-success': fields.tiktok_link && fields.tiktok_link.valid }">
    <label for="tiktok_link" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('Tiktok')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tiktok_link" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tiktok_link'), 'form-control-success': fields.tiktok_link && fields.tiktok_link.valid}" id="tiktok_link" name="tiktok_link" placeholder="<?php echo e(trans('admin.registration.columns.tiktok_link')); ?>">
        <div v-if="errors.has('tiktok_link')" class="form-control-feedback form-text" v-cloak>{{ errors.first('tiktok_link') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('facebook_link'), 'has-success': fields.facebook_link && fields.facebook_link.valid }">
    <label for="facebook_link" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('Facebook')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.facebook_link" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('facebook_link'), 'form-control-success': fields.facebook_link && fields.facebook_link.valid}" id="facebook_link" name="facebook_link" placeholder="<?php echo e(trans('admin.registration.columns.facebook_link')); ?>">
        <div v-if="errors.has('facebook_link')" class="form-control-feedback form-text" v-cloak>{{ errors.first('facebook_link') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('instagram_link'), 'has-success': fields.instagram_link && fields.instagram_link.valid }">
    <label for="instagram_link" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('Instagram')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.instagram_link" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('instagram_link'), 'form-control-success': fields.instagram_link && fields.instagram_link.valid}" id="instagram_link" name="instagram_link" placeholder="<?php echo e(trans('admin.registration.columns.instagram_link')); ?>">
        <div v-if="errors.has('instagram_link')" class="form-control-feedback form-text" v-cloak>{{ errors.first('instagram_link') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('youtube_link'), 'has-success': fields.youtube_link && fields.youtube_link.valid }">
    <label for="youtube_link" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('Youtube')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.youtube_link" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('youtube_link'), 'form-control-success': fields.youtube_link && fields.youtube_link.valid}" id="youtube_link" name="youtube_link" placeholder="<?php echo e(trans('admin.registration.columns.youtube_link')); ?>">
        <div v-if="errors.has('youtube_link')" class="form-control-feedback form-text" v-cloak>{{ errors.first('youtube_link') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('parent_name'), 'has-success': fields.parent_name && fields.parent_name.valid }">
    <label for="parent_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('Parent name')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.parent_name" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('parent_name'), 'form-control-success': fields.parent_name && fields.parent_name.valid}" id="parent_name" name="parent_name" placeholder="<?php echo e(trans('Parent name')); ?>">
        <div v-if="errors.has('parent_name')" class="form-control-feedback form-text" v-cloak>{{ errors.first('parent_name') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('has_agency'), 'has-success': fields.has_agency && fields.has_agency.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="has_agency" type="checkbox" v-model="form.has_agency" v-validate="''" data-vv-name="has_agency"  name="has_agency_fake_element">
        <label class="form-check-label" for="has_agency">
            <?php echo e(trans('admin.registration.columns.has_agency')); ?>

        </label>
        <input type="hidden" name="has_agency" :value="form.has_agency">
        <div v-if="errors.has('has_agency')" class="form-control-feedback form-text" v-cloak>{{ errors.first('has_agency') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('agency_name'), 'has-success': fields.agency_name && fields.agency_name.valid }">
    <label for="agency_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.registration.columns.agency_name')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.agency_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('agency_name'), 'form-control-success': fields.agency_name && fields.agency_name.valid}" id="agency_name" name="agency_name" placeholder="<?php echo e(trans('admin.registration.columns.agency_name')); ?>">
        <div v-if="errors.has('agency_name')" class="form-control-feedback form-text" v-cloak>{{ errors.first('agency_name') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('want_agency'), 'has-success': fields.want_agency && fields.want_agency.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="want_agency" type="checkbox" v-model="form.want_agency" v-validate="''" data-vv-name="want_agency"  name="want_agency_fake_element">
        <label class="form-check-label" for="want_agency">
            <?php echo e(trans('admin.registration.columns.want_agency')); ?>

        </label>
        <input type="hidden" name="want_agency" :value="form.want_agency">
        <div v-if="errors.has('want_agency')" class="form-control-feedback form-text" v-cloak>{{ errors.first('want_agency') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            <?php echo e(trans('admin.registration.columns.enabled')); ?>

        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>{{ errors.first('enabled') }}</div>
    </div>
</div>


<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <?php if($mode === 'edit'): ?>
            <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
                'mediaCollection' => $registration->getMediaCollection('cover'),
                'media' => $registration->getThumbs200ForCollection('cover'),
                'label' => 'Thumbnail'
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
                'mediaCollection' => app(App\Models\Registration::class)->getMediaCollection('cover'),
                'label' => 'Thumbnail'
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
</div>
    

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    <?php if($mode === 'create'): ?>
        <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Registration::class)->getMediaCollection('gallery'),
            'label' => 'Gallery'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $registration->getMediaCollection('gallery'),
            'media' => $registration->getThumbs200ForCollection('gallery'),
            'label' => 'Gallery'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('password'), 'has-success': fields.password && fields.password.valid }">
    <label for="password" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.registration.columns.password')); ?></label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="password" v-model="form.password" v-validate="'min:7'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('password'), 'form-control-success': fields.password && fields.password.valid}" id="password" name="password" placeholder="<?php echo e(trans('admin.registration.columns.password')); ?>" ref="password">
        <div v-if="errors.has('password')" class="form-control-feedback form-text" v-cloak>{{ errors.first('password') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('password_confirmation'), 'has-success': fields.password_confirmation && fields.password_confirmation.valid }">
    <label for="password_confirmation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.registration.columns.password_repeat')); ?></label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="password" v-model="form.password_confirmation" v-validate="'confirmed:password|min:7'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('password_confirmation'), 'form-control-success': fields.password_confirmation && fields.password_confirmation.valid}" id="password_confirmation" name="password_confirmation" placeholder="<?php echo e(trans('admin.registration.columns.password')); ?>" data-vv-as="password">
        <div v-if="errors.has('password_confirmation')" class="form-control-feedback form-text" v-cloak>{{ errors.first('password_confirmation') }}</div>
    </div>
</div> -->


<?php /**PATH C:\xampp2\htdocs\take1\resources\views/admin/registration/components/form-elements.blade.php ENDPATH**/ ?>