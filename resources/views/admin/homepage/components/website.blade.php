




<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    @if($mode === 'edit')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $homepage->getMediaCollection('banner'),
            'media' => $homepage->getThumbs200ForCollection('banner'),
            'label' => 'Heading Logo'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Homepage::class)->getMediaCollection('banner'),
            'label' => 'Heading Logo'
        ])
    @endif
</div>


<div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
    @if($mode === 'edit')
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => $homepage->getMediaCollection('banner_mb'),
            'media' => $homepage->getThumbs200ForCollection('banner_mb'),
            'label' => 'Fixed Logo'
        ])
    @else
        @include('brackets/admin-ui::admin.includes.media-uploader', [
            'mediaCollection' => app(App\Models\Homepage::class)->getMediaCollection('banner_mb'),
            'label' => 'Fixed Logo'
        ])
    @endif
</div>