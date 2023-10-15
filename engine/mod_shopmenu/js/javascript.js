
function leftPad(number, targetLength) {
  var output = number + '';
  while (output.length < targetLength) {
    output = '0' + output;
  }
  return output;
}
    
$(document).ready(function () {
  const input_value = $("#balance");

  //disable input from typing

  $("#balance").keypress(function () {
    return false;
  });

  //add password
  $(".calc").click(function () {
    let value = $(this).val();
    field(value);
  });
  function field(value) {
    input_value.val(input_value.val() + value);
  }
  $("#clear").click(function () {
    input_value.val("");
    document.getElementById("form_card").reset();
    document.getElementById("number_card").innerHTML = ": -"
    document.getElementById("total_card").innerHTML = ": -"
    document.getElementById("idcard").focus();  
  });
    
//  $("#enter").click(function () {
//    alert("Your text " + input_value.val() + " added");
//  });
    
  $(document).on('click', '#enter', function(event) {
  var formData = new FormData($('#form_card')[0]);
      
  var total = parseInt($("#total_card_s").val());
  var balance = parseInt($("#balance").val());
            
  if(balance > total){
      swal.fire('คำเตือน!','ยอดเงินของคุณไม่เพียงพอ','warning');        
  }
  else if ($("#idcard").val() != "" 
  && $("#balance").val() != "" 
  && $("#total_card_s").val() != "" ){
// ------------------------------------------------------------------------
  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการชำระเงินหรือไม่?",
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
          url: "function_m.php",
          method: "POST",
          data: formData,
          processData: false,
          contentType: false, 
          success: function(data) {
          if(data.status == 1){
                swal.fire({ 
                    title:"สำเร็จ",
                    text: "บันทึกข้อมูลเรียบร้อยแล้ว",
                    icon: "success" ,
                    timer: 2000, 
                    onClose: () => {
                               window.location.reload()
                           }
                        });
              
        //            print
                      $.ajax({
                        method: "POST",
                        url: document.getElementById("PRINT_HOST").value + "functions.php?ref_p="+data.ref_p,
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                      });
              
                    document.getElementById("form_card").reset();
                    document.getElementById("number_card").innerHTML = ": -"
                    document.getElementById("total_card").innerHTML = ": -"
                    document.getElementById("idcard").focus();
                    
                    fetch_data_table()

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
// -------------------------------------------------------------------------
  }
  else{
    swal.fire('คำเตือน!','กรุณากรอกข้อมูลให้ครบถ้วน','warning');

	  				if($("#idcard").val() == ""){
                        $("#idcard").attr("style" , "border-color: red; border-width: 1px; background-color: #ff000038;");
                        setTimeout(function() {
                            $("#idcard").attr("style" , "");
                        }, 5000);
                    }
                    if($("#balance").val() == ""){
                        $("#balance").attr("style" , "border-color: red; border-width: 1px; background-color: #ff000038;");
                        setTimeout(function() {
                            $("#balance").attr("style" , "");
                        }, 5000);
                    }
  	}
});    
    
});
    
function chkNumber(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9')) return false;
  ele.onKeyPress=vchar;
  }
    
// CHECK_IDCARD
$( '#idcard' ).keyup(function() {
  var idcard = $('#idcard').val();

  var strCount = idcard;
  var numStr = strCount.length;

                        $.ajax({
                        type: "POST",
                        url: "function_m.php",
                        data:{_method:'CHECK_IDCARD',
                              idcard:idcard
                              },
        
                        success: function(response) {
				           //var content = response.message;
                           //console.log(response.status);
                           //console.log('numStr : ',numStr);
				           //console.log(response.message);
                          if(numStr == 18 && response.status == 1 && idcard != '' ){
                            $("#idcard").attr("style" , "height: 35px !important; font-size: 16px; border-color: #339601; border-width: 2px; background-color: #3396012e;");
                            $("#idcard_alert").attr("style" , "height: 35px !important; font-size: 16px; border-radius: 5px; background-color: #339601; color: #ffffff; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_idcard").innerHTML = "<i style='color:#fafafa;' class='fa fa-times-circle'></i> เลขบัตรประชาชนนี้ถูกใช้งานไปแล้ว";
                            $("#a_idcard").attr("style" , "color: #ffffff;");  
							document.getElementById('enter').disabled = false;
                            $("#total_card_s").attr("value" , response.message[2]);
                            $("#card_code").attr("value" , response.message[0]);  
                            document.getElementById("number_card").innerHTML = ": " + leftPad(response.message[0], 4);
                            document.getElementById("total_card").innerHTML = ": ฿ " + response.message[2];
                            document.getElementById("status").value = response.message[3];   

							setTimeout(function() {
                              $("#idcard").attr("style" ,"height: 35px !important; font-size: 16px; border-radius: 5px;");
                              $("#idcard_alert").attr("style" , "transition: 0.5s; display:none;");
                              }, 1500);  

                          }else if(numStr == 18 && response.status == 0){
                         
                            $("#idcard").attr("style" , "height: 35px !important; font-size: 16px; border-radius: 5px; border-color: #dd4b39; border-width: 2px; background-color: #ff000038;");
                            $("#idcard_alert").attr("style" , "font-size: 16px; border-radius: 5px; background-color: #dd4b39; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_idcard").innerHTML = "<i style='color:#fafafa;' class='fa fa-check-circle'></i> ไม่พบข้อมูลบัตร โปรดติดต่อพนักงาน "; 
                            $("#a_idcard").attr("style" , "height: 35px !important; border-radius: 5px; color: #fafafa;");
                            document.getElementById("number_card").innerHTML = ": -"
                            document.getElementById("total_card").innerHTML = ": -"

                              setTimeout(function() {
                              $("#idcard").attr("style" ,"height: 35px !important; font-size: 14px; border-radius: 5px;");
                              $("#idcard_alert").attr("style" , "transition: 0.5s; display:none;");
                              document.getElementById("form_card").reset();
                              }, 1500);
							  
                              document.getElementById('enter').disabled = true;   
                        }
                  }

         });

});
    
fetch_data_table()
    
function fetch_data_table() {
          var button_update = $('#per_button_edit').val();
          var button_delete = $('#per_button_del').val();
          var button_create = $('#per_button_open').val();
          var button_view = $('#per_input_read').val();
        $.ajax({
            url: "select_data.php",
            method: "POST",
            data: {
                form: "select_table_front_manage",button_update:button_update,button_delete:button_delete,button_create:button_create,button_view:button_view
            },
            success: function(data) {
                $('#div_table_list').html(data);
                $('#table_front_manage').DataTable({
                	scrollY: true,
                	scrollCollapse: true,
                	scrollX: true,
                	 "order": [[ 2, 'DESC' ]]
					,
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