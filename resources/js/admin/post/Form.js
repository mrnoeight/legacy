import AppForm from '../app-components/Form/AppForm';

Vue.component('post-form', {
    mixins: [AppForm],
    props: [
        'company',
        'availableTags',
        'postType',
        'gender',
        'project_budget',
        'city'
    ],
    mediaWysiwygConfig: {
        autogrow: true,
        imageWidthModalEdit: true,
        btnsDef: {
            image: {
                dropdown: ['insertImage', 'base64'],
                ico: 'insertImage'
            },
            align: {
                dropdown: ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ico: 'justifyLeft'
            }
        },
        btns: [
            ['formatting'],
            ['strong', 'em', 'del'],
            ['align'],
            ['unorderedList', 'orderedList', 'table'],
            ['foreColor', 'backColor'],
            ['link', 'noembed', 'image'],
            ['template'],
            ['fullscreen', 'viewHTML'],
        ],
    },
    data: function() {
        return {
            form: {
                name:  this.getLocalizedFormDefaults(),
                slug:  '' ,
                type:  '' ,
                city_name:  '' ,
                city_id:  '' ,
                gender:  '' ,
                age:  '' ,
                company_id:  '' ,
                expired_date:  '' ,
                other_location:  '' ,
                project_budget:  '' ,
                start_casting_date:  '' ,
                end_casting_date:  '' ,
                start_rehearsal_date:  '' ,
                end_rehearsal_date:  '' ,
                start_photo_date:  '' ,
                end_photo_date:  '' ,
                short_desc:  this.getLocalizedFormDefaults(),
                description:  this.getLocalizedFormDefaults(),
                published_at:  '' ,
                enabled:  false ,
                company:  '',
                types: '',
                tags: '',
                genders: '',
                project_budgets:  '' ,
            },
            mediaCollections: ['thumbnail']
        }
    }

});