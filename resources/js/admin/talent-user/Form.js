import AppForm from '../app-components/Form/AppForm';

Vue.component('talent-user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                email:  '' ,
                hometown:  '' ,
                birthday:  '' ,
                current_career:  '' ,
                has_agency:  false ,
                agency_name:  '' ,
                want_agency:  false ,
                your_experience:  '' ,
                socials:  '' ,
                searching_for:  '' ,
                profile_picture:  '' ,
                file_cv:  '' ,
                weight:  false ,
                height:  false ,
                
            },
            mediaCollections: ['gallery', 'cover']
        }
    }

});