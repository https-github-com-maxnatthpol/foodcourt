// scores_CE,veterinary_council,partner,lecturer,longitude,latitude,
// keyworde_en,description_en,title_en,address_en,name_en,logo_img,email,email2,detail_en
// keyworde_th,description_th,title_th,address_th,name_th,detail_th

fetch_data_table();

function fetch_data_table() {
    $.ajax({
        url: "select_data.php",
        method: "POST",
        data: {
            form: "select_table_front_manage"
        },
        success: function(data) {
            //      $("#scores_CE").val(data.scores_CE);
            //      $("#veterinary_council").val(data.veterinary_council);
            //      $("#partner").val(data.partner);
            //      $("#lecturer").val(data.lecturer);
            $("#longitude").val(data.latitude);
            $("#latitude").val(data.longitude);
            $("#keyworde_en").val(data.keyworde_en);
            $("#description_en").val(data.description_en);
            $("#title_en").val(data.title_en);
            $("#address_en").val(data.address_en);
            $("#name_en").val(data.name_en);
            $("#name_img_ed").val(data.logo_img);
            $("#name_img_ed2").val(data.logo_img2);
            $("#email").val(data.email);
            //	  $("#email2").val(data.email2);
            $("#detail_th").val(data.detail_th);
            $("#detail_th_show").val(data.detail_th);
            $("#detail_en").val(data.detail_en);
            $("#keyworde_th").val(data.keyworde_th);
            $("#description_th").val(data.description_th);
            $("#title_th").val(data.title_th);
            $("#address_th").val(data.address_th);
            $("#name_th").val(data.name_th);
            //      $("#tax_id").val(data.tax_id);
            $("#telephone").val(data.telephone);
            $("#telephone2").val(data.telephone2);
            $("#random_banner").val(data.random_banner);
            $("#head_title").val(data.head_title);
            $("#head_title_mini").val(data.head_title_mini);
            $("#merchantid").val(data.merchantid);
            $("#google_map_key").val(data.google_map_key);
            //      $("#email_vc").val(data.email_vc);
            //      $("#email_group").val(data.email_group);

            if (data.random_banner == "1") {
                document.getElementById("random_banner").checked = true;
            }

            if (data.logo_img == "") {
                image = "";
            } else {
                image = "data-default-file='" + data.logo_img + "'";
            }

            $("#div_logo").html(
                '<input onchange="chk_pic()" accept="image/*" type="file" id="logo_img" class="dropify" name="logo_img" ' +
                image +
                " />"
            );

            if (data.logo_img2 == "") {
                image = "";
            } else {
                image = "data-default-file='" + data.logo_img2 + "'";
            }

            $("#div_logo2").html(
                '<input onchange="chk_pic2()" accept="image/*" type="file" id="logo_img2" class="dropify" name="logo_img2" ' +
                image +
                " />"
            );

            $(".dropify").dropify({
                messages: {
                    //          default: "Drag and drop a file here or click",
                    default: "<span style='font-size: 16px; font-family: Sarabun, sans-serif;'>ลากและวางไฟล์ที่นี่หรือคลิก</span>",
                    //          replace: "Drag and drop or click to replace",
                    replace: "<span style='font-size: 14px; font-family: Sarabun, sans-serif;'>ลากและวางหรือคลิกเพื่อแทนที่</span>",
                    //          remove: "Remove",
                    remove: "<span style='font-size: 13px; font-family: Sarabun, sans-serif;'>ลบออก</span>",
                    error: "อ๊ะมีบางอย่างผิดปกติเกิดขึ้น"
                        //		  error: "Ooops, something wrong happended."	
                },
                tpl: {
                    message: '<div class="dropify-message" ><span class="file-icon" /> <p style="text-align: center;">{{ default }}</p></div>'
                }
            });

            // Used events
            var drEvent = $("#input-file-events").dropify();

            drEvent.on("dropify.beforeClear", function(event, element) {
                return confirm(
                    'Do you really want to delete "' + element.file.name + '" ?'
                );
            });

            drEvent.on("dropify.afterClear", function(event, element) {
                alert("File deleted");
            });

            drEvent.on("dropify.errors", function(event, element) {
                console.log("Has Errors");
            });

            var drDestroy = $("#input-file-to-destroy").dropify();
            drDestroy = drDestroy.data("dropify");
            $("#toggleDropify").on("click", function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            });

            disabled_btn_add();
        }
    });
}

