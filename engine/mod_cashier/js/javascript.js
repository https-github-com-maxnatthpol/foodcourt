//function -------------------------------------------
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

//btnSend------------------------------------
$(document).on('click', '#btnSendฺBuyCard', function () {
  var formData = new FormData($('#form_buy_card')[0]);
  var card_number = document.getElementById("card_number").value;
  var sum_amount_f = document.getElementById("amount_f").value;
  var sum_receive_money = document.getElementById("receive_money").value;
  if (card_number == "") {
    document.getElementById("card_number").focus();
    Swal.fire({
      icon: 'warning',
      title: 'กรุณากรอก รหัสบัตร',
      showConfirmButton: true,
      timer: 2000
    })
    
  } else if (sum_amount_f == "") {
    document.getElementById("amount_f").focus();
    Swal.fire({
      icon: 'warning',
      title: 'กรุณากรอก จำนวนเงิน',
      showConfirmButton: true,
      timer: 2000
    })
  } else if (sum_receive_money == "") {
    document.getElementById("receive_money").focus();
    Swal.fire({
      icon: 'warning',
      title: 'กรุณากรอก เงินที่ได้รับ',
      showConfirmButton: true,
      timer: 2000
    })
  } else if (parseInt(sum_receive_money, 11) < parseInt(sum_amount_f, 11)) {
    document.getElementById("receive_money").focus();
    Swal.fire({
      icon: 'error',
      title: 'เงินที่ได้รับต้องไม่น้อยกว่าจำนวนเงิน',
      showConfirmButton: true,
      timer: 2000
    })
  } else {
    swal.fire({
      title: "ตรวจสอบข้อมูลก่อนยืนยัน !",
      html: `
    <style>
      table.center {
        margin-left: auto; 
        margin-right: auto;
        width:60%;
      }
      th, td {
        padding: 5px;
      }
    </style>
    <table id="table" class="center" >
        <tbody>
            <tr>
                <td style="text-align: left">จำนวนเงิน:</td>
                <td style="text-align: right">` + sum_amount_f + ` บาท</td>
            </tr>    
            <tr>
                <td style="text-align: left">เงินที่ได้รับ:</td>
                <td style="text-align: right">` + sum_receive_money + ` บาท</td>
            </tr>    
            <tr>
                <td style="text-align: left"><h1 style="color: red;">เงินทอน:</h1></td>
                <td style="text-align: right"><h1 style="color: red;">` + (sum_receive_money - sum_amount_f) + ` บาท</h1></td>
            </tr>                 
        </tbody>
        </table>`,
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
              Swal.fire({
                icon: 'success',
                title: 'บันทึกเรียบร้อยแล้ว',
                showConfirmButton: false,
                timer: 1000
              })
              document.getElementById("form_buy_card").reset();
              setTimeout(function () {
                location.reload();
              }, 1000);

              //.print
              $.ajax({
                method: "POST",
                url: document.getElementById("PRINT_HOST").value + "functions.php?ref="+data.ref+"&number="+data.number,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
              });

            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          },
        }).fail(function () {
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
        });
      }
    });
  }
});

$(document).on('click', '#btnSendReturnCard', function () {
  var formData = new FormData($('#form_return_card')[0]);
  var amount_r = document.getElementById("amount_r").value;
  var card_number_r = document.getElementById("card_number_r").value;
  if (card_number_r == "") {
    document.getElementById("card_number_r").focus();
    Swal.fire({
      icon: 'warning',
      title: 'กรุณากรอก รหัสบัตร',
      showConfirmButton: true,
      timer: 2000
    })
  } else if (amount_r <= 0) {
    Swal.fire({
      icon: 'warning',
      title: 'ไม่มีจำนวนเงินในบัตร',
      showConfirmButton: true,
      timer: 2000
    })
  } else {
    swal.fire({
      title: "ตรวจสอบข้อมูลก่อนยืนยัน !",
      html: `
      <style>
        table.center {
          margin-left: auto; 
          margin-right: auto;
          width:60%;
        }
        th, td {
          padding: 5px;
        }
      </style>
      <table id="table" class="center" >
          <tbody>
              <tr>
                  <td style="text-align: left"><h3 style="color: red;">จำนวนเงินที่ต้องคืน:</h3></td>
                  <td style="text-align: right"><h3 style="color: red;">` + amount_r + ` บาท</h3></td>
              </tr>                   
          </tbody>
          </table>`,
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
              Swal.fire({
                icon: 'success',
                title: 'บันทึกเรียบร้อยแล้ว',
                showConfirmButton: false,
                timer: 1000
              })
  
              document.getElementById("form_return_card").reset();
  
              setTimeout(function () {
                location.reload();
              }, 1000);
  
              //.print
              $.ajax({
                method: "POST",
                url: document.getElementById("PRINT_HOST").value + "functions.php?ref="+data.ref+"&number="+data.number,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
              });
  
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          },
        }).fail(function () {
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
        });
      }
    });
  }
  
});

