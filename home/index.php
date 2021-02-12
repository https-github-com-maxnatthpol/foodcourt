<?php
require_once '../engine/lib/connect.php';
require_once '../engine/lib/config.php';
require_once '../engine/lib/service.php';
$db = new DB();

$str_tbl = "SHOW TABLES LIKE 'users'";
$query_tbl = $db->Query($str_tbl);
if ($num = mysqli_num_rows($query_tbl) == 1) {
    if (isset($_SESSION["user_id"])) {
        $user_id = $db->clear($_SESSION["user_id"]);
        $str = "SELECT * FROM users WHERE id_user= '" . $user_id . "'";
        $query = $db->Query($str);
        $result = !empty($query) ? mysqli_fetch_array($query) : null;
        if (isset($result) && $_SESSION["user_id"] == $result['member_session_update']) {
            $_SESSION['id_data_role'] = $result['id_data_role'];
            header('Location: page_home/');
            exit;
        }
    }
} else {
    header('Location: formAdminlocal.php');
}

$title = getSetting('head_title');
$title = $title == ""?TITLE:$title;

?>
<!DOCTYPE html>
<html lang="th">
<head>
	<title><?php echo $title; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	
	<link rel="stylesheet" href="../plugins_b/sweetalert/dist/sweetalert2.css">	
    <script src="../plugins_b/sweetalert/dist/sweetalert2.min.js"></script>	
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="javascript:void(0);">
					<span class="login100-form-title p-b-43">
						<?php echo lang('เข้าสู่ระบบเพื่อดำเนินการต่อ','Login to continue'); ?>
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "กรุณากรอก Username">
						<input class="input100" type="text" name="txtUserName" id="txtUserName">
						<span class="focus-input100"></span>
						<span class="label-input100"><?php echo lang('ชื่อผู้ใช้งาน','Username'); ?></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="กรุณากรอก Password">
						<input class="input100" type="password" name="txtPassword" id="txtPassword">
						<span class="focus-input100"></span>
						<span class="label-input100"><?php echo lang('รหัสผ่าน','Password'); ?></span>
					</div>
					
						<div class="alert alert-danger alert-massage" style="display: none;">
                            <h3 class="text-danger"><i class="icon fa fa-ban"></i> ผิดพลาด</h3>
							<label id="div_taxt_error"></label> 
                        </div>
					
					<div class="show-password">
								<span id="a_pass" onclick="showPass()"><i class="fa fa-eye-slash"></i> <?php echo lang('แสดงรหัสผ่าน','Show password'); ?></span>
							</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="login">
							<?php echo lang('เข้าสู่ระบบ','Login'); ?>
						</button>
					</div>

					
				</form>

				<div class="login100-more" style="background-image: url('../images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>
	
	<script>

$(document).on('click', '#login', function() {

    var username = $('#txtUserName').val();
    var password = $('#txtPassword').val();
    $.ajax({
        beforeSend: function() {
            $('#overlay').show();

        },
        complete: function() {
            $('#overlay').fadeOut();
        },
        url: "../engine/lib/service.php",
        method: "POST",
        data: {
            username: username,
            password: password
        },
        success: function(data) {
            //alert(data.message, 'Infomation:');
            if (data.role_tag == 'mod_customer') {
                //swal('เข้าสู่ระบบสำเร็จ')	
                location.href = "../engine/mod_test/front_manage.php";
            }
            else if (data.role_tag == 'mod_cashier') {
                //swal('เข้าสู่ระบบสำเร็จ')	
                location.href = "../engine/mod_cashier/front_manage.php";
            } 
            else if (data.role_tag == 'mod_employee') {
                //swal('เข้าสู่ระบบสำเร็จ')	
                location.href = "../engine/mod_employee/front_manage.php";
            }    
             else if (data.status == 0) {
                swal('คำเตือน',data.message,"warning")
				$('#div_taxt_error').html(data.message);
                $('.alert-massage').fadeIn();
            } else {
                $('.alert-massage-exist').fadeIn();
            }
        }
    });
});

$('#txtPassword').keypress(function(event) {
    if (event.keyCode === 13) {
        $('#login').trigger('click');
    }
});
</script>
	

</body>
</html>