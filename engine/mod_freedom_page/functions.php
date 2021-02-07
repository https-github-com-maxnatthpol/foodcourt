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
	
	$id_edit = $db->clear($_POST["Chk"][$i]);

	$str = "UPDATE `freedom_page` SET `delete_datetime`='".$date_regdate."' WHERE `id_page`='".$id_edit."' ";
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
	

	$id_edit = $db->clear($_POST["id"]);

	$str = "UPDATE `freedom_page` SET `delete_datetime`='".$date_regdate."' WHERE `id_page`='".$id_edit."' ";
	$objQuery = $db->Query($str);
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
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
	
	$name_th = $db->clear($_POST["name_th_edit"]);
	$detail_th = $db->clear($_POST["detail_th"]);
	$name_en = $db->clear($_POST["name_en_edit"]);
	$detail_en = $db->clear($_POST["detail_en"]);
	$link_edit = $db->clear($_POST["link_edit"]);
	$id_link_edit = $db->clear($_POST["id_link_edit"]);
	$id_edit = $db->clear($_POST["id_edit"]);


	$sql = "UPDATE `link_page` SET `name`='".$name_th."',`link`='".$link_edit."' WHERE `id_link`='".$id_link_edit."'";
	$query = $db->Query($sql);

	$id_link = $db->lastInsertID();

	$str = "UPDATE `freedom_page` SET `name_th`='".$name_th."',`name_en`='".$name_en."',`text_th`='".$detail_th."',`text_en`='".$detail_en."',`update_id`='".$id_data."',`update_datetime`='".$date_regdate."' WHERE `id_page`='".$id_edit."'";
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
	$detail_th = $db->clear($_POST["detail_th"]);
	$name_en = $db->clear($_POST["name_en"]);
	$detail_en = $db->clear($_POST["detail_en"]);
	$link = $db->clear($_POST["link"]);


	$sql = "INSERT INTO `link_page`(`name`, `table`, `link`) VALUES ('".$name_th."','freedom_page','".$link."')";
	$query = $db->Query($sql);

	$id_link = $db->lastInsertID();

	$str = "INSERT INTO `freedom_page`( `name_th`, `name_en`, `text_th`, `text_en`, `id_link`, `create_id`, `create_datetime`, `update_id`, `update_datetime`) VALUES ('".$name_th."','".$name_en."','".$detail_th."','".$detail_en."','".$id_link."','".$id_data."','".$date_regdate."','".$id_data."','".$date_regdate."')";
	$objQuery = $db->Query($str);
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

?>