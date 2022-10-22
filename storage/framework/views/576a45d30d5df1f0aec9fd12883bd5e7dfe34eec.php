<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.block.columns.name')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="<?php echo e(trans('admin.block.columns.name')); ?>">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.block.columns.title')); ?></label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.title" v-validate="''" id="title" name="title"></textarea>
        </div>
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('content'), 'has-success': fields.content && fields.content.valid }">
    <label for="content" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.block.columns.content')); ?></label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.content" v-validate="''" id="content" name="content"></textarea>
        </div>
        <div v-if="errors.has('content')" class="form-control-feedback form-text" v-cloak>{{ errors.first('content') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('url'), 'has-success': fields.url && fields.url.valid }">
    <label for="url" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.block.columns.url')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.url" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('url'), 'form-control-success': fields.url && fields.url.valid}" id="url" name="url" placeholder="<?php echo e(trans('admin.block.columns.url')); ?>">
        <div v-if="errors.has('url')" class="form-control-feedback form-text" v-cloak>{{ errors.first('url') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('page'), 'has-success': fields.page && fields.page.valid }">
    <label for="page" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.block.columns.page')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.page" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('page'), 'form-control-success': fields.page && fields.page.valid}" id="page" name="page" placeholder="<?php echo e(trans('admin.block.columns.page')); ?>">
        <div v-if="errors.has('page')" class="form-control-feedback form-text" v-cloak>{{ errors.first('page') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('section'), 'has-success': fields.section && fields.section.valid }">
    <label for="section" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'"><?php echo e(trans('admin.block.columns.section')); ?></label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.section" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('section'), 'form-control-success': fields.section && fields.section.valid}" id="section" name="section" placeholder="<?php echo e(trans('admin.block.columns.section')); ?>">
        <div v-if="errors.has('section')" class="form-control-feedback form-text" v-cloak>{{ errors.first('section') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            <?php echo e(trans('admin.block.columns.enabled')); ?>

        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>{{ errors.first('enabled') }}</div>
    </div>
</div>


<?php /**PATH C:\xampp2\htdocs\take1\resources\views/admin/block/components/form-elements.blade.php ENDPATH**/ ?>