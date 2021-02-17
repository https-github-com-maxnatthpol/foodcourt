$(document).on('click', '#btnSendAddCard', function () {
  var formData = new FormData($('#form_add_card')[0]);
  swal.fire({
    title: "ยืนยัน?",
    text: "ยืนยันการบันทึกหรือไม่?",
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
            document.getElementById("form_add_card").reset();
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