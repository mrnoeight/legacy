<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.prole.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.prole.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('slug'), 'has-success': fields.slug && fields.slug.valid }">
    <label for="slug" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.prole.columns.slug') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.slug" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('slug'), 'form-control-success': fields.slug && fields.slug.valid}" id="slug" name="slug" placeholder="{{ trans('admin.prole.columns.slug') }}">
        <div v-if="errors.has('slug')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('slug') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('post_id'), 'has-success': fields.post_id && fields.post_id.valid }">
    <label for="post_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.prole.columns.post_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.post_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('post_id'), 'form-control-success': fields.post_id && fields.post_id.valid}" id="post_id" name="post_id" placeholder="{{ trans('admin.prole.columns.post_id') }}">
        <div v-if="errors.has('post_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('post_id') }}</div>
    </div>
</div> -->

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('company_id'), 'has-success': fields.company_id && fields.company_id.valid }">
    <label for="company_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.prole.columns.company_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.company_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('company_id'), 'form-control-success': fields.company_id && fields.company_id.valid}" id="company_id" name="company_id" placeholder="{{ trans('admin.prole.columns.company_id') }}">
        <div v-if="errors.has('company_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('company_id') }}</div>
    </div>
</div> -->

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('role_type'), 'has-success': fields.role_type && fields.role_type.valid }">
    <label for="role_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.prole.columns.role_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.role_type" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('role_type'), 'form-control-success': fields.role_type && fields.role_type.valid}" id="role_type" name="role_type" placeholder="{{ trans('admin.prole.columns.role_type') }}">
        <div v-if="errors.has('role_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('role_type') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('gender'), 'has-success': fields.gender && fields.gender.valid }">
    <label for="gender" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.post.columns.gender') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <multiselect
            v-model="form.genders"
            :options="gender"
            :multiple="false"
            track-by="id"
            label="name"
            tag-placeholder="{{ __('Select Gender') }}"
            placeholder="{{ __('Gender') }}">
        </multiselect>
        <div v-if="errors.has('gender')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('gender') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('role_type'), 'has-success': fields.role_type && fields.role_type.valid }">
    <label for="role_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.prole.columns.role_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        
        <multiselect
            v-model="form.role_types"
            :options="role_type"
            :multiple="false"
            track-by="id"
            label="name"
            tag-placeholder="{{ __('Select Role Type') }}"
            placeholder="{{ __('Role Type') }}">
        </multiselect>
        <div v-if="errors.has('role_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('role_type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('company_id'), 'has-success': this.fields.company_id && this.fields.company_id.valid }">
    <label for="company_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.prole.columns.company_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

        <multiselect
            v-model="form.company"
            :options="company"
            :multiple="false"
            track-by="id"
            label="name"
            tag-placeholder="{{ __('Select Company') }}"
            placeholder="{{ __('Company') }}">
        </multiselect>

        <div v-if="errors.has('company_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('company_id') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('role_requirement'), 'has-success': fields.role_requirement && fields.role_requirement.valid }">
    <label for="role_requirement" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.prole.columns.role_requirement') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.role_requirement" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('role_requirement'), 'form-control-success': fields.role_requirement && fields.role_requirement.valid}" id="role_requirement" name="role_requirement" placeholder="{{ trans('admin.prole.columns.role_requirement') }}">
        <div v-if="errors.has('role_requirement')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('role_requirement') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('age'), 'has-success': fields.age && fields.age.valid }">
    <label for="age" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.prole.columns.age') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.age" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('age'), 'form-control-success': fields.age && fields.age.valid}" id="age" name="age" placeholder="{{ trans('admin.prole.columns.age') }}">
        <div v-if="errors.has('age')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('age') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('age_range'), 'has-success': fields.age_range && fields.age_range.valid }">
    <label for="age_range" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.prole.columns.age_range') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.age_range" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('age_range'), 'form-control-success': fields.age_range && fields.age_range.valid}" id="age_range" name="age_range" placeholder="{{ trans('admin.prole.columns.age_range') }}">
        <div v-if="errors.has('age_range')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('age_range') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('role_fee_min'), 'has-success': fields.role_fee_min && fields.role_fee_min.valid }">
    <label for="role_fee_min" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.prole.columns.role_fee_min') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.role_fee_min" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('role_fee_min'), 'form-control-success': fields.role_fee_min && fields.role_fee_min.valid}" id="role_fee_min" name="role_fee_min" placeholder="{{ trans('admin.prole.columns.role_fee_min') }}">
        <div v-if="errors.has('role_fee_min')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('role_fee_min') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('role_fee_max'), 'has-success': fields.role_fee_max && fields.role_fee_max.valid }">
    <label for="role_fee_max" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.prole.columns.role_fee_max') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.role_fee_max" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('role_fee_max'), 'form-control-success': fields.role_fee_max && fields.role_fee_max.valid}" id="role_fee_max" name="role_fee_max" placeholder="{{ trans('admin.prole.columns.role_fee_max') }}">
        <div v-if="errors.has('role_fee_max')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('role_fee_max') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.prole.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.description" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('description'), 'form-control-success': fields.description && fields.description.valid}" id="description" name="description" placeholder="{{ trans('admin.prole.columns.description') }}">
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('note'), 'has-success': fields.note && fields.note.valid }">
    <label for="note" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.prole.columns.note') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.note" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('note'), 'form-control-success': fields.note && fields.note.valid}" id="note" name="note" placeholder="{{ trans('admin.prole.columns.note') }}">
        <div v-if="errors.has('note')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('note') }}</div>
    </div>
</div>

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    @if($mode === 'edit')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $prole->getMediaCollection('thumbnail'),
            'media' => $prole->getThumbs200ForCollection('thumbnail'),
            'label' => 'Thumbnail'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Prole::class)->getMediaCollection('thumbnail'),
            'label' => 'Thumbnail'
        ])
    @endif
</div>

