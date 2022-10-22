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
            <div class="form-group row" :class="{'has-danger': errors.has('head_title1_<?php echo e($locale); ?>'), 'has-success': this.fields.head_title1_<?php echo e($locale); ?> && this.fields.head_title1_<?php echo e($locale); ?>.valid }">
                <label for="head_title1_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.homepage.columns.head_title1')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <textarea v-model="form.head_title1.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('head_title1_<?php echo e($locale); ?>'), 'form-control-success': this.fields.head_title1_<?php echo e($locale); ?> && this.fields.head_title1_<?php echo e($locale); ?>.valid }" id="head_title1_<?php echo e($locale); ?>" head_title1="head_title1_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.head_title1')); ?>"></textarea>
                    <div v-if="errors.has('head_title1_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('head_title1_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col"<?php if(!$loop->first): ?> v-show="isFormLocalized && currentLocale == '<?php echo e($locale); ?>'" v-cloak <?php endif; ?>>
            <div class="form-group row" :class="{'has-danger': errors.has('head_desc1_<?php echo e($locale); ?>'), 'has-success': this.fields.head_desc1_<?php echo e($locale); ?> && this.fields.head_desc1_<?php echo e($locale); ?>.valid }">
                <label for="head_desc1_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.homepage.columns.head_desc1')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.head_desc1.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('head_desc1_<?php echo e($locale); ?>'), 'form-control-success': this.fields.head_desc1_<?php echo e($locale); ?> && this.fields.head_desc1_<?php echo e($locale); ?>.valid }" id="head_desc1_<?php echo e($locale); ?>" head_desc1="head_desc1_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.head_desc1')); ?>">
                    <div v-if="errors.has('head_desc1_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('head_desc1_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col"<?php if(!$loop->first): ?> v-show="isFormLocalized && currentLocale == '<?php echo e($locale); ?>'" v-cloak <?php endif; ?>>
            <div class="form-group row" :class="{'has-danger': errors.has('seo_title_<?php echo e($locale); ?>'), 'has-success': this.fields.seo_title_<?php echo e($locale); ?> && this.fields.seo_title_<?php echo e($locale); ?>.valid }">
                <label for="seo_title_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.homepage.columns.seo_title')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.seo_title.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('seo_title_<?php echo e($locale); ?>'), 'form-control-success': this.fields.seo_title_<?php echo e($locale); ?> && this.fields.seo_title_<?php echo e($locale); ?>.valid }" id="seo_title_<?php echo e($locale); ?>" seo_title="seo_title_<?php echo e($locale); ?>" placeholder="">
                    <div v-if="errors.has('seo_title_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('seo_title_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col"<?php if(!$loop->first): ?> v-show="isFormLocalized && currentLocale == '<?php echo e($locale); ?>'" v-cloak <?php endif; ?>>
            <div class="form-group row" :class="{'has-danger': errors.has('seo_description_<?php echo e($locale); ?>'), 'has-success': this.fields.seo_description_<?php echo e($locale); ?> && this.fields.seo_description_<?php echo e($locale); ?>.valid }">
                <label for="seo_description_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.homepage.columns.seo_description')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.seo_description.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('seo_description_<?php echo e($locale); ?>'), 'form-control-success': this.fields.seo_description_<?php echo e($locale); ?> && this.fields.seo_description_<?php echo e($locale); ?>.valid }" id="seo_description_<?php echo e($locale); ?>" seo_description="seo_description_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.seo_description')); ?>">
                    <div v-if="errors.has('seo_description_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('seo_description_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div> 


<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    <?php if($mode === 'edit'): ?>
        <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $homepage->getMediaCollection('banner'),
            'media' => $homepage->getThumbs200ForCollection('banner'),
            'label' => 'Banner'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Homepage::class)->getMediaCollection('banner'),
            'label' => 'Banner'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    <?php if($mode === 'edit'): ?>
        <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $homepage->getMediaCollection('banner_mb'),
            'media' => $homepage->getThumbs200ForCollection('banner_mb'),
            'label' => 'Mobile Banner'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Homepage::class)->getMediaCollection('banner_mb'),
            'label' => 'Mobile Banner'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>



<?php /**PATH C:\xampp2\htdocs\legacy\resources\views/admin/homepage/components/news.blade.php ENDPATH**/ ?>