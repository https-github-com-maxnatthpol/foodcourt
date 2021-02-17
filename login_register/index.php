<?php include('../layout/header.php') ?>
<style>
	.box_shadow_m{
	-webkit-box-shadow: 0px 5px 20px #d1e9fe;
    box-shadow: 0px 5px 20px #d1e9fe;
	}
</style>
<style>
	.border_s_m
	{
	border-right: 1px solid #2699fb69;
    margin-top: 70px;
    margin-bottom: 70px;
	}
</style>
<style>
.alert_sty{
   background-color: #dd4b39 !important;
   text-align: -webkit-center;
 }
.form-top {
    overflow: hidden;
    padding: 0 25px 15px 25px;
    /*background: #dbf8fe;*/
    -moz-border-radius: 4px 4px 0 0;
    -webkit-border-radius: 4px 4px 0 0;
    border-radius: 4px 4px 0 0;
    text-align: left;
}	
</style>
<?php
require_once '../../engine/lib/connect.php';
require_once '../../engine/lib/service.php';
   	$res_slide = getHeading('login_register');
?>
	<!--alerts CSS -->
    <link rel="stylesheet" href="../../plugins_b/sweetalert/dist/sweetalert2.css">	
	<script src="../../plugins_b/sweetalert/dist/sweetalert2.min.js"></script>
	<!-- END nav -->
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

		<section class="ftco-section ftco-no-pt ftco-no-pb contact-section " style="padding-bottom: 50px; padding-top: 50px;">
			<div class="container">
				<div class="row d-flex align-items-stretch no-gutters">
					<div class="col-md-5 p-4 p-md-5 order-md-last box_shadow_m ftco-animate" style="background: #f1f9ff; height: 100%;">
						<center><img src="../images/User.png" width="60px;" height="60px;"></center>
						<!--<h2 class="h4" style="text-align: center;">เข้าสู่ระบบ <!--<i class="icofont icofont-user-alt-3"></i></h2>-->
						     	<div class="form-top1">
	                        		<div class="form-top-left">
	                        			<h3 style="color: #000000"><?= lang('เข้าสู่ระบบ','Login');?></h3>
										<span style="color: #1877f2;"><?= lang('(สำหรับสมาชิกสัตวแพทย์สภาเท่านั้น)','(For members of the Veterinary Council only)');?></span>
	                            		<p style="color: #000000"><?= lang('ป้อนชื่อผู้ใช้และรหัสผ่านเพื่อเข้าสู่ระบบ :','Enter your username and password to log in:');?></p>
	                        		</div>
	                            </div>
			<form role="form" action="profile.php" method="post" class="login-form">
              <div class="form-group">
                <input type="text" id="txtUserName" name="txtUserName" class="form-control validate" placeholder="<?= lang('อีเมล','Email');?>" style="height: 35px !important; font-size: 14px; border-radius: 10px;">
              </div>
              <div class="form-group">
                <input type="password" id="txtPassword" name="txtPassword" class="form-control validate" placeholder="<?= lang('รหัสผ่าน','Password');?>" style="height: 35px !important; font-size: 14px; border-radius: 10px;">
              </div>			
            </form>
			<a href="#" onclick="forgot()"  style="color:#dc3545;"><span><i class="fa fa-exclamation-triangle"></i> <?= lang('ลืมรหัสผ่าน?','Forgot password');?><!--Forgot password ?--></span></a>			
			  <div class="form-group" style="text-align: center;">
				<button type="submit" id="login" class="btn btn-primary" style="padding: 0.5rem 0.8rem 0.5rem 0.8rem!important;"><span><?= lang('เข้าสู่ระบบ','Login');?> </span><i class="icofont icofont-arrow-right"></i></button>
              </div>
			<div class="form-top">

	       	</div>			
			 <!-- ------------------------------------------------------------------------------------ -->
        <div class="container-fluid  alert_sty" style="display: none;">
        <div class="row alert-massage" >
        <div class="col-md-12">
          <div class="callout callout-danger" style="opacity: 1; color:black">
            <label style="color:#fafafa;" ><i class="icon fa fa-ban" ></i> <?= lang('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!','The username or password is incorrect!');?> <!--Username or password is wrong!--></label>
          </div>
        </div>  
      </div>
      </div>
