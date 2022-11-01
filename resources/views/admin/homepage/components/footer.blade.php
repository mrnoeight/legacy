

<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    @if($mode === 'edit')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $homepage->getMediaCollection('banner'),
            'media' => $homepage->getThumbs200ForCollection('banner'),
            'label' => 'Image / Logo'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Homepage::class)->getMediaCollection('banner'),
            'label' => 'Image / Logo'
        ])
    @endif
</div>





