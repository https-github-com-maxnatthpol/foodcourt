<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
require_once '../lib/functions.php';

if (isset($_POST['form'])) {
	if ($_POST['form']=="form_add") {
		form_add();
	}else if ($_POST['form']=="approval_one_shop") {
		approval_one_shop();
	}
}

function approval_one_shop(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");

	$id = $db->clear($_POST["id"]);
	$amount_customer = $db->clear($_POST["amount_customer"]);
    $amount_percent = $db->clear($_POST["amount_percent"]);
    $total_cus_per = $db->clear($_POST["total_cus_per"]);
    $date_action = $db->clear($_POST["date_action"]);

    $sales_store_id = setMD5();
    
    $str = "INSERT INTO `mod_sales_store`(`sales_store_id`, `sales_store_shop`, `sales_store_percent`, `sales_store_total`, `date_action`, `id_customer`, `create_id`, `create_datetime`) VALUES ('".$sales_store_id."','".$amount_customer."','".$amount_percent."','".$total_cus_per."','".$date_action."','".$id."','".$id_data."','".$date_regdate."')";
    $objQuery = $db->Query($str);
    
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

?>