<!-- ------------------------------------------------------------------------------------ -->			
					<hr style="border-bottom: 1px solid #2699fb69">
					<div class="col-md-12">
						<!--<img src="../images/User.png" width="100%">-->
						</div>
					<!--<h2 class="h4" style="text-align: center;">ลืมรหัสผ่าน <i class="icofont icofont-search-user"></i></h2>
						<form id="frm123">
              <div class="form-group">อีเมล / ผู้ใช้งาน
                <input type="text" id="f1name" name="fname" class="form-control validate" placeholder="อีเมล / ผู้ใช้งาน" style="height: 35px !important; font-size: 14px; border-radius: 10px;">
              </div>			
            </form>		
			  <div class="form-group" style="float: left;">
				<button type="submit" id="btn_send" class="btn btn-primary" style="padding: 0.5rem 0.8rem 0.5rem 0.8rem!important;"><span>ตรวจสอบข้อมูล </span><i class="icofont icofont-arrow-right"></i></button>
              </div><br><br>
					<hr style="border-bottom: 1px solid #2699fb69">
					<div class="row">
					<div class="col-md-6">
              <div class="form-group">
                <input type="text" id="fname" name="fname" class="form-control validate" placeholder="รหัสผ่านใหม่" style="height: 35px !important; font-size: 14px; border-radius: 10px;">
              </div>
						</div>
					<div class="col-md-6">
              <div class="form-group">
                <input type="text" id="sname" name="sname" class="form-control validate" placeholder="ยืนยันรหัสผ่าน" style="height: 35px !important; font-size: 14px; border-radius: 10px;">
              </div>
				</div>
				</div>
				<div class="form-group" style="text-align:center; ">
				<button type="submit" id="btn_send" class="btn btn-primary" style="padding: 0.5rem 0.8rem 0.5rem 0.8rem!important;"><span>เปลี่ยนรหัสผ่าน </span><i class="icofont icofont-arrow-right"></i></button>
              </div>-->		
					</div>
					<div class="col-md-1 p-4 p-md-5 order-md-last">
					</div>
					<div class="col-md-1 p-4 p-md-5 order-md-last">
					</div>
					<div class="col-md-5 p-4 p-md-5 order-md-last box_shadow_m ftco-animate" style="background: #f1f9ff">
						<center><img src="../images/register.png" width="60px;" height="60px;"></center>
						<h2 class="h4" style="text-align: center;"><?= lang('สมัครสมาชิก','Become a member');?> <!--<i class="icofont icofont-edit"></i>--></h2>
						<center><span style="color: #1877f2;"><?= lang('(สำหรับสมาชิกสัตวแพทย์สภาเท่านั้น)','(For members of the Veterinary Council only)');?></span></center>
			<form method="POST" id="register_form">
			<input type="hidden" name="_method" value="ADD_CUTTOMER">
				<div class="form-group"><?= lang('เลขบัตรประชาชน :','ID card number :');?>
                <input type="text" id="idcard" name="idcard" class="form-control validate" maxlength="13" placeholder="<?= lang('เลขบัตรประชาชน :','ID card number :');?>" style="height: 35px !important; font-size: 14px; border-radius: 10px;" OnKeyPress="return chkNumber(this)">
				<div class="col-md-12" id="idcard_alert" >
					<small id="a_idcard"  style="color: #fafafa;"></small>
				</div>  
              </div>
				<div class="row">
					<div class="col-md-6">
              <div class="form-group"><?= lang('ชื่อ :','Your name :');?>
                <input type="text" id="fname" name="fname" class="form-control validate" placeholder="<?= lang('ชื่อ :','Your name:');?>" style="height: 35px !important; font-size: 14px; border-radius: 10px;" readonly>
              </div>
						</div>
					<div class="col-md-6">
              <div class="form-group"><?= lang('นามสกุล :','Last name :');?>
                <input type="text" id="sname" name="sname" class="form-control validate" placeholder="<?= lang('นามสกุล :','Last name :');?>" style="height: 35px !important; font-size: 14px; border-radius: 10px;" readonly>
              </div>
				</div>
				</div>	
				<div class="form-group"><?= lang('เลขที่ใบอนุญาตประกอบวิชาชีพการสัตวแพทย์ :','Veterinary Professional License Number :');?> <span style="color: #3cb6dc;"><?= lang('*ถ้ามี','* If any');?></span>
                <input type="text" id="li_number" name="li_number" class="form-control validate" maxlength="14" placeholder="<?= lang('เลขที่ใบอนุญาตประกอบวิชาชีพการสัตวแพทย์ :','Veterinary Professional License Number :');?>" style="height: 35px !important; font-size: 14px; border-radius: 10px;" readonly>
				<div class="col-md-12" id="li_number_alert">
					<small id="a_li_number"  style="color: #fafafa;"></small>
				</div>  
              </div>
			  <div class="form-group"><?= lang('อีเมล :','Email :');?>
                <input type="email" id="email" name="email" class="form-control validate" placeholder="<?= lang('อีเมล :','Email :');?>" style="height: 35px !important; font-size: 14px; border-radius: 10px;" onblur="CHECK_EMAIL()">
				<div class="col-md-12" id="email_alert">
					<small id="a_email"  style="color: #fafafa;"></small>
			  	</div>  
              </div>
         <div class="form-group" id="div_btn_send_email" align="center" style="display: none;">
            <button class="btn btn-info"  id="btn_otp" type="button">ส่ง OTP</button>
            <input type="text" name="otp_input" id="otp_input" value="" onchange="check_otp()"  class="form-control">
         </div>
              
			  <div class="form-group"><?= lang('รหัสผ่าน :','Password :');?>
                <input type="password" id="pass" name="pass" class="form-control validate" placeholder="<?= lang('รหัสผ่าน :','Password :');?>" style="height: 35px !important; font-size: 14px; border-radius: 10px;">
				<div class="col-md-12" style="background-color: #ccc; color: #2f2f2f; border-radius: 10px;  font-weight: bold !important;">
						<small>
							<i class="icofont icofont-eye-alt" onclick="showPass()" id="defaultUnchecked"></i>
							<label class="" onclick="showPass()" for="defaultUnchecked"><?= lang('แสดงรหัสผ่าน','Show password');?></label>
						</small>
						</div>  
              </div>
			  <div class="form-group"><?= lang('ยืนยันรหัสผ่าน :','Confirm password :');?>
                <input type="password" id="conPass" name="conPass" class="form-control validate" placeholder="<?= lang('ยืนยันรหัสผ่าน :','Confirm password :');?>" style="height: 35px !important; font-size: 14px; border-radius: 10px;">
				<div class="col-md-12" id="conPass_alert" >
							<small id="a_pass"  style="color: #fafafa;"></small>
						</div>  
              </div>
            </form>		
			  <div class="form-group" style="text-align:center; ">
				<button disabled type="submit" id="confirm_btn" name="confirm_btn" class="btn btn-primary" style="padding: 0.5rem 0.8rem 0.5rem 0.8rem!important;"><span><?= lang('สมัครสมาชิก','Become a member');?> </span><i class="icofont icofont-arrow-right"></i></button>
              </div>			
					</div>
				</div>
			</div>
		</section>
		
   <?php include('../layout/footer.php') ?> 
  </body>
