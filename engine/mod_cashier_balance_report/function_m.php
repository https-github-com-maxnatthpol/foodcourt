<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
require_once '../lib/functions.php';

if (isset($_POST['form'])) {
 if ($_POST['form']=="approval_one") {
		approval_one();
	}
}

function approval_one(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");

	$id_cashier= $db->clear($_POST["id"]);
	$sales_store = $db->clear($_POST["sales_store"]);
    $sales_store_transfer = $db->clear($_POST["sales_store_transfer"]);
    $sales_store_paid = $db->clear($_POST["sales_store_paid"]);
	$sales_store_total = $db->clear($_POST["sales_store_total"]);
    $date_action = $db->clear($_POST["date_action"]);

    $id = setMD5();
    
    $str = "INSERT INTO `mod_cashier_sales_store`(`id`, `sales_store`, `sales_store_transfer`, `sales_store_paid`, `sales_store_total`, `date_action`, `id_cashier`, `create_id`, `create_datetime`) 
	VALUES ('".$id."','".$sales_store."','".$sales_store_transfer."','".$sales_store_paid."','".$sales_store_total."','".$date_action."','".$id_cashier."','".$id_data."','".$date_regdate."')";
    $objQuery = $db->Query($str);
    
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}