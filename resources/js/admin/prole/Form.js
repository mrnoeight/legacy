import AppForm from '../app-components/Form/AppForm';

Vue.component('prole-form', {
    mixins: [AppForm],
    props: [
        'gender',
        'role_type',
        'company'
    ],
    data: function() {
        return {
            form: {
                name:  '' ,
                slug:  '' ,
                post_id:  '' ,
                company_id:  '' ,
                role_type:  '' ,
                role_requirement:  '' ,
                gender:  '' ,
                age:  '' ,
                age_range:  '' ,
                role_fee_min:  '' ,
                role_fee_max:  '' ,
                description:  '' ,
                note:  '' ,
                genders: '',
                role_types: '',
            },
            mediaCollections: ['thumbnail']
        }
    }

});