</html>
<script language="JavaScript">
  function chkNumber(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
  ele.onKeyPress=vchar;
  }
</script>

<script>
///////recaptcha
function recaptcha_callback() {
        var btn = document.querySelector('#confirm_btn');
        btn.disabled = false;
    }
</script>

<script>
//////รีเซตฟอร์ม
function resetForm() {
  document.getElementById("register_form").reset();
}
</script>

<script>
//show pass	
function showPass() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
$( '#conPass' ).keyup(function() {

  var pass = $('#pass').val();
  var conPass = $('#conPass').val();

  if(pass != conPass)
  {
    $("#conPass_alert").attr("style" , "border-radius: 10px; background-color: #dd4b39; transition: 0.5s; display:inline-block;");
    document.getElementById("a_pass").innerHTML = "รหัสผ่านไม่ตรงกัน <i style='color:#fafafa;' class='fa fa-times-circle'></i>"; 
    document.getElementById('confirm_btn').disabled = true;

	setTimeout(function() {
    $("#conPass_alert").attr("style" , "transition: 0.5s; display:none;");
    }, 6000);

    }
    else
	{
     $("#conPass_alert").attr("style" , "border-radius: 10px; background-color: #1c8c36; transition: 0.5s; display:inline-block;");
     document.getElementById("a_pass").innerHTML = "รหัสผ่านตรงกัน <i  style='color:#fafafa;' class='fa fa-check-circle'></i>"; 

    setTimeout(function() {
    $("#conPass_alert").attr("style" , "transition: 0.5s; display:none;");
    }, 6000);
    document.getElementById('confirm_btn').disabled = false;  
    }
});  


