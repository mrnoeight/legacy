@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.registration.actions.create'))

@section('body')

    <div class="container-xl">

        
        <registration-form
            :action="'{{ url('admin/registrations') }}?stat={{ $stat }}'"
            :city="{{$city->toJson()}}"
            :experience="{{$experience->toJson()}}"
            :careers="{{$careers->toJson()}}"
            :looking="{{$looking->toJson()}}"
            :statuses="{{ json_encode($statuses) }}"
            :genders="{{ json_encode($genders) }}"
            :looking_roles="{{$looking_roles->toJson()}}"
            :accept_roles="{{$accept_roles->toJson()}}"
            :dances="{{$dances->toJson()}}"
            :martial_arts="{{$martial_arts->toJson()}}"
            :instruments="{{$instruments->toJson()}}"
            :languages="{{$languages->toJson()}}"
            :ethnicities="{{$ethnicities->toJson()}}"
            :nationalities="{{$nationalities->toJson()}}"
            :voice_vocals="{{$voice_vocals->toJson()}}"
            :tattoos="{{$tattoos->toJson()}}"
            :sports="{{$sports->toJson()}}"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus"></i> {{ trans('admin.registration.actions.create') }}
                            </div>
                            <div class="card-body">
                                @include('admin.registration.components.form-elements')
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-4">
                        @include('admin.registration.components.form-elements-right')
                    </div>
                </div>
                                
                <button type="submit" class="btn btn-primary fixed-cta-button button-save" :disabled="submiting">
                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-save'"></i>
                    {{ trans('brackets/admin-ui::admin.btn.save') }}
                </button>
                <button type="submit" style="display: none" class="btn btn-success fixed-cta-button button-saved" :disabled="submiting" :class="">
                    <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-check'"></i>
                    <span>{{ trans('brackets/admin-ui::admin.btn.saved') }}</span>
                </button>
                
            </form>

        </registration-form>

        </div>

    
@endsection