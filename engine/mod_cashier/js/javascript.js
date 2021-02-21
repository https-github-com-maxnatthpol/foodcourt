$(document).on('click', '#btnSendฺBuyCard', function () {
  var formData = new FormData($('#form_buy_card')[0]);
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
            document.getElementById("form_buy_card").reset();
            setTimeout(function () {
              location.reload();
            }, 1000);
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


function leftPad(number, targetLength) {
  var output = number + '';
  while (output.length < targetLength) {
    output = '0' + output;
  }
  return output;
}



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
        document.getElementById('btnSendฺBuyCard').disabled = false;
        $("#a_card_number").attr("style", "color: #fafafa;");

        document.getElementById("number").innerHTML = leftPad(response.message[0], 7);
        document.getElementById("amount").innerHTML = response.message[1];
        document.getElementById("Issue_date").innerHTML = response.deta;
        document.getElementById("employee").innerHTML = response.message[3] + " " + response.message[4];
        document.getElementById("status").innerHTML = response.message[5];

        setTimeout(function () {
          $("#card_number").attr("style", "");
          $("#card_number_alert").attr("style", "transition: 0.5s; display:none;");
        }, 10000);

      } else if (response.status == 0 && numStr == 15) {
        $("#card_number").attr("style", "border-color: #dd4b39; border-width: 2px; background-color: #ff000038;");
        $("#card_number_alert").attr("style", "height: 35px !important; font-size: 14px; border-radius: 5px; background-color: #dd4b39; transition: 0.5s; display:inline-block;");
        document.getElementById("a_card_number").innerHTML = "<i style='color:#fafafa;' class='fa fa-times-circle'></i>  ไม่พบข้อมูล";
        document.getElementById('btnSendฺBuyCard').disabled = true;
        $("#a_card_number").attr("style", "color: #fafafa;");
        document.getElementById("number").innerHTML = "-";
        document.getElementById("amount").innerHTML = "-";
        document.getElementById("Issue_date").innerHTML = "-";
        document.getElementById("employee").innerHTML = "-";
        document.getElementById("status").innerHTML = "-";

        setTimeout(function () {
          $("#card_number").attr("style", "height: 35px !important; font-size: 14px; border-radius: 10px;");
          $("#card_number_alert").attr("style", "transition: 0.5s; display:none;");
        }, 10000);

      } else if (numStr < 15) {
        $("#card_number").attr("style", "border-color: #ffc107; border-width: 2px; background-color: #ffc10745;");
        $("#card_number_alert").attr("style", "height: 35px !important; font-size: 14px; border-radius: 5px; background-color: #ffc107; transition: 0.5s; display:inline-block;");
        document.getElementById("a_card_number").innerHTML = "<i style='color:#fafafa;' class='fa fa-exclamation-triangle'></i>  กำหนดไม่ต่ำกว่า 15 ตัวเลข";
        document.getElementById('btnSendฺBuyCard').disabled = true;
        $("#a_card_number").attr("style", "color: #fafafa;");
        document.getElementById("number").innerHTML = "-";
        document.getElementById("amount").innerHTML = "-";
        document.getElementById("Issue_date").innerHTML = "-";
        document.getElementById("employee").innerHTML = "-";
        document.getElementById("status").innerHTML = "-";

        setTimeout(function () {
          $("#card_number").attr("style", "height: 35px !important; font-size: 14px; border-radius: 10px;");
          $("#card_number_alert").attr("style", "transition: 0.5s; display:none;");
        }, 10000);

      }
    }

  });

});

$('#receive_money').keyup(function () {
  var sum_amount_f = document.getElementById("amount_f").value;
  var sum_receive_money = document.getElementById("receive_money").value;

  document.getElementById("change").value = sum_receive_money - sum_amount_f;
});