import AppForm from '../app-components/Form/AppForm';

Vue.component('block-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                title:  '' ,
                content:  '' ,
                url:  '' ,
                page:  '' ,
                section:  '' ,
                enabled:  false ,
                
            }
        }
    }

});