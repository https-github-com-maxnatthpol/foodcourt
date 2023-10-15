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
      button_view: button_view,
    },
    success: function (data) {
      $("#div_table_list").html(data);
      $("#table_front_manage").DataTable({
        scrollY: true,
        scrollCollapse: true,
        scrollX: true,
        searching: false,
        lengthChange: false,
        bPaginate: false,
        pageLength: 4,
        ordering: false,
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
        },
      });
    },
  });
}

$(document).on("click", ".edit_btn", function () {
  form = "select_div_edit_front_manage";
  id = $(this).attr("data-id");
  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: form,
      id: id,
    },
    success: function (data) {
      $("#div_edit").html(data);
    },
  });
});

$(document).on("click", ".checkbox_remove", function () {
  var i = 0;
  if ($(this).is(":checked")) {
    $(this).parents(".show-tr").addClass("remove-item");
    $("#MultiDelete").prop("disabled", false);
    $("#confirm_cus").prop("disabled", false);
    $("#un_confirm_cus").prop("disabled", false);
    $(".remove-item").each(function () {
      i++;
    });
    $(".num_").html("[ " + i + " ]");
  } else {
    $(this).parents(".show-tr").removeClass("remove-item");
    $(".remove-item").each(function () {
      i++;
    });
    $(".num_").html("[ " + i + " ]");
    if ($("input.checkbox_remove").is(":checked")) {
    } else {
      $("#MultiDelete").prop("disabled", true);
      $("#confirm_cus").prop("disabled", true);
      $("#un_confirm_cus").prop("disabled", true);
    }
  }
});

$(document).on("click", "#btnSendAdd", function () {
  var name = $("#name").val();

  if (name == "") {
    if (name == "") {
      $("#name").attr("style", "border-color: red; border-width: 1px;");
    } else {
      $("#name").attr("style", "");
    }

    swal.fire("คำเตือน", "กรุณากรอกข้อมูลให้ถูกต้องและครบถ้วน", "warning");
    return false;
  } else {
    $("#name").attr("style", "");
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
      reverseButtons: true,
    })
    .then((result) => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function (data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "บันทึกเรียบร้อยแล้ว", "success");
              document.getElementById("form_add").reset();
              fetch_data_table();
              $("#modal_add").modal("toggle");
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          },
        }).fail(function (data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", "#btnSendEdit", function () {
  var name_edit = $("#name_edit").val();

  if (name_edit == "") {
    if (name_edit == "") {
      $("#name_edit").attr("style", "border-color: red; border-width: 1px;");
    } else {
      $("#name_edit").attr("style", "");
    }

    swal.fire("คำเตือน", "กรุณากรอกข้อมูลให้ถูกต้องและครบถ้วน", "warning");
    return false;
  } else {
    $("#name_edit").attr("style", "");
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
      reverseButtons: true,
    })
    .then((result) => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function (data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "บันทึกการแก้ไขเรียบร้อยแล้ว", "success");
              fetch_data_table();
              document.getElementById("form_edit").reset();
              $("#modal_edit").modal("toggle");
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          },
        }).fail(function (data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});

$(document).on("click", "#MultiDelete", function () {
  var formData = new FormData($("#frmMain")[0]);
  form = "Multi_del";
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
    })
    .then((result) => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php?form=" + form,
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function (data) {
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
          },
        }).fail(function (data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
});