// CHECK_IDCARD
$( '#idcard' ).keyup(function() {
  var idcard = $('#idcard').val();
  var email = $('#email').val();

  var strCount = idcard;
  var numStr = strCount.length;

                        $.ajax({
                        type: "POST",
                        url: "function_m.php",
                        data:{_method:'CHECK_IDCARD',
                              idcard:idcard,
                              email:email
                              },
        
                        success: function(response) {
							//var content = response.message;
                           //console.log(response.status);
                           //console.log('numStr : ',numStr);
							//console.log(response.message);
                          if(response.status == 2 && idcard != '' ){
                            $("#idcard").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: #28a745; border-width: 2px; background-color: #28a74585;");
                            $("#idcard_alert").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; background-color: #1c8c36; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_idcard").innerHTML = "<i style='color:#fafafa;' class='fa fa-times-circle'></i>  สามารถสมัครสมาชิกได้";
                            document.getElementById('confirm_btn').disabled = false;  
                            $("#a_idcard").attr("style" , "color: #fafafa;");
							$("#fname").attr("value" , response.message[2]);
							document.getElementById('fname').readOnly = true;
							$("#sname").attr("value" , response.message[3]);
							document.getElementById('sname').readOnly = true;
							$("#li_number").attr("value" , response.message[4]);
							document.getElementById('li_number').readOnly = true;  
							  
							setTimeout(function() {
                              $("#idcard").attr("style" ,"height: 35px !important; font-size: 14px; border-radius: 10px;");
                              $("#idcard_alert").attr("style" , "transition: 0.5s; display:none;");
                              }, 6000);  

                          }
							else if(response.status == 1 && idcard != '' ){
                            $("#idcard").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: #dd4b39; border-width: 2px; background-color: #ff000038;");
                            $("#idcard_alert").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; background-color: #dd4b39; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_idcard").innerHTML = "<i style='color:#fafafa;' class='fa fa-times-circle'></i>  เลขบัตรประชาชนนี้ถูกใช้งานไปแล้ว";
							document.getElementById('confirm_btn').disabled = true; 	

							setTimeout(function() {
                              $("#idcard").attr("style" ,"height: 35px !important; font-size: 14px; border-radius: 10px;");
                              $("#idcard_alert").attr("style" , "transition: 0.5s; display:none;");
                              }, 6000);  

                          }else if(numStr < 13){
                            $("#idcard").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: #ffc107; border-width: 2px; background-color: #ffc10745;");
                            $("#idcard_alert").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; background-color: #ffc107; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_idcard").innerHTML = "<i style='color:#333;' class='fa fa-exclamation-triangle'></i>  กำหนดเลขบัตรประชาชนไม่ต่ำกว่า 13 ตัวอักษร ";
                            $("#a_idcard").attr("style" , "color: #333;");
                            document.getElementById('confirm_btn').disabled = true;
							$("#fname").attr("value" , "");
							$("#sname").attr("value" , "");
							$("#li_number").attr("value" , "");  
                          }else{
                         
                            $("#idcard").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: #dd4b39; border-width: 2px; background-color: #ff000038;");
                            $("#idcard_alert").attr("style" , "font-size: 14px; border-radius: 10px; background-color: #dd4b39; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_idcard").innerHTML = "<i style='color:#fafafa;' class='fa fa-check-circle'></i> ไม่พบข้อมูลของท่านในระบบสัตวแพทยสภา โปรดติดต่อสัตวแพทยสภาเพื่อยืนยันข้อมูลของท่าน "; 
                            $("#a_idcard").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; color: #fafafa;");

//                              setTimeout(function() {
//                              $("#idcard").attr("style" ,"height: 35px !important; font-size: 14px; border-radius: 10px;");
//                              $("#idcard_alert").attr("style" , "transition: 0.5s; display:none;");
//                              }, 6000);
							  Swal.fire({
  title: '<span style="font-size: 20px;">"ไม่พบข้อมูลของท่านในระบบสัตวแพทยสภา"<br> โปรดติดต่อสัตวแพทยสภาเพื่อยืนยันข้อมูลของท่าน</span>',
showClass: {
    popup: 'animated fadeInDown faster'
  },
  hideClass: {
    popup: 'animated fadeOutUp faster'
  },
  showConfirmButton: true,
  confirmButtonText: 'กลับไปหน้าแรก',								  
  timer: 10000								  
}).then(function() {
                            location.href='../main/?index=iv';  
                          });
							  
                              document.getElementById('confirm_btn').disabled = true;   
                        }
                  }

         });

});
	

