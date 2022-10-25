@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.block-info.actions.edit', ['name' => $blockInfo->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <block-info-form
                :action="'{{ $blockInfo->resource_url . '?block_type='.$_GET['block_type']}}'"
                :data="{{ $blockInfo->toJsonAllLocales() }}"
                :locales="{{ json_encode($locales) }}"
                :send-empty-locales="false"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.block-info.actions.edit', ['name' => $blockInfo->id]) }}
                    </div>

                    <div class="card-body">
                    @if ($_GET['block_type'] == 'buildingA' || $_GET['block_type'] == 'buildingB' || $_GET['block_type'] == 'buildingC')
                        @include('admin.block-info.components.apartment')
                    @elseif ($_GET['block_type'] == 'video')
                        @include('admin.block-info.components.video')
                    @elseif ($_GET['block_type'] == 'news')
                        @include('admin.block-info.components.news')
                    @elseif ($_GET['block_type'] == 'progress')
                        @include('admin.block-info.components.progress')
                    @elseif ($_GET['block_type'] == 'basic_service' || $_GET['block_type'] == 'enhance_service' || $_GET['block_type'] == 'butler_service')
                        @include('admin.block-info.components.service')
                    @elseif ($_GET['block_type'] == 'member_card')
                        @include('admin.block-info.components.member')
                    @elseif ($_GET['block_type'] == 'consultant')
                        @include('admin.block-info.components.consultant')
                    @elseif (in_array($_GET['block_type'], array('home_text', 'apartment_text', 'menu_text', 'footer_text')))
                        @include('admin.block-info.components.text')
                    @elseif (in_array($_GET['block_type'], array('lancaster_text')))
                        @include('admin.block-info.components.text_lancaster')
                    @elseif (in_array($_GET['block_type'], array('slider_home')))
                        @include('admin.block-info.components.slider')
                    @elseif (in_array($_GET['block_type'], array('gallery_home', 'partner', 'master_gallery')))
                        @include('admin.block-info.components.block_image')
                    @elseif (in_array($_GET['block_type'], array('f_pool', 'f_yoga', 'f_playground', 'f_sauna', 'f_gym', 'f_park')))
                        @include('admin.block-info.components.amenities')
                    @elseif (in_array($_GET['block_type'], array('health_utilities', 'entertainment', 'business')))
                        @include('admin.block-info.components.utilities')
                    @else
                        @include('admin.block-info.components.form-elements')
                    @endif
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </block-info-form>

        </div>
    
</div>

@endsection