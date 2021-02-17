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






function chkNumber(ele) {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
  ele.onKeyPress = vchar;
}

$('#card_number').keyup(function () {
  var card_number = $('#card_number').val();

  var strCount = card_number;
  var numStr = strCount.length;

  $.ajax({
    type: "POST",
    url: "functions.php",
    data: {
      _method: 'CHECK_card_number',
      card_number: card_number
    },

    success: function (response) {
      //var content = response.message;
      //console.log(response.status);
      //console.log('numStr : ',numStr);
      //console.log(response.message);
      if (response.status == 1 && card_number != '' && numStr == 15) {
        $("#card_number").attr("style", "border-color: #28a745; border-width: 2px; background-color: #28a74585;");
        $("#card_number_alert").attr("style", "height: 35px !important; font-size: 14px; border-radius: 5px; background-color: #28a745; transition: 0.5s; display:inline-block;");
        document.getElementById("a_card_number").innerHTML = "<i style='color:#fafafa;' class='fa fa-check-circle'></i>  เลขบัตรถูกต้อง";
        document.getElementById('confirm_btn').disabled = false;
        $("#a_card_number").attr("style", "color: #fafafa;");
        document.getElementById("number").innerHTML = response.message[2];

        setTimeout(function () {
          $("#card_number").attr("style", "");
          $("#card_number_alert").attr("style", "transition: 0.5s; display:none;");
        }, 10000);

      } else if (response.status == 0 && numStr == 15) {
        $("#card_number").attr("style", "border-color: #dd4b39; border-width: 2px; background-color: #ff000038;");
        $("#card_number_alert").attr("style", "height: 35px !important; font-size: 14px; border-radius: 5px; background-color: #dd4b39; transition: 0.5s; display:inline-block;");
        document.getElementById("a_card_number").innerHTML = "<i style='color:#fafafa;' class='fa fa-times-circle'></i>  ไม่พบข้อมูล";
        document.getElementById('confirm_btn').disabled = true;
        $("#a_card_number").attr("style", "color: #fafafa;");
        document.getElementById("number").innerHTML = "-";

        setTimeout(function () {
          $("#card_number").attr("style", "height: 35px !important; font-size: 14px; border-radius: 10px;");
          $("#card_number_alert").attr("style", "transition: 0.5s; display:none;");
        }, 10000);

      } else if (numStr < 15) {
        $("#card_number").attr("style", "border-color: #ffc107; border-width: 2px; background-color: #ffc10745;");
        $("#card_number_alert").attr("style", "height: 35px !important; font-size: 14px; border-radius: 5px; background-color: #ffc107; transition: 0.5s; display:inline-block;");
        document.getElementById("a_card_number").innerHTML = "<i style='color:#fafafa;' class='fa fa-exclamation-triangle'></i>  กำหนดไม่ต่ำกว่า 15 ตัวเลข";
        document.getElementById('confirm_btn').disabled = true;
        $("#a_card_number").attr("style", "color: #fafafa;");
        document.getElementById("number").innerHTML = "-";

        setTimeout(function () {
          $("#card_number").attr("style", "height: 35px !important; font-size: 14px; border-radius: 10px;");
          $("#card_number_alert").attr("style", "transition: 0.5s; display:none;");
        }, 10000);

      }
    }

  });

});