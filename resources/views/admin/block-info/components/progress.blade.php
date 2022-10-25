<div class="row form-inline" style="padding-bottom: 10px;" v-cloak>

    <div :class="{'col-xl-10 col-md-11 text-right': !isFormLocalized, 'col text-center': isFormLocalized }">
        <small>{{ trans('brackets/admin-ui::admin.forms.currently_editing_translation') }}<span v-if="!isFormLocalized && otherLocales.length > 1"> {{ trans('brackets/admin-ui::admin.forms.more_can_be_managed') }}</span> <span v-if="!isFormLocalized"> | <a href="#" @click.prevent="showLocalization">{{ trans('brackets/admin-ui::admin.forms.manage_translations') }}</a></span></small>
        <i class="localization-error" v-if="!isFormLocalized && showLocalizedValidationError"></i>
    </div>
    <div class="col text-center" v-if="isFormLocalized" v-cloak>
        <small>{{ trans('brackets/admin-ui::admin.forms.choose_translation_to_edit') }}
            <select class="form-control" v-model="currentLocale">
                <option v-for="locale in otherLocales" :value="locale">@{{ locale.toUpperCase() }}</option>
            </select>
            <i class="localization-error" v-if="isFormLocalized && showLocalizedValidationError"></i>
            |
            <a href="#" @click.prevent="hideLocalization">{{ trans('brackets/admin-ui::admin.forms.hide') }}</a>
        </small>
    </div>
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col"@if(!$loop->first) v-show="isFormLocalized && currentLocale == '{{ $locale }}'" v-cloak @endif>
            <div class="form-group row" :class="{'has-danger': errors.has('head_title1_{{ $locale }}'), 'has-success': this.fields.head_title1_{{ $locale }} && this.fields.head_title1_{{ $locale }}.valid }">
                <label for="head_title1_{{ $locale }}" class="col-md-2 col-form-label text-md-right">Title</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <textarea v-model="form.head_title1.{{ $locale }}" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('head_title1_{{ $locale }}'), 'form-control-success': this.fields.head_title1_{{ $locale }} && this.fields.head_title1_{{ $locale }}.valid }" id="head_title1_{{ $locale }}" head_title1="head_title1_{{ $locale }}" placeholder="" ></textarea>
                    <div v-if="errors.has('head_title1_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('head_title1_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('block_date'), 'has-success': fields.block_date && fields.block_date.valid }">
<label for="block_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">News Date</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.block_date" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('block_date'), 'form-control-success': fields.block_date && fields.block_date.valid}" id="block_date" name="block_date" placeholder="Select date and time"></datetime>
        </div>
        <div v-if="errors.has('block_date')" class="form-control-feedback form-text" v-cloak>@{{errors.first('block_date') }}</div>
    </div>
</div>


<!-- <div class="row">
    @foreach($locales as $locale)
        <div class="col"@if(!$loop->first) v-show="isFormLocalized && currentLocale == '{{ $locale }}'" v-cloak @endif>
            <div class="form-group row" :class="{'has-danger': errors.has('info1_{{ $locale }}'), 'has-success': this.fields.info1_{{ $locale }} && this.fields.info1_{{ $locale }}.valid }">
                <label for="info1_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.homepage.columns.info1') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <textarea  v-model="form.info1.{{ $locale }}" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('info1_{{ $locale }}'), 'form-control-success': this.fields.info1_{{ $locale }} && this.fields.info1_{{ $locale }}.valid }" id="info1_{{ $locale }}" info1="info1_{{ $locale }}" placeholder="{{ trans('admin.homepage.columns.info1') }}"></textarea>
                    <div v-if="errors.has('info1_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('info1_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div> -->





<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('block_type'), 'has-success': fields.block_type && fields.block_type.valid }">
    <label for="block_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.block-info.columns.block_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.block_type" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('block_type'), 'form-control-success': fields.block_type && fields.block_type.valid}" id="block_type" name="block_type" placeholder="{{ trans('admin.block-info.columns.block_type') }}">
        <div v-if="errors.has('block_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('block_type') }}</div>
    </div>
</div> -->

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    @if($mode === 'edit')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $blockInfo->getMediaCollection('gallery'),
            'media' => $blockInfo->getThumbs200ForCollection('gallery'),
            'label' => 'Images'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\BlockInfo::class)->getMediaCollection('gallery'),
            'label' => 'Images'
        ])
    @endif
</div>


