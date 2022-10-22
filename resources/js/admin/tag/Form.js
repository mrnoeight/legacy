import AppForm from '../app-components/Form/AppForm';

Vue.component('tag-form', {
    mixins: [AppForm],
    props: [
        'optionTags'
    ],
    data: function() {
        return {
            form: {
                tag_name:  '' ,
                tag_type:  '' ,
                optionTags: '',            }
        }
    }

});