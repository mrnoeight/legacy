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
            <div class="form-group row" :class="{'has-danger': errors.has('mid_tag1_<?php echo e($locale); ?>'), 'has-success': this.fields.mid_tag1_<?php echo e($locale); ?> && this.fields.mid_tag1_<?php echo e($locale); ?>.valid }">
                <label for="mid_tag1_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.homepage.columns.mid_tag1')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.mid_tag1.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('mid_tag1_<?php echo e($locale); ?>'), 'form-control-success': this.fields.mid_tag1_<?php echo e($locale); ?> && this.fields.mid_tag1_<?php echo e($locale); ?>.valid }" id="mid_tag1_<?php echo e($locale); ?>" mid_tag1="mid_tag1_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.mid_tag1')); ?>">
                    <div v-if="errors.has('mid_tag1_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('mid_tag1_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col"<?php if(!$loop->first): ?> v-show="isFormLocalized && currentLocale == '<?php echo e($locale); ?>'" v-cloak <?php endif; ?>>
            <div class="form-group row" :class="{'has-danger': errors.has('mid_title1_<?php echo e($locale); ?>'), 'has-success': this.fields.mid_title1_<?php echo e($locale); ?> && this.fields.mid_title1_<?php echo e($locale); ?>.valid }">
                <label for="mid_title1_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.homepage.columns.mid_title1')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.mid_title1.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('mid_title1_<?php echo e($locale); ?>'), 'form-control-success': this.fields.mid_title1_<?php echo e($locale); ?> && this.fields.mid_title1_<?php echo e($locale); ?>.valid }" id="mid_title1_<?php echo e($locale); ?>" mid_title1="mid_title1_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.mid_title1')); ?>">
                    <div v-if="errors.has('mid_title1_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('mid_title1_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col"<?php if(!$loop->first): ?> v-show="isFormLocalized && currentLocale == '<?php echo e($locale); ?>'" v-cloak <?php endif; ?>>
            <div class="form-group row" :class="{'has-danger': errors.has('mid_desc1_<?php echo e($locale); ?>'), 'has-success': this.fields.mid_desc1_<?php echo e($locale); ?> && this.fields.mid_desc1_<?php echo e($locale); ?>.valid }">
                <label for="mid_desc1_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.homepage.columns.mid_desc1')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.mid_desc1.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('mid_desc1_<?php echo e($locale); ?>'), 'form-control-success': this.fields.mid_desc1_<?php echo e($locale); ?> && this.fields.mid_desc1_<?php echo e($locale); ?>.valid }" id="mid_desc1_<?php echo e($locale); ?>" mid_desc1="mid_desc1_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.mid_desc1')); ?>">
                    <div v-if="errors.has('mid_desc1_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('mid_desc1_<?php echo e($locale); ?>') }}</div>
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
                    <input type="text" v-model="form.info1.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('info1_<?php echo e($locale); ?>'), 'form-control-success': this.fields.info1_<?php echo e($locale); ?> && this.fields.info1_<?php echo e($locale); ?>.valid }" id="info1_<?php echo e($locale); ?>" info1="info1_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.info1')); ?>">
                    <div v-if="errors.has('info1_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('info1_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>



