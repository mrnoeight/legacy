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
                <label for="head_title1_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.homepage.columns.head_title1') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <textarea v-model="form.head_title1.{{ $locale }}" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('head_title1_{{ $locale }}'), 'form-control-success': this.fields.head_title1_{{ $locale }} && this.fields.head_title1_{{ $locale }}.valid }" id="head_title1_{{ $locale }}" head_title1="head_title1_{{ $locale }}" placeholder="{{ trans('admin.homepage.columns.head_title1') }}"></textarea>
                    <div v-if="errors.has('head_title1_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('head_title1_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col"@if(!$loop->first) v-show="isFormLocalized && currentLocale == '{{ $locale }}'" v-cloak @endif>
            <div class="form-group row" :class="{'has-danger': errors.has('head_desc1_{{ $locale }}'), 'has-success': this.fields.head_desc1_{{ $locale }} && this.fields.head_desc1_{{ $locale }}.valid }">
                <label for="head_desc1_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.homepage.columns.head_desc1') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.head_desc1.{{ $locale }}" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('head_desc1_{{ $locale }}'), 'form-control-success': this.fields.head_desc1_{{ $locale }} && this.fields.head_desc1_{{ $locale }}.valid }" id="head_desc1_{{ $locale }}" head_desc1="head_desc1_{{ $locale }}" placeholder="{{ trans('admin.homepage.columns.head_desc1') }}">
                    <div v-if="errors.has('head_desc1_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('head_desc1_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>


<div class="row">
    @foreach($locales as $locale)
        <div class="col"@if(!$loop->first) v-show="isFormLocalized && currentLocale == '{{ $locale }}'" v-cloak @endif>
            <div class="form-group row" :class="{'has-danger': errors.has('seo_title_{{ $locale }}'), 'has-success': this.fields.seo_title_{{ $locale }} && this.fields.seo_title_{{ $locale }}.valid }">
                <label for="seo_title_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.homepage.columns.seo_title') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.seo_title.{{ $locale }}" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('seo_title_{{ $locale }}'), 'form-control-success': this.fields.seo_title_{{ $locale }} && this.fields.seo_title_{{ $locale }}.valid }" id="seo_title_{{ $locale }}" seo_title="seo_title_{{ $locale }}" placeholder="">
                    <div v-if="errors.has('seo_title_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('seo_title_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col"@if(!$loop->first) v-show="isFormLocalized && currentLocale == '{{ $locale }}'" v-cloak @endif>
            <div class="form-group row" :class="{'has-danger': errors.has('seo_description_{{ $locale }}'), 'has-success': this.fields.seo_description_{{ $locale }} && this.fields.seo_description_{{ $locale }}.valid }">
                <label for="seo_description_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.homepage.columns.seo_description') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.seo_description.{{ $locale }}" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('seo_description_{{ $locale }}'), 'form-control-success': this.fields.seo_description_{{ $locale }} && this.fields.seo_description_{{ $locale }}.valid }" id="seo_description_{{ $locale }}" seo_description="seo_description_{{ $locale }}" placeholder="{{ trans('admin.homepage.columns.seo_description') }}">
                    <div v-if="errors.has('seo_description_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('seo_description_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div> 

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            Disable Page
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>


<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    @if($mode === 'edit')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $homepage->getMediaCollection('banner'),
            'media' => $homepage->getThumbs200ForCollection('banner'),
            'label' => 'Banner'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Homepage::class)->getMediaCollection('banner'),
            'label' => 'Banner'
        ])
    @endif
</div>

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    @if($mode === 'edit')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $homepage->getMediaCollection('banner_mb'),
            'media' => $homepage->getThumbs200ForCollection('banner_mb'),
            'label' => 'Mobile Banner'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Homepage::class)->getMediaCollection('banner_mb'),
            'label' => 'Mobile Banner'
        ])
    @endif
</div>



