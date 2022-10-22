jQuery(document).ready(function($){

    // CREATE
    $("#viewMoreTalent").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        
        var type = "GET";
        var ajaxurl = 'get_ajax_talent';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                if (data.morePage == 0) 
                    jQuery('#viewMoreTalent').hide();
                
                jQuery('#talentList').append(data.data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});