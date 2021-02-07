<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';


if (isset($_POST['form'])) {
	if ($_POST['form']=="form_add") {
		form_add();
	}else if ($_POST['form']=="form_edit") {
		form_edit();
	}else if ($_POST['form']=="del_one") {
		del_one();
	}else if ($_POST['form']=="Multi_del") {
		Multi_del();
	}
}else{
	if ($_GET['form']=="order_chanhe") {
		order_chanhe();
	}
}


function Multi_del(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
	
for ($i=0; $i < count($_POST["Chk"]); $i++) { 
	
	$id_category_edit = $db->clear($_POST["Chk"][$i]);

	$str = "UPDATE `product_catagory` SET `delete_datetime`='".$date_regdate."' WHERE `id_catagory`='".$id_category_edit."' ";
	$objQuery = $db->Query($str);

}
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

function del_one(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
	

	$id_category_edit = $db->clear($_POST["id"]);

	$str = "UPDATE `product_catagory` SET `delete_datetime`='".$date_regdate."' WHERE `id_catagory`='".$id_category_edit."' ";
	$objQuery = $db->Query($str);
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

function order_chanhe(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
	
	$order = $db->clear($_GET["order"]);
	$id_category_edit = $db->clear($_GET["id"]);

	$str = "UPDATE `product_catagory` SET `order`='".$order."',`update_datetime`='".$date_regdate."' WHERE `id_catagory`='".$id_category_edit."' ";
	$objQuery = $db->Query($str);
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> $str));
	}

}

function form_edit(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
	
	$name_th 			= $db->clear($_POST["name_th_edit"]);
	$description_th 	= $db->clear($_POST["explanation_th_edit"]);
	$name_en 			= $db->clear($_POST["name_en_edit"]);
	$description_en 	= $db->clear($_POST["explanation_en_edit"]);
	$name_catagory_ed 	= $db->clear($_POST["name_catagory_ed"]);
	$id_category_edit 	= $db->clear($_POST["id_category_edit"]);
	
	$cut_post = explode("-", $name_catagory_ed);
	
	if($name_catagory_ed == '0'){
		$group = '';
		$level = '1';
	}else{
		if($cut_post[0] == 1){
			$group = $cut_post[1];
			$level = '2';
		}
		else if ($cut_post[0] == 2){
			$group = $cut_post[1];
			$level = '3';
		}
	}

	$str = "UPDATE `product_catagory` SET `name_catagory_th`='".$name_th."',`name_catagory_en`='".$name_en."',`description_th`='".$description_th."',`description_en`='".$description_en."',`update_datetime`='".$date_regdate."',`group_sub`='".$group."',`level`='".$level."' WHERE `id_catagory`='".$id_category_edit."' ";
	$objQuery = $db->Query($str);
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

function form_add(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
	
	$name_th = $db->clear($_POST["name_th"]);
	$description_th = $db->clear($_POST["explanation_th"]);
	$name_en = $db->clear($_POST["name_en"]);
	$description_en = $db->clear($_POST["explanation_en"]);
	$name_catagory = $db->clear($_POST["name_catagory"]);
	
	$cut_post = explode("-", $name_catagory);
	
	if($name_catagory == '0'){
		$group = '';
		$level = '1';
	}else{
		if($cut_post[0] == 1){
			$group = $cut_post[1];
			$level = '2';
		}
		else if ($cut_post[0] == 2){
			$group = $cut_post[1];
			$level = '3';
		}
	}

//	$select_sql = "SELECT MAX(`order`) AS num_order  FROM `category` WHERE `delete_datetime` IS null";
//	$select_query = $db->Query($select_sql);
//	$select_result = mysqli_fetch_array($select_query, MYSQLI_ASSOC);
//	if (isset($select_result["num_order"])) {
//		$num_order = intval($select_result["num_order"])+1;
//	}else{
//		$num_order = 1;
//	}


	$str = "INSERT INTO `product_catagory`( `name_catagory_th`, `name_catagory_en`, `description_th`, `description_en`,  `create_id`,`group_sub`,`level`, `create_datetime`) VALUES ('".$name_th."','".$name_en."','".$description_th."','".$description_en."','".$id_data."','".$group."','".$level."','".$date_regdate."')";
	$objQuery = $db->Query($str);
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}




?>