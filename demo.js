/**
 * 
 */
$(document).ready(function() {
    $("#VAoption1").hide();
    $("#VAoption2").hide();
    $("#showPayOption").hide();
    $("#showUserId").hide();
    $("#showBankList").hide();
    
    document.getElementById('buyerEmail').value = makeRandomEmail();
    
    $('input:radio[name="payType"]').change(function() {
        $("#showUserId").hide();
        if ($(this).is(':checked') && $(this).val() == 'IC') {
            $('input:radio[name="payOption"]').prop('checked', false);
            $('input:radio[name="bankCode"]').prop('checked', false);
            $("#showPayOption").show();
            $("#showBankList").hide();
            $("#showUserId").hide();
            $("#VAoption1").hide();
            $("#VAoption2").hide();
        } else if ($(this).is(':checked') && $(this).val() == 'DC') {
            $('input:radio[name="payOption"]').prop('checked', false);
            $('input:radio[name="bankCode"]').prop('checked', false);
            $("#showPayOption").show();
            $("#showUserId").hide();
            $("#showBankList").hide();
            $("#VAoption1").hide();
            $("#VAoption2").hide();
        } else if ($(this).is(':checked') && $(this).val() == 'VA') {
            setDedicatedAccLifeTime();
            $('input:radio[name="payOption"]').prop('checked', false);
            $('input:radio[name="bankCode"]').prop('checked', false);
            $("#VAoption1").show();
            $("#VAoption2").show();
            $("#showPayOption").hide();
            $("#showUserId").hide();
            $("#showBankList").hide();
        } else if ($(this).is(':checked') && $(this).val() == 'EW') {
            $('input:radio[name="payOption"]').prop('checked', false);
            $('input:radio[name="bankCode"]').prop('checked', false);
            $("#showPayOption").hide();
            $("#showBankList").show();
            $("#VAoption1").hide();
            $("#VAoption2").hide();
        } else if ($(this).is(':checked') && $(this).val() == 'IS') {
            $('input:radio[name="payOption"]').prop('checked', false);
            $('input:radio[name="bankCode"]').prop('checked', false);
            $("#showPayOption").hide();
            $("#showBankList").hide();
            $("#VAoption1").hide();
            $("#VAoption2").hide();
        }
    });

    $('input:radio[name="payOption"]').change(function() {
        if ($(this).is(':checked') && $(this).val() != '') {
            $("#showUserId").show();
        } else {
            $("#showUserId").hide();
        }
    });

})

window.addEventListener('message', function(e) {
    console.log('Sample Listener');
    if (e.data.closeLayer == 'close') {
        window.top.closeLayer();
    }
});

function validateForm() {
    var payToken = $('#payToken').val();
    var amount = $('#amount').val();
    var userId = $('#userId').val();
    var type = "";

    if (payToken != '') {
        $('#payToken').val('');
    }
    if (amount == '') {
        alert('Please Enter Amount!');
        $('#amount').focus();
        return false;
    }

    var payOpt = $("input[name='payOption']:checked").val();
    if (payOpt == "PAY_CREATE_TOKEN" || payOpt == "PAY_WITH_TOKEN") {
        if (userId == '') {
            alert('Please Enter UserId!');
            $('#userId').focus();
            return false;
        }
    }

    payment(amount, userId, payOpt);
}

// Function Payment
function payment(amount, userId, payOpt) {
    var userFee = $('#userFee').val();

    $.ajax({
        url : "process.php",
        // type : 'POST',
        // dataType : 'json',
        // data : { goodsAmount : goodsAmount, userFee : userFee, userId : userId, payOption : payOpt},

        type: 'POST',
        dataType: 'json',
        data: JSON.stringify({
            amount: amount,
            userFee: userFee,
            userId: userId,
            payOption: payOpt
        }),
        contentType: "application/json",

        success : function(res) {
            if (res.success) {
                var domain = res.domain;
                paymentForm = document.getElementById('megapayForm');

                paymentForm.elements["description"].value = res.description;
                paymentForm.elements["amount"].value = res.amount;
                paymentForm.elements["timeStamp"].value = res.timeStamp;
                paymentForm.elements['invoiceNo'].value = res.invoiceNo;
                paymentForm.elements['merTrxId'].value = res.merTrxId;
                paymentForm.elements['merId'].value = res.merId;
                paymentForm.elements["merchantToken"].value = res.merchantToken;
                if (res.payToken) {
                    paymentForm.elements["payToken"].value = res.payToken;
                }

                openPayment(1, domain);
            } else {
                alert(res.mes);
            }
        },
        error : function() {
            alert('Có lỗi trong quá trình xử lý 123!');
        }
    });
}

function makeRandomEmail() {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < 6; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    
   return result + "@gmail.com";
}

function setDedicatedAccLifeTime() {
    var today = new Date();
    var year = today.getFullYear();
    var month = today.getMonth() + 1;
    var day = today.getDate();
    var hours = today.getHours();
    var minutes = today.getMinutes();
    var seconds = today.getSeconds();
    if(month < 10) month = '0' + month;
    var day2 = day + 3;
    if(day < 10) { 
        day = '0' + day;
        day2 = '0' + day2;
    }
    if(hours < 10) hours = '0' + hours;
    if(minutes < 10) minutes = '0' + minutes;
    if(seconds < 10) seconds = '0' + seconds;
    
    var startDt = '' + year + month + day + hours + minutes + seconds;
    var endDt = '' + year + month + day2 + hours + minutes + seconds;
    document.getElementById('vaStartDt').value = startDt;
    document.getElementById('vaEndDt').value = endDt;
}