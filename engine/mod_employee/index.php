<?php
require_once '../../engine/lib/functions.php';
require_once '../../engine/lib/connect.php';
require_once '../../engine/lib/config.php';
require_once '../../engine/lib/service.php';

function checkcustomer()
{
    $db = new DB();
    // ถ้าไม่มีการกำหนดค่า session id ก็จะ Redirect ไปยังหน้า Login อีกครั้ง
    if (!isset($_SESSION["id_customer"])) {
        header('Location: ../login_register/');
        exit();
    } else {

    }
}
?>
<?php
checkcustomer();
include('../layout/header.php'); 
?>
<?php
    require_once '../../engine/lib/connect.php';
    $db = new DB();
    
    $sql = "SELECT * FROM `bank` WHERE `delete_datetime` IS NULL ORDER BY `no` ASC";
    $query = $db->Query($sql);

    $sql_se = "SELECT * FROM `bank` WHERE `delete_datetime` IS NULL ORDER BY `no` ASC";
    $query_se = $db->Query($sql_se);
?>

<?php
if(!isset($_SESSION["id_customer"])){
  $id_customer = "";
}else{
$id_customer = $_SESSION["id_customer"];
}
     $str_o  = "SELECT * FROM  orders
     WHERE orders.payment = '3' AND orders.status = 3 AND  orders.id_customer = '".$id_customer."' ";
	 //var_dump($str_o);
     $query_o  = $db->Query($str_o);
     //$row    = mysqli_num_rows($query_o);

