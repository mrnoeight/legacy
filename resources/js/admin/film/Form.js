import AppForm from '../app-components/Form/AppForm';

Vue.component('film-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                title:  '' ,
                description:  '' ,
                
            }
        }
    }

});