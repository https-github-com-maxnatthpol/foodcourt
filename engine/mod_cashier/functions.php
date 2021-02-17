<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
require_once '../lib/functions.php';


if (isset($_POST['form'])) {
	if ($_POST['form'] == "form_add_card") {
		form_add();
		exit;
	}
}

if ($_POST['_method'] == 'CHECK_card_number') {
	CHECK_card_number();
	exit;
}


function form_add()
{
	$db = new DB();

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");

	if (isset($_SESSION["id_data"])) {
		$id_data = $_SESSION["id_data"];
	} else {
		$id_data = '';
	}
	$number = $db->clear("0000001");
	$card_number = $db->clear($_POST["card_number"]);
	$img_card = $db->clear("");
	$status = $db->clear("1");
	$Issue_date = $db->clear($date_regdate);
	$id_employee = $db->clear($id_data);

	$id = setMD5();

	$str = "INSERT INTO `card`(`id`, `number`, `card_number`, `img_card`, `status`, `Issue_date`, `id_employee`) 
			VALUES ('" . $id . "','" . $number . "','" . $card_number . "','" . $img_card . "','" . $status . "','" . $Issue_date . "','" . $id_employee . "')";
	$objQuery = $db->Query($str);

	if ($objQuery) {
		echo json_encode(array('status' => '0', 'message' => 'สำเร็จ'));
	} else {
		echo json_encode(array('status' => '1', 'message' => 'ไม่สำเร็จ'));
	}
}

function CHECK_card_number()
{
	$db = new DB();
	header('Content-Type: application/json');

	$sql = 'SELECT * FROM card WHERE card_number = "' . $_POST['card_number'] . '" ';
	$query = $db->Query($sql);
	$result = mysqli_fetch_array($query);
	$num = mysqli_num_rows($query);
	if ($num > 0) {
		echo json_encode(array('status' => '1', 'message' => $result));
	} else {
		echo json_encode(array('status' => '0', 'message' => 'ผิดพลาด'));
	}
}
