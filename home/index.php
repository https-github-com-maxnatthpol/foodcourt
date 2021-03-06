<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../engine/lib/connect.php';
require_once '../engine/lib/config.php';
require_once '../engine/lib/service.php';
require_once '../engine/lib/functions.php';
$db = new DB();

$str_tbl = "SHOW TABLES LIKE 'users'";
$query_tbl = $db->Query($str_tbl);
if ($num = mysqli_num_rows($query_tbl) == 1) {

	
	//เช็ควันหมดอายุของบัตร
	$db = new DB();
	$date_regdate = date("Y-m-d");
	$last_update = date("Y-m-d H:i:s");
	$str = "SELECT * FROM `card` WHERE `expiry_date` <= '" . $date_regdate . "' AND `expiry_date` != '0000-00-00'";
	$query = $db->Query($str);

	if ($query) {

		while ($row = mysqli_fetch_array($query)) {
			$id = setMD5();
			$str = "INSERT INTO `expiry_history`(`id`, `card_number`, `amount`, `expiry_date`) 
				VALUES ('" . $id . "','" . $row["card_number"] . "','" . $row["amount"] . "','" . $row["expiry_date"] . "')";
			$objQuery = $db->Query($str);
		}
	}

	$str = "SELECT * FROM `card` WHERE `expiry_date` <= '" . $date_regdate . "' AND `expiry_date` != '0000-00-00'";
	$query = $db->Query($str);

	if ($query) {

		while ($row = mysqli_fetch_array($query)) {
			$str = "UPDATE card SET amount = '0',last_update = '" . $last_update . "' ,expiry_date = '' WHERE id = '" . $row["id"] . "'";
			$objQuery = $db->Query($str);
		}
	}

	if (isset($_SESSION["user_id"])) {

		$user_id = $db->clear($_SESSION["user_id"]);
		$str = "SELECT * FROM users WHERE id_user= '" . $user_id . "'";
		$query = $db->Query($str);
		$result = !empty($query) ? mysqli_fetch_array($query) : null;
		if (isset($result) && $_SESSION["user_id"] == $result['member_session_update']) {
			$_SESSION['id_data_role'] = $result['id_data_role'];
			header('Location: page_home/');
			exit;
		} else {
			header('Location: ../engine/page_home/');
		}
	}
} else {
	header('Location: formAdminlocal.php');
}

$title = getSetting('head_title');
$title = $title == "" ? TITLE : $title;

$logo_img2 = getSetting('logo_img2');
$logo_img2 = $logo_img2 == "" ? logo_img2 : $logo_img2;

$logo_img = getSetting('logo_img');
$logo_img = $logo_img == "" ? logo_img : $logo_img;

?>
<!DOCTYPE html>
<html lang="th">

<head>
	<title><?php echo $title; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<?php $show_images1 = explode("/", $logo_img); ?>
	<?php $show_images_index1 = $show_images1[1] . '/' . $show_images1[2] . '/' . $show_images1[3] . '/' . $show_images1[4] . '/' . $show_images1[5] ?>
	<link rel="icon" type="image/png" href="<?php echo $show_images_index1; ?>" />
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
						<?php echo lang('เข้าสู่ระบบเพื่อดำเนินการต่อ', 'Login to continue'); ?>
					</span>


					<div class="wrap-input100 validate-input" data-validate="กรุณากรอก Username">
						<input class="input100" type="text" name="txtUserName" id="txtUserName">
						<span class="focus-input100"></span>
						<span class="label-input100"><?php echo lang('ชื่อผู้ใช้งาน', 'Username'); ?></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="กรุณากรอก Password">
						<input class="input100" type="password" name="txtPassword" id="txtPassword">
						<span class="focus-input100"></span>
						<span class="label-input100"><?php echo lang('รหัสผ่าน', 'Password'); ?></span>
					</div>

					<div class="alert alert-danger alert-massage" style="display: none;">
						<h3 class="text-danger"><i class="icon fa fa-ban"></i> ผิดพลาด</h3>
						<label id="div_taxt_error"></label>
					</div>

					<div class="show-password">
						<span id="a_pass" onclick="showPass()"><i class="fa fa-eye-slash"></i> <?php echo lang('แสดงรหัสผ่าน', 'Show password'); ?></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="login">
							<?php echo lang('เข้าสู่ระบบ', 'Login'); ?>
						</button>
					</div>

				</form>
				<?php $show_images = explode("/", $logo_img2); ?>
				<?php $show_images_index = $show_images[1] . '/' . $show_images[2] . '/' . $show_images[3] . '/' . $show_images[4] . '/' . $show_images[5] ?>
				<div class="login100-more" style="background-image: url('<?php echo $show_images_index; ?>');">
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