// CHECK_NUMBER_LI
$( '#li_number' ).keyup(function() {
  var li_number = $('#li_number').val();

  var strCount = li_number;
  var numStr = strCount.length;


                        $.ajax({
                        type: "POST",
                        url: "function_m.php",
                        data:{_method:'CHECK_NUMBER_LI',
                              li_number:li_number
                              },
        
                        success: function(response) {
                           //console.log(response.status);
                           //console.log('numStr : ',numStr);
                          if(response.status == 1 && li_number != '' ){
                            $("#li_number").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: #dd4b39; border-width: 2px; background-color: #ff000038;");
                            $("#li_number_alert").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; background-color: #dd4b39; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_li_number").innerHTML = "<i style='color:#fafafa;' class='fa fa-times-circle'></i>  เลขนี้ถูกใช้ไปแล้ว กรุณากรอกเลขใช้งานอื่น";
                            /*document.getElementById('confirm_btn').disabled = true; */ 
                            $("#a_li_number").attr("style" , "color: #fafafa;");

                          }else if(numStr < 4){
                            $("#li_number").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: #ffc107; border-width: 2px; background-color: #ffc10745;");
                            $("#li_number_alert").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; background-color: #ffc107; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_li_number").innerHTML = "<i style='color:#333;' class='fa fa-exclamation-triangle'></i>  กำหนดไม่ต่ำกว่า 4 ตัวอักษร ";
                            $("#a_li_number").attr("style" , "color: #333;");
                            /*document.getElementById('confirm_btn').disabled = true; */
                          }else{
                         
                            $("#li_number").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: #28a745; border-width: 2px; background-color: #28a74585;");
                            $("#li_number_alert").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; background-color: #1c8c36; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_li_number").innerHTML = "<i style='color:#fafafa;' class='fa fa-check-circle'></i> เลขนี้สามารถใช้ได้ "; 
                            $("#a_li_number").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; color: #fafafa;");

                              setTimeout(function() {
                              $("#li_number").attr("style" ,"height: 35px !important; font-size: 14px; border-radius: 10px;");
                              $("#li_number_alert").attr("style" , "transition: 0.5s; display:none;");
                              }, 6000);
                              /*document.getElementById('confirm_btn').disabled = false;*/  
                              
                        }

                  }

         });

});	


