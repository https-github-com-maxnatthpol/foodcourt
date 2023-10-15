<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
require_once '../lib/functions.php';


if (isset($_POST['form'])) {
	if ($_POST['form']=="form_add_detail") {
		form_add_detail();
		exit;
	}else if ($_POST['form']=="form_edit_detail") {
		form_edit_detail();
		exit;
	}else if ($_POST['form']=="del_one") {
		del_one();
		exit;
	}else if ($_POST['form']=="Multi_del") {
		Multi_del();
		exit;
	}else if ($_POST['form']=="form_add_class_schedule") {
		form_add_class_schedule();
		exit;
	}else if ($_POST['form']=="form_add_content") {
		form_add_content();
		exit;
	}else if ($_POST['form']=="del_one_content") {
		del_one_content();
		exit;
	}else if ($_POST['form']=="Multi_del_content") {
		Multi_del_content();
		exit;
	}else if ($_POST['form']=="form_add_quiz") {
		form_add_quiz();
		exit;
	}else if ($_POST['form']=="del_one_quiz") {
		del_one_quiz();
		exit;
	}else if ($_POST['form']=="Multi_del_course_quiz") {
		Multi_del_course_quiz();
		exit;
	}else if ($_POST['form']=="quiz_question_pic") {
		quiz_question_pic();
		exit;
	}else if ($_POST['form']=="form_add_quiz_question") {
		form_add_quiz_question();
		exit;
	}else if ($_POST['form']=="del_one_question") {
		del_one_question();
		exit;
	}else if ($_POST['form']=="Multi_del_course_question") {
		Multi_del_course_question();
		exit;
	}else if ($_POST['form']=="question_edit") {
		question_edit();
		exit;
	}else if ($_POST['form']=="del_one_product") {
		del_one_product();
		exit;
	}else if ($_POST['form']=="Multi_del_product") {
		Multi_del_product();
		exit;
	}else if ($_POST['form']=="btn_del_reviwe") {
		btn_del_reviwe();
		exit;
	}else if ($_POST['form']=="approval_one_product") {
		approval_one_product();
		exit;
	} else if ($_POST['form']=='CHECK_ID') {
	  	CHECK_ID();
		exit;
	}
}else{
//	if ($_GET['form']=="order_chanhe") {
//		order_chanhe();
//	}else if ($_GET['form']=="order_chanhe_content") {
//		order_chanhe_content();
//	}else if ($_GET['form']=="order_chanhe_question") {
//		order_chanhe_question();
//	}
}



