import AppForm from '../app-components/Form/AppForm';

Vue.component('experience-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                registration_id:  '' ,
                movie_name:  '' ,
                role_name:  '' ,
                exp_year:  '' ,
                role_type:  '' ,
                project_type:  '' ,
                
            }
        }
    }

});