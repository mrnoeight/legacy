console.log("-> Some backend scripts go here!");

$(document).ready(function() {
    console.log( "ready!" );

    $( "#frmRegistration" ).submit(function(e) {
        e.preventDefault();

        var isErr = false;

        if ($('#custLang').val() == 'vn') {
            name_str = 'Xin vui lòng nhập họ tên';
            phone_str = 'Xin vui lòng nhập số điện thoại';
            email_str = 'Xin vui lòng nhập email';
            email_valid = 'Xin vui lòng nhập địa chỉ email đúng';
        }
        else {
            name_str = 'Please input your name';
            phone_str = 'Please input your phone';
            email_str = 'Please input your email';
            email_valid = 'Please input a valid email';
        }
        
        if ($.trim($('#custName').val()) == '') {
            $('#custNameErr').html(name_str);
            isErr = true;
        }
        else
            $('#custNameErr').html('');

        if ($.trim($('#custPhone').val()) == '') {
            $('#custPhoneErr').html(phone_str);
            isErr = true;
        }
        else
            $('#custPhoneErr').html('');


        if ($.trim($('#custEmail').val()) == '') {
            $('#custEmailErr').html(email_str);
            isErr = true;
        }
        else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('#custEmail').val()) === false)
        {
            $('#custEmailErr').html(email_valid);
            isErr = true;
        }
        else
            $('#custEmailErr').html('');

            
        if (!isErr) {
            

            var type = "POST";
            var url = window.location.href;
            url = url.replace('index.html', '');
            url = url.replace('index-en.html', '');

            var ajaxurl = url + 'php/sendmail';
            var formData = {
                name: $("#custName").val(),
                email: $("#custEmail").val(),
                phone: $("#custPhone").val(),
            };
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log('email sent');
                    $('#custNameErr').html('');
                    $('#custPhoneErr').html('');
                    $('#custEmailErr').html('');
                    $("#frmRegistration").trigger("reset");
                },
                error: function (data) {
                    console.log(data);
                }
            });

            LANCASTER.global.popupSubmit($('#custLang').val());
        }
            

        return false;
    });

    $( "#tow-a-1, #tow-a-2, #tow-a-3, #tow-a-4, #tow-a-5" ).click(function(e) {
        updateApartment('A08.01');
    });

    
});

function updateApartment(code) {
    var type = "POST";
    
    var ajaxurl = host_url + '/apartment-info';
    var formData = {
        code: code,
    };
    $.ajax({
        type: type,
        url: ajaxurl,
        data: formData,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log('data sent');
            $('#FloorPlanDetail').html(data.data);
            //alert(data.data);
            // $('.js-floorplandetail').on("click",function(){
            //     $('#FloorPlanDetail').stop(true,true).fadeIn();
            // });
            $('.js-closefloorplandetail').on("click",function(){
                $('#FloorPlanDetail').stop(true,true).fadeOut();
            });
        },
        error: function (data) {
            console.log(data);
        }
    });
}