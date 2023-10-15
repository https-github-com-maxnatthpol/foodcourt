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
	} else if ($_POST['form'] == "form_edit") {
		form_edit();
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
	$year = date("Y");

	if (isset($_SESSION["id_data"])) {
		$id_data = $_SESSION["id_data"];
	} else {
		$id_data = '';
	}

	$name = $db->clear($_POST["name"]);
	$status = $db->clear("1");

	$id = setMD5();
	$str = "INSERT INTO `mod_bill`(`id`, `name`, `date_come`,`status`, `mod_employee`) VALUES ('" . $id . "','" . $name . "','" . $date_regdate . "','" . $status . "','" . $id_data .  "')";
	$objQuery = $db->Query($str);

	if ($objQuery) {
		echo json_encode(array('status' => '0', 'message' => 'สำเร็จ'));
	} else {
		echo json_encode(array('status' => '1', 'message' => 'ไม่สำเร็จ'));
	}
}