import AppForm from '../app-components/Form/AppForm';

Vue.component('block-info-form', {
    mixins: [AppForm],
    mediaWysiwygConfig: {
        autogrow: true,
        imageWidthModalEdit: true,
        btnsDef: {
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
                head_tag1:  this.getLocalizedFormDefaults(),
                head_title1:  this.getLocalizedFormDefaults(),
                head_desc1:  this.getLocalizedFormDefaults(),
                info1:  this.getLocalizedFormDefaults(),
                block_name:  '' ,
                block_type:  '' ,
                info2:  '' ,
                info3:  '' ,
                info4:  '' ,
                info5:  '' ,
                block_date: '',
            },
            mediaCollections: ['banner', 'banner_mb', 'gallery']
        }
    }

});