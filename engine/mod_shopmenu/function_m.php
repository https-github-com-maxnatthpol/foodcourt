<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
require_once '../lib/functions.php';

if(isset($_POST['_method'])){

//register.php  
    if($_POST['_method']=='CHECK_IDCARD') {
      CHECK_IDCARD();
      exit;
    }
}

function CHECK_IDCARD(){	
  require_once '../../engine/lib/connect.php';
	$db = new DB();
	header('Content-Type: application/json');
	$card_number = $_POST['idcard'];

	$sql = "SELECT number,status,amount
			FROM card 
			WHERE status = '1' and card_number = '".$card_number."' ";

	$query = $db->Query($sql);
	$result = mysqli_fetch_array($query);
	$num = mysqli_num_rows($query);

	if ($num > 0) {
		echo json_encode(array('status' => '1', 'message' => $result));
	} else {
		echo json_encode(array('status' => '0', 'message' => 'ผิดพลาด'));
	}
}
?>