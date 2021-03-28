$(document).on("click", "#btn_search", function() {
  var button_update = $("#per_button_edit").val();
  var button_delete = $("#per_button_del").val();
  var button_create = $("#per_button_open").val();
  var button_view = $("#per_input_read").val();
    
  var id_category_s = $("#id_category_s").val();
  var search_key = $("#search_key").val();    
    
  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "select_table_front_manage",
      button_update: button_update,
      button_delete: button_delete,
      button_create: button_create,
      button_view: button_view,
      id_category_s: id_category_s,
      search_key: search_key
    },
    success: function(data) {
      $("#div_table_list").html(data);
      $("#table_front_manage").DataTable({
        scrollY: true,
        scrollCollapse: true,
        scrollX: true,
        order: [[1, "asc"]],
                      language: {
                sEmptyTable: "ไม่มีข้อมูลในตาราง",
				sInfo: "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
				sInfoEmpty: "แสดง 0 ถึง 0 จาก 0 แถว",
				sInfoFiltered: "(กรองข้อมูล _MAX_ ทุกแถว)",
				sInfoPostFix: "",
				sInfoThousands: ",",
				sLengthMenu: "แสดง _MENU_ แถว",
				sLoadingRecords: "กำลังโหลดข้อมูล...",
				sProcessing: "กำลังดำเนินการ...",
				sSearch: "ค้นหา: ",
				sZeroRecords: "ไม่พบข้อมูล",
				oPaginate: {
				sFirst: "หน้าแรก",
				sPrevious: "ก่อนหน้า",
				sNext: "ถัดไป",
				sLast: "หน้าสุดท้าย",	
				},
				oAria: {
				sSortAscending: ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
				sSortDescending: ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย",
				},
            }
      });
    }
  });
swal.fire("ค้นหาสำเร็จ", "", "success");
});

fetch_data_table();
function fetch_data_table() {
  var button_update = $("#per_button_edit").val();
  var button_delete = $("#per_button_del").val();
  var button_create = $("#per_button_open").val();
  var button_view = $("#per_input_read").val();
  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "select_table_front_manage",
      button_update: button_update,
      button_delete: button_delete,
      button_create: button_create,
      button_view: button_view
    },
    success: function(data) {
      $("#div_table_list").html(data);
      $("#table_front_manage").DataTable({
        scrollY: true,
        scrollCollapse: true,
        scrollX: true,
        order: [[1, "asc"]],
                      language: {
                sEmptyTable: "ไม่มีข้อมูลในตาราง",
				sInfo: "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
				sInfoEmpty: "แสดง 0 ถึง 0 จาก 0 แถว",
				sInfoFiltered: "(กรองข้อมูล _MAX_ ทุกแถว)",
				sInfoPostFix: "",
				sInfoThousands: ",",
				sLengthMenu: "แสดง _MENU_ แถว",
				sLoadingRecords: "กำลังโหลดข้อมูล...",
				sProcessing: "กำลังดำเนินการ...",
				sSearch: "ค้นหา: ",
				sZeroRecords: "ไม่พบข้อมูล",
				oPaginate: {
				sFirst: "หน้าแรก",
				sPrevious: "ก่อนหน้า",
				sNext: "ถัดไป",
				sLast: "หน้าสุดท้าย",	
				},
				oAria: {
				sSortAscending: ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
				sSortDescending: ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย",
				},
            }
      });
    }
  });
}

$(document).on("click", ".edit_btn", function() {
  form = "select_div_edit_front_manage";
  id = $(this).attr("data-id");
  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: form,
      id: id
    },
    success: function(data) {
      $("#div_edit").html(data);
    }
  });
});

$(document).on("click", ".address_btn", function() {
  form = "select_div_address";
  id = $(this).attr("data-id");
  name = $(this).attr("data1-id");
  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: form,
      id: id,
      name: name
    },
    success: function(data) {
      $("#div_address").html(data);
    }
  });
});

$(document).on("click", ".print_btn", function() {
  form = "select_div_print";
  id = $(this).attr("data-id");
  name = $(this).attr("data1-id");
  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: form,
      id: id,
      name: name
    },
    success: function(data) {
      $("#div_print").html(data);
    }
  });
});

$(document).on("click", ".percent_btn", function() {
  form = "select_div_percent";
  id = $(this).attr("data-id");
  name = $(this).attr("data1-id");
  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: form,
      id: id,
      name: name
    },
    success: function(data) {
      $("#div_percent").html(data);
    }
  });
});

