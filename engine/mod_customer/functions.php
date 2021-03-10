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
	}else if ($_POST['form']=="form_edit") {
		form_edit();
	}else if ($_POST['form']=="del_one") {
		del_one();
	}else if ($_POST['form']=="form_address") {
		form_address();
	}else if ($_POST['form']=="check_email") {
		check_email();
	}else if ($_POST['form']=="form_print") {
		form_print();
	}else if ($_POST['form']=="approval_one_product") {
		approval_one_product();
	}
}else{
	if ($_GET['form']=="Multi_del") {
		Multi_del();
	}else if ($_GET['form']=="confirm_cus") {
		confirm_cus();
	}else if ($_GET['form']=="un_confirm_cus") {
		un_confirm_cus();
	}
}

function check_email(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}


	header('Content-Type: application/json');
	$e_mail = $db->clear($_POST["e_mail"]);
	$sql = '';
	$sql .= "SELECT COUNT(`id_customer`) AS num_id FROM `mod_customer` WHERE `email` = '".$e_mail."'  ";
	if ($_POST["id_cus"]!="") {
		$sql .= " AND id_customer !='".$_POST["id_cus"]."' ";
	}
	
	$objQuery = $db->Query($sql);
  	$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
	if($objResult["num_id"] < 1){
		echo json_encode(array('status' => '0','message'=> 'ไม่ซ้ำ'.$sql));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ซ้ำ'.$sql));
	}
}

function form_address(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");

	$id_edit = $db->clear($_POST["id_edit"]);
	$id_address = $db->clear($_POST["id_address"]);
	$address = $db->clear($_POST["address"]);
	$district = $db->clear($_POST["district"]);
	$province = $db->clear($_POST["province"]);
	$amphures = $db->clear($_POST["amphures"]);
	$zip_code = $db->clear($_POST["zip_code"]);

	if ($_POST["id_address"] == '') {
		$str = "INSERT INTO `user_address`( `id_user`, `address`, `district`, `amphur`, `province`, `postcode`, `type`, `status`, `create_id`, `create_datetime`) VALUES ('".$id_edit."','".$address."','".$district."','".$amphures."','".$province."','".$zip_code."','1','1','".$id_data."','".$date_regdate."') ";
		$objQuery = $db->Query($str);
	}else{
		$str = "UPDATE `user_address` SET `address`='".$address."',`district`='".$district."',`amphur`='".$amphures."',`province`='".$province."',`postcode`='".$zip_code."' WHERE `id_address` = '".$id_address."' ";
		$objQuery = $db->Query($str);
	}
	

	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}
}

function form_print(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");

	$ip_customer = $db->clear($_POST["ip_customer"]);
	$print_customer = $db->clear($_POST["print_customer"]);
    $id_print = $db->clear($_POST["id_print"]);

    $str = "UPDATE `mod_customer` SET `ip_customer`='".$ip_customer."',`print_customer`='".$print_customer."',`update_id`='".$id_data."',`update_datetime`='".$date_regdate."' WHERE `id_customer` = '".$id_print."' ";
    $objQuery = $db->Query($str);

	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}
}

function confirm_cus(){
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
	
	$id = $db->clear($_POST["Chk"][$i]);

	$str = "UPDATE `mod_customer` SET `status`='1' WHERE `id_customer`='".$id."' ";
	$objQuery = $db->Query($str);

}
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}
function un_confirm_cus(){
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
	
	$id = $db->clear($_POST["Chk"][$i]);

	$str = "UPDATE `mod_customer` SET `status`='3' WHERE `id_customer`='".$id."' ";
	$objQuery = $db->Query($str);

}
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
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
	
	$id = $db->clear($_POST["Chk"][$i]);

	$str = "UPDATE `mod_customer` SET `delete_datetime`='".$date_regdate."' WHERE `id_customer`='".$id."' ";
	$objQuery = $db->Query($str);

	$str_users = "UPDATE `users` SET `user_email` = null ,`delete_datetime` = '".$date_regdate."' WHERE `id_data_role` ='".$id."' ";
	$objQuery_users = $db->Query($str_users);

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
	

	$id = $db->clear($_POST["id"]);

	$str = "UPDATE `mod_customer` SET `delete_datetime`='".$date_regdate."' WHERE `id_customer`='".$id."' ";
	$objQuery = $db->Query($str);

	$str_users = "UPDATE `users` SET `user_email` = null ,`delete_datetime` = '".$date_regdate."' WHERE `id_data_role` ='".$id."' ";
	$objQuery_users = $db->Query($str_users);

	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}



