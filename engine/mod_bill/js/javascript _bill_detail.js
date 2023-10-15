fetch_data_table();
function fetch_data_table() {
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const mod_bill = urlParams.get("mod_bill");

  $.ajax({
    url: "select_data_bill_detail.php",
    method: "POST",
    data: {
      form: "select_table_front_manage",
      id_mod_bill: mod_bill,
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

fetch_data_table_mamu_1();
function fetch_data_table_mamu_1() {
  $.ajax({
    url: "select_data_bill_detail.php",
    method: "POST",
    data: {
      form: "fetch_data_table_mamu_1",
    },
    success: function (data) {
      $("#fetch_data_table_mamu_1").html(data);
      $("#table_fetch_data_table_mamu_1").DataTable({
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

fetch_data_table_mamu_2();
function fetch_data_table_mamu_2() {
  $.ajax({
    url: "select_data_bill_detail.php",
    method: "POST",
    data: {
      form: "fetch_data_table_mamu_2",
    },
    success: function (data) {
      $("#fetch_data_table_mamu_2").html(data);
      $("#table_fetch_data_table_mamu_2").DataTable({
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

fetch_data_table_mamu_5();
function fetch_data_table_mamu_5() {
  $.ajax({
    url: "select_data_bill_detail.php",
    method: "POST",
    data: {
      form: "fetch_data_table_mamu_5",
    },
    success: function (data) {
      $("#fetch_data_table_mamu_5").html(data);
      $("#table_fetch_data_table_mamu_5").DataTable({
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

select_bill_detail();
function select_bill_detail() {
  form = "div_select_bill_detail";
  //get url
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const mod_bill = urlParams.get("mod_bill");
  id = mod_bill;
  $.ajax({
    url: "select_data_bill_detail.php",
    method: "POST",
    data: {
      form: form,
      id: id,
    },
    success: function (data) {
      $("#div_select_bill_detail").html(data);
    },
  });
}

$(document).on("click", "#btnSendAdd", function () {
  var name = $("#name").val();
  var price = $("#price").val();
  var mod_stock_type = $("#mod_stock_type").val();

  if (name == "" || price == "" || mod_stock_type == 0) {
    if (name == "") {
      $("#name").attr("style", "border-color: red; border-width: 1px;");
    } else {
      $("#name").attr("style", "");
    }
    if (price == "") {
      $("#price").attr("style", "border-color: red; border-width: 1px;");
    } else {
      $("#price").attr("style", "");
    }
    if (mod_stock_type == "") {
      $("#mod_stock_type").attr("style", "color: red; border-width: 1px;");
    } else {
      $("#mod_stock_type").attr("style", "");
    }

    swal.fire("คำเตือน", "กรุณากรอกข้อมูลให้ถูกต้องและครบถ้วน", "warning");
    return false;
  } else {
    $("#name").attr("style", "");
    $("#price").attr("style", "");
    $("#mod_stock_type").attr("style", "");
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
          url: "functions_bill_detail.php",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function (data) {
            if (data.status == "0") {
              swal.fire("สำเร็จ", "บันทึกเรียบร้อยแล้ว", "success");
              document.getElementById("form_add").reset();
              fetch_data_table_mamu_1();
              fetch_data_table_mamu_2();
              fetch_data_table_mamu_5();
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

function SendManu(data) {
  var formData = new FormData();
  //get url
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const mod_bill = urlParams.get("mod_bill");
  formData.append("form", "SendManu");
  formData.append("id_menu", data);
  formData.append("mod_bill", mod_bill);
  $.ajax({
    method: "POST",
    url: "functions_bill_detail.php",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      if (data.status == "0") {
        swal.fire("สำเร็จ", "เพิ่มรายการเรียบร้อยแล้ว", "success");
        fetch_data_table();
        select_bill_detail();
      } else {
        swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
      }
    },
  }).fail(function (data) {
    swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
  });
}

function delbilldetail(data) {
  var formData = new FormData();
  formData.append("form", "delbilldetail");
  formData.append("id_bill_detail", data);

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
        url: "functions_bill_detail.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
          if (data.status == "0") {
            swal.fire("สำเร็จ", "ลบรายการที่เลือกเรียบร้อยแล้ว", "success");
            fetch_data_table();
            select_bill_detail();
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
}