// CHECK_EMAIL
 //$( '#email' ).keyup(function() {
  function CHECK_EMAIL(){ 
document.getElementById('confirm_btn').disabled = true;  
  var idcard = $('#idcard').val();
  var email = 'not';
  email = $('#email').val();
   if(email === ''){
     email = 'not';
   }

  var emailFilter=/^.+@.+\..{2,3}$/;
	var str = email;
  var st_mail = null;
    if (!(emailFilter.test(str))) { 
        st_mail = false;
    }else{
        st_mail = true;
    }

                        $.ajax({
                        type: "POST",
                        url: "function_m.php",
                        data:{_method:'CHECK_EMAIL',
                              email:email
                              },
        
                        success: function(response) {
                          console.log('email : ',email);
                          
                          if(response.status == 1 && email != 'not' &&  st_mail == true){
                            $("#email").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: #dd4b39; border-width: 2px; background-color: #ff000038;");
                            $("#email_alert").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; background-color: #dd4b39; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_email").innerHTML = "<i style='color:#fafafa;' class='fa fa-times-circle'></i> E-Mail ถูกใช้ไปแล้ว กรุณากรอกใหม่ "; 
                            document.getElementById('confirm_btn').disabled = true;  
                            $("#a_email").attr("style" , "color: #fafafa;");
                          }
                          else if( st_mail == false && email != 'not' ){ 
                              console.log('st_mail : ',st_mail);
                            $("#email").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: #ffc107; border-width: 2px; background-color: #ffc10745;");
                            $("#email_alert").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; background-color: #ffc107; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_email").innerHTML = "<i style='color:#333;' class='fa fa-exclamation-triangle'></i> รูปแบบ E-Mail ไม่ถูกต้อง"; 
                            document.getElementById('confirm_btn').disabled = true; 
                            $("#a_email").attr("style" , "color: #333;");
                          }
                          else if(response.status == 0 && email != 'not' &&  st_mail == true){
                            $("#email").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: #28a745; border-width: 2px; background-color: #28a74585;");
                            $("#email_alert").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; background-color: #1c8c36; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_email").innerHTML = "<i style='color:#fafafa;' class='fa fa-check-circle'></i>  E-Mail นี้สามารถใช้ได้ "; 
                            $("#a_email").attr("style" , "color: #fafafa;");
                         
                              setTimeout(function() {
                              $("#email").attr("style" ,"height: 35px !important; font-size: 14px; border-radius: 10px;");
                              $("#email_alert").attr("style" , "transition: 0.5s; display:none;");
                              }, 6000);
                              // document.getElementById('confirm_btn').disabled = false;  
                              // $("#div_btn_send_email").html('<button class="btn btn-info">ส่ง OTP</button>');
                               document.getElementById("div_btn_send_email").style.display = "block";
                              
                          }

                        }

                        });

// });
  }



$(document).on('click', '#btn_otp', function(event) {
email = $('#email').val();
idcard = $('#idcard').val();


if (email != '' && idcard !='') {

$.ajax({
            url: "function_m.php",
            method: "POST",
            data: {
                 idcard:idcard,_method:'save_otp'
            },
            success: function(data) {
  
     $.ajax({
            url: "mail_otp.php",
            method: "POST",
            data: {
                idcard:idcard,email:email
            },
            success: function(data) {
        
            swal.fire("สำเร็จ", "ส่ง E-mail เรียบร้อยแล้ว  กรุณานำรหัส  OTP มากรอก", "info");
//                 Swal.fire({
//   title: 'ส่ง E-mail เรียบร้อยแล้ว  กรุณานำรหัส  OTP มากรอก',
//   input: 'text',
//   inputAttributes: {
//     autocapitalize: 'off'
//   },
//   showCancelButton: true,
//   confirmButtonText: 'ตกลง',
//   showLoaderOnConfirm: true,
//   preConfirm: (login) => {






// // Execution is BLOCKED until request finishes.

// // it_works is available




// $.ajax({
//             url: "function_m.php",
//             method: "POST",
//             data: {
//                  idcard:idcard,_method:'check_otp',login:login
//             },
//             success: function(data) {
                 
//               console.log(data.status)

//                    $('#otp_input').val(data.status);


//               }


//     })




//                   if (status == '1') {
//                     document.getElementById('confirm_btn').disabled = false;  
 
//                   }else{
//                     Swal.showValidationMessage(`คำเตือน : รหัส OTP ไม่ถูกต้อง  กรุณาไปที่ E-mail ของท่านเพื่อทราบรหัส  OTP  ที่ถูกต้อง` )

//                   }


            

//   },
//   allowOutsideClick: () => !Swal.isLoading()
// }).then((result) => {
//   if (result.value) {
//    swal.fire("สำเร็จ", "ยืนยันรหัส OTP เรียบร้อยแล้ว", "info");
//       document.getElementById("div_btn_send_email").style.display = "none";

//   }
// })
                
            
                
            }
        })
   }
  })

}

  

  })
