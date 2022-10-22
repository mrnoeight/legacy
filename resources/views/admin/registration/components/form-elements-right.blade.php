<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Current Occupation') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('careers'), 'has-success': this.fields.careers && this.fields.careers.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Occupation') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.careers"
                        :options="careers"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select occupation') }}"
                        placeholder="{{ __('Occupation') }}">
                </multiselect>

                <div v-if="errors.has('careers')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('careers') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Experience') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('experience'), 'has-success': this.fields.experience && this.fields.experience.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Experience') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.experience"
                        :options="experience"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select experience') }}"
                        placeholder="{{ __('experience') }}">
                </multiselect>

                <div v-if="errors.has('experience')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('experience') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Work is looking for') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('looking'), 'has-success': this.fields.looking && this.fields.looking.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Works') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.looking"
                        :options="looking"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select looking') }}"
                        placeholder="{{ __('looking') }}">
                </multiselect>

                <div v-if="errors.has('looking')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('looking') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Roles are looking for') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('looking_roles'), 'has-success': this.fields.looking_roles && this.fields.looking_roles.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Roles') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.looking_roles"
                        :options="looking_roles"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select roles') }}"
                        placeholder="{{ __('Select roles') }}">
                </multiselect>

                <div v-if="errors.has('looking_roles')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('looking_roles') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Willing to be considered for these types of roles') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('accept_roles'), 'has-success': this.fields.accept_roles && this.fields.accept_roles.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Types') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.accept_roles"
                        :options="accept_roles"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select accept_roles') }}"
                        placeholder="{{ __('accept_roles') }}">
                </multiselect>

                <div v-if="errors.has('accept_roles')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('accept_roles') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Languages') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('languages'), 'has-success': this.fields.languages && this.fields.languages.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Languages') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.speaking_languages"
                        :options="languages"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select languages') }}"
                        placeholder="{{ __('languages') }}">
                </multiselect>

                <div v-if="errors.has('languages')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('languages') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Ethnicities') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('ethnicities'), 'has-success': this.fields.ethnicities && this.fields.ethnicities.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Ethnicities') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.ethnicities"
                        :options="ethnicities"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select ethnicities') }}"
                        placeholder="{{ __('ethnicities') }}">
                </multiselect>

                <div v-if="errors.has('ethnicities')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('ethnicities') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Nationalities') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('nationalities'), 'has-success': this.fields.nationalities && this.fields.nationalities.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Nationalities') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.nationalities"
                        :options="nationalities"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select nationalities') }}"
                        placeholder="{{ __('nationalities') }}">
                </multiselect>

                <div v-if="errors.has('nationalities')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('nationalities') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Voice vocals') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('voice_vocals'), 'has-success': this.fields.voice_vocals && this.fields.voice_vocals.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Voice vocals') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.voice_vocals"
                        :options="voice_vocals"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select voice_vocals') }}"
                        placeholder="{{ __('voice_vocals') }}">
                </multiselect>

                <div v-if="errors.has('voice_vocals')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('voice_vocals') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Instruments') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('instruments'), 'has-success': this.fields.instruments && this.fields.instruments.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Instruments') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.instruments"
                        :options="instruments"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select instruments') }}"
                        placeholder="{{ __('instruments') }}">
                </multiselect>

                <div v-if="errors.has('instruments')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('instruments') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Tattoos') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('tattoos'), 'has-success': this.fields.tattoos && this.fields.tattoos.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Tattoos') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.tattoos"
                        :options="tattoos"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select tattoos') }}"
                        placeholder="{{ __('tattoos') }}">
                </multiselect>

                <div v-if="errors.has('tattoos')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('tattoos') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Sports') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('sports'), 'has-success': this.fields.sports && this.fields.sports.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Sports') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.sports"
                        :options="sports"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select sports') }}"
                        placeholder="{{ __('sports') }}">
                </multiselect>

                <div v-if="errors.has('sports')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('sports') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Dances') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('dances'), 'has-success': this.fields.dances && this.fields.dances.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Dances') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.dances"
                        :options="dances"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select dances') }}"
                        placeholder="{{ __('dances') }}">
                </multiselect>

                <div v-if="errors.has('dances')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('dances') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Martial arts') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('martial_arts'), 'has-success': this.fields.martial_arts && this.fields.martial_arts.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Martial arts') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.martial_arts"
                        :options="martial_arts"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select martial_arts') }}"
                        placeholder="{{ __('martial_arts') }}">
                </multiselect>

                <div v-if="errors.has('martial_arts')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('martial_arts') }}
                </div>
            </div>
        </div>
    </div>
</div>



<!-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('type'), 'has-success': fields.type && fields.type.valid }">
    <label for="type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.registration.columns.type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.type" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('type'), 'form-control-success': fields.type && fields.type.valid}" id="type" name="type" placeholder="{{ trans('admin.registration.columns.type') }}">
        <div v-if="errors.has('type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('type') }}</div>
    </div>
</div> -->


