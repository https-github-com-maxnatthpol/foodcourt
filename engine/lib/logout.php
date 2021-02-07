<meta charset="utf-8">

<?php
require_once 'connect.php';
require_once 'service.php';
	@session_start();

	//session_destroy();

	if (isset($_SESSION['user_id'])){
		
		$db = new DB();
	    $sql = "UPDATE users SET last_logout = NOW() WHERE id_user = '" . $_SESSION['user_id'] . "' ";
        $query = $db->Query($sql);
	unset($_SESSION["id_facebook"],$_SESSION['user_id'],$_SESSION['permission'],$_SESSION['admin'],$_SESSION['user_member'],$_SESSION['task_view'],$_SESSION['task_authen'],$_SESSION['id_customer'],$_SESSION['id_partner']);

			echo"<script>";
			echo"window.location='../index.php';";
			echo"</script>";
		
	}
else{
			echo"<script>";
			echo"window.location='../index.php';";
			echo"</script>";
}
		
	
?>