</script>

<script>

function check_otp(){

  otp_input = $("#otp_input").val()
  $.ajax({
            url: "function_m.php",
            method: "POST",
            data: {
                 idcard:idcard,_method:'check_otp',login:otp_input
            },
            success: function(data) {
              if (data.status == '0') {
              
                swal.fire("คำเตือน", "รหัส OTP ไม่ถูกต้อง  กรุณาไปที่ E-mail ของท่านเพื่อทราบรหัส  OTP  ที่ถูกต้อง", "warning");
              }else{
                document.getElementById("div_btn_send_email").style.display = "none";
                document.getElementById('confirm_btn').disabled = false;  
                swal.fire("สำเร็จ", "ยืนยันรหัส OTP เรียบร้อยแล้ว", "info");

              }
              }

    })
}

$(document).on('click', '#confirm_btn', function(event) {
  var formData = new FormData($('#register_form')[0]);


  /*if($("#li_number").val() != ""  */ 
  if ($("#email").val() != "" 
  && $("#pass").val() != ""
  && $("#fname").val() != ""
  && $("#sname").val() != ""	 
  && $("#idcard").val() != ""	
  && $("#conPass").val() != ""){
// ------------------------------------------------------------------------
swal({
                      title: 'ยืนยัน',
                      text: "การสมัครสมาชิก ?",
                      type: 'question',
                      showCancelButton: true,
                      confirmButtonColor: '#199e36',
                      cancelButtonColor: '#d33',
					  cancelButtonText: 'ยกเลิก',
                      confirmButtonText: 'ยืนยัน',
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
                            text: "การสมัครสมาชิก สำเร็จ.",
                            type: "success",  
       
                          }).then(function() {
                            //document.getElementById("register_form").reset();
                            //$('#model_login').modal('show');
                            location.href='index.php';  
                          });

                        }

                            },
                        });
                    }   
                })
// -------------------------------------------------------------------------
  }else{
    swal('คำเตือน!','กรุณากรอกข้อมูลให้ครบถ้วน','warning');

                    /*if($("#li_number").val() == ""){
                        $("#li_number").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: red; border-width: 1px; background-color: #ff000038;");
                        setTimeout(function() {
                            $("#li_number").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px;");
                        }, 5000);
                    }*/
                    if($("#email").val() == ""){
                        $("#email").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: red; border-width: 1px; background-color: #ff000038;");
                        setTimeout(function() {
                            $("#email").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px;");
                        }, 5000);
                    }
	  				if($("#idcard").val() == ""){
                        $("#idcard").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: red; border-width: 1px; background-color: #ff000038;");
                        setTimeout(function() {
                            $("#idcard").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px;");
                        }, 5000);
                    }
                    if($("#pass").val() == ""){
                        $("#pass").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: red; border-width: 1px; background-color: #ff000038;");
                        setTimeout(function() {
                            $("#pass").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px;");
                        }, 5000);
                    }
                    if($("#conPass").val() == ""){
                        $("#conPass").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: red; border-width: 1px; background-color: #ff000038;");
                        setTimeout(function() {
                            $("#conPass").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px;");
                        }, 5000);
                    }
	  				if($("#fname").val() == ""){
                        $("#fname").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: red; border-width: 1px; background-color: #ff000038;");
                        setTimeout(function() {
                            $("#fname").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px;");
                        }, 5000);
                    }
	  				if($("#sname").val() == ""){
                        $("#sname").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: red; border-width: 1px; background-color: #ff000038;");
                        setTimeout(function() {
                            $("#sname").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px;");
                        }, 5000);
                    }
  	}
});
</script>

