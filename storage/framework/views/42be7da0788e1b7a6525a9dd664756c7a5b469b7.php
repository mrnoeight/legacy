<div class="row form-inline" style="padding-bottom: 10px;" v-cloak>

    <div :class="{'col-xl-10 col-md-11 text-right': !isFormLocalized, 'col text-center': isFormLocalized }">
        <small><?php echo e(trans('brackets/admin-ui::admin.forms.currently_editing_translation')); ?><span v-if="!isFormLocalized && otherLocales.length > 1"> <?php echo e(trans('brackets/admin-ui::admin.forms.more_can_be_managed')); ?></span> <span v-if="!isFormLocalized"> | <a href="#" @click.prevent="showLocalization"><?php echo e(trans('brackets/admin-ui::admin.forms.manage_translations')); ?></a></span></small>
        <i class="localization-error" v-if="!isFormLocalized && showLocalizedValidationError"></i>
    </div>
    <div class="col text-center" v-if="isFormLocalized" v-cloak>
        <small><?php echo e(trans('brackets/admin-ui::admin.forms.choose_translation_to_edit')); ?>

            <select class="form-control" v-model="currentLocale">
                <option v-for="locale in otherLocales" :value="locale">{{ locale.toUpperCase() }}</option>
            </select>
            <i class="localization-error" v-if="isFormLocalized && showLocalizedValidationError"></i>
            |
            <a href="#" @click.prevent="hideLocalization"><?php echo e(trans('brackets/admin-ui::admin.forms.hide')); ?></a>
        </small>
    </div>
</div>

