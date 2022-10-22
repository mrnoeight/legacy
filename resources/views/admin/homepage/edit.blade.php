@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.homepage.actions.edit', ['name' => $homepage->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <homepage-form
                :action="'{{ $homepage->resource_url }}?pg={{ $_GET['pg']}}'"
                :data="{{ $homepage->toJsonAllLocales() }}"
                :locales="{{ json_encode($locales) }}"
                :send-empty-locales="false"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.homepage.actions.edit', ['name' => $homepage->id]) }}
                    </div>

                    <div class="card-body">
                    @if ($_GET['pg'] == 'apartment')
                        @include('admin.homepage.components.apartment')
                    @elseif ($_GET['pg'] == 'facilities')
                        @include('admin.homepage.components.facilites')
                    @elseif ($_GET['pg'] == 'gallery')
                        @include('admin.homepage.components.gallery')
                    @elseif ($_GET['pg'] == 'news')
                        @include('admin.homepage.components.news')
                    @elseif ($_GET['pg'] == 'website')
                        @include('admin.homepage.components.website')
                    @elseif ($_GET['pg'] == 'footer')
                        @include('admin.homepage.components.footer')
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