?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../plugins_f/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
	<!--alerts CSS -->
    <link rel="stylesheet" href="../../plugins_b/sweetalert/dist/sweetalert2.css">	
	<script src="../../plugins_b/sweetalert/dist/sweetalert2.min.js"></script>
	<!-- END nav -->

    <?php
     $res_slide = getHeading('payment');
    ?>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?=$res_slide['directory']?><?=$res_slide['image']?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread"><?= lang($res_slide['name_th'],$res_slide['name_en']);?></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="../main/index.php"><?= lang('หน้าแรก','Home');?> <i class="ion-ios-arrow-forward"></i></a></span> <span><?= lang($res_slide['name_th'],$res_slide['name_en']);?> <i class="ion-ios-arrow-forward"></i></span></p>
			  <hr>
			  <span class="mb-2 bread"><?= lang(htmlspecialchars_decode($res_slide['description_th']),htmlspecialchars_decode($res_slide['description_en']));?></span>  
          </div>
        </div>
      </div>
    </section>
		
    <section class="ftco-section testimony-section bg-light" style="padding-bottom: 50px; padding-top: 50px;">
		
      <div class="container">
		  
		  <div class="row">
		<div class="col-md-9 col-lg-3 ftco-animate">
		  <form id="add_form_payment" >
          <input type="hidden" name="_method" value="CREATE_SLIP">
						<?php
                          while ($img_pay = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                              ?>
						<?php
                            $date_img_p = explode("-", $img_pay['update_datetime']); ?>  
						<div class="staff">
							<div class="text pt-3 text-center">
								<h3><?= lang('เลขที่บัญชี :','Account Number :');?> <?=$img_pay['account_number']; ?></h3>
									<!--<span class="position mb-2">Denstist</span>-->
								<div class="faded">
									<span><?= lang('ชื่อบัญชี :','Account Name :');?> <?=$img_pay['account_name']; ?></span><br>
									<span><?= lang('ธนาคาร :','Bank :');?> <?=$img_pay['name']; ?> (<?= lang('สาขา ','branch ');?><?=$img_pay['branch']; ?>)</span>
	              				</div>
							</div>
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url('<?php
							  			$im_d =  $img_pay['qrcode_directory'];
							  			$im_q =  $img_pay['qrcode_image'];
							  			if($im_q == null)
										{
											echo '../../images/no_image.jpg';
										}
							  			else
										{
											echo $im_d.$im_q;
										}
									?>'); width: 100%; "></div>
							</div>
						</div>
					<?php
                          } ?>	  
					</div>
			  		<div class="col-md-4 col-lg-4 ftco-animate">
						<div class="form-group"><?= lang('เลขที่คำสั่งซื้อ :','Order number :');?>
							<select  class="form-control input_box" id="id_order" name="id_order" style="height: 35px !important; font-size: 14px; border-radius: 10px;">
							<option value="" selected><?= lang('-- เลือกหมายเลขรายการ --','-- Select item number --');?></option>
							<?php  while ($pay_select = mysqli_fetch_array($query_o, MYSQLI_ASSOC)) { ?>
								<?php  $pay_s = $pay_select['total'];
									   $dis_s = $pay_select['discount'];
									   $totel = $pay_s-$dis_s 
								?>
							<option value="<?=$pay_select['id_orders']?>" ><?=$pay_select['doc_no']?> | <?=number_format($totel,2);?> ฿ </option>
							<?php } ?>
							</select>
						</div>
						<div class="form-group"><?= lang('เลขที่บัญชีที่ชำระ :','Payment account number :');?>
							<select class="form-control input_box" id="bank" name="bank" required style="height: 35px !important; font-size: 14px; border-radius: 10px;">
                          <option value=""><?= lang('-- เลือกช่องทางการชำระ --','-- Choose the payment method --');?></option>  
                          <?php while ($row=mysqli_fetch_array($query_se, MYSQLI_ASSOC)) { ?>  
                          <option value="<?=$row["id_bank"]?>"><?= lang('ชื่อบัญชี :','Account Name :');?> <?=$row['account_name']?> <?= lang('เลขที่บัญชี :','Account Number :');?> ( <?=$row['account_number']?> ) <?=$row['name']?> <?= lang('สาขา ','branch ');?> <?=$row['branch']?></option>
                          <?php } ?>
                        </select>
						</div>
						<div class="form-group"><?= lang('วันที่ชำระ :','Payment date :');?>
							<input type="text" name="pay_date" id="pay_date" style="height: 35px !important; font-size: 14px; border-radius: 10px;" class="form-control input_box  ck_value" required>
						</div>
						<div class="form-group"><?= lang('เวลาโดยประมาณ :','Estimated time :');?>
							<input type="time" name="pay_time" id="pay_time" style="height: 35px !important; font-size: 14px; border-radius: 10px;" class="form-control input_box" required>
						</div>
						<div class="form-group"><?= lang('จำนวนเงินชำระ (บาท) :','Payment amount (Baht) :');?>
							<input type="text" name="price" id="price" style="height: 35px !important; font-size: 14px; border-radius: 10px;" class="form-control input_box" placeholder="0" required OnKeyPress="return chkNumber(this)">
						</div>
					</div>
			  		<div class="col-md-6 col-lg-5 ftco-animate">
						<div class="form-group"><?= lang('หลักฐานการโอนเงิน :','Proof of payment :');?>
							<input type="file" class="form-control  input_box" style="height: 45px !important; font-size: 14px; border-radius: 10px;" name="image"  id="filUpload" onchange="return fileValidation()" />
						</div>
<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
</div> <br>
						<div id="blah" class="img_size">
							<img src="../../images/upload.jpg" width="100%" style="background-color: #0e4b98; padding: 1px; border-radius: 5px;">
						</div><br>
						<button type="button" id="confirm_btn" name="confirm_btn" class="btn btn-primary" style="float: right;" ><span><?= lang('ดำเนินการ','Proceed');?></span></button>
						</form>
					</div>
			  		
			  </div>
			  
      </div>
			
    </section>
    	
<!-- bootstrap datepicker -->
<script src="../../plugins_f/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

   <?php include('../layout/footer.php') ?> 
  </body>
</html>
<script src="../../plugins_f/bootstrap-datepicker/locales/bootstrap-datepicker.th.min.js"></script>
<style>
 .img_size img{
  max-width:100%;
  background-color: #0e4b98; 
  padding: 1px; 
  border-radius: 5px;
} 
input[type=file]{
padding:10px;
background:#0d61c06e;}
</style>
<script language="JavaScript">
  function chkNumber(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
  ele.onKeyPress=vchar;
  }
	
</script>
<script>
// Checking File Type (images Only)
function fileValidation(){
    var fileInput = document.getElementById('filUpload');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){

        // alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');

        Swal.fire(
          'Warning !',
          'Please upload file having extensions .jpeg/.jpg/.png/.gif only.',
          'warning'
          ).then((result) => {
            document.getElementById('blah').innerHTML = '<img src="../../images/upload.jpg"/>';
          })
        fileInput.value = '';
        return false;
    
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              document.getElementById('blah').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }

    }
}
</script>

        <script>
        $(document).ready(function () {
                            $('#pay_date').datepicker({
                                format: 'yyyy-mm-dd',
                                /*todayBtn: true,*/
                                language: '<?php echo $_COOKIE['lang']?>', //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                                thaiyear: true //Set เป็นปี พ.ศ.
                            }).datepicker("setDate", "0"); //กำหนดเป็นวันปัจุบัน
                        });
        
        </script>

