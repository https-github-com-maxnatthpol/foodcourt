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

if (isset($_POST['form'])) {
	if ($_POST['form']=="form_card") {
		form_card();
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

function form_card(){	
	$db = new DB();
    header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");
    $date_action = date("Y-m-d");
    
    if (isset($_SESSION["id_data"])) {
	$id_data = $_SESSION["id_data"];
    }else{
	$id_data = '';
    }
    
	$card_number = $db->clear($_POST['idcard']);
    $balance     = $db->clear($_POST['balance']);
    $total_card  = $db->clear($_POST['total_card_s']);

	$sql = "SELECT id_customer,id_catagory
			FROM mod_customer 
			WHERE id_customer = '".$id_data."' ";

	$query = $db->Query($sql);
	$result = mysqli_fetch_array($query);
    
    $sql_card = "SELECT id,card_number,amount
			FROM card 
			WHERE card_number = '".$card_number."' ";

	$query_card = $db->Query($sql_card);
	$result_card = mysqli_fetch_array($query_card);
    
    $amount_1 = $result_card["amount"];
    
    $totalsum = $amount_1 - $balance; 
    
    $id_catagory = $result["id_catagory"];
    
    $id_history_pay = setMD5();
    
    $str = "INSERT INTO `history_payment_shop`(`id_history_pay`, `id_customer`, `amount`, `card_number`, `id_catagory`, `create_datetime`, `date_action`) VALUES ('".$id_history_pay."','".$id_data."','".$balance."','".$card_number."','".$id_catagory."','".$date_regdate."','".$date_action."')";
    $objQuery = $db->Query($str);
    
    $str_c = "UPDATE `card` SET `amount`='".$totalsum."',`last_update`='".$date_regdate."' WHERE `card_number`='".$card_number."' ";
	$objQuery_c = $db->Query($str_c);

	if ($objQuery) {
		echo json_encode(array('status' => '1', 'message' => 'สำเร็จ'));
	} else {
		echo json_encode(array('status' => '0', 'message' => 'ผิดพลาด'));
	}
}
?>