function Multi_del_product(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
	
for ($i=0; $i < count($_POST["Chk_course"]); $i++) { 
	
	$id = $db->clear($_POST["Chk_course"][$i]);

	$str = "UPDATE `mod_customer` SET `delete_datetime`='".$date_regdate."',`update_id`='".$id_data."' WHERE `id_customer`='".$id."' ";
	$objQuery = $db->Query($str);
    
    $str_cus = "UPDATE `users` SET `delete_datetime`='".$date_regdate."' WHERE `id_data_role`='".$id."' ";
	$objQuery_cus = $db->Query($str_cus);

    }
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

function del_one_product(){
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

	$str = "UPDATE `mod_customer` SET `delete_datetime`='".$date_regdate."',`update_id`='".$id_data."' WHERE `id_customer`='".$id."' ";
	$objQuery = $db->Query($str);
    
    $str_cus = "UPDATE `users` SET `delete_datetime`='".$date_regdate."' WHERE `id_data_role`='".$id."' ";
	$objQuery_cus = $db->Query($str_cus);
    
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
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
    
    $str_cus = "UPDATE `mod_customer` SET `update_datetime`='".$date_regdate."',`update_id`='".$id_data."' WHERE `id_customer`='".$id."' ";
	$objQuery_cus = $db->Query($str_cus);
    
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

function btn_del_reviwe(){
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
	$str = "UPDATE `course_review` SET `delete_datetime`='".$date_regdate."' WHERE `id_review`='".$id."' ";
	$objQuery = $db->Query($str);
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}


function question_edit(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
	
	$id_quiz = $db->clear($_GET["id_question"]);
	$id_question_edit = $db->clear($_POST["id_question_edit"]);

	if (isset($_POST["question_random_flg"])) {
		$question_random_flg = $db->clear($_POST["question_random_flg"]);
	}else{
		$question_random_flg = 0;
	}
	
	$random_number = $db->clear($_POST["random_number"]);
	if (isset($_POST["skip_test_flg"])) {
		$skip_test_flg = $db->clear($_POST["skip_test_flg"]);
	}else{
		$skip_test_flg =0;
	}
	
	$time_limit = $db->clear($_POST["time_limit"]);
	$type_answer = $db->clear($_POST["type_answer"]);
	if ($_POST["quiz_question_name_th_taxteditor"]=='') {
		$messages_th = $db->clear($_POST["quiz_name_th_question"]);
	}else{
		$messages_th = $db->clear($_POST["quiz_question_name_th_taxteditor"]);
	}
	if ($_POST["quiz_question_name_en_taxteditor"]=='') {
		$messages_en = $db->clear($_POST["quiz_question_name_en"]);
	}else{
		$messages_en = $db->clear($_POST["quiz_question_name_en_taxteditor"]);
	}
	if ($_POST["type_answer"]== '1' || $_POST["type_answer"] == '2') {
		$answer_flg = '1';
	}else{
		$answer_flg = '0';
	}
	
	

	$id_question = $db->clear(setMD5());
	$str = " UPDATE `course_question` SET `messages_th`='".$messages_th."',`messages_en`='".$messages_en."',`random_flg`='".$question_random_flg."',`random_number`='".$random_number."',`skip_test_flg`='".$skip_test_flg."',`type_answer`='".$type_answer."',`time_limit`='".$time_limit."',`answer_flg`='".$answer_flg."',`answer_guideline`='',`update_id`='".$id_data."',`update_datetime`='".$date_regdate."' WHERE `id_question`='".$id_question_edit."' ";
	$objQuery = $db->Query($str);
	if (isset($_POST["newname_img_question"]) && $_POST["newname_img_question"] != '') {
		$name = $db->clear($_POST["newname_img_question"]);
		$directory = $db->clear($_POST["directory_question"]);
		$size = $db->clear($_POST["tmp_size_question"]);

		$sql_img = "UPDATE `course_images` SET `name`='".$name."',`size`='".$size."',`date`='".$date_regdate."',`directory`='".$directory."'  WHERE `id_course`= '".$id_question_edit."' AND type = '3' ";
		$query_img = $db->Query($sql_img);
	}

$sql_answer_del = "UPDATE `course_answer` SET `delete_datetime`='".$date_regdate."' WHERE  `id_question`='".$id_question_edit."' ";
$query_answer_del = $db->Query($sql_answer_del);

$order =0;
	for ($i=0; $i < count($_POST["answer"]) ; $i++) { 
		$order++;
		
		if ($_POST["editor_answer"][$i]=='') {
			$messages_th = $db->clear($_POST["answer"][$i]);
		}else{
			$messages_th = $db->clear($_POST["editor_answer"][$i]);
		}
		if ($_POST["editor_answer_en"][$i]=='') {
			$messages_en = $db->clear($_POST["answer_en"][$i]);
		}else{
			$messages_en = $db->clear($_POST["editor_answer_en"][$i]);
		}
		if (isset($_POST["correct_flg_val"][$i])) {
			$correct_flg = $db->clear($_POST["correct_flg_val"][$i]);
		}else{
			$correct_flg = 0;
		}

	if ($_POST["id_answer"][$i]=='') {
		$id_answer = $db->clear(setMD5());	
		$sql_answer = "INSERT INTO `course_answer`(`id_answer`, `id_question`, `messages_th`, `messages_en`, `order`, `correct_flg`, `create_id`, `create_datetime`) VALUES ('".$id_answer."','".$id_question."','".$messages_th."','".$messages_en."','".$order."',b'".$correct_flg."','".$id_data."','".$date_regdate."')";
		$query_answer = $db->Query($sql_answer);

		
	}else{
		$id_answer = $db->clear($_POST["id_answer"][$i]);	
		$sql_answer = "UPDATE `course_answer` SET `messages_th`='".$messages_th."',`messages_en`='".$messages_en."',`order`='".$order."',`correct_flg`=b'".$correct_flg."',`update_id`='".$id_data."',`update_datetime`='".$date_regdate."',`delete_datetime`= null WHERE `id_answer`= '".$id_answer."' ";
		$query_answer = $db->Query($sql_answer);

	
	}

		if (isset($_POST["newname_img"])) {
			$name = $db->clear($_POST["newname_img"][$i]);
			$directory = $db->clear($_POST["directory"][$i]);
			$size = $db->clear($_POST["tmp_size"][$i]);
			$id_image = $db->clear($_POST["id_image"][$i]);
			if ($_POST["id_image"][$i]=='') {
				$sql_img = "INSERT INTO  `course_images`(`id_course`, `name`, `size`, `date`, `directory`, `file_type`, `type`) VALUES ('".$id_answer."','".$name."','".$size."','".$date_regdate."','".$directory."','','4')";
				$query_img = $db->Query($sql_img);
			}else{
				$sql_img = "UPDATE `course_images` SET `name`='".$name."',`size`='".$size."',`date`='".$date_regdate."',`directory`='".$directory."'  WHERE `id_image`= '".$id_image."' ";
				$query_img = $db->Query($sql_img);
			}
		}

	}


	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}
function Multi_del_course_question(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
	
for ($i=0; $i < count($_POST["Chk_question"]); $i++) { 
	
	$id = $db->clear($_POST["Chk_question"][$i]);

	$str = "UPDATE `course_question` SET `delete_datetime`='".$date_regdate."' WHERE `id_question`='".$id."' ";
	$objQuery = $db->Query($str);

}
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

function del_one_question(){
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

	$str = "UPDATE `course_question` SET `delete_datetime`='".$date_regdate."' WHERE `id_question`='".$id."' ";
	$objQuery = $db->Query($str);
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

function order_chanhe_question(){
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
	$id = $db->clear($_GET["id"]);

	$str = "UPDATE `course_question` SET `order`='".$order."',`update_id`='".$id_data."',`update_datetime`='".$date_regdate."' WHERE `id_question`='".$id."' ";
	$objQuery = $db->Query($str);
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

function form_add_quiz_question(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
	
	$id_quiz = $db->clear($_GET["id_question"]);

	if (isset($_POST["question_random_flg"])) {
		$question_random_flg = $db->clear($_POST["question_random_flg"]);
	}else{
		$question_random_flg = 0;
	}
	
	$random_number = $db->clear($_POST["random_number"]);
	if (isset($_POST["skip_test_flg"])) {
		$skip_test_flg = $db->clear($_POST["skip_test_flg"]);
	}else{
		$skip_test_flg =0;
	}
	
	$time_limit = $db->clear($_POST["time_limit"]);
	$type_answer = $db->clear($_POST["type_answer"]);
	if ($_POST["quiz_question_name_th_taxteditor"]=='') {
		$messages_th = $db->clear($_POST["quiz_name_th_question"]);
	}else{
		$messages_th = $db->clear($_POST["quiz_question_name_th_taxteditor"]);
	}
	if ($_POST["quiz_question_name_en_taxteditor"]=='') {
		$messages_en = $db->clear($_POST["quiz_question_name_en"]);
	}else{
		$messages_en = $db->clear($_POST["quiz_question_name_en_taxteditor"]);
	}
	if ($_POST["type_answer"]== '1' || $_POST["type_answer"] == '2') {
		$answer_flg = '1';
	}else{
		$answer_flg = '0';
	}
	
	$sql ="SELECT MAX(`order`) AS  no FROM `course_question` WHERE `id_quiz` = '".$id_quiz."' AND `delete_datetime` IS null";
	$query = $db->Query($sql);
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$order = $result['no']+1;

	$id_question = $db->clear(setMD5());
	$str = " INSERT INTO `course_question`(`id_question`, `id_quiz`, `messages_th`, `messages_en`, `random_flg`, `random_number`, `skip_test_flg`, `type_answer`, `time_limit`, `order`, `answer_flg`, `answer_guideline`, `create_id`, `create_datetime`) VALUES ('".$id_question."','".$id_quiz."','".$messages_th."','".$messages_en."','".$question_random_flg."','".$random_number."','".$skip_test_flg."','".$type_answer."','".$time_limit."','".$order."','".$answer_flg."','','".$id_data."','".$date_regdate."')";
	$objQuery = $db->Query($str);
	if (isset($_POST["newname_img_question"]) && $_POST["newname_img_question"] != '') {
		$name = $db->clear($_POST["newname_img_question"]);
		$directory = $db->clear($_POST["directory_question"]);
		$size = $db->clear($_POST["tmp_size_question"]);

		$sql_img = "INSERT INTO  `course_images`(`id_course`, `name`, `size`, `date`, `directory`, `file_type`, `type`) VALUES ('".$id_question."','".$name."','".$size."','".$date_regdate."','".$directory."','','3')";
		$query_img = $db->Query($sql_img);
	}
$order =0;
	for ($i=0; $i < count($_POST["answer"]) ; $i++) { 
		$order++;
		$id_answer = $db->clear(setMD5());
		if ($_POST["editor_answer"][$i]=='') {
			$messages_th = $db->clear($_POST["answer"][$i]);
		}else{
			$messages_th = $db->clear($_POST["editor_answer"][$i]);
		}
		if ($_POST["editor_answer_en"][$i]=='') {
			$messages_en = $db->clear($_POST["answer_en"][$i]);
		}else{
			$messages_en = $db->clear($_POST["editor_answer_en"][$i]);
		}
		if (isset($_POST["correct_flg_val"][$i])) {
			$correct_flg = $db->clear($_POST["correct_flg_val"][$i]);
		}else{
			$correct_flg = 0;
		}
		
		$sql_answer = "INSERT INTO `course_answer`(`id_answer`, `id_question`, `messages_th`, `messages_en`, `order`, `correct_flg`, `create_id`, `create_datetime`) VALUES ('".$id_answer."','".$id_question."','".$messages_th."','".$messages_en."','".$order."',b'".$correct_flg."','".$id_data."','".$date_regdate."')";
		$query_answer = $db->Query($sql_answer);

		if (isset($_POST["newname_img"])) {
			$name = $db->clear($_POST["newname_img"][$i]);
			$directory = $db->clear($_POST["directory"][$i]);
			$size = $db->clear($_POST["tmp_size"][$i]);

			$sql_img = "INSERT INTO  `course_images`(`id_course`, `name`, `size`, `date`, `directory`, `file_type`, `type`) VALUES ('".$id_answer."','".$name."','".$size."','".$date_regdate."','".$directory."','','4')";
			$query_img = $db->Query($sql_img);
		}
	}


	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

function quiz_question_pic(){
	$db = new DB();
	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
	$year = date("Y");

if( file_exists("../../uploads/".$year) ){
	if( file_exists("../../uploads/".$year."/course_question") ){
	}else{ 
		mkdir("../../uploads/".$year."/course_question");
	}

}else{ 
	mkdir("../../uploads/".$year);
	if( file_exists("../../uploads/".$year."/course_question") ){
	}else{ 
		mkdir("../../uploads/".$year."/course_question");
	}
}

$directory = "../../uploads/".$year."/course_question/";

if(isset($_FILES['name_img_quiz_question']) && $_FILES['name_img_quiz_question']['name']!=''){

  $fieldname = $_FILES['name_img_quiz_question']['name'];
  // Get filename.
  $filename = explode(".", $_FILES['name_img_quiz_question']['name']);
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $tmpName = $_FILES['name_img_quiz_question']['tmp_name'];

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
    echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
    
  }else{
				$namefile = $_FILES["name_img_quiz_question"]["name"];
				$sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
				$name = "question-".(Date("dmy").rand('1000','9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
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

				copy($_FILES["name_img_quiz_question"]["tmp_name"],iconv('UTF-8','windows-874',$directory.$newname));
				$newname_img = $newname;
				$tmp_size = $_FILES["name_img_quiz_question"]["size"];
				echo json_encode(array('status' => '0','newname_img'=> $newname_img,'tmp_size' => $tmp_size,'directory' => $directory));
				if (isset($_POST["name_directory"]) && $_POST["name_directory"] != '' ) {
					if ($_POST["name_directory"] != 'img/no_image.png') {
						
						if( file_exists($_POST["name_directory"]) ){
							unlink ($_POST["name_directory"]);
						}
					}
				}
	}	
}else{
	echo json_encode(array('status' => '2'));
}	

	
	


}

function Multi_del_course_quiz(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
	
for ($i=0; $i < count($_POST["Chk_quiz"]); $i++) { 
	
	$id = $db->clear($_POST["Chk_quiz"][$i]);

	$str = "UPDATE `course_quiz` SET `delete_datetime`='".$date_regdate."' WHERE `id_quiz`='".$id."' ";
	$objQuery = $db->Query($str);

}
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

function del_one_quiz(){
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

	$str = "UPDATE `course_quiz` SET `delete_datetime`='".$date_regdate."' WHERE `id_quiz`='".$id."' ";
	$objQuery = $db->Query($str);
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

function form_add_quiz(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");

	$id_course = $db->clear($_GET["id_course"]);
	
	$quiz_name_en_taxteditor = $db->clear($_POST["quiz_name_en_taxteditor"]);
	$quiz_name_th_taxteditor = $db->clear($_POST["quiz_name_th_taxteditor"]);
	if ($quiz_name_en_taxteditor != '' || $quiz_name_th_taxteditor != '') {
		
	}else{
		$quiz_name_en_taxteditor = $db->clear($_POST["quiz_name_en"]);
		$quiz_name_th_taxteditor = $db->clear($_POST["quiz_name_th"]);
	}

	if (isset($_POST["pass_new_flg"])) {
		$pass_new_flg = $db->clear($_POST["pass_new_flg"]);
	}else{
		$pass_new_flg = 0;
	}
	$pass_new_number = $db->clear($_POST["pass_new_number"]);

	if (isset($_POST["fail_new_flg"])) {
		$fail_new_flg = $db->clear($_POST["fail_new_flg"]);
	}else{
		$fail_new_flg = 0;
	}
	$fail_new_number = $db->clear($_POST["fail_new_number"]);

	if (isset($_POST["random_flg"])) {
		$random_flg = $db->clear($_POST["random_flg"]);
	}else{
		$random_flg = 0;
	}
	$exam_number = $db->clear($_POST["exam_number"]);
	

if ($_POST["id_quiz"]=='') {
		$id_quiz = $db->clear(setMD5());
		

		$str = "INSERT INTO `course_quiz`(`id_quiz`, `id_course`, `name_th`, `name_en`, `pass_new_flg`, `pass_new_number`, `fail_new_flg`, `fail_new_number`, `random_flg`, `exam_number`, `create_id`, `create_datetime`) VALUES ('".$id_quiz."','".$id_course."','".$quiz_name_th_taxteditor."','".$quiz_name_en_taxteditor."','".$pass_new_flg."','".$pass_new_number."','".$fail_new_flg."','".$fail_new_number."','".$random_flg."','".$exam_number."','".$id_data."','".$date_regdate."') ";
		$objQuery = $db->Query($str);
	
}else{
		$id_quiz = $db->clear($_POST["id_quiz"]);
		$str = "UPDATE `course_quiz` SET `name_th`='".$quiz_name_th_taxteditor."',`name_en`='".$quiz_name_en_taxteditor."',`pass_new_flg`='".$pass_new_flg."',`pass_new_number`='".$pass_new_number."',`fail_new_flg`='".$fail_new_flg."',`fail_new_number`='".$fail_new_number."',`random_flg`='".$random_flg."',`exam_number`='".$exam_number."',`update_id`='".$id_data."',`update_datetime`='".$date_regdate."' WHERE `id_quiz`='".$id_quiz."' ";
		$objQuery = $db->Query($str);
}
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'.$str));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'.$str));
	}
}

function Multi_del_content(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
	
for ($i=0; $i < count($_POST["Chk_content"]); $i++) { 
	
	$id = $db->clear($_POST["Chk_content"][$i]);

	$str = "UPDATE `course_subject` SET `delete_datetime`='".$date_regdate."' WHERE `id_subject`='".$id."' ";
	$objQuery = $db->Query($str);

}
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

function del_one_content(){
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

	$str = "UPDATE `course_subject` SET `delete_datetime`='".$date_regdate."' WHERE `id_subject`='".$id."' ";
	$objQuery = $db->Query($str);
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}

function order_chanhe_content(){
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
	$id = $db->clear($_GET["id"]);

	$str = "UPDATE `course_subject` SET `order`='".$order."',`update_id`='".$id_data."',`update_datetime`='".$date_regdate."' WHERE `id_subject`='".$id."' ";
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
	$id = $db->clear($_GET["id"]);

	$str = "UPDATE `course_lesson` SET `order`='".$order."',`update_id`='".$id_data."',`update_datetime`='".$date_regdate."' WHERE `id_lesson`='".$id."' ";
	$objQuery = $db->Query($str);
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}


function form_add_content(){
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
	if( file_exists("../../uploads/".$year."/course_subject") ){
	}else{ 
		mkdir("../../uploads/".$year."/course_subject");
	}

}else{ 
	mkdir("../../uploads/".$year);
	if( file_exists("../../uploads/".$year."/course_subject") ){
	}else{ 
		mkdir("../../uploads/".$year."/course_subject");
	}
}

$directory = "../../uploads/".$year."/course_subject/";
$tmp_size = "";
$newname_img = "";
$sur = "";
if(isset($_FILES['file_content']) && $_FILES['file_content']['name']!=''){

  $fieldname = $_FILES['file_content']['name'];
  // Get filename.
  $filename = explode(".", $_FILES['file_content']['name']);
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $tmpName = $_FILES['file_content']['tmp_name'];

  // Get mime type.
  $mimeType = finfo_file($finfo, $tmpName);

  // Get extension. You must include fileinfo PHP extension.
  $extension = end($filename);

  // Allowed extensions.
  $allowedExts = array("gif", "jpeg", "jpg", "png", "svg", "blob", "pdf", "doc", "xls","xlsx", "ppt", "pptx", "mp4", "webm", "ogg");

  // Allowed mime types.
  $allowedMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/x-png", "image/png", "image/svg+xml", "application/msword", "application/x-pdf", "application/pdf", "application/vnd.ms-excel", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/vnd.ms-powerpoint", "application/vnd.openxmlformats-officedocument.presentationml.presentation", "video/mp4", "video/webm", "video/ogg");

  // Validate image.
  if (!in_array(strtolower($mimeType), $allowedMimeTypes) || !in_array(strtolower($extension), $allowedExts)) {
    //type ไม่ผ่าน
    
  }else{
				$namefile = $_FILES["file_content"]["name"];
				$sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
				$name = "sub-".(Date("dmy").rand('1000','9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
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

				copy($_FILES["file_content"]["tmp_name"],iconv('UTF-8','windows-874',$directory.$newname));
				$newname_img = $newname;
				$tmp_size = $_FILES["file_content"]["size"];
	}	
}	
	

	$id_lesson = $db->clear($_GET["id_lesson"]);
	$content_name_th = $db->clear($_POST["content_name_th"]);
	$content_name_en = $db->clear($_POST["content_name_en"]);
	$content_link_video = $db->clear($_POST["content_link_video"]);
	$content_link_document = $db->clear($_POST["content_link_document"]);
	$type_link = $db->clear($_GET["type_link"]);
	if ($type_link == '0') {
		$duration_input = '00:00:00';
	}else if ($type_link == '1') {
		$duration_input = $db->clear($_POST["duration_input"]);
	}else if ($type_link == '2') {
		$duration_input1 = $_POST["duration_youtube"];
		$b = explode(":", $duration_input1);
		if ($b[0]<10 && $b[0] !='') {
			$duration_input = '0'.$b[0].':'.$b[1].':'.$b[2];
		}else{
			$duration_input = $db->clear($_POST["duration_youtube"]);
		}
	}


	
	

if ($_POST["id_subject"]=='') {
		$id_subject = $db->clear(setMD5());
		$sql = "SELECT  MAX(`order`) AS no  FROM `course_subject` WHERE `delete_datetime` IS null AND `id_lesson` = '".$id_lesson."'";
		$query = $db->Query($sql);
		$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$order = $db->clear($result["no"]+1);

		$str = "INSERT INTO `course_subject`(`id_subject`, `id_lesson`, `name_th`, `name_en`, `link_video`, `link_reference`, `order`, `create_id`, `create_datetime`, `total_time`) VALUES ('".$id_subject."','".$id_lesson."','".$content_name_th."','".$content_name_en."','".$content_link_video."','".$content_link_document."','".$order."','".$id_data."','".$date_regdate."','".$duration_input."') ";
		$objQuery = $db->Query($str);

	
}else{
		$id_subject = $db->clear($_POST["id_subject"]);
		$str = "UPDATE `course_subject` SET `name_th`='".$content_name_th."',`name_en`='".$content_name_en."', `link_video` = '".$content_link_video."', `link_reference` ='".$content_link_document."',`update_id`='".$id_data."',`update_datetime`='".$date_regdate."',`total_time`='".$duration_input."' WHERE `id_subject`='".$id_subject."' ";
		$objQuery = $db->Query($str);
}


if(isset($_FILES['file_content']) && $_FILES['file_content']['name']!=''){
	if ($_POST["id_subject"]=='') {	
		$sql = "INSERT INTO  `course_images`(`id_course`, `name`, `size`, `date`, `directory`, `file_type`, `type`) VALUES ('".$id_subject."','".$newname_img."','".$tmp_size."','".$date_regdate."','".$directory."','".$sur."','2')";
		$query = $db->Query($sql);
	}else{
		$id_image = $db->clear($_POST["id_img_ed_content"]);
		$sql = "UPDATE  `course_images` SET `name` ='".$newname_img."', `size` = '".$tmp_size."', `date` = '".$date_regdate."', `directory` = '".$directory."', `file_type` = '".$sur."' WHERE id_image = '".$id_image."'";
		$query = $db->Query($sql);
	}

}




	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}
}


function form_add_class_schedule(){
	$db = new DB();

if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
}else{
	$id_data = '';
}

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");

	$id_course = $db->clear($_GET["id_course"]);
	$lesson_name_th = $db->clear($_POST["lesson_name_th"]);
	$lesson_name_en = $db->clear($_POST["lesson_name_en"]);
	

if ($_POST["id_lesson"]=='') {
		$id_lesson = $db->clear(setMD5());
		$sql = "SELECT  MAX(`order`) AS no  FROM `course_lesson` WHERE `delete_datetime` IS null";
		$query = $db->Query($sql);
		$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$order = $db->clear($result["no"]+1);

		$str = "INSERT INTO `course_lesson`(`id_lesson`, `id_course`, `name_th`, `name_en`, `order`, `create_id`, `create_datetime`) VALUES ('".$id_lesson."','".$id_course."','".$lesson_name_th."','".$lesson_name_en."','".$order."','".$id_data."','".$date_regdate."') ";
		$objQuery = $db->Query($str);
	
}else{
		$id_lesson = $db->clear($_POST["id_lesson"]);
		$str = "UPDATE `course_lesson` SET `name_th`='".$lesson_name_th."',`name_en`='".$lesson_name_en."',`update_id`='".$id_data."',`update_datetime`='".$date_regdate."' WHERE `id_lesson`='".$id_lesson."' ";
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

	$str = "UPDATE `course_lesson` SET `delete_datetime`='".$date_regdate."' WHERE `id_lesson`='".$id."' ";
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

	$str = "UPDATE `course_lesson` SET `delete_datetime`='".$date_regdate."' WHERE `id_lesson`='".$id."' ";
	$objQuery = $db->Query($str);
	if($objQuery){
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}

}



function form_edit_detail(){
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
	if( file_exists("../../uploads/".$year."/mod_product") ){
	}else{ 
		mkdir("../../uploads/".$year."/mod_product");
	}

}else{ 
	mkdir("../../uploads/".$year);
	if( file_exists("../../uploads/".$year."/mod_product") ){
	}else{ 
		mkdir("../../uploads/".$year."/mod_product");
	}

}

$directory = "../../uploads/".$year."/mod_product/";	

//	$date_start_end = explode("-", $_POST["start_to_end__date"]);
//	$date_start_arr = explode("/", $date_start_end[0]);
//	$date_start = $date_start_arr[2].'/'.$date_start_arr[1].'/'.$date_start_arr[0];
//
//	$date_end_arr = explode("/", $date_start_end[1]);
//	$date_end = $date_end_arr[2].'/'.$date_end_arr[1].'/'.$date_end_arr[0];
//
//	$date_start1  = $db->clear($date_start);
//	$date_end1  = $db->clear($date_end);
//	$date_start_clear = preg_replace('/[[:space:]]+/','', trim($date_start1));
//	$date_end_clear = preg_replace('/[[:space:]]+/','', trim($date_end1));

	$name_th = $db->clear($_POST["name_th"]);
	$name_en = $db->clear($_POST["name_en"]);
	$product_code = $db->clear($_POST["product_code"]);
	$material_th = $db->clear($_POST["material_th"]);
	$material_en = $db->clear($_POST["material_en"]);
	$surface_th = $db->clear($_POST["surface_th"]);
	$surface_en = $db->clear($_POST["surface_en"]);
	$description_th = $db->clear($_POST["description_th"]);
	$description_en = $db->clear($_POST["description_en"]);
	$id_category = $db->clear($_POST["id_category"]);
	
	if (isset($_POST["view_show"])) {
		$view = $_POST["view_show"];
	}else{
		$view = 0;
	}
	$view_show = $db->clear($view).' ';
	
//	$view_portfolio = $db->clear($_POST["view_portfolio"]);
	if (isset($_POST["view_portfolio"])) {
		$view_port = $_POST["view_portfolio"];
	}else{
		$view_port = 0;
	}
	$view_portfolio = $db->clear($view_port);

	$id_edit = $db->clear($_POST["id_product"]);

$str = "";
$str .="UPDATE `product` SET ";
$str .="  `name_product` = '".$name_th."' ";
$str .=",`name_product_en`='".$name_en."' ";
$str .=",`product_code`='".$product_code."' ";
$str .=",`material`='".$material_th."' ";
$str .=",`material_en`='".$material_en."' ";
$str .=",`surface`='".$surface_th."' ";
$str .=",`surface_en`='".$surface_en."' ";	
$str .=",`detail_product`='".$description_th."' ";
$str .=",`detail_product_en`='".$description_en."' ";
	
$str .=",`id_catagory`='".$id_category."' ";
	
$str .=",`view`='".$view_show."' ";
$str .=",`view_portfolio`='".$view_portfolio."' ";

$str .=",`update_id`='".$id_data."' ";
$str .=",`date_edit`='".$date_regdate."' ";
$str .=" WHERE `id_product` = '".$id_edit."' ";
$objQuery = $db->Query($str);


if($objQuery){
$sur='';
	
$id_img_ed = $db->clear($_POST["id_img_ed"]);
	
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
				$name = "product-".(Date("dmy").rand('1000','9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
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
					if (isset($_POST["name_img_ed"]) && $_POST["name_img_ed"] != '') {
$strSQL = "SELECT date_image,id_product
FROM `product_image` 
WHERE id_image = '".$id_img_ed."' ";
	$objQuery = $db->Query($strSQL);
	$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
						
						if(file_exists($objResult["date_image"].$_POST["name_img_ed"]) ){
							unlink ($objResult["date_image"].$_POST["name_img_ed"]);
						}
					}
				}	


$sql = "";
$sql .="UPDATE `product_image` SET ";
$sql .="  `name_image` = '".$newname."' ";
$sql .=",`size_image`='".$_FILES["name_img"]["size"]."' ";
$sql .=",`date_image`='".$directory."' ";
$sql .=" WHERE `id_image`= '".$id_img_ed."' ";
$query = $db->Query($sql);

	}	
}
	
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}



}

// -----------------------------------------------------------------------------------------------------------------

function form_add_detail(){
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
		if( file_exists("../../uploads/".$year."/mod_product") ){
		}else{ 
			mkdir("../../uploads/".$year."/mod_product");
		}

}else{ 
	mkdir("../../uploads/".$year);
	if( file_exists("../../uploads/".$year."/mod_product") ){
	}else{ 
		mkdir("../../uploads/".$year."/mod_product");
	}

}

	$directory = "../../uploads/".$year."/mod_product/";	

	$name_th = $db->clear($_POST["name_th"]);
	$product_code = $db->clear($_POST["product_code"]);
	$material_th = $db->clear($_POST["material_th"]);
	$surface_th = $db->clear($_POST["surface_th"]);
	$description_th = $db->clear($_POST["description_th"]);
	
	$name_en = $db->clear($_POST["name_en"]);
	$material_en = $db->clear($_POST["material_en"]);
	$surface_en = $db->clear($_POST["surface_en"]);
	$description_en = $db->clear($_POST["description_en"]);
	
	$id_category = $db->clear($_POST["id_category"]);
	
	if (isset($_POST["view_show"])) {
		$view = $_POST["view_show"];
	}else{
		$view = 0;
	}
	$view_show = $db->clear($view);
	
//	$view_portfolio = $db->clear($_POST["view_portfolio"]);
	if (isset($_POST["view_portfolio"])) {
		$view_port = $_POST["view_portfolio"];
	}else{
		$view_port = 0;
	}
	$view_portfolio = $db->clear($view_port);
	
	$id_product = setMD5();
	
	$str = "INSERT INTO `product`(`id_product`, `name_product`, `name_product_en`, `product_code`, `material`, `material_en`, `surface`, `surface_en`, `detail_product`, `detail_product_en`, `date_add`, `id_catagory`, `view`, `view_portfolio`, `create_id`) VALUES ('".$id_product."','".$name_th."','".$name_en."','".$product_code."','".$material_th."','".$material_en."','".$surface_th."','".$surface_en."','".$description_th."','".$description_en."','".$date_regdate."','".$id_category."','".$view_show."','".$view_portfolio."','".$id_data."')";
	
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
    $newname_img = "";
    $tmp_size = '';
    $sur='';
  }else{
				$namefile = $_FILES["name_img"]["name"];
				$sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
				$name = "product-".(Date("dmy").rand('1000','9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
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
  	$sur='';
}

$id_image = setMD5();
	
$sql = "INSERT INTO `product_image`(`id_image`, `name_image`, `size_image`, `date_image`, `id_product`) VALUES ('".$id_image."','".$newname_img."','".$tmp_size."','".$directory."','".$id_product."')";
$query = $db->Query($sql);
	
	if($query){
//		echo json_encode(array('status' => '0','message'=> 'สำเร็จ','id_product'=>$id_product));
		echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}
		
	}else{
		echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
	}
}

// -----------------------------------------------------------------------------------------------------------------

function CHECK_ID(){	
	$db = new DB();
	
	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date = date("Y-m-d H:i:s");
	$year = date("Y");

	$sql = 'SELECT product_code FROM product WHERE product_code = "'.$_POST['product_code'].'" AND delete_datetime IS NULL ';
	$query = $db->Query($sql);
	$num = mysqli_num_rows($query);
	if($num>0){
		echo json_encode(array('status' => '1', 'message' => 'มีข้อมูล'));
	}else{
		echo json_encode(array('status' => '0', 'message' => 'ไม่มีข้อมูล'));
	}
}


?>