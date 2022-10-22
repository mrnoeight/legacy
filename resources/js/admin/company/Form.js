import AppForm from '../app-components/Form/AppForm';

Vue.component('company-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                representative:  '' ,
                tel:  '' ,
                address:  '' ,
                city:  '' ,
                company_email:  '' ,
                website:  '' ,
                establish_date:  '' ,
                number_pj_monthly:  '' ,
                number_pj_annually:  '' ,
                feature_film_pj:  '' ,
                broadcast_pj:  '' ,
                music_video_pj:  '' ,
                film_ott_pj:  '' ,
                tv_ott_pj:  '' ,
                web_dramma_pj:  '' ,
                tvc_pj:  '' ,
                excutive_producer_name:  '' ,
                director_name:  '' ,
                producer_name:  '' ,
                cast_name:  '' ,
                cast_email:  '' ,
                cast_phone:  '' ,
                cast_time:  '' ,
                know_us:  '' ,
                enabled:  false ,
                
            },
            mediaCollections: ['thumbnail']
        }
    }

});