<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
// $(document).on('click', '#list_pay_bt', function(){

//   window.location.href = "add_credit.php?pay=show";

// });
  $(document).on('click', '#login', function(){

    var username = $('#txtUserName').val();
    var password = $('#txtPassword').val();
    $.ajax({
        url:"library/function_m.php",
        method:"POST",
        data: {username:username,
              password:password},
      success:function(data){
		//console.log('log : ',data); 
        if(data.status == 1){
        location.href="../main/index.php";
        }else if(data.status == 0){
		 $('.alert_sty').fadeIn();	
		 $('.alert-massage').fadeIn();	
        }else if(data.status == 2){
          location.href="../../engine/";
        }else{
         $('.alert-massage-exist').fadeIn();
        }
      } 
    });
  });

  $('#txtPassword').keypress(function(event) {
        if(event.keyCode===13){
          $('#login').trigger('click');
        }
  });

  </script>



<script>
function forgot(){
    // $('#model_login').modal('hide');
                            swal.fire({
                            title: "ลืมรหัสผ่าน !",/*Forgot password*/
                            html: `
                            <div style="background-color: #f1f9ff; border-radius: 5px; padding: 5px;">
                            <h5 style="color:#000000;" >กรุณากรอกอีเมลที่ใช้สมัคร</h5>
                            <input type="text" name="mail" class="form-control form-control-sm">
                            </div> `,
                        
                            confirmButtonColor: "#1FAB45",
                            confirmButtonText: "ยืนยัน",
                            cancelButtonText: "ยกเลิก",
                            showCancelButton: true,
							reverseButtons: true,	
                            type: "warning",

                            preConfirm: function() {
                            return new Promise((resolve, reject) => {
                                // get your inputs using their placeholder or maybe add IDs to them
                                resolve({
                                    mail: $('input[name="mail"]').val()
                                });
                            });
                        }

                          }).then((data) => {
          console.log(data);
          mail = data.value.mail;

if(mail == ''){ //if 
swal.fire({
title: "คำเตือน !",
text: "กรุณากรอกอีเมลที่ใช้สมัคร !",
type: "warning"
});
}else{

  // ----------------
  $.ajax({
                        type: "POST",
                        url: "function_m.php",
                        data:{_method:'CHECK_EMAIL',
                              email:mail
                              },
        
                        success: function(response) {
                          console.log('response : ',response);
                          if(response.status == 1){
                            let mail_val = new FormData();
                              mail_val.append('mail',mail);
                              // p_price_val.append('status',status);   

                              $.ajax({  
                                      url: "forgot_password.php",  
                                      method: "POST",  
                                      data: mail_val,
                                      contentType: false,
                                      processData: false,  
                                      success:function(data)  
                                      {  

                                              setTimeout(function() {
                                              swal.fire({
                                                  title: "Success !",
                                                  text: "ตรวจสอบรหัสผ่านใหม่ได้ที่อีเมล",
                                                  type: "success"
                                                }).then(function() {
                                                  window.location = "";
                                                });
                                          }, 500);

                              
                                      }  
                                });

                          }else if(response.status == 0){ //if 

                            swal.fire({
                                                  title: "คำเตือน !",
                                                  text: "ไม่พบ E-mail นี้ในการสมัคร กรุณาตรวจสอบใหม่ !",
                                                  type: "warning"
                                                }).then(function() {
                                                  // window.location = "";
                                                });
                          }


                        }
                        });
  // -*--------------

} 

                

                    


    });
}
</script>
	