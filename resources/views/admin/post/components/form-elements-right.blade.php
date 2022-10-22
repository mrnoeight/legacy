<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Project Type') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('postType'), 'has-success': this.fields.postType && this.fields.postType.valid }">
            <label for="Post Type"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Post Type') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.types"
                        :options="postType"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select Post Type') }}"
                        placeholder="{{ __('Post Type') }}">
                </multiselect>

                <div v-if="errors.has('postType')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('postType') }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Tags') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center"
            :class="{'has-danger': errors.has('tags'), 'has-success': this.fields.tags && this.fields.tags.valid }">
            <label for="Tag"
                class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('Tags') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">

                <multiselect
                        v-model="form.tags"
                        :options="availableTags"
                        :multiple="true"
                        track-by="id"
                        label="tag_name"
                        tag-placeholder="{{ __('Select Tags') }}"
                        placeholder="{{ __('Tags') }}">
                </multiselect>

                <div v-if="errors.has('tags')" class="form-control-feedback form-text" v-cloak>@{{
                    errors.first('tags') }}
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('brackets/admin-ui::admin.forms.publish') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center" :class="{'has-danger': errors.has('published_at'), 'has-success': fields.published_at && fields.published_at.valid }">
            <label for="published_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-2' : 'col-md-4'">{{ trans('admin.post.columns.published_at') }}</label>
            <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                <div class="input-group input-group--custom">
                <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                <datetime v-model="form.published_at" :config="datetimePickerConfig" class="flatpickr" :class="{'form-control-danger': errors.has('published_at'), 'form-control-success': this.fields.published_at && this.fields.published_at.valid}" id="published_at" name="published_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
                </div>
                <div v-if="errors.has('published_at')" class="form-control-feedback form-text" v-cloak>@{{errors.first('published_at') }}</div>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('Thumbnail') }}
    </div>
    <div class="card-block">
        <div class="form-group row align-items-center">
            @if($mode === 'edit')
                @include('brackets/admin-ui::admin.includes.media-uploader', [
                    'mediaCollection' => $post->getMediaCollection('thumbnail'),
                    'media' => $post->getThumbs200ForCollection('thumbnail'),
                    'label' => 'Thumbnail'
                ])
            @else
                @include('brackets/admin-ui::admin.includes.media-uploader', [
                    'mediaCollection' => app(App\Models\Post::class)->getMediaCollection('thumbnail'),
                    'label' => 'Thumbnail'
                ])
            @endif
        </div>
    </div>
</div>





