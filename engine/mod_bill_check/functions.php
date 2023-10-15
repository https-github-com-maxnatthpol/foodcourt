<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
require_once '../lib/functions.php';


if (isset($_POST['form'])) {
	if ($_POST['form'] == "form_bill_check") {
		bill_check();
	}
} else {
	
}


function bill_check()
{
	$db = new DB();

	header('Content-Type: application/json');
	$date_regdate = date("Y-m-d H:i:s");

	if (isset($_SESSION["id_data"])) {
		$id_data = $_SESSION["id_data"];
	} else {
		$id_data = '';
	}

	(float)$total = $db->clear($_POST["total"]);
	$id_bill = $db->clear($_POST["id_bill"]);
	(float)$money = $db->clear($_POST["money"]);
	$type_of_money = $db->clear($_POST["type_of_money"]);

	$str = "";
	$str .= "UPDATE `mod_bill` SET ";
	$str .= " `check_bill` = '" . $id_data . "' ";
	$str .= " ,`date_end` = '" . $date_regdate . "' ";
	$str .= " ,`total` = '" . $total . "' ";
	$str .= " ,`status` = '2' ";
	$str .= " ,`money` = '" . $money . "' ";
	$str .= " ,`type_of_money` = '" . $type_of_money . "' ";
	$str .= " WHERE `id`= '" . $id_bill . "' ";
	$objQuery = $db->Query($str);

	if ($objQuery) {
		echo json_encode(array('status' => '0', 'message' => 'สำเร็จ', 'id_bill' => $id_bill));
	} else {
		echo json_encode(array('status' => '1', 'message' => 'ไม่สำเร็จ'));
	}
}