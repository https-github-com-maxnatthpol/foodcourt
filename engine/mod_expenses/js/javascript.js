$(document).on("click", "#btnSendadd_type1", function () {
  var date_action = $("#date_action").val();
  var price = $("#price").val();
  var quantity = $("#quantity").val();
  var mod_menu = $("#mod_menu").val();

  if (date_action == "" || quantity == "" || price == "" || mod_menu == 0) {
    if (date_action == "") {
      $("#date_action").attr("style", "border-color: red; border-width: 1px;");
    } else {
      $("#date_action").attr("style", "");
    }
    if (quantity == "") {
      $("#quantity").attr("style", "border-color: red; border-width: 1px;");
    } else {
      $("#quantity").attr("style", "");
    }
    if (mod_menu == "0") {
      $("#mod_menu").attr("style", "color: red; border-width: 1px;");
    } else {
      $("#mod_menu").attr("style", "");
    }
    if (price == "") {
      $("#price").attr("style", "color: red; border-width: 1px;");
    } else {
      $("#price").attr("style", "");
    }

    swal.fire("คำเตือน", "กรุณากรอกข้อมูลให้ถูกต้องและครบถ้วน", "warning");
    return false;
  } else {
    $("#name").attr("style", "");
  }

  var formData = new FormData($("#form_add_type1")[0]);
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
              document.getElementById("form_add_type1").reset();
              fetch_data_table();
            } else {
              console.log(data.message);
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          },
        }).fail(function (data) {
          // คือไม่สำรเ็จ
          console.log(data.message);
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });
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
      button_view: button_view,
    },
    success: function (data) {
      $("#div_table").html(data);
      $("#table_front_manage").DataTable({
        scrollY: true,
        scrollCollapse: true,
        scrollX: true,
        searching: true,
        lengthChange: false,
        pageLength: 5,
        order: [[0, "asc"]],
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