<div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col"<?php if(!$loop->first): ?> v-show="isFormLocalized && currentLocale == '<?php echo e($locale); ?>'" v-cloak <?php endif; ?>>
            <div class="form-group row" :class="{'has-danger': errors.has('info2_<?php echo e($locale); ?>'), 'has-success': this.fields.info2_<?php echo e($locale); ?> && this.fields.info2_<?php echo e($locale); ?>.valid }">
                <label for="info2_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.homepage.columns.info2')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.info2.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('info2_<?php echo e($locale); ?>'), 'form-control-success': this.fields.info2_<?php echo e($locale); ?> && this.fields.info2_<?php echo e($locale); ?>.valid }" id="info2_<?php echo e($locale); ?>" info2="info2_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.info2')); ?>">
                    <div v-if="errors.has('info2_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('info2_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col"<?php if(!$loop->first): ?> v-show="isFormLocalized && currentLocale == '<?php echo e($locale); ?>'" v-cloak <?php endif; ?>>
            <div class="form-group row" :class="{'has-danger': errors.has('info3_<?php echo e($locale); ?>'), 'has-success': this.fields.info3_<?php echo e($locale); ?> && this.fields.info3_<?php echo e($locale); ?>.valid }">
                <label for="info3_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.homepage.columns.info3')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.info3.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('info3_<?php echo e($locale); ?>'), 'form-control-success': this.fields.info3_<?php echo e($locale); ?> && this.fields.info3_<?php echo e($locale); ?>.valid }" id="info3_<?php echo e($locale); ?>" info3="info3_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.info3')); ?>">
                    <div v-if="errors.has('info3_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('info3_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col"<?php if(!$loop->first): ?> v-show="isFormLocalized && currentLocale == '<?php echo e($locale); ?>'" v-cloak <?php endif; ?>>
            <div class="form-group row" :class="{'has-danger': errors.has('info4_<?php echo e($locale); ?>'), 'has-success': this.fields.info4_<?php echo e($locale); ?> && this.fields.info4_<?php echo e($locale); ?>.valid }">
                <label for="info4_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.homepage.columns.info4')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.info4.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('info4_<?php echo e($locale); ?>'), 'form-control-success': this.fields.info4_<?php echo e($locale); ?> && this.fields.info4_<?php echo e($locale); ?>.valid }" id="info4_<?php echo e($locale); ?>" info4="info4_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.info4')); ?>">
                    <div v-if="errors.has('info4_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('info4_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col"<?php if(!$loop->first): ?> v-show="isFormLocalized && currentLocale == '<?php echo e($locale); ?>'" v-cloak <?php endif; ?>>
            <div class="form-group row" :class="{'has-danger': errors.has('info5_<?php echo e($locale); ?>'), 'has-success': this.fields.info5_<?php echo e($locale); ?> && this.fields.info5_<?php echo e($locale); ?>.valid }">
                <label for="info5_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.homepage.columns.info5')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.info5.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('info5_<?php echo e($locale); ?>'), 'form-control-success': this.fields.info5_<?php echo e($locale); ?> && this.fields.info5_<?php echo e($locale); ?>.valid }" id="info5_<?php echo e($locale); ?>" info5="info5_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.info5')); ?>">
                    <div v-if="errors.has('info5_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('info5_<?php echo e($locale); ?>') }}</div>
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
                    <input type="text" v-model="form.seo_title.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('seo_title_<?php echo e($locale); ?>'), 'form-control-success': this.fields.seo_title_<?php echo e($locale); ?> && this.fields.seo_title_<?php echo e($locale); ?>.valid }" id="seo_title_<?php echo e($locale); ?>" seo_title="seo_title_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.seo_title')); ?>">
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

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('page_name'), 'has-success': fields.page_name && fields.page_name.valid }">
    <label for="page_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.homepage.columns.page_name')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.page_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('page_name'), 'form-control-success': fields.page_name && fields.page_name.valid}" id="page_name" name="page_name" placeholder="<?php echo e(trans('admin.homepage.columns.page_name')); ?>">
        <div v-if="errors.has('page_name')" class="form-control-feedback form-text" v-cloak>{{ errors.first('page_name') }}</div>
    </div>
</div>

<!-- <div class="row">
    <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col"<?php if(!$loop->first): ?> v-show="isFormLocalized && currentLocale == '<?php echo e($locale); ?>'" v-cloak <?php endif; ?>>
            <div class="form-group row" :class="{'has-danger': errors.has('seo_author_<?php echo e($locale); ?>'), 'has-success': this.fields.seo_author_<?php echo e($locale); ?> && this.fields.seo_author_<?php echo e($locale); ?>.valid }">
                <label for="seo_author_<?php echo e($locale); ?>" class="col-md-2 col-form-label text-md-right"><?php echo e(trans('admin.homepage.columns.seo_author')); ?></label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.seo_author.<?php echo e($locale); ?>" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('seo_author_<?php echo e($locale); ?>'), 'form-control-success': this.fields.seo_author_<?php echo e($locale); ?> && this.fields.seo_author_<?php echo e($locale); ?>.valid }" id="seo_author_<?php echo e($locale); ?>" seo_author="seo_author_<?php echo e($locale); ?>" placeholder="<?php echo e(trans('admin.homepage.columns.seo_author')); ?>">
                    <div v-if="errors.has('seo_author_<?php echo e($locale); ?>')" class="form-control-feedback form-text" v-cloak><?php echo e('{{'); ?> errors.first('seo_author_<?php echo e($locale); ?>') }}</div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div> -->

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

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    <?php if($mode === 'edit'): ?>
        <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $homepage->getMediaCollection('middle_banner'),
            'media' => $homepage->getThumbs200ForCollection('middle_banner'),
            'label' => 'Middle Banner'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Homepage::class)->getMediaCollection('middle_banner'),
            'label' => 'Middle Banner'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    <?php if($mode === 'edit'): ?>
        <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $homepage->getMediaCollection('middle_banner_mb'),
            'media' => $homepage->getThumbs200ForCollection('middle_banner_mb'),
            'label' => 'Mobile Middle Banner'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Homepage::class)->getMediaCollection('middle_banner_mb'),
            'label' => 'Mobile Middle Banner'
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>


<?php /**PATH C:\xampp2\htdocs\legacy\resources\views/admin/homepage/components/form-elements.blade.php ENDPATH**/ ?>