$(document).on("change", "#email", function() {
    var emailFilter = /^.+@.+\..{2,3}$/;
    var str = $("#email").val();
    if (str.length > 1) {
        if (!emailFilter.test(str)) {
            var element = document.getElementById("email");
            element.classList.remove("email");
            element.classList.add("email_warning");

            $("#text_success_emill").hide();
            $("#text_warning_emill").show();
            $("#email").attr("style", "border-color: #fb3a3a;");
            document.getElementById("btnSendAdd").disabled = true;
        } else {
            var element = document.getElementById("email");
            element.classList.remove("email");
            element.classList.add("email_success");

            $("#text_success_emill").show();
            $("#text_warning_emill").hide();
            $("#email").attr("style", "border-color: #4bbd03;");
            document.getElementById("btnSendAdd").disabled = false;
        }
    } else {
        var element = document.getElementById("email");
        element.classList.remove("email_success");
        element.classList.remove("email_warning");

        $("#text_success_emill").hide();
        $("#text_warning_emill").hide();
        $("#email").attr("style", "");
        document.getElementById("btnSendAdd").disabled = false;
    }
});


//$(document).on("change", "#email2", function() {
//  var emailFilter = /^.+@.+\..{2,3}$/;
//  var str = $("#email2").val();
//  if (str.length > 1) {
//    if (!emailFilter.test(str)) {
//      var element = document.getElementById("email2");
//      element.classList.remove("email");
//      element.classList.add("email_warning");
//
//      $("#text_success_emill2").hide();
//      $("#text_warning_emill2").show();
//	  $("#email2").attr("style" , "border-color: #fb3a3a;");	
//      document.getElementById("btnSendAdd").disabled = true;
//    } else {
//      var element = document.getElementById("email2");
//      element.classList.remove("email");
//      element.classList.add("email_success");
//
//      $("#text_success_emill2").show();
//      $("#text_warning_emill2").hide();
//	  $("#email2").attr("style" , "border-color: #4bbd03;");	
//      document.getElementById("btnSendAdd").disabled = false;
//    }
//  } else {
//    var element = document.getElementById("email2");
//    element.classList.remove("email_success");
//    element.classList.remove("email_warning");
//
//    $("#text_success_emill2").hide();
//    $("#text_warning_emill2").hide();
//	$("#email2").attr("style" , "");  
//    document.getElementById("btnSendAdd").disabled = false;
//  }
//});


//$(document).on("change", "#email_vc", function() {
//  var emailFilter = /^.+@.+\..{2,3}$/;
//  var str = $("#email_vc").val();
//  if (str.length > 1) {
//    if (!emailFilter.test(str)) {
//      var element = document.getElementById("email_vc");
//      element.classList.remove("email");
//      element.classList.add("email_warning");
//
//      $("#text_success_emill_vc").hide();
//      $("#text_warning_emill_vc").show();
//      document.getElementById("btnSendAdd").disabled = true;
//    } else {
//      var element = document.getElementById("email_vc");
//      element.classList.remove("email");
//      element.classList.add("email_success");
//
//      $("#text_success_emill_vc").show();
//      $("#text_warning_emill_vc").hide();
//      document.getElementById("btnSendAdd").disabled = false;
//    }
//  } else {
//    var element = document.getElementById("email_vc");
//    element.classList.remove("email_success");
//    element.classList.remove("email_warning");
//
//    $("#text_success_emill_vc").hide();
//    $("#text_warning_emill_vc").hide();
//    document.getElementById("btnSendAdd").disabled = false;
//  }
//});


$(document).on("click", "#btnSendAdd", function() {
    var formData = new FormData($("#form_add")[0]);
    swal
        .fire({
            title: "ยืนยัน?",
            text: "ยืนยันการบันทึกหรือไม่?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "ยกเลิก!",
            confirmButtonText: "ยืนยัน",
            reverseButtons: true,
            showLoaderOnConfirm: true
        })
        .then(result => {
            if (result.value) {
                $.ajax({
                    method: "POST",
                    url: "functions.php",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.status == "0") {
                            //              swal.fire("สำเร็จ", "บันทึกเรียบร้อยแล้ว", "success");
                            //              fetch_data_table();
                            ////			  location.reload();

                            swal.fire("สำเร็จ", "บันทึกเรียบร้อยแล้ว", "success").then(function() {
                                fetch_data_table();
                                location.reload();
                            });

                        } else {
                            swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
                        }
                    }
                }).fail(function(data) {
                    // คือไม่สำรเ็จ
                    swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
                });
            }
        });
});

function disabled_btn_add() {
    var name_th = $("#name_th").val();

    if (name_th == "") {
        document.getElementById("btnSendAdd").disabled = true;
    } else {
        document.getElementById("btnSendAdd").disabled = false;
    }
}

function check_num(ele) {
    var vchar = String.fromCharCode(event.keyCode);
    if (vchar < "0" || vchar > "9") return false;
    ele.onKeyPress = vchar;
}

function ckeck_munbermax(id_input) {
    var id_input_rate = $("#" + id_input).val();
    if (id_input_rate > 100) {
        $("#" + id_input).val("");
        $("#" + id_input).focus();
    }
}

function isNumber(ele) {
    var vchar = String.fromCharCode(event.keyCode);
    if ((vchar < "0" || vchar > "9") && vchar != ".") return false;
    ele.onKeyPress = vchar;
}