<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tag_name'), 'has-success': fields.tag_name && fields.tag_name.valid }">
    <label for="tag_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tag.columns.tag_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tag_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tag_name'), 'form-control-success': fields.tag_name && fields.tag_name.valid}" id="tag_name" name="tag_name" placeholder="{{ trans('admin.tag.columns.tag_name') }}">
        <div v-if="errors.has('tag_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tag_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tag_type'), 'has-success': fields.tag_type && fields.tag_type.valid }">
    <label for="tag_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tag.columns.tag_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <multiselect
                v-model="form.optionTags"
                :options="optionTags"
                :multiple="false"
                track-by="name"
                label="name"
                tag-placeholder="{{ __('Select Type') }}"
                placeholder="{{ __('Type') }}">
            </multiselect>
        <div v-if="errors.has('tag_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tag_type') }}</div>
    </div>
</div>


