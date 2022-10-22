<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.talent-user.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.talent-user.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.talent-user.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.talent-user.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('hometown'), 'has-success': fields.hometown && fields.hometown.valid }">
    <label for="hometown" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.talent-user.columns.hometown') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.hometown" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('hometown'), 'form-control-success': fields.hometown && fields.hometown.valid}" id="hometown" name="hometown" placeholder="{{ trans('admin.talent-user.columns.hometown') }}">
        <div v-if="errors.has('hometown')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('hometown') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('birthday'), 'has-success': fields.birthday && fields.birthday.valid }">
    <label for="birthday" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.talent-user.columns.birthday') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.birthday" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('birthday'), 'form-control-success': fields.birthday && fields.birthday.valid}" id="birthday" name="birthday" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('birthday')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('birthday') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('current_career'), 'has-success': fields.current_career && fields.current_career.valid }">
    <label for="current_career" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.talent-user.columns.current_career') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.current_career" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('current_career'), 'form-control-success': fields.current_career && fields.current_career.valid}" id="current_career" name="current_career" placeholder="{{ trans('admin.talent-user.columns.current_career') }}">
        <div v-if="errors.has('current_career')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('current_career') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('has_agency'), 'has-success': fields.has_agency && fields.has_agency.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="has_agency" type="checkbox" v-model="form.has_agency" v-validate="''" data-vv-name="has_agency"  name="has_agency_fake_element">
        <label class="form-check-label" for="has_agency">
            {{ trans('admin.talent-user.columns.has_agency') }}
        </label>
        <input type="hidden" name="has_agency" :value="form.has_agency">
        <div v-if="errors.has('has_agency')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('has_agency') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('agency_name'), 'has-success': fields.agency_name && fields.agency_name.valid }">
    <label for="agency_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.talent-user.columns.agency_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.agency_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('agency_name'), 'form-control-success': fields.agency_name && fields.agency_name.valid}" id="agency_name" name="agency_name" placeholder="{{ trans('admin.talent-user.columns.agency_name') }}">
        <div v-if="errors.has('agency_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('agency_name') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('want_agency'), 'has-success': fields.want_agency && fields.want_agency.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="want_agency" type="checkbox" v-model="form.want_agency" v-validate="''" data-vv-name="want_agency"  name="want_agency_fake_element">
        <label class="form-check-label" for="want_agency">
            {{ trans('admin.talent-user.columns.want_agency') }}
        </label>
        <input type="hidden" name="want_agency" :value="form.want_agency">
        <div v-if="errors.has('want_agency')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('want_agency') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('your_experience'), 'has-success': fields.your_experience && fields.your_experience.valid }">
    <label for="your_experience" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.talent-user.columns.your_experience') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.your_experience" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('your_experience'), 'form-control-success': fields.your_experience && fields.your_experience.valid}" id="your_experience" name="your_experience" placeholder="{{ trans('admin.talent-user.columns.your_experience') }}">
        <div v-if="errors.has('your_experience')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('your_experience') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('socials'), 'has-success': fields.socials && fields.socials.valid }">
    <label for="socials" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.talent-user.columns.socials') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.socials" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('socials'), 'form-control-success': fields.socials && fields.socials.valid}" id="socials" name="socials" placeholder="{{ trans('admin.talent-user.columns.socials') }}">
        <div v-if="errors.has('socials')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('socials') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('searching_for'), 'has-success': fields.searching_for && fields.searching_for.valid }">
    <label for="searching_for" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.talent-user.columns.searching_for') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.searching_for" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('searching_for'), 'form-control-success': fields.searching_for && fields.searching_for.valid}" id="searching_for" name="searching_for" placeholder="{{ trans('admin.talent-user.columns.searching_for') }}">
        <div v-if="errors.has('searching_for')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('searching_for') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('profile_picture'), 'has-success': fields.profile_picture && fields.profile_picture.valid }">
    <label for="profile_picture" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.talent-user.columns.profile_picture') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.profile_picture" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('profile_picture'), 'form-control-success': fields.profile_picture && fields.profile_picture.valid}" id="profile_picture" name="profile_picture" placeholder="{{ trans('admin.talent-user.columns.profile_picture') }}">
        <div v-if="errors.has('profile_picture')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('profile_picture') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('file_cv'), 'has-success': fields.file_cv && fields.file_cv.valid }">
    <label for="file_cv" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.talent-user.columns.file_cv') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.file_cv" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('file_cv'), 'form-control-success': fields.file_cv && fields.file_cv.valid}" id="file_cv" name="file_cv" placeholder="{{ trans('admin.talent-user.columns.file_cv') }}">
        <div v-if="errors.has('file_cv')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('file_cv') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('weight'), 'has-success': fields.weight && fields.weight.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="weight" type="checkbox" v-model="form.weight" v-validate="''" data-vv-name="weight"  name="weight_fake_element">
        <label class="form-check-label" for="weight">
            {{ trans('admin.talent-user.columns.weight') }}
        </label>
        <input type="hidden" name="weight" :value="form.weight">
        <div v-if="errors.has('weight')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('weight') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('height'), 'has-success': fields.height && fields.height.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="height" type="checkbox" v-model="form.height" v-validate="''" data-vv-name="height"  name="height_fake_element">
        <label class="form-check-label" for="height">
            {{ trans('admin.talent-user.columns.height') }}
        </label>
        <input type="hidden" name="height" :value="form.height">
        <div v-if="errors.has('height')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('height') }}</div>
    </div>
</div>

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    @if($mode === 'edit')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $talentUser->getMediaCollection('cover'),
            'media' => $talentUser->getThumbs200ForCollection('cover'),
            'label' => 'Cover photo'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\TalentUser::class)->getMediaCollection('cover'),
            'label' => 'Cover photo'
        ])
    @endif
</div>
<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    @if ($mode === 'create')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\TalentUser::class)->getMediaCollection('gallery'),
            'label' => 'Gallery'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $talentUser->getMediaCollection('gallery'),
            'media' => $talentUser->getThumbs200ForCollection('gallery'),
            'label' => 'Gallery'
        ])
    @endif
</div>


