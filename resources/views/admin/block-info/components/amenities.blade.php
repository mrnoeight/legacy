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
            <div class="form-group row" :class="{'has-danger': errors.has('head_tag1_{{ $locale }}'), 'has-success': this.fields.head_tag1_{{ $locale }} && this.fields.head_tag1_{{ $locale }}.valid }">
                <label for="head_tag1_{{ $locale }}" class="col-md-2 col-form-label text-md-right">Title (Mobile)</label>
                
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <textarea v-model="form.head_tag1.{{ $locale }}" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('head_tag1_{{ $locale }}'), 'form-control-success': this.fields.head_tag1_{{ $locale }} && this.fields.head_tag1_{{ $locale }}.valid }" id="head_tag1_{{ $locale }}" head_tag1="head_tag1_{{ $locale }}" placeholder="Title for mobile"></textarea>
                    <div v-if="errors.has('head_tag1_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('head_tag1_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col"@if(!$loop->first) v-show="isFormLocalized && currentLocale == '{{ $locale }}'" v-cloak @endif>
            <div class="form-group row" :class="{'has-danger': errors.has('info1_{{ $locale }}'), 'has-success': this.fields.info1_{{ $locale }} && this.fields.info1_{{ $locale }}.valid }">
                <label for="info1_{{ $locale }}" class="col-md-2 col-form-label text-md-right">Description</label>
                
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <textarea v-model="form.info1.{{ $locale }}" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('info1_{{ $locale }}'), 'form-control-success': this.fields.info1_{{ $locale }} && this.fields.info1_{{ $locale }}.valid }" id="info1_{{ $locale }}" info1="info1_{{ $locale }}" placeholder="{{ trans('admin.homepage.columns.info1') }}"></textarea>
                    <div v-if="errors.has('info1_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('info1_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    @if($mode === 'edit')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $blockInfo->getMediaCollection('banner'),
            'media' => $blockInfo->getThumbs200ForCollection('banner'),
            'label' => 'Image'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\BlockInfo::class)->getMediaCollection('banner'),
            'label' => 'Image'
        ])
    @endif
</div>

<!-- <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    @if($mode === 'edit')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $blockInfo->getMediaCollection('gallery'),
            'media' => $blockInfo->getThumbs200ForCollection('gallery'),
            'label' => 'Gallery'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\BlockInfo::class)->getMediaCollection('gallery'),
            'label' => 'Gallery'
        ])
    @endif
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col"@if(!$loop->first) v-show="isFormLocalized && currentLocale == '{{ $locale }}'" v-cloak @endif>
            <div class="form-group row" :class="{'has-danger': errors.has('info1_{{ $locale }}'), 'has-success': this.fields.info1_{{ $locale }} && this.fields.info1_{{ $locale }}.valid }">
                <div class="col-md-9 "><label class=" text-md-right" style="margin: 20px 200px;">Caption for each image in gallery. One line is for one caption.</label></div>
            </div>
        </div>
    @endforeach
</div>

 -->