$(document).on("click", ".delete_btn", function() {
  id = $(this).attr("data-id");
  form = "del_one";
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน",
      reverseButtons: true
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          url: "functions.php",
          method: "POST",
          data: {
            form: form,
            id: id
          },
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ลบเรียบร้อยแล้ว", "success");
              fetch_data_table();
              $(".num_").html("");
              $("#MultiDelete").prop("disabled", true);
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

  $(document).on('click', '.checkbox_remove', function(){
    var i =0; 
    if($(this).is(":checked")) {
      $(this).parents('.show-tr').addClass("remove-item");
      $('#MultiDelete').prop('disabled',false);
      $('#confirm_cus').prop('disabled',false);
      $('#un_confirm_cus').prop('disabled',false);
      $('.remove-item').each(function() {
        i++;       
      });
      $('.num_').html('[ '+i+' ]');
    }else{
      $(this).parents('.show-tr').removeClass("remove-item");
      $('.remove-item').each(function() {
        i++;       
      });
      $('.num_').html('[ '+i+' ]');
      if($('input.checkbox_remove').is(':checked')){
      }else{
        $('#MultiDelete').prop('disabled',true);
        $('#confirm_cus').prop('disabled',true);
        $('#un_confirm_cus').prop('disabled',true);
      }
    }
  });

function ClickCheckAll(vol){
    var i=1;
    for(i=1;i<=document.frmMain.hdnCount.value;i++){
      id_Chk = document.getElementById("Chk"+i);
      if (id_Chk) {
      $('.num_').html('[ '+i+' ]');
      if(vol.checked == true){
        eval("document.frmMain.Chk"+i+".checked=true");
        $(".show-tr").addClass("remove-item"); 
        $('#MultiDelete').prop('disabled',false);
        $('#confirm_cus').prop('disabled',false);
        $('#un_confirm_cus').prop('disabled',false);
        
      }else{
        $('.num_').html('');
        eval("document.frmMain.Chk"+i+".checked=false");
        $('#MultiDelete').prop('disabled',true);
        $('#confirm_cus').prop('disabled',true);
        $('#un_confirm_cus').prop('disabled',true);
        $(".show-tr").removeClass("remove-item");
      }
      }
    }
  }

$(document).on("click", "#btnSendAdd", function() {
  var name = $("#name").val();
  const isValidid_cade = id_cade.checkValidity();
  const isValidEmail = e_mail.checkValidity();
  const isValidtelaphone = telaphone.checkValidity();
  var id_category = $("#id_category").val();    

  if (name == "" || !isValidid_cade || !isValidEmail || !isValidtelaphone || id_category == "0") {
    if (name == "") {
      $("#name").attr("style", "border-color: red; border-width: 1px;");
    } else {
      $("#name").attr("style", "");
    }

    if (isValidid_cade) {
      $("#id_cade").attr("style", "");
    } else {
      $("#id_cade").attr("style", "border-color: red; border-width: 1px;");
    }

    /*if ( isValidlicense_number ) {
   $("#license_number").attr("style" , "");
  
} else {
  $("#license_number").attr("style" , "border-color: red; border-width: 1px;");
  
}*/

    if (isValidEmail) {
      $("#e_mail").attr("style", "");
    } else {
      $("#e_mail").attr("style", "border-color: red; border-width: 1px;");
    }

    if (isValidtelaphone) {
        $("#telaphone").attr("style" , "");
  
    } else {
        $("#telaphone").attr("style" , "border-color: red; border-width: 1px;");
  
    }
      
    if (id_category) {
      $("#id_category").attr("style", "");
    } else {
      $("#id_category").attr("style", "border: 1px solid red;");
    }  
      
    swal.fire("คำเตือน", "กรุณากรอกข้อมูลให้ถูกต้องและครบถ้วน", "warning");
    return false;
      
  } else {
    $("#name").attr("style", "");
    $("#id_cade").attr("style", "");
    $("#e_mail").attr("style", "");
    $("#telaphone").attr("style", "");
    $("#id_category").attr("style", "");  
  }

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
      reverseButtons: true
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
              swal.fire("สำเร็จ", "บันทึกเรียบร้อยแล้ว", "success");
              fetch_data_table();
              document.getElementById("form_add").reset();
              var tagButton = document.getElementsByClassName(
                "dropify-clear"
              )[0];
              tagButton.click();
              disabled_btn_add();
              $("#modal_add").modal("toggle");
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

$(document).on("click", "#btnSendEdit", function() {
  var name = $("#name_edit").val();
  const isValidid_cade = id_cade_edit.checkValidity();
  const isValidEmail = e_mail_edit.checkValidity();
  const isValidtelaphone = telaphone_edit.checkValidity();
  var id_category = $("#id_category_edit").val();    

  if (name == "" || !isValidid_cade || !isValidEmail || !isValidtelaphone || id_category == "0") {
    if (name == "") {
      $("#name").attr("style", "border-color: red; border-width: 1px;");
    } else {
      $("#name").attr("style", "");
    }

    if (isValidid_cade) {
      $("#id_cade").attr("style", "");
    } else {
      $("#id_cade").attr("style", "border-color: red; border-width: 1px;");
    }

    /*if ( isValidlicense_number ) {
   $("#license_number").attr("style" , "");
  
} else {
  $("#license_number").attr("style" , "border-color: red; border-width: 1px;");
  
}*/

    if (isValidEmail) {
      $("#e_mail").attr("style", "");
    } else {
      $("#e_mail").attr("style", "border-color: red; border-width: 1px;");
    }

    if (isValidtelaphone) {
        $("#telaphone").attr("style" , "");
  
    } else {
        $("#telaphone").attr("style" , "border-color: red; border-width: 1px;");
  
    }
      
    if (id_category) {
      $("#id_category").attr("style", "");
    } else {
      $("#id_category").attr("style", "border: 1px solid red;");
    }  
      
    swal.fire("คำเตือน", "กรุณากรอกข้อมูลให้ถูกต้องและครบถ้วน", "warning");
    return false;
      
  } else {
    $("#name_edit").attr("style", "");
    $("#id_cade_edit").attr("style", "");
    $("#e_mail_edit").attr("style", "");
    $("#telaphone_edit").attr("style", "");
    $("#id_category_edit").attr("style", "");  
  }
  var formData = new FormData($("#form_edit")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการแก้ไขหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน",
      reverseButtons: true
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
              swal.fire("สำเร็จ", "บันทึกการแก้ไขเรียบร้อยแล้ว", "success");
              fetch_data_table();
              document.getElementById("form_edit").reset();
              $("#modal_edit").modal("toggle");
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
  var account_name_th = $("#account_name_th").val();
  var name_th = $("#name_th").val();
  var account_number_th = $("#account_number_th").val();

  if (account_name_th == "" || name_th == "" || account_number_th == "") {
    document.getElementById("btnSendAdd").disabled = true;
  } else {
    document.getElementById("btnSendAdd").disabled = false;
  }
}

function disabled_btn_edit() {
  var account_name_th = $("#account_name_th_edit").val();
  var name_th = $("#name_th_edit").val();
  var account_number_th = $("#account_number_th_edit").val();

  if (account_name_th == "" || name_th == "" || account_number_th == "") {
    document.getElementById("btnSendEdit").disabled = true;
  } else {
    document.getElementById("btnSendEdit").disabled = false;
  }
}

$(document).on("click", "#MultiDelete", function() {
  var formData = new FormData($("#frmMain")[0]);
  form = 'Multi_del';
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน",
      reverseButtons: true
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php?form="+form,
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ลบรายการที่เลือกเรียบร้อยแล้ว", "success");
              fetch_data_table();
              document.getElementById("form_add").reset();
              $(".num_").html("");
              $("#MultiDelete").prop("disabled", true);
              $("#confirm_cus").prop("disabled", true);
              $("#un_confirm_cus").prop("disabled", true);
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

$(document).on("click", "#confirm_cus", function() {
  var formData = new FormData($("#frmMain")[0]);
  form = 'confirm_cus';
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน",
      reverseButtons: true
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php?form="+form,
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ยืนยันรายการที่เลือกเรียบร้อยแล้ว", "success");
              fetch_data_table();
              document.getElementById("form_add").reset();
              $(".num_").html("");
              $("#MultiDelete").prop("disabled", true);
              $("#confirm_cus").prop("disabled", true);
              $("#un_confirm_cus").prop("disabled", true);
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

$(document).on("click", "#un_confirm_cus", function() {
  var formData = new FormData($("#frmMain")[0]);
  form = 'un_confirm_cus';
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการลบหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน",
      reverseButtons: true
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php?form="+form,
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "ยกเลิกรายการที่เลือกเรียบร้อยแล้ว", "success");
              fetch_data_table();
              document.getElementById("form_add").reset();
              $(".num_").html("");
              $("#MultiDelete").prop("disabled", true);
              $("#confirm_cus").prop("disabled", true);
              $("#un_confirm_cus").prop("disabled", true);
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

$("#modal_edit").on("hidden.bs.modal", function() {
  $(this).data("bs.modal", null);
  $("#name_edit").attr("style", "");
  $("#surname_edit").attr("style", "");
  $("#id_cade_edit").attr("style", "");
  $("#license_number_edit").attr("style", "");
  $("#e_mail_edit").attr("style", "");
  $("#telaphone_edit").attr("style", "");
});

$("#modal_add").on("hidden.bs.modal", function() {
  $(this).data("bs.modal", null);
  $("#name").attr("style", "");
  $("#surname").attr("style", "");
  $("#id_cade").attr("style", "");
  $("#license_number").attr("style", "");
  $("#e_mail").attr("style", "");
  $("#telaphone").attr("style", "");
});

$("#modal_address").on("hidden.bs.modal", function() {
  $(this).data("bs.modal", null);
});

function check_format(data) {
  var data_val = $("#" + data).val();

  if (data == "id_cade") {
    if (data_val.length == 1) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 6) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 10) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 12) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 14) {
      $("#" + data).val(data_val + "-");
    }
  } else if (data == "license_number") {
    if (data_val.length == 2) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 7) {
      $("#" + data).val(data_val + "/");
    }
  } else if (data == "telaphone") {
    if (data_val.length == 3) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 8) {
      $("#" + data).val(data_val + "-");
    }
  } else if (data == "id_cade_edit") {
    if (data_val.length == 1) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 6) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 10) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 12) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 14) {
      $("#" + data).val(data_val + "-");
    }
  } else if (data == "license_number_edit") {
    if (data_val.length == 2) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 7) {
      $("#" + data).val(data_val + "/");
    }
  } else if (data == "telaphone_edit") {
    if (data_val.length == 3) {
      $("#" + data).val(data_val + "-");
    } else if (data_val.length == 8) {
      $("#" + data).val(data_val + "-");
    }
  }
}