function form_edit(){
	$db = new DB();
	
	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
	$year = date("Y");

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

if( file_exists("../../uploads/".$year) ){
	if( file_exists("../../uploads/".$year."/mod_customer") ){
	}else{ 
		mkdir("../../uploads/".$year."/mod_customer");
	}

}else{ 
	mkdir("../../uploads/".$year);
	if( file_exists("../../uploads/".$year."/mod_customer") ){
	}else{ 
		mkdir("../../uploads/".$year."/mod_customer");
	}

}

$directory = "../../uploads/".$year."/mod_customer/";	
	
	

$string = explode("-", $_POST["id_cade"]);
$id_cade_text = '';
for ($i=0; $i < count($string) ; $i++) { 
		$id_cade_text .= $string[$i];
	}	
	

	$name = $db->clear($_POST["name"]);
	$id_cade = $db->clear($id_cade_text);
	$e_mail = $db->clear($_POST["e_mail"]);
	$telaphone = $db->clear($_POST["telaphone"]);
    $id_category = $db->clear($_POST["id_category_edit"]);
	$id_edit = $db->clear($_POST["id_edit"]);
	$directory_ed = $db->clear($_POST["directory_ed"]);


$str = "";
$str .="UPDATE `mod_customer` SET ";
$str .="  `forename` = '".$name."' ";
$str .=",`id_card`='".$id_cade."' ";
$str .=",`email`='".$e_mail."' ";
$str .=",`telephone`='".$telaphone."' ";
$str .=",`id_catagory`='".$id_category."' ";    
$str .=",`update_id`='".$id_data."' ";
$str .=",`update_datetime`='".$date_regdate."' ";
$str .=" WHERE `id_customer`= '".$id_edit."' ";
$objQuery = $db->Query($str);

if($objQuery){

if(isset($_FILES['name_img']) && $_FILES['name_img']['name']!=''){

  $fieldname = $_FILES['name_img']['name'];
  // Get filename.
  $filename = explode(".", $_FILES['name_img']['name']);
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $tmpName = $_FILES['name_img']['tmp_name'];

  // Get mime type.
  $mimeType = finfo_file($finfo, $tmpName);

  // Get extension. You must include fileinfo PHP extension.
  $extension = end($filename);

  // Allowed extensions.
  $allowedExts = array("gif", "jpeg", "jpg", "png", "svg", "blob");

  // Allowed mime types.
  $allowedMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/x-png", "image/png", "image/svg+xml");

  // Validate image.
  if (!in_array(strtolower($mimeType), $allowedMimeTypes) || !in_array(strtolower($extension), $allowedExts)) {
    //type ไม่ผ่าน
   
  }else{
				$namefile = $_FILES["name_img"]["name"];
				$sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
				$name = "cus-".(Date("dmy").rand('1000','9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
				$target = $directory.$name;
				$newname = $name;

				if(file_exists($target)){
					$oldname = pathinfo($name, PATHINFO_FILENAME);
					$ext = pathinfo($name, PATHINFO_EXTENSION);
					$newname = $oldname;
					do{
						$r = rand(1000,9999);
						$newname = $oldname."-".$r.".$ext";
						
						$target = $directory.$newname;
					}while (file_exists($target)); 
				}

				copy($_FILES["name_img"]["tmp_name"],iconv('UTF-8','windows-874',$directory.$newname));
				if ($_POST["name_img_ed"] !='') {
					if( file_exists($directory_ed) ){
						unlink ($directory_ed);
					}
				}	
				
$sql = "";
$sql .="UPDATE `user_images` SET ";
$sql .=" `name` = '".$newname."' ";
$sql .=",`size`='".$_FILES["name_img"]["size"]."' ";
$sql .=",`directory`='".$directory."' ";
$sql .=",`date`='".$date_regdate."' ";
$sql .=" WHERE `id_user`= '".$id_edit."' ";
$query = $db->Query($sql);

	}	
}


// $strSQL3 ="UPDATE users SET";
// $strSQL3 .= "  `user_email` = '$e_mail', `update_datetime`= '$date_regdate' WHERE `id_data_role` = '$id_edit' "; 
// $objQuery3 = $db->Query($strSQL3);
	
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

function form_add(){
	$db = new DB();
	
	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
	$year = date("Y");

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

if( file_exists("../../uploads/".$year) ){
	if( file_exists("../../uploads/".$year."/mod_customer") ){
	}else{ 
		mkdir("../../uploads/".$year."/mod_customer");
	}

}else{ 
	mkdir("../../uploads/".$year);
	if( file_exists("../../uploads/".$year."/mod_customer") ){
	}else{ 
		mkdir("../../uploads/".$year."/mod_customer");
	}

}

$directory = "../../uploads/".$year."/mod_customer/";	
	
	

$string = explode("-", $_POST["id_cade"]);
$id_cade_text = '';
for ($i=0; $i < count($string) ; $i++) { 
		$id_cade_text .= $string[$i];
	}	

	$name = $db->clear($_POST["name"]);
	
	$id_cade = $db->clear($id_cade_text);
	$e_mail = $db->clear($_POST["e_mail"]);
	$telaphone = $db->clear($_POST["telaphone"]);
    $id_category = $db->clear($_POST["id_category"]);
	
    $id_customer = setMD5();
    $str = "INSERT INTO `mod_customer`(`id_customer`, `forename`, `id_card`, `email`, `telephone`, `id_catagory`, `create_id`, `create_datetime`) VALUES ('".$id_customer."','".$name."','".$id_cade."','".$e_mail."','".$telaphone."','".$id_category."','".$id_data."','".$date_regdate."')";
    $objQuery = $db->Query($str);


// $sql = "SELECT * FROM roles WHERE tag = 'mod_customer' ";
//     $query = $db->Query($sql);
//     $result = mysqli_fetch_array($query);
	
// 	$id_date_role = $result['id_role'];
// $pass1='1234';
// $pass = password_hash($e_mail,PASSWORD_DEFAULT);
// $id_member = setMD5();
// $strSQL3 ="INSERT INTO users";
// $strSQL3 .= "(`id_user`, `user_name`, `user_password`, `user_email`, `create_datetime`, `update_datetime` ,`id_data_role`,`id_role`)";
// $strSQL3 .= "VALUES ";
// $strSQL3 .= "('$id_member','$e_mail','$pass','$e_mail','$date_regdate','$date_regdate','$id_customer', '$id_date_role')";
// $objQuery3 = $db->Query($strSQL3);


	if($objQuery){
if(isset($_FILES['name_img']) && $_FILES['name_img']['name']!=''){

  $fieldname = $_FILES['name_img']['name'];
  // Get filename.
  $filename = explode(".", $_FILES['name_img']['name']);
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $tmpName = $_FILES['name_img']['tmp_name'];

  // Get mime type.
  $mimeType = finfo_file($finfo, $tmpName);

  // Get extension. You must include fileinfo PHP extension.
  $extension = end($filename);

  // Allowed extensions.
  $allowedExts = array("gif", "jpeg", "jpg", "png", "svg", "blob");

  // Allowed mime types.
  $allowedMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/x-png", "image/png", "image/svg+xml");

  // Validate image.
  if (!in_array(strtolower($mimeType), $allowedMimeTypes) || !in_array(strtolower($extension), $allowedExts)) {
    //type ไม่ผ่าน
    $newname_img = "";
    $tmp_size = '';
  }else{
				$namefile = $_FILES["name_img"]["name"];
				$sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
				$name = "cus-".(Date("dmy").rand('1000','9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
				$target = $directory.$name;
				$newname = $name;

				if(file_exists($target)){
					$oldname = pathinfo($name, PATHINFO_FILENAME);
					$ext = pathinfo($name, PATHINFO_EXTENSION);
					$newname = $oldname;
					do{
						$r = rand(1000,9999);
						$newname = $oldname."-".$r.".$ext";
						
						$target = $directory.$newname;
					}while (file_exists($target)); 
				}

				copy($_FILES["name_img"]["tmp_name"],iconv('UTF-8','windows-874',$directory.$newname));
				$newname_img = $newname;
				$tmp_size = $_FILES["name_img"]["size"];
	}	
}else{
  	$newname_img = "";
  	$tmp_size = '';
}


$sql = "INSERT INTO `user_images`(`id_user`, `name`, `size`, `date`, `directory`, `active`, `type`) VALUES ('".$id_customer."','".$newname_img."','".$tmp_size."','".$date_regdate."','".$directory."','1','1')";
$query = $db->Query($sql);
	
        if($query){
            echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
        }else{
            echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
        }
		
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}


function approval_one_product(){
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
	$data_val = $db->clear($_POST["data_val"]);

	$str = "UPDATE `users` SET `status`='".$data_val."',`update_datetime`='".$date_regdate."' WHERE `id_data_role`='".$id."' ";
	$objQuery = $db->Query($str);
    
    $str_cus = "UPDATE `mod_customer` SET `update_datetime`='".$date_regdate."',`update_id`='".$id_data."',`status`='".$data_val."' WHERE `id_customer`='".$id."' ";
	$objQuery_cus = $db->Query($str_cus);
    
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

?>