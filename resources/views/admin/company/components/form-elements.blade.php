<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.company.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('representative'), 'has-success': fields.representative && fields.representative.valid }">
    <label for="representative" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.representative') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.representative" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('representative'), 'form-control-success': fields.representative && fields.representative.valid}" id="representative" name="representative" placeholder="{{ trans('admin.company.columns.representative') }}">
        <div v-if="errors.has('representative')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('representative') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tel'), 'has-success': fields.tel && fields.tel.valid }">
    <label for="tel" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.tel') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tel" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tel'), 'form-control-success': fields.tel && fields.tel.valid}" id="tel" name="tel" placeholder="{{ trans('admin.company.columns.tel') }}">
        <div v-if="errors.has('tel')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tel') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address'), 'has-success': fields.address && fields.address.valid }">
    <label for="address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.address') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('address'), 'form-control-success': fields.address && fields.address.valid}" id="address" name="address" placeholder="{{ trans('admin.company.columns.address') }}">
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('city'), 'has-success': fields.city && fields.city.valid }">
    <label for="city" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.city') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.city" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('city'), 'form-control-success': fields.city && fields.city.valid}" id="city" name="city" placeholder="{{ trans('admin.company.columns.city') }}">
        <div v-if="errors.has('city')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('city') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('company_email'), 'has-success': fields.company_email && fields.company_email.valid }">
    <label for="company_email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('Company Email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.company_email" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('company_email'), 'form-control-success': fields.company_email && fields.company_email.valid}" id="company_email" name="company_email" placeholder="{{ trans('admin.company.columns.company_email') }}">
        <div v-if="errors.has('company_email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('company_email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('website'), 'has-success': fields.website && fields.website.valid }">
    <label for="website" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('Website') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.website" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('website'), 'form-control-success': fields.website && fields.website.valid}" id="website" name="website" placeholder="{{ trans('admin.company.columns.website') }}">
        <div v-if="errors.has('website')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('website') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('establish_date'), 'has-success': fields.establish_date && fields.establish_date.valid }">
    <label for="establish_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('Established Year') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.establish_date" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('establish_date'), 'form-control-success': fields.establish_date && fields.establish_date.valid}" id="establish_date" name="establish_date" placeholder="{{ trans('admin.company.columns.establish_date') }}">
        <div v-if="errors.has('establish_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('establish_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('number_pj_monthly'), 'has-success': fields.number_pj_monthly && fields.number_pj_monthly.valid }">
    <label for="number_pj_monthly" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('Number of Project Monthly') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.number_pj_monthly" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('number_pj_monthly'), 'form-control-success': fields.number_pj_monthly && fields.number_pj_monthly.valid}" id="number_pj_monthly" name="number_pj_monthly" placeholder="{{ trans('admin.company.columns.number_pj_monthly') }}">
        <div v-if="errors.has('number_pj_monthly')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('number_pj_monthly') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('number_pj_annually'), 'has-success': fields.number_pj_annually && fields.number_pj_annually.valid }">
    <label for="number_pj_annually" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('Number of Project Annually') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.number_pj_annually" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('number_pj_annually'), 'form-control-success': fields.number_pj_annually && fields.number_pj_annually.valid}" id="number_pj_annually" name="number_pj_annually" placeholder="{{ trans('admin.company.columns.number_pj_annually') }}">
        <div v-if="errors.has('number_pj_annually')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('number_pj_annually') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('feature_film_pj'), 'has-success': fields.feature_film_pj && fields.feature_film_pj.valid }">
    <label for="feature_film_pj" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('Feature Film Project') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.feature_film_pj" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('feature_film_pj'), 'form-control-success': fields.feature_film_pj && fields.feature_film_pj.valid}" id="feature_film_pj" name="feature_film_pj" placeholder="{{ trans('admin.company.columns.feature_film_pj') }}">
        <div v-if="errors.has('feature_film_pj')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('feature_film_pj') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('broadcast_pj'), 'has-success': fields.broadcast_pj && fields.broadcast_pj.valid }">
    <label for="broadcast_pj" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('Broadcast Project') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.broadcast_pj" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('broadcast_pj'), 'form-control-success': fields.broadcast_pj && fields.broadcast_pj.valid}" id="broadcast_pj" name="broadcast_pj" placeholder="{{ trans('admin.company.columns.broadcast_pj') }}">
        <div v-if="errors.has('broadcast_pj')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('broadcast_pj') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('music_video_pj'), 'has-success': fields.music_video_pj && fields.music_video_pj.valid }">
    <label for="music_video_pj" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('Msic Video Project') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.music_video_pj" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('music_video_pj'), 'form-control-success': fields.music_video_pj && fields.music_video_pj.valid}" id="music_video_pj" name="music_video_pj" placeholder="{{ trans('admin.company.columns.music_video_pj') }}">
        <div v-if="errors.has('music_video_pj')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('music_video_pj') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('film_ott_pj'), 'has-success': fields.film_ott_pj && fields.film_ott_pj.valid }">
    <label for="film_ott_pj" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('Film Ott Project') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.film_ott_pj" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('film_ott_pj'), 'form-control-success': fields.film_ott_pj && fields.film_ott_pj.valid}" id="film_ott_pj" name="film_ott_pj" placeholder="{{ trans('admin.company.columns.film_ott_pj') }}">
        <div v-if="errors.has('film_ott_pj')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('film_ott_pj') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tv_ott_pj'), 'has-success': fields.tv_ott_pj && fields.tv_ott_pj.valid }">
    <label for="tv_ott_pj" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('TV Ott Project') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tv_ott_pj" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tv_ott_pj'), 'form-control-success': fields.tv_ott_pj && fields.tv_ott_pj.valid}" id="tv_ott_pj" name="tv_ott_pj" placeholder="{{ trans('admin.company.columns.tv_ott_pj') }}">
        <div v-if="errors.has('tv_ott_pj')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tv_ott_pj') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('web_dramma_pj'), 'has-success': fields.web_dramma_pj && fields.web_dramma_pj.valid }">
    <label for="web_dramma_pj" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('Web Dramma Project') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.web_dramma_pj" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('web_dramma_pj'), 'form-control-success': fields.web_dramma_pj && fields.web_dramma_pj.valid}" id="web_dramma_pj" name="web_dramma_pj" placeholder="{{ trans('admin.company.columns.web_dramma_pj') }}">
        <div v-if="errors.has('web_dramma_pj')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('web_dramma_pj') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tvc_pj'), 'has-success': fields.tvc_pj && fields.tvc_pj.valid }">
    <label for="tvc_pj" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('TVC Project') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tvc_pj" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tvc_pj'), 'form-control-success': fields.tvc_pj && fields.tvc_pj.valid}" id="tvc_pj" name="tvc_pj" placeholder="{{ trans('admin.company.columns.tvc_pj') }}">
        <div v-if="errors.has('tvc_pj')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tvc_pj') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('excutive_producer_name'), 'has-success': fields.excutive_producer_name && fields.excutive_producer_name.valid }">
    <label for="excutive_producer_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.excutive_producer_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.excutive_producer_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('excutive_producer_name'), 'form-control-success': fields.excutive_producer_name && fields.excutive_producer_name.valid}" id="excutive_producer_name" name="excutive_producer_name" placeholder="{{ trans('admin.company.columns.excutive_producer_name') }}">
        <div v-if="errors.has('excutive_producer_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('excutive_producer_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('director_name'), 'has-success': fields.director_name && fields.director_name.valid }">
    <label for="director_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.director_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.director_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('director_name'), 'form-control-success': fields.director_name && fields.director_name.valid}" id="director_name" name="director_name" placeholder="{{ trans('admin.company.columns.director_name') }}">
        <div v-if="errors.has('director_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('director_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('producer_name'), 'has-success': fields.producer_name && fields.producer_name.valid }">
    <label for="producer_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.producer_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.producer_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('producer_name'), 'form-control-success': fields.producer_name && fields.producer_name.valid}" id="producer_name" name="producer_name" placeholder="{{ trans('admin.company.columns.producer_name') }}">
        <div v-if="errors.has('producer_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('producer_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address'), 'has-success': fields.address && fields.address.valid }">
    <label for="address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.address') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('address'), 'form-control-success': fields.address && fields.address.valid}" id="address" name="address" placeholder="{{ trans('admin.company.columns.address') }}">
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cast_email'), 'has-success': fields.cast_email && fields.cast_email.valid }">
    <label for="cast_email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.cast_email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cast_email" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cast_email'), 'form-control-success': fields.cast_email && fields.cast_email.valid}" id="cast_email" name="cast_email" placeholder="{{ trans('admin.company.columns.cast_email') }}">
        <div v-if="errors.has('cast_email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cast_email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cast_phone'), 'has-success': fields.cast_phone && fields.cast_phone.valid }">
    <label for="cast_phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.cast_phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cast_phone" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cast_phone'), 'form-control-success': fields.cast_phone && fields.cast_phone.valid}" id="cast_phone" name="cast_phone" placeholder="{{ trans('admin.company.columns.cast_phone') }}">
        <div v-if="errors.has('cast_phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cast_phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cast_time'), 'has-success': fields.cast_time && fields.cast_time.valid }">
    <label for="cast_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.cast_time') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cast_time" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cast_time'), 'form-control-success': fields.cast_time && fields.cast_time.valid}" id="cast_time" name="cast_time" placeholder="{{ trans('admin.company.columns.cast_time') }}">
        <div v-if="errors.has('cast_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cast_time') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('know_us'), 'has-success': fields.know_us && fields.know_us.valid }">
    <label for="know_us" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.know_us') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.know_us" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('know_us'), 'form-control-success': fields.know_us && fields.know_us.valid}" id="know_us" name="know_us" placeholder="{{ trans('admin.company.columns.know_us') }}">
        <div v-if="errors.has('know_us')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('know_us') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.company.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    @if($mode === 'edit')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $company->getMediaCollection('thumbnail'),
            'media' => $company->getThumbs200ForCollection('thumbnail'),
            'label' => 'Thumbnail'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Company::class)->getMediaCollection('thumbnail'),
            'label' => 'Thumbnail'
        ])
    @endif
</div>