$(document).on("click", "#btnSendaddress", function() {
  var formData = new FormData($("#form_address")[0]);
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
      reverseButtons: true
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
              swal.fire("สำเร็จ", "บันทึกเรียบร้อยแล้ว", "success");
              document.getElementById("form_address").reset();
              $("#modal_address").modal("toggle");
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

$(document).on("click", "#btnSendprint", function() {
  var formData = new FormData($("#form_print")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการบันทึกการปริ้นหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน",
      reverseButtons: true
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
              swal.fire("สำเร็จ", "บันทึกเรียบร้อยแล้ว", "success");
              document.getElementById("form_print").reset();
              $("#modal_print").modal("toggle");
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


$(document).on("click", "#btnSendpercent", function() {
  var formData = new FormData($("#form_percent")[0]);
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการบันทึกการแบ่งเปอร์เซ็นต์หรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน",
      reverseButtons: true
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
              swal.fire("สำเร็จ", "บันทึกเรียบร้อยแล้ว", "success");
              document.getElementById("form_percent").reset();
              $("#modal_percent").modal("toggle");
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


function check_email(val) {
  if (val == "add") {
    id_cus = "";
    var e_mail = $("#e_mail").val();
  } else {
    id_cus = val;
    var e_mail = $("#e_mail_edit").val();
  }

  $.ajax({
    url: "functions.php",
    method: "POST",
    data: {
      e_mail: e_mail,
      form: "check_email",
      id_cus: id_cus
    },
    success: function(data) {
      if (data.status == "0") {
        if (val == "add") {
          $("#e_mail").attr("style", "");
          $("#warning_email").hide();
        } else {
          $("#e_mail_edit").attr("style", "");
          $("#warning_email_edit").hide();
        }
      } else {
        if (val == "add") {
          $("#warning_email").show();
          $("#e_mail").attr("style", "border-color: red; border-width: 1px;");
        } else {
          $("#warning_email_edit").show();
          $("#e_mail_edit").attr(
            "style",
            "border-color: red; border-width: 1px;"
          );
        }
      }
    }
  }).fail(function(data) {
    // คือไม่สำรเ็จ
    swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
  });
}

$(document).on("click", ".approval_btn_product", function() {
  id = $(this).attr("data-id");
  data_val = $(this).attr("data-val");
  form = "approval_one_product";
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการเปลี่ยนสถานะ ร้านค้า หรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน",
	  reverseButtons: true
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          url: "functions.php",
          method: "POST",
          data: {
            form: form,
            id: id,
            data_val:data_val
          },
          success: function(data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "เปลี่ยนสถานะ ร้านค้า เรียบร้อยแล้ว", "success");
              fetch_data_table();
              
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