<script>

$(document).on('click', '#confirm_btn', function(event) {
  var formData = new FormData($('#add_form_payment')[0]);
	
  var checkfileslide = $("#filUpload")[0].files.length;
              if(checkfileslide === 0){
                  swal('คำเตือน', 'กรุณาเลือกรูปภาพ', 'warning');
                  return false;
            }	

  if($("#id_order").val() != ""
  && $("#pay_date").val() != ""
  && $("#pay_time").val() != "" 
  && $("#price").val() != ""   
  && $("#bank").val() != ""
	){
// ------------------------------------------------------------------------
swal({
                      title: 'ยืนยัน',
                      html: '<h4>แจ้งหลักฐาน</h4>',
                      type: 'info',
                      showCancelButton: true,
                      confirmButtonColor: '#199e36',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'ยืนยัน',
					  cancelButtonText: 'ยกเลิก',
					  reverseButtons: true,
                      showLoaderOnConfirm: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                        type: "POST",
                        url: "function_m.php",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                          // console.log('12345');
                         // console.log(status);
                          
                        if(data.status == 1){
                        
                          swal.fire({
                            title: "สำเร็จ !",
                            text: "ทำการบันทึกข้อมูลสำเร็จ.",
                            type: "success"
                          }).then(function() {
                            // document.getElementById("register_form").reset();
                            // $('#model_login').modal('show');
                            location.href='./';
                          });

                        }

                            },
                        });
                    }   
                })
// -------------------------------------------------------------------------
  }else{
    swal('คำเตือน!','กรุณากรอกข้อมูลให้ครบถ้วน.','warning');

                    if($("#id_order").val() == ""){
                        $("#id_order").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: red; border-width: 1px; background-color: #ff000038;");
                        setTimeout(function() {
                            $("#id_order").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px;");
                        }, 5000);
                    }

                    if($("#pay_date").val() == ""){
                        $("#pay_date").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: red; border-width: 1px; background-color: #ff000038;");
                        setTimeout(function() {
                            $("#pay_date").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px;");
                        }, 5000);
                    }
      
                    if($("#pay_time").val() == ""){
                        $("#pay_time").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: red; border-width: 1px; background-color: #ff000038;");
                        setTimeout(function() {
                            $("#pay_time").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px;");
                        }, 5000);
                    }

                    if($("#price").val() == ""){
                        $("#price").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: red; border-width: 1px; background-color: #ff000038;");
                        setTimeout(function() {
                            $("#price").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px;");
                        }, 5000);
                    }
	  				if($("#bank").val() == ""){
                        $("#bank").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: red; border-width: 1px; background-color: #ff000038;");
                        setTimeout(function() {
                            $("#bank").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px;");
                        }, 5000);
                    }
	  				
  				}
            });
</script>