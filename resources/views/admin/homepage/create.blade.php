@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.homepage.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <homepage-form
            :action="'{{ url('admin/homepages') }}'"
            :locales="{{ json_encode($locales) }}"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.homepage.actions.create') }}
                </div>

                <div class="card-body">
                @if ($_GET['pg'] == 'apartment')
                    @include('admin.block-info.components.apartment')
                @elseif ($_GET['pg'] == 'video')
                    @include('admin.block-info.components.video')
                @elseif ($_GET['pg'] == 'news')
                    @include('admin.block-info.components.news')
                @elseif ($_GET['pg'] == 'progress')
                    @include('admin.block-info.components.progress')
                @elseif ($_GET['pg'] == 'basic_service' || $_GET['pg'] == 'enhance_service' || $_GET['pg'] == 'butler_service')
                    @include('admin.block-info.components.service')
                @elseif ($_GET['pg'] == 'member_card')
                    @include('admin.block-info.components.member')
                @elseif ($_GET['pg'] == 'consultant')
                    @include('admin.block-info.components.consultant')
                @elseif ($_GET['pg'] == 'home_text')
                    @include('admin.block-info.components.text')
                @elseif ($_GET['pg'] == 'website')
                    @include('admin.block-info.components.website')
                @elseif ($_GET['pg'] == 'footer')
                    @include('admin.block-info.components.footer')
                @else
                    @include('admin.homepage.components.form-elements')
                @endif
                    
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </homepage-form>

        </div>

        </div>

    
@endsection