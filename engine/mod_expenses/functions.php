<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
require_once '../lib/functions.php';


if (isset($_POST['form'])) {
	if ($_POST['form'] == "form_add_type1") {
		form_add_type1();
	}
} else {
	
}

function form_add_type1()
{
	$db = new DB();

	header('Content-Type: application/json');

	if (isset($_SESSION["id_data"])) {
		$id_data = $_SESSION["id_data"];
	} else {
		$id_data = '';
	}

	$time = date("h:i:sa");

	$date_action = $db->clear($_POST["date_action"]);
	$price = $db->clear($_POST["price"]);
	$quantity = $db->clear($_POST["quantity"]);
	$mod_menu = $db->clear($_POST["mod_menu"]);

	$pizza  = $_POST["mod_menu"];
	$pieces = explode("/", $pizza);

	$mod_menu = $db->clear($pieces[0]);
	$name = $db->clear($pieces[1]);
	$type_of_money = $db->clear($_POST["type_of_money"]);

	$id = setMD5();
	$str = "INSERT INTO `mod_expenses`(`id`, `name`, `price`,`quantity`, `date_action`, `type_of_money`, `mod_menu`, `mod_employee`) 
	VALUES ('" . $id . "','" . $name . "','" . $price . "','" . $quantity . "','" . $date_action." ".$time .  "','" . $type_of_money .  "','" . $mod_menu .  "','" . $id_data .  "');";

	if ($db->Query($str) === TRUE) {
		echo json_encode(array('status' => '0', 'message' => 'สำเร็จ'));
	  } else {
		echo json_encode(array('status' => '1', 'message' => 'ไม่สำเร็จ'));
	  }
}