//CHECK------------------------------------------------------
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
      if (response.status == 1 && card_number != '' && numStr == 18) {
        $("#card_number").attr("style", "border-color: #28a745; border-width: 2px; background-color: #28a74585;");
        $("#card_number_alert").attr("style", "height: 35px !important; font-size: 14px; border-radius: 5px; background-color: #28a745; transition: 0.5s; display:inline-block;");
        document.getElementById("a_card_number").innerHTML = "<i style='color:#fafafa;' class='fa fa-check-circle'></i>  เลขบัตรถูกต้อง";
        document.getElementById('btnSendฺBuyCard').disabled = false;
        $("#a_card_number").attr("style", "color: #fafafa;");

        document.getElementById("number").innerHTML = leftPad(response.message[0], 4);
        document.getElementById("amount").innerHTML = "฿ " + response.message[1];

        setTimeout(function () {
          $("#card_number").attr("style", "");
          $("#card_number_alert").attr("style", "transition: 0.5s; display:none;");
        }, 10000);

      } else if (response.status == 0 && numStr == 18) {
        $("#card_number").attr("style", "border-color: #dd4b39; border-width: 2px; background-color: #ff000038;");
        $("#card_number_alert").attr("style", "height: 35px !important; font-size: 14px; border-radius: 5px; background-color: #dd4b39; transition: 0.5s; display:inline-block;");
        document.getElementById("a_card_number").innerHTML = "<i style='color:#fafafa;' class='fa fa-times-circle'></i>  ไม่พบข้อมูล";
        document.getElementById('btnSendฺBuyCard').disabled = true;
        $("#a_card_number").attr("style", "color: #fafafa;");
        document.getElementById("number").innerHTML = "-";
        document.getElementById("amount").innerHTML = "-";

        setTimeout(function () {
          $("#card_number").attr("style", "height: 35px !important; font-size: 14px; border-radius: 10px;");
          $("#card_number_alert").attr("style", "transition: 0.5s; display:none;");
        }, 10000);

      } else if (numStr < 18) {
        $("#card_number").attr("style", "border-color: #ffc107; border-width: 2px; background-color: #ffc10745;");
        $("#card_number_alert").attr("style", "height: 35px !important; font-size: 14px; border-radius: 5px; background-color: #ffc107; transition: 0.5s; display:inline-block;");
        document.getElementById("a_card_number").innerHTML = "<i style='color:#fafafa;' class='fa fa-exclamation-triangle'></i>  กำหนดไม่ต่ำกว่า 18 ตัวเลข";
        document.getElementById('btnSendฺBuyCard').disabled = true;
        $("#a_card_number").attr("style", "color: #fafafa;");
        document.getElementById("number").innerHTML = "-";
        document.getElementById("amount").innerHTML = "-";

        setTimeout(function () {
          $("#card_number").attr("style", "height: 35px !important; font-size: 14px; border-radius: 10px;");
          $("#card_number_alert").attr("style", "transition: 0.5s; display:none;");
        }, 10000);

      }
    }

  });

});

