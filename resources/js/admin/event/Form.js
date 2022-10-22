import AppForm from '../app-components/Form/AppForm';

Vue.component('event-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                slug:  '' ,
                short_desc:  '' ,
                description:  '' ,
                published_at:  '' ,
                enabled:  false ,
                
            },
            mediaCollections: ['gallery', 'cover']
        }
    },
});