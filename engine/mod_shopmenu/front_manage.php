<?php include('../template/header.php');?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
<?php require_once('../template/menu.php');?>
        <!-- ============================================================== -->


<?php
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
$db = new DB();
?>

<style>
    
.page-titles {
    background: #ffffff;
    margin: 0 -30px 15px;
    padding: 5px 15px 5px 15px;
    -webkit-box-shadow: 1px 0 5px rgb(0 0 0 / 10%);
    box-shadow: 1px 0 5px rgb(0 0 0 / 10%);
}    
    
#pinpad {
  padding: 0px 5px 0px 5px;
}
    
#shopmenu form {
  width: 100%;
  margin: 20px auto;
  background: #fff;
  padding: 20px 20px;
  text-align: center;
  -webkit-box-shadow: 3px 3px 3px 4px #7460ee33;    
  box-shadow: 3px 3px 3px 4px #7460ee33;
  border-radius: 5px;
}

#shopmenu input[type="text"] {
  padding: 0 40px;
  border-radius: 5px;
  width: 100%;
  margin: auto;
  border: 1px solid rgb(228, 220, 220);
  outline: none;
  font-size: 60px;
  color: #ff0707;
  text-shadow: 0 0 0 rgb(71, 71, 71);
  text-align: center;
}

#shopmenu input:focus {
  outline: none;
}    
    
#shopmenu .pinButton {
  border: none;
  background: none;
  font-size: 1.7em;
  border-radius: 50%;
  height: 60px;
  font-weight: 550;
  width: 60px;
  color: transparent;
  text-shadow: 0 0 0 rgb(102, 101, 101);
  margin: 7px 20px;
}

#shopmenu .clear,
#shopmenu .enter {
  font-size: 1.2em !important;
}

#shopmenu .pinButton:hover {
  box-shadow: #506ce8 0 0 1px 1px;
}
#shopmenu .pinButton:active {
  background: #506ce8;
  color: #fff;
}
#shopmenu .clear:hover {
  box-shadow: #ff3c41 0 0 1px 1px;
}
#shopmenu .clear:active {
  background: #ff3c41;
  color: #fff;
}
#shopmenu .enter:hover {
  box-shadow: #47cf73 0 0 1px 1px;
}
#shopmenu .enter:active {
  background: #47cf73;
  color: #fff;
}

</style>
<!--alerts CSS -->

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">รายการชำระค่าอาหาร</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item active">รายการชำระค่าอาหาร</li>
                        </ol>
                    </div>
                </div>
							<div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                
			<div class="row"> 
    			<div class="col-md-6 col-lg-6 col-sm-12">   
         			<div class="ribbon-wrapper card">
                        <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-credit-card-scan"></i> สแกนชำระสินค้า</div>
                        <form name="form_card" id="form_card">
                        <input type="hidden" name="total_card_s" id="total_card_s">
                        <input type="hidden" name="card_code" id="card_code">    
                        <input type="hidden" name="name_shop" id="name_shop" value="<?php echo $_SESSION["name"]; ?>">    
                        <input type="hidden" name="form" value="form_card">
                                <!--ตั้งค่าการพิมพ์ -->
                                <input type="hidden" name="print" value="printslip_return_customer_his">
                                <input type="hidden" name="SESSION_name" value="<?= $_SESSION['name'] ?>">
                                <?php
                                $sql = "SELECT `ip_customer`,`print_customer` FROM `mod_customer` WHERE `id_customer` =  '" . $_SESSION["id_data"] . "'";
                                $query = $db->Query($sql);
                                $result = mysqli_fetch_array($query);
                                $result[0];
                                ?>
                                <input type="hidden" id="PRINT_HOST" name="PRINT_HOST" value="<?= constant("PRINT_HOST"); ?>">
                                <input type="hidden" name="ip" value="<?= $result[0] ?>">
                                <input type="hidden" name="printname" value="<?= $result[1] ?>">
                                <!--ตั้งค่าการพิมพ์ -->    
                        <div class="form-group">
                          <label for="example" class="text-themecolor"><i class="mdi mdi-credit-card"></i> เลขบัตรชำระสินค้า </label>
                          <input type="text" class="form-control" name="idcard" id="idcard" placeholder="กรุณากรอกเลขบัตรชำระสินค้า" maxlength="18" OnKeyPress="return chkNumber(this)" autofocus>
                          <div class="col-md-12" id="idcard_alert" >
                            <small id="a_idcard"  style="color: #FFFFFF;"></small>
                          </div>    
                        </div>
                            
                        <div class="row"> 
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="example" class="text-themecolor" style="font-size: 23px;"> หมายเลขบัตร</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="example" style="font-size: 23px;" id="number_card">: -</label>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="example" class="text-themecolor" style="font-size: 23px;"> ยอดเงินคงเหลือ</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="example" style="font-size: 23px;" id="total_card">: -</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="example" class="text-themecolor"><i class="fas fa-calculator"></i> จำนวนเงินที่ต้องชำระ</label>
                        </div>
                        <div id="shopmenu">
                            <input type="text" id="balance" name="balance" /></br>
                        </div>
                       </form> 
                    </div>
				</div>
				<div class="col-md-6 col-lg-6 col-sm-12">   
				    <div class="ribbon-wrapper card">
                        <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-calculator"></i> คำนวณราคา</div>
                        <div id="shopmenu">
                            <div id="pinpad">
                              <form >
                                <input type="button" value="1" id="1" class="pinButton calc"/>
                                <input type="button" value="2" id="2" class="pinButton calc"/>
                                <input type="button" value="3" id="3" class="pinButton calc"/><br>
                                <input type="button" value="4" id="4" class="pinButton calc"/>
                                <input type="button" value="5" id="5" class="pinButton calc"/>
                                <input type="button" value="6" id="6" class="pinButton calc"/><br>
                                <input type="button" value="7" id="7" class="pinButton calc"/>
                                <input type="button" value="8" id="8" class="pinButton calc"/>
                                <input type="button" value="9" id="9" class="pinButton calc"/><br>
                                <input type="button" value="รีเซต" id="clear" class="pinButton clear"/>
                                <input type="button" value="0" id="0 " class="pinButton calc"/>
                                <input type="button" value="ตกลง" id="enter" name="enter" class="pinButton enter"/>
                              </form>
                            </div>
                        </div>
                    </div>
				</div>
                <!-- Row -->
                  <div class="col-md-12 col-lg-12">   
                     <div class="ribbon-wrapper card" >
                      <div class="ribbon ribbon-bookmark ribbon-info"><i class="fas fa-history"></i> ประวัติการชำระเงิน <?php echo DateThai($date);?></div>
                      <div class="box-body" style="padding: 0;">
                        <form action="" name="frmMain" id="frmMain" method="post">
                          <div id="div_table_list"></div>  
                        </form>
                      </div>
                    </div>
                  </div>
                <!-- ============================================================== -->
			</div>
</div>
                <!-- End PAge Content -->
                
<input type="hidden" name="per_button_edit" id="per_button_edit" value="<?php echo $button_update ?>">
<input type="hidden" name="per_button_del" id="per_button_del" value="<?php echo $button_delete ?>">
<input type="hidden" name="per_button_open" id="per_button_open" value="<?php echo $button_create ?>">
<input type="hidden" name="per_input_read" id="per_input_read" value="<?php echo $button_view ?>">
<input type="hidden" name="per_input_approval" id="per_input_approval" value="<?php echo $button_approval ?>">
<?php include('../template/footer.php');?>
<script type="text/javascript">
    
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
    
</script>
