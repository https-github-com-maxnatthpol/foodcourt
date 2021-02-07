<?php
require_once '../lib/connect.php';

if($_POST['_method']=='DELETE'){
	DELETE();
	exit;
}	

function DELETE(){
	global $objConnect;
	global $date;
	$db = new DB ();

	$sql = 'DELETE FROM mod_contact WHERE id_mail = "'.$_POST['id'].'"';
	$query = $db->Query($sql);

	if($query){
		echo json_encode(array('status' => '1', 'message' => 'สำเร็จ'/*$sql*/));
	}else{
		echo json_encode(array('status' => '0', 'message' => 'ผิดพลาด'/*$sql*/));
	}
}

?>