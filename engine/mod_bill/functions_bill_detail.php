<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
require_once '../lib/functions.php';


if (isset($_POST['form'])) {
	if ($_POST['form'] == "form_add") {
		form_add();
	} else if ($_POST['form'] == "SendManu") {
		SendManu();
	} else if ($_POST['form'] == "delbilldetail") {
		delbilldetail();
	}
} else {
	if ($_GET['form'] == "Multi_del") {
		Multi_del();
	}
}


function Multi_del()
{
	$db = new DB();

	header('Content-Type: application/json');

	for ($i = 0; $i < count($_POST["Chk"]); $i++) {

		$id = $db->clear($_POST["Chk"][$i]);

		$str = "UPDATE `mod_bill` SET `status`='0' WHERE `id`='" . $id . "' ";
		$objQuery = $db->Query($str);
	}
	if ($objQuery) {
		echo json_encode(array('status' => '0', 'message' => 'สำเร็จ'));
	} else {
		echo json_encode(array('status' => '1', 'message' => 'ไม่สำเร็จ'));
	}
}

function delbilldetail()
{
	$db = new DB();

	header('Content-Type: application/json');

	$id_bill_detail = $db->clear($_POST["id_bill_detail"]);

	$str = "DELETE FROM `mod_bill_detail` WHERE `id`='" . $id_bill_detail . "' ";
	$objQuery = $db->Query($str);


	if ($objQuery) {
		echo json_encode(array('status' => '0', 'message' => 'สำเร็จ'));
	} else {
		echo json_encode(array('status' => '1', 'message' => 'ไม่สำเร็จ'));
	}
}



function form_edit()
{
	$db = new DB();

	header('Content-Type: application/json');

	$name = $db->clear($_POST["name_edit"]);
	$id_edit = $db->clear($_POST["id_edit"]);

	$str = "";
	$str .= "UPDATE `mod_bill` SET ";
	$str .= " `name` = '" . $name . "' ";
	$str .= " WHERE `id`= '" . $id_edit . "' ";
	$objQuery = $db->Query($str);

	if ($objQuery) {
		echo json_encode(array('status' => '0', 'message' => 'สำเร็จ'));
	} else {
		echo json_encode(array('status' => '1', 'message' => 'ไม่สำเร็จ'));
	}
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

	$name = $db->clear($_POST["name"]);
	$price = $db->clear($_POST["price"]);
	$mod_stock_type = $db->clear($_POST["mod_stock_type"]);
	$status = $db->clear("1");

	$id = setMD5();
	$str = "INSERT INTO `mod_menu`(`id`, `name`, `price`, `date_action`,`status`,`mod_stock_type`, `mod_employee`) VALUES ('" . $id . "','" . $name . "','" . $price . "','" . $date_regdate . "','" . $status . "','" . $mod_stock_type .  "','" . $id_data .  "')";
	$objQuery = $db->Query($str);

	if ($objQuery) {
		echo json_encode(array('status' => '0', 'message' => 'สำเร็จ'));
	} else {
		echo json_encode(array('status' => '1', 'message' => 'ไม่สำเร็จ'));
	}
}

function SendManu()
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

	$mod_menu = $db->clear($_POST["id_menu"]);
	$mod_bill = $db->clear($_POST["mod_bill"]);
	$id = setMD5();
	$str = "INSERT INTO `mod_bill_detail`(`id`, `date_action`, `mod_menu`, `mod_employee`, `mod_bill`) VALUES ('" . $id . "','" . $date_regdate . "','" . $mod_menu . "','" . $id_data .  "','" . $mod_bill .  "')";
	$objQuery = $db->Query($str);

	if ($objQuery) {
		echo json_encode(array('status' => '0', 'message' => 'สำเร็จ'));
	} else {
		echo json_encode(array('status' => '1', 'message' => 'ไม่สำเร็จ'));
	}
}
