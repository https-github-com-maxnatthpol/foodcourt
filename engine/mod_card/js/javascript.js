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

$(document).on('click', '#add_btn', function () {
    var formData = new FormData($('#frm_select_num')[0]);
    $.ajax({
      method: "POST",
      url: "functions.php",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response.status == '1') {;
          document.getElementById("number").value  = response.message;
        }
      },
    });
  
});

$(document).on('click', '#btnSendAdd', function () {
  var formData = new FormData($('#form_add')[0]);
  swal.fire({
    title: "ตรวจสอบข้อมูลก่อนยืนยัน !",
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'ยกเลิก!',
    confirmButtonText: 'ยืนยัน',
    reverseButtons: true

  }).then((result) => {
    if (result.value) {
      $.ajax({
        method: "POST",
        url: "functions.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
          if (data.status == '0') {
            swal.fire("สำเร็จ", "บันทึกเรียบร้อยแล้ว", "success");
            document.getElementById("form_add").reset();
            setTimeout(function () {
              location.reload();
            }, 1000);

          } else if (data.status == 2) {
            swal.fire("ไม่สำเร็จ", "มีรหัสบัตรนี้แล้ว", "warning");
          } else {
            swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
          }
        },
      }).fail(function () {
        swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
      });
    }
  });
});