<div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col"<?php if(!$loop->first): ?> v-show="isFormLocalized && currentLocale == '<?php echo e($locale); ?>'" v-cloak <?php endif; ?>>
            <div class="form-group row" :class="{'has-danger': errors.has('name_<?php echo e($locale); ?>'), 'has-success': this.fields.name_<?php echo e($locale); ?> && this.fields.name_<?php echo e($locale); ?>.valid }">
                <label for="name_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.post.columns.name')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.name.<?php echo e($locale); ?>" v-validate="'required'" class="form-control" :class="{'form-control-danger': errors.has('name_<?php echo e($locale); ?>'), 'form-control-success': this.fields.name_<?php echo e($locale); ?> && this.fields.name_<?php echo e($locale); ?>.valid }" id="name_<?php echo e($locale); ?>" name="name_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.movie.columns.name')); ?>">
                    <div v-if="errors.has('name_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('name_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.name')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="<?php echo e(trans('admin.post.columns.name')); ?>">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>{{ errors.first('name') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('slug'), 'has-success': fields.slug && fields.slug.valid }">
    <label for="slug" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.slug')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.slug" v-validate="" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('slug'), 'form-control-success': fields.slug && fields.slug.valid}" id="slug" name="slug" placeholder="<?php echo e(trans('admin.post.columns.slug')); ?>">
        <div v-if="errors.has('slug')" class="form-control-feedback form-text" v-cloak>{{ errors.first('slug') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('type'), 'has-success': fields.type && fields.type.valid }">
    <label for="type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.type')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.type" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('type'), 'form-control-success': fields.type && fields.type.valid}" id="type" name="type" placeholder="<?php echo e(trans('admin.post.columns.type')); ?>">
        <div v-if="errors.has('type')" class="form-control-feedback form-text" v-cloak>{{ errors.first('type') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('city'), 'has-success': fields.city && fields.city.valid }">
    <label for="city" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.city')); ?></label>
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

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('other_location'), 'has-success': fields.other_location && fields.other_location.valid }">
    <label for="other_location" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.other_location')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.other_location" v-validate="" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('other_location'), 'form-control-success': fields.other_location && fields.other_location.valid}" id="other_location" name="other_location" placeholder="<?php echo e(trans('admin.post.columns.other_location')); ?>">
        <div v-if="errors.has('other_location')" class="form-control-feedback form-text" v-cloak>{{ errors.first('other_location') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('gender'), 'has-success': fields.gender && fields.gender.valid }">
    <label for="gender" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.gender')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <multiselect
            v-model="form.genders"
            :options="gender"
            :multiple="false"
            track-by="id"
            label="name"
            tag-placeholder="<?php echo e(__('Select Gender')); ?>"
            placeholder="<?php echo e(__('Gender')); ?>">
        </multiselect>
        <div v-if="errors.has('gender')" class="form-control-feedback form-text" v-cloak>{{ errors.first('gender') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('project_budget'), 'has-success': fields.project_budget && fields.project_budget.valid }">
    <label for="project_budget" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.project_budget')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.project_budgets"
            :options="project_budget"
            :multiple="false"
            track-by="id"
            label="name"
            tag-placeholder="<?php echo e(__('Select Budget')); ?>"
            placeholder="<?php echo e(__('Budget')); ?>">
        </multiselect>
        <div v-if="errors.has('project_budget')" class="form-control-feedback form-text" v-cloak>{{ errors.first('project_budget') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('age'), 'has-success': fields.age && fields.age.valid }">
    <label for="age" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.age')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.age" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('age'), 'form-control-success': fields.age && fields.age.valid}" id="age" name="age" placeholder="<?php echo e(trans('admin.post.columns.age')); ?>">
        <div v-if="errors.has('age')" class="form-control-feedback form-text" v-cloak>{{ errors.first('age') }}</div>
    </div>
</div> -->

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('company_id'), 'has-success': fields.company_id && fields.company_id.valid }">
    <label for="company_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.company_id')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.company_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('company_id'), 'form-control-success': fields.company_id && fields.company_id.valid}" id="company_id" name="company_id" placeholder="<?php echo e(trans('admin.post.columns.company_id')); ?>">
        <div v-if="errors.has('company_id')" class="form-control-feedback form-text" v-cloak>{{ errors.first('company_id') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('company_id'), 'has-success': this.fields.company_id && this.fields.company_id.valid }">
    <label for="company_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.company_id')); ?></label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect
            v-model="form.company"
            :options="company"
            :multiple="false"
            track-by="id"
            label="name"
            tag-placeholder="<?php echo e(__('Select Company')); ?>"
            placeholder="<?php echo e(__('Company')); ?>">
        </multiselect>

        <div v-if="errors.has('company_id')" class="form-control-feedback form-text" v-cloak>{{
            errors.first('company_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('expired_date'), 'has-success': fields.expired_date && fields.expired_date.valid }">
    <label for="expired_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.expired_date')); ?></label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.expired_date" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('expired_date'), 'form-control-success': fields.expired_date && fields.expired_date.valid}" id="expired_date" name="expired_date" placeholder="<?php echo e(trans('brackets/admin-ui::admin.forms.select_a_date')); ?>"></datetime>
        </div>
        <div v-if="errors.has('expired_date')" class="form-control-feedback form-text" v-cloak>{{ errors.first('expired_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_casting_date'), 'has-success': fields.start_casting_date && fields.start_casting_date.valid }">
    <label for="start_casting_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.start_casting_date')); ?></label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.start_casting_date" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('start_casting_date'), 'form-control-success': fields.start_casting_date && fields.start_casting_date.valid}" id="start_casting_date" name="start_casting_date" placeholder="<?php echo e(trans('brackets/admin-ui::admin.forms.select_a_date')); ?>"></datetime>
        </div>
        <div v-if="errors.has('start_casting_date')" class="form-control-feedback form-text" v-cloak>{{ errors.first('start_casting_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end_casting_date'), 'has-success': fields.end_casting_date && fields.end_casting_date.valid }">
    <label for="end_casting_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.end_casting_date')); ?></label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.end_casting_date" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('end_casting_date'), 'form-control-success': fields.end_casting_date && fields.end_casting_date.valid}" id="end_casting_date" name="end_casting_date" placeholder="<?php echo e(trans('brackets/admin-ui::admin.forms.select_a_date')); ?>"></datetime>
        </div>
        <div v-if="errors.has('end_casting_date')" class="form-control-feedback form-text" v-cloak>{{ errors.first('end_casting_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_rehearsal_date'), 'has-success': fields.start_rehearsal_date && fields.start_rehearsal_date.valid }">
    <label for="start_rehearsal_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.start_rehearsal_date')); ?></label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.start_rehearsal_date" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('start_rehearsal_date'), 'form-control-success': fields.start_rehearsal_date && fields.start_rehearsal_date.valid}" id="start_rehearsal_date" name="start_rehearsal_date" placeholder="<?php echo e(trans('brackets/admin-ui::admin.forms.select_a_date')); ?>"></datetime>
        </div>
        <div v-if="errors.has('start_rehearsal_date')" class="form-control-feedback form-text" v-cloak>{{ errors.first('start_rehearsal_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end_rehearsal_date'), 'has-success': fields.end_rehearsal_date && fields.end_rehearsal_date.valid }">
    <label for="end_rehearsal_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.end_rehearsal_date')); ?></label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.end_rehearsal_date" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('end_rehearsal_date'), 'form-control-success': fields.end_rehearsal_date && fields.end_rehearsal_date.valid}" id="end_rehearsal_date" name="end_rehearsal_date" placeholder="<?php echo e(trans('brackets/admin-ui::admin.forms.select_a_date')); ?>"></datetime>
        </div>
        <div v-if="errors.has('end_rehearsal_date')" class="form-control-feedback form-text" v-cloak>{{ errors.first('end_rehearsal_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_photo_date'), 'has-success': fields.start_photo_date && fields.start_photo_date.valid }">
    <label for="start_photo_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.start_photo_date')); ?></label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.start_photo_date" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('start_photo_date'), 'form-control-success': fields.start_photo_date && fields.start_photo_date.valid}" id="start_photo_date" name="start_photo_date" placeholder="<?php echo e(trans('brackets/admin-ui::admin.forms.select_a_date')); ?>"></datetime>
        </div>
        <div v-if="errors.has('start_photo_date')" class="form-control-feedback form-text" v-cloak>{{ errors.first('start_photo_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end_photo_date'), 'has-success': fields.end_photo_date && fields.end_photo_date.valid }">
    <label for="end_photo_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.end_photo_date')); ?></label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.end_photo_date" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('end_photo_date'), 'form-control-success': fields.end_photo_date && fields.end_photo_date.valid}" id="end_photo_date" name="end_photo_date" placeholder="<?php echo e(trans('brackets/admin-ui::admin.forms.select_a_date')); ?>"></datetime>
        </div>
        <div v-if="errors.has('end_photo_date')" class="form-control-feedback form-text" v-cloak>{{ errors.first('end_photo_date') }}</div>
    </div>
</div>

<div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col"<?php if(!$loop->first): ?> v-show="isFormLocalized && currentLocale == '<?php echo e($locale); ?>'" v-cloak <?php endif; ?>>
            <div class="form-group row" :class="{'has-danger': errors.has('<?php echo e($locale); ?>_short_desc'), 'has-success': this.fields.<?php echo e($locale); ?>_short_desc && this.fields.<?php echo e($locale); ?>_short_desc.valid }">
                <label for="<?php echo e($locale); ?>_short_desc" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.post.columns.description')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <div class="input-group input-group--custom">
                        <textarea v-model="form.short_desc.<?php echo e($locale); ?>" v-validate="'required'" style="width:100%"  id="<?php echo e($locale); ?>_short_desc" name="<?php echo e($locale); ?>_short_desc"></textarea>
                        
                    </div>
                    <div v-if="errors.has('<?php echo e($locale); ?>_short_desc')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('<?php echo e($locale); ?>_short_desc') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- <div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col"<?php if(!$loop->first): ?> v-show="isFormLocalized && currentLocale == '<?php echo e($locale); ?>'" v-cloak <?php endif; ?>>
            <div class="form-group row" :class="{'has-danger': errors.has('<?php echo e($locale); ?>_description'), 'has-success': this.fields.<?php echo e($locale); ?>_description && this.fields.<?php echo e($locale); ?>_description.valid }">
                <label for="<?php echo e($locale); ?>_short_desc" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.post.columns.description')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <div>
                        <wysiwyg v-model="form.description.<?php echo e($locale); ?>" v-validate="'required'" id="<?php echo e($locale); ?>_description" name="<?php echo e($locale); ?>_description" :config="mediaWysiwygConfig" />
                    </div>
                    <div v-if="errors.has('<?php echo e($locale); ?>_description')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('<?php echo e($locale); ?>_description') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div> -->

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('short_desc'), 'has-success': fields.short_desc && fields.short_desc.valid }">
    <label for="short_desc" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.short_desc')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.short_desc" v-validate="''" id="short_desc" name="short_desc" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('short_desc')" class="form-control-feedback form-text" v-cloak>{{ errors.first('short_desc') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.post.columns.description')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>{{ errors.first('description') }}</div>
    </div>
</div> -->


<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            <?php echo e(trans('admin.post.columns.enabled')); ?>

        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>{{ errors.first('enabled') }}</div>
    </div>
</div>


<?php /**PATH C:\xampp2\htdocs\take1\resources\views/admin/post/components/form-elements.blade.php ENDPATH**/ ?>