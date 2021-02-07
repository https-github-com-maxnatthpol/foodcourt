<?php
require_once '../lib/connect.php';
$db = new DB ();
header('Content-Type: application/json');

	$str = "SELECT `id_mail`, `name`, `email`, `subject`, `message`, `send_datetime`, `status` FROM `mod_contact` ORDER BY `send_datetime` DESC ";

	$resultArray = array();
	$query = $db->Query($str);
	while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		array_push($resultArray, $result);
	}
	echo json_encode(['data'=> $resultArray]);
?>