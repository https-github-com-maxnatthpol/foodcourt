(function($) {
    "use strict";


    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input100').each(function() {
        $(this).on('blur', function() {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
            } else {
                $(this).removeClass('has-val');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit', function() {
        var check = true;

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function() {
        $(this).focus(function() {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        } else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }


})(jQuery);

//show pass	
function showPass() {
    var x = document.getElementById("txtPassword");
    if (x.type === "password") {
        x.type = "text";
        document.getElementById("a_pass").innerHTML = "<i class='fa fa-eye'></i> แสดงรหัสผ่าน";
    } else {
        x.type = "password";
        document.getElementById("a_pass").innerHTML = "<i class='fa fa-eye-slash'></i> แสดงรหัสผ่าน";
    }
}

$(document).on('click', '#login', function() {

    var username = $('#txtUserName').val();
    var password = $('#txtPassword').val();
    $.ajax({
        beforeSend: function() {
            $('#overlay').show();

        },
        complete: function() {
            $('#overlay').fadeOut();
        },
        url: "../engine/lib/service.php",
        method: "POST",
        data: {
            username: username,
            password: password
        },
        success: function(data) {
            //alert(data.message, 'Infomation:');
            if (data.role_tag == 'mod_customer') {
                //swal('เข้าสู่ระบบสำเร็จ')	
                location.href = "../engine/mod_shopmenu/front_manage.php";
            } else if (data.role_tag == 'mod_cashier') {
                //swal('เข้าสู่ระบบสำเร็จ')	
                location.href = "../engine/mod_cashier/front_manage.php";
            } else if (data.role_tag == 'mod_employee') {
                //swal('เข้าสู่ระบบสำเร็จ')	
                location.href = "../engine/page_home/";
            } else if (data.status == 0) {
                swal.fire('คำเตือน', data.message, "warning")
                $('#div_taxt_error').html(data.message);
                $('.alert-massage').fadeIn();
            } else {
                $('.alert-massage-exist').fadeIn();
            }
        }
    });
});

$('#txtPassword').keypress(function(event) {
    if (event.keyCode === 13) {
        $('#login').trigger('click');
    }
});