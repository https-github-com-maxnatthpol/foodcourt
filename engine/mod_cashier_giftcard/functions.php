<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
require_once '../lib/functions.php';

if (isset($_POST['form'])) {
	if ($_POST['form'] == "form_buy_card") {
		form_buy_card();
		exit;
	}
}

if ($_POST['_method'] == 'CHECK_card_number') {
	CHECK_card_number();
	exit;
}




function CHECK_card_number()
{
	$db = new DB();
	header('Content-Type: application/json');
	$card_number = $_POST['card_number'];
/*
	$sql = "SELECT card.number,card.amount,card.Issue_date,card.expiry_date,mod_employee.username,mod_employee.surname,
			IF(card.status = 0, 'ระงับการใช้งาน', 'ใช้งานได้') AS status
			FROM card 
			INNER JOIN mod_employee 
			ON card.id_employee = mod_employee.id_employee
			WHERE card.card_number = '" . $card_number . "' ";
*/	
	$sql = "SELECT card.number,card.amount,card.Issue_date,card.expiry_date,mod_employee.username,mod_employee.surname,
			IF(card.status = 1, 'บัตรปกติ', 'giftcard') AS status
			FROM card 
			INNER JOIN mod_employee 
			ON card.id_employee = mod_employee.id_employee
			WHERE card.card_number = '" . $card_number . "' ";

	$query = $db->Query($sql);
	$result = mysqli_fetch_array($query);
	$num = mysqli_num_rows($query);

	if ($num > 0) {
		echo json_encode(array('status' => '1', 'message' => $result, 'deta' => thai_date_and_time_short(strtotime($result[2]))));
	} else {
		echo json_encode(array('status' => '0', 'message' => 'ผิดพลาด'));
	}
}

function form_buy_card()
{
	$db = new DB();

	header('Content-Type: application/json');
	date_default_timezone_set("Asia/Bangkok");
	$date_regdate = date("Y-m-d H:i:s");

	if (isset($_SESSION["id_data"])) {
		$id_data = $_SESSION["id_data"];
	} else {
		$id_data = '';
	}

	$sql = "SELECT id,number FROM card WHERE `card_number` =  '" . $db->clear($_POST['card_number']) . "'";
	$query = $db->Query($sql);
	if ($query) {
		$result = mysqli_fetch_array($query);

		$amount = $db->clear($_POST['amount']);
		$receive_money = $db->clear("0");
		$Identity = $db->clear("0");
		$data_date = $db->clear($date_regdate);
		$id_card = $db->clear($result["id"]);
		$id_cashier = $db->clear($id_data);
     
    	$explode_date = explode("-", trim($db->clear($_POST['start_to_end_date'])));
		$date=date_create($explode_date[0]);
		$start_date =  date_format($date,"Y-m-d");
		$date=date_create($explode_date[1]);
		$expiry_date =  date_format($date,"Y-m-d");

		$number = $result["number"];

		$id = setMD5();

		$str = "INSERT INTO `data_working_card`(`id`, `amount`, `receive_money`, `Identity`, `data_date`,`id_card`, `id_cashier`) 
			VALUES ('" . $id . "','" . $amount . "','" . $receive_money . "','" . $Identity . "','" . $data_date . "','" . $id_card . "','" . $id_cashier . "')";
		$objQuery = $db->Query($str);

		if ($objQuery) {
			$str = "UPDATE card SET amount = amount + '" . $amount . "',last_update = '" . $data_date . "' ,status = '2' ,start_date = '" . $start_date . "' ,expiry_date = '" . $expiry_date . "' WHERE id = '" . $db->clear($result[0]) . "'";
			$query = $db->Query($str);
			if ($query) {
				echo json_encode(array('status' => '0', 'message' => "สำเร็จ!", 'number' => $number, 'ref' => $id));
			} else {
				echo json_encode(array('status' => '1', 'message' => $str));
			}
		} else {
			echo json_encode(array('status' => '1', 'message' => 'ไม่สำเร็จ'));
		}
	} else {
		echo json_encode(array('status' => '1', 'message' => 'ไม่สำเร็จ'));
	}
}

//function
function random_number()
{
	$alphabet = "0123456789";
	$pass = array(); //remember to declare $pass as an array
	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	for ($i = 0; $i < 7; $i++) {
		$n = rand(0, $alphaLength);
		$pass[] = $alphabet[$n];
	}
	return implode($pass); //turn the array into a string
}

function thai_date_and_time_short($time)
{   // 19  ธ.ค. 2556 10:10:4
	$dayTH = ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'];
	$monthTH = [null, 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
	$thai_date_return = date("j", $time);
	$thai_date_return .= " " . $monthTH[date("n", $time)];
	$thai_date_return .= " " . (date("Y", $time) + 543);
	$thai_date_return .= " เวลา " . date("H:i:s", $time);
	return $thai_date_return;
}
