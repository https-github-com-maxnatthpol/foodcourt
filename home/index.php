<?php
// error_reporting (E_ALL ^ E_NOTICE);
require_once '../engine/lib/functions.php';
require_once '../engine/lib/connect.php';
require_once '../engine/lib/config.php'; 
require_once '../engine/lib/service.php';
require_once '../engine/lib/lang.php';
//require_once 'functions_m.php';
?>
<!DOCTYPE html>
<html lang="th">
<head>
	<title>เข้าสู่ระบบ</title>
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
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						<?php echo lang('เข้าสู่ระบบเพื่อดำเนินการต่อ','Login to continue'); ?>
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "กรุณากรอก Username">
						<input class="input100" type="text" name="username" id="username">
						<span class="focus-input100"></span>
						<span class="label-input100"><?php echo lang('ชื่อผู้ใช้งาน','Username'); ?></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="กรุณากรอก Password">
						<input class="input100" type="password" name="password" id="txtPassword">
						<span class="focus-input100"></span>
						<span class="label-input100"><?php echo lang('รหัสผ่าน','Password'); ?></span>
					</div>
					
					<div class="show-password">
								<span id="a_pass" onclick="showPass()"><i class="fa fa-eye-slash"></i> <?php echo lang('แสดงรหัสผ่าน','Show password'); ?></span>
							</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
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

</body>
</html>