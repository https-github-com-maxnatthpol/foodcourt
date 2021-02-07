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
	}else if ($_POST['form']=="form_add_Heading") {
		form_add_Heading();
	}else if ($_POST['form']=="del_one") {
		del_one();
	}else if ($_POST['form']=="Multi_del") {
		Multi_del();
	}else if ($_POST['form']=="form_edit") {
		form_edit();
	}
}else{
	
}


function form_add_Heading(){
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
	if( file_exists("../../uploads/".$year."/mod_heading") ){
	}else{ 
		mkdir("../../uploads/".$year."/mod_heading");
	}
}else{ 
	mkdir("../../uploads/".$year);
	if( file_exists("../../uploads/".$year."/mod_heading") ){
	}else{ 
		mkdir("../../uploads/".$year."/mod_heading");
	}

	
	}


$directory = "../../uploads/".$year."/mod_heading/";

if(isset($_FILES['heading_img']) && $_FILES['heading_img']['name']!=''){

  $fieldname = $_FILES['heading_img']['name'];
  // Get filename.
  $filename = explode(".", $_FILES['heading_img']['name']);
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $tmpName = $_FILES['heading_img']['tmp_name'];

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
  }else{
				$namefile = $_FILES["heading_img"]["name"];
				$sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
				$name = "property-".(Date("dmy").rand('1000','9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
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

				copy($_FILES["heading_img"]["tmp_name"],iconv('UTF-8','windows-874',$directory.$newname));
				$newname_img = $newname;

	}	
}else{
  	$newname_img = "";
}		

	
	
	$name_th = $db->clear($_POST["name_th_heading"]);
	$detail_th = $db->clear($_POST["detail_th_heading"]);
	$name_en = $db->clear($_POST["name_en_heading"]);
	$detail_en = $db->clear($_POST["detail_en_heading"]);
	$tag_th_heading = $db->clear($_POST["tag_th_heading"]);

	

	$str = "INSERT INTO `heading`(`name_th`, `name_en`, `description_th`, `description_en`, `tag`, `image`, `directory`, `create_id`, `create_datetime`) VALUES ('".$name_th."','".$name_en."','".$detail_th."','".$detail_en."','".$tag_th_heading."','".$newname_img."','".$directory."','".$id_data."','".$date_regdate."')";
	$objQuery = $db->Query($str);
	if($objQuery){
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
	if( file_exists("../../uploads/".$year."/mod_property") ){
	}else{ 
		mkdir("../../uploads/".$year."/mod_property");
	}
}else{ 
	mkdir("../../uploads/".$year);
	if( file_exists("../../uploads/".$year."/mod_property") ){
	}else{ 
		mkdir("../../uploads/".$year."/mod_property");
	}

	
	}


$directory = "../../uploads/".$year."/mod_property/";

if(isset($_FILES['property_img']) && $_FILES['property_img']['name']!=''){

  $fieldname = $_FILES['property_img']['name'];
  // Get filename.
  $filename = explode(".", $_FILES['property_img']['name']);
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $tmpName = $_FILES['property_img']['tmp_name'];

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
  }else{
				$namefile = $_FILES["property_img"]["name"];
				$sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
				$name = "property-".(Date("dmy").rand('1000','9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
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

				copy($_FILES["property_img"]["tmp_name"],iconv('UTF-8','windows-874',$directory.$newname));
				$newname_img = $newname;
	}	
}else{
  	$newname_img = "";
}		

	
	
	$name_th = $db->clear($_POST["name_th"]);
	$detail_th = $db->clear($_POST["detail_th"]);
	$name_en = $db->clear($_POST["name_en"]);
	$detail_en = $db->clear($_POST["detail_en"]);
	$order = $db->clear($_POST["order"]);

	

	$str = "INSERT INTO `property`(`name_th`, `name_en`, `description_th`, `description_en`, `order`, `image`, `directory`, `create_id`, `create_datetime`) VALUES ('".$name_th."','".$name_en."','".$detail_th."','".$detail_en."','".$order."','".$newname_img."','".$directory."','".$id_data."','".$date_regdate."')";
	$objQuery = $db->Query($str);
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

	$str = "UPDATE `property` SET `delete_datetime`= '".$date_regdate."' WHERE `id_property`= '".$id."' ";
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
	

	$id = $db->clear($_POST["id"]);

	$str = "UPDATE `property` SET `delete_datetime`= '".$date_regdate."' WHERE `id_property`= '".$id."'";
	$objQuery = $db->Query($str);
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
	$sql_img = "";

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

if( file_exists("../../uploads/".$year) ){
	if( file_exists("../../uploads/".$year."/mod_property") ){
	}else{ 
		mkdir("../../uploads/".$year."/mod_property");
	}
}else{ 
	mkdir("../../uploads/".$year);
	if( file_exists("../../uploads/".$year."/mod_property") ){
	}else{ 
		mkdir("../../uploads/".$year."/mod_property");
	}

	
	}


$directory = "../../uploads/".$year."/mod_property/";

if(isset($_FILES['property_img']) && $_FILES['property_img']['name']!=''){

  $fieldname = $_FILES['property_img']['name'];
  // Get filename.
  $filename = explode(".", $_FILES['property_img']['name']);
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $tmpName = $_FILES['property_img']['tmp_name'];

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
  }else{
				$namefile = $_FILES["property_img"]["name"];
				$sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
				$name = "property-".(Date("dmy").rand('1000','9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
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

				copy($_FILES["property_img"]["tmp_name"],iconv('UTF-8','windows-874',$directory.$newname));
				$newname_img = $newname;
				$sql_img = ",`image`='".$newname."',`directory`='".$directory."'";
				if (isset($_POST["image_ed"]) && $_POST["image_ed"] !='') {
  					$strSQL = "SELECT `id_property`, `image`, `directory` FROM `property` WHERE id_property = '".$_POST["id_edit"]."' ";
  					$objQuery = $db->Query($strSQL);
  					$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
					unlink($objResult["directory"].$objResult["image"]);
				}
				
	}	
}else{
  	$newname_img = "";

}		

	
	
	$name_th = $db->clear($_POST["name_th"]);
	$detail_th = $db->clear($_POST["detail_th"]);
	$name_en = $db->clear($_POST["name_en"]);
	$detail_en = $db->clear($_POST["detail_en"]);
	$order = $db->clear($_POST["order"]);
	$id_edit = $db->clear($_POST["id_edit"]);

	

	$str = "UPDATE `property` SET `name_th`='".$name_th."',`name_en`='".$name_en."',`description_th`='".$detail_th."',`description_en`='".$detail_en."',`order`='".$order."' ,`update_id`='".$id_data."',`update_datetime`='".$date_regdate."' ".$sql_img." WHERE `id_property`= '".$id_edit."'";
	$objQuery = $db->Query($str);
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}
?>