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
                <label for="head_title1_{{ $locale }}" class="col-md-2 col-form-label text-md-right">Apartment Name</label>
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
                <label for="head_desc1_{{ $locale }}" class="col-md-2 col-form-label text-md-right">Description</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <textarea type="text" v-model="form.head_desc1.{{ $locale }}" v-validate="''" class="form-control" :class="{'form-control-danger': errors.has('head_desc1_{{ $locale }}'), 'form-control-success': this.fields.head_desc1_{{ $locale }} && this.fields.head_desc1_{{ $locale }}.valid }" id="head_desc1_{{ $locale }}" head_desc1="head_desc1_{{ $locale }}" placeholder="{{ trans('admin.homepage.columns.head_desc1') }}"></textarea>
                    <div v-if="errors.has('head_desc1_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('head_desc1_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('block_name'), 'has-success': fields.block_name && fields.block_name.valid }">
    <label for="block_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Unit</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.block_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('block_name'), 'form-control-success': fields.block_name && fields.block_name.valid}" id="block_name" name="block_name" placeholder="">
        <div v-if="errors.has('block_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('block_name') }}</div>
    </div>
</div>

<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('info6'), 'has-success': fields.info6 && fields.info6.valid }">
    <label for="info6" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Apartment Code</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.info6" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('info6'), 'form-control-success': fields.info6 && fields.info6.valid}" id="info6" name="info6" placeholder="ABC">
        <div v-if="errors.has('info6')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('info6') }}</div>
    </div>
</div> -->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('info2'), 'has-success': fields.info2 && fields.info2.valid }">
    <label for="info2" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Floor</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.info2" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('info2'), 'form-control-success': fields.info2 && fields.info2.valid}" id="info2" name="info2" placeholder="">
        <div v-if="errors.has('info2')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('info2') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('info3'), 'has-success': fields.info3 && fields.info3.valid }">
    <label for="info3" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Apartment Type</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.info3" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('info3'), 'form-control-success': fields.info3 && fields.info3.valid}" id="info3" name="info3" placeholder="">
        <div v-if="errors.has('info3')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('info3') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('info4'), 'has-success': fields.info4 && fields.info4.valid }">
    <label for="info4" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">GFA</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.info4" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('info4'), 'form-control-success': fields.info4 && fields.info4.valid}" id="info4" name="info4" placeholder="">
        <div v-if="errors.has('info4')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('info4') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('info5'), 'has-success': fields.info5 && fields.info5.valid }">
    <label for="info5" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">NSA</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.info5" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('info5'), 'form-control-success': fields.info5 && fields.info5.valid}" id="info5" name="info5" placeholder="">
        <div v-if="errors.has('info5')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('info5') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('info7'), 'has-success': fields.info7 && fields.info7.valid }">
    <label for="info7" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Steel Deck</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.info7" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('info7'), 'form-control-success': fields.info7 && fields.info7.valid}" id="info7" name="info7" placeholder="">
        <div v-if="errors.has('info7')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('info7') }}</div>
    </div>
</div>

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    @if($mode === 'edit')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $blockInfo->getMediaCollection('banner'),
            'media' => $blockInfo->getThumbs200ForCollection('banner'),
            'label' => 'Apartment Design'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\BlockInfo::class)->getMediaCollection('banner'),
            'label' => 'Apartment Design'
        ])
    @endif
</div>

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    @if($mode === 'edit')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $blockInfo->getMediaCollection('banner_mb'),
            'media' => $blockInfo->getThumbs200ForCollection('banner_mb'),
            'label' => 'Unit Key Plan'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\BlockInfo::class)->getMediaCollection('banner_mb'),
            'label' => 'Unit Key Plan'
        ])
    @endif
</div>


