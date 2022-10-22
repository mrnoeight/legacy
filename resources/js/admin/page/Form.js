import AppForm from '../app-components/Form/AppForm';

Vue.component('page-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                web_title:  '' ,
                web_description:  '' ,
                content:  '' ,
                enabled:  false ,
                
            }
        }
    }

});