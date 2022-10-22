import AppForm from '../app-components/Form/AppForm';

Vue.component('homepage-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                head_tag1:  this.getLocalizedFormDefaults(),
                head_title1:  this.getLocalizedFormDefaults(),
                head_desc1:  this.getLocalizedFormDefaults(),
                mid_tag1:  this.getLocalizedFormDefaults(),
                mid_title1:  this.getLocalizedFormDefaults(),
                mid_desc1:  this.getLocalizedFormDefaults(),
                info1:  this.getLocalizedFormDefaults(),
                info2:  this.getLocalizedFormDefaults(),
                info3:  this.getLocalizedFormDefaults(),
                info4:  this.getLocalizedFormDefaults(),
                info5:  this.getLocalizedFormDefaults(),
                page_name:  '',
                seo_title:  this.getLocalizedFormDefaults(),
                seo_description:  this.getLocalizedFormDefaults(),
                //seo_author:  '',
                
            },
            mediaCollections: ['banner', 'banner_mb', 'middle_banner', 'middle_banner_mb']
        }
    }

});