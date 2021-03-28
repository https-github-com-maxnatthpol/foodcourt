<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
require_once '../lib/functions.php';

if (isset($_POST['form'])) {
	if ($_POST['form'] == "frm_select_num") {
		frm_select_num();
		exit;
	} elseif ($_POST['form'] == "form_add") {
		form_add();
		exit;
	} else if ($_POST['form'] == "form_edit") {
		form_edit();
		exit;
	}
}

function frm_select_num()
{
	$db = new DB();
	header('Content-Type: application/json');
	$sql = 'SELECT `number`,`Issue_date` FROM card order by `Issue_date` desc limit 1 ';
	$query = $db->Query($sql);
	$result = mysqli_fetch_array($query);

	if ($result > 0) {
		echo json_encode(array('status' => '1', 'message' => $result[0] + 1));
	} else {
		echo json_encode(array('status' => '0', 'message' => 'ผิดพลาด'));
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

	$sql = "SELECT card_number FROM `card` WHERE card_number = '" . $_POST["card_number_1"] . "'";
	$query = $db->Query($sql);
	$result = mysqli_fetch_array($query);

	if ($result > 0) {
		echo json_encode(array('status' => '2', 'message' => 'มีรหัสบัตรนี้แล้ว'));
	} else {
		$number = $db->clear($_POST["number_1"]);
		$card_number = $db->clear($_POST["card_number_1"]);
		$status = $db->clear("1");
		$amount = $db->clear("0");
		$Issue_date = $db->clear($date_regdate);
		$last_update = $db->clear("");
		$id_employee = $db->clear($id_data);

		$id = setMD5();

		$str = "INSERT INTO `card`(`id`, `number`, `card_number`, `status`,`amount`, `Issue_date`, `last_update`, `id_employee`) 
			VALUES ('" . $id . "','" . $number . "','" . $card_number . "','" . $status . "','" . $amount . "','" . $Issue_date . "','" . $last_update . "','" . $id_employee . "')";
		$objQuery = $db->Query($str);

		if ($objQuery) {
			echo json_encode(array('status' => '0', 'message' => 'สำเร็จ'));
		} else {
			echo json_encode(array('status' => '1', 'message' => 'ไม่สำเร็จ'));
		}
	}
}

function form_edit()
{
	$db = new DB();

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");

	$number = $db->clear($_POST["number"]);
	$card_number = $db->clear($_POST["card_number"]);
	$status = $db->clear($_POST["status"]);
	$last_update = $db->clear($date_regdate);
	$id = $db->clear($_POST["id"]);

	$str = "";
	$str .= "UPDATE `card` SET ";
	$str .= " `number` = '" . $number . "' ";
	$str .= ",`card_number`='" . $card_number . "' ";
	$str .= ",`status`='" . $status . "' ";
	$str .= ",`last_update`='" . $last_update . "' ";
	$str .= " WHERE `id`= '" . $id . "' ";
	$objQuery = $db->Query($str);

	if ($objQuery) {
		echo json_encode(array('status' => '0', 'message' => 'สำเร็จ'));
	} else {
		echo json_encode(array('status' => '1', 'message' => 'ไม่สำเร็จ'));
	}
}