$('#card_number_r').keyup(function () {
  var card_number = $('#card_number_r').val();

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
      if (response.status == 1 && card_number != '' && numStr == 18) {
        $("#card_number_r").attr("style", "border-color: #28a745; border-width: 2px; background-color: #28a74585;");
        $("#card_number_r_alert").attr("style", "height: 35px !important; font-size: 14px; border-radius: 5px; background-color: #28a745; transition: 0.5s; display:inline-block;");
        document.getElementById("a_card_number_r").innerHTML = "<i style='color:#fafafa;' class='fa fa-check-circle'></i>  เลขบัตรถูกต้อง";
        document.getElementById('btnSendReturnCard').disabled = false;
        $("#a_card_number_r").attr("style", "color: #fafafa;");

        document.getElementById("number").innerHTML = leftPad(response.message[0], 4);
        document.getElementById("amount_r").value = response.message[1];
        document.getElementById("amount_t").innerHTML = response.message[1];

        setTimeout(function () {
          $("#card_number_r").attr("style", "");
          $("#card_number_r_alert").attr("style", "transition: 0.5s; display:none;");
        }, 10000);

      } else if (response.status == 0 && numStr == 18) {
        $("#card_number_r").attr("style", "border-color: #dd4b39; border-width: 2px; background-color: #ff000038;");
        $("#card_number_r_alert").attr("style", "height: 35px !important; font-size: 14px; border-radius: 5px; background-color: #dd4b39; transition: 0.5s; display:inline-block;");
        document.getElementById("a_card_number_r").innerHTML = "<i style='color:#fafafa;' class='fa fa-times-circle'></i>  ไม่พบข้อมูล";
        document.getElementById('btnSendReturnCard').disabled = true;
        $("#a_card_number_r").attr("style", "color: #fafafa;");
        document.getElementById("number").innerHTML = "-";
        document.getElementById("amount_t").innerHTML = "-";

        setTimeout(function () {
          $("#card_number_r").attr("style", "height: 35px !important; font-size: 14px; border-radius: 10px;");
          $("#card_number_r_alert").attr("style", "transition: 0.5s; display:none;");
        }, 10000);

      } else if (response.status == 0 && numStr == 18) {
        $("#card_number_r").attr("style", "border-color: #dd4b39; border-width: 2px; background-color: #ff000038;");
        $("#card_number_r_alert").attr("style", "height: 35px !important; font-size: 14px; border-radius: 5px; background-color: #dd4b39; transition: 0.5s; display:inline-block;");
        document.getElementById("a_card_number_r").innerHTML = "<i style='color:#fafafa;' class='fa fa-times-circle'></i>  ไม่พบข้อมูล";
        document.getElementById('btnSendReturnCard').disabled = true;
        $("#a_card_number_r").attr("style", "color: #fafafa;");
        document.getElementById("number").innerHTML = "-";
        document.getElementById("amount_t").innerHTML = "-";

        setTimeout(function () {
          $("#card_number_r").attr("style", "height: 35px !important; font-size: 14px; border-radius: 10px;");
          $("#card_number_r_alert").attr("style", "transition: 0.5s; display:none;");
        }, 10000);

      } else if (numStr < 18) {
        $("#card_number_r").attr("style", "border-color: #ffc107; border-width: 2px; background-color: #ffc10745;");
        $("#card_number_r_alert").attr("style", "height: 35px !important; font-size: 14px; border-radius: 5px; background-color: #ffc107; transition: 0.5s; display:inline-block;");
        document.getElementById("a_card_number_r").innerHTML = "<i style='color:#fafafa;' class='fa fa-exclamation-triangle'></i>  กำหนดไม่ต่ำกว่า 18 ตัวเลข";
        document.getElementById('btnSendReturnCard').disabled = true;
        $("#a_card_number_r").attr("style", "color: #fafafa;");
        document.getElementById("number").innerHTML = "-";
        document.getElementById("amount_t").innerHTML = "-";

        setTimeout(function () {
          $("#card_number_r").attr("style", "height: 35px !important; font-size: 14px; border-radius: 10px;");
          $("#card_number_r_alert").attr("style", "transition: 0.5s; display:none;");
        }, 10000);

      }
    }

  });

});

//select_data-----------------------------------------------------------------
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
    success: function (data) {
      $("#div_table_list").html(data);
      $("#table_front_manage").DataTable({
        scrollY: true,
        scrollCollapse: true,
        scrollX: true,
        searching: true,
        lengthChange: false,
        pageLength: 4,
        order: [
          [0, "ASC"]
        ],
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

fetch_data_summary_total();
function fetch_data_summary_total() {
  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "fetch_data_summary_total",
    },
    success: function (data) {
      $("#fetch_data_summary_total").html(data);
    }
  });
}

chart_summary();
function chart_summary() {
  $.ajax({
    url: "select_data.php",
    method: "POST",
    data: {
      form: "chart_summary",
    },
    success: function (data) {
      $("#div_chart_summary").html(data);
    }
  });
}
