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
            <div class="form-group row" :class="{'has-danger': errors.has('head_tag1_<?php echo e($locale); ?>'), 'has-success': this.fields.head_tag1_<?php echo e($locale); ?> && this.fields.head_tag1_<?php echo e($locale); ?>.valid }">
                <label for="head_tag1_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.homepage.columns.head_tag1')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.head_tag1.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('head_tag1_<?php echo e($locale); ?>'), 'form-control-success': this.fields.head_tag1_<?php echo e($locale); ?> && this.fields.head_tag1_<?php echo e($locale); ?>.valid }" id="head_tag1_<?php echo e($locale); ?>" head_tag1="head_tag1_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.head_tag1')); ?>">
                    <div v-if="errors.has('head_tag1_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('head_tag1_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <div class="form-group row" :class="{'has-danger': errors.has('info1_<?php echo e($locale); ?>'), 'has-success': this.fields.info1_<?php echo e($locale); ?> && this.fields.info1_<?php echo e($locale); ?>.valid }">
                <label for="info1_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.homepage.columns.info1')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <textarea  v-model="form.info1.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('info1_<?php echo e($locale); ?>'), 'form-control-success': this.fields.info1_<?php echo e($locale); ?> && this.fields.info1_<?php echo e($locale); ?>.valid }" id="info1_<?php echo e($locale); ?>" info1="info1_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.info1')); ?>"></textarea>
                    <div v-if="errors.has('info1_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('info1_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!--<div class="form-group row align-items-center" :class="{'has-danger': errors.has('block_name'), 'has-success': fields.block_name && fields.block_name.valid }">
    <label for="block_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.block-info.columns.block_name')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.block_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('block_name'), 'form-control-success': fields.block_name && fields.block_name.valid}" id="block_name" name="block_name" placeholder="<?php echo e(trans('admin.block-info.columns.block_name')); ?>">
        <div v-if="errors.has('block_name')" class="form-control-feedback form-text" v-cloak>{{ errors.first('block_name') }}</div>
    </div>
</div>

 <div class="form-group row align-items-center" :class="{'has-danger': errors.has('block_type'), 'has-success': fields.block_type && fields.block_type.valid }">
    <label for="block_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.block-info.columns.block_type')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.block_type" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('block_type'), 'form-control-success': fields.block_type && fields.block_type.valid}" id="block_type" name="block_type" placeholder="<?php echo e(trans('admin.block-info.columns.block_type')); ?>">
        <div v-if="errors.has('block_type')" class="form-control-feedback form-text" v-cloak>{{ errors.first('block_type') }}</div>
    </div>
</div> -->

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    <?php if($mode === 'edit'): ?>
        <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $blockInfo->getMediaCollection('banner'),
            'media' => $blockInfo->getThumbs200ForCollection('banner'),
            'label' => 'Banner'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\BlockInfo::class)->getMediaCollection('banner'),
            'label' => 'Banner'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    <?php if($mode === 'edit'): ?>
        <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $blockInfo->getMediaCollection('banner_mb'),
            'media' => $blockInfo->getThumbs200ForCollection('banner_mb'),
            'label' => 'Mobile Banner'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\BlockInfo::class)->getMediaCollection('banner_mb'),
            'label' => 'Mobile Banner'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>


<?php /**PATH C:\xampp2\htdocs\legacy\resources\views/admin/block-info/components/form-elements.blade.php ENDPATH**/ ?>