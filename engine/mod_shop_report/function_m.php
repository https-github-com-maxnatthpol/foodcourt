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
	}else if ($_POST['form']=="approval_one_product") {
		approval_one_product();
	}
}

?>