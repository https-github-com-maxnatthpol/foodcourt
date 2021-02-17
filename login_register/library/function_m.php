<?php
// ob_start();
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

// require_once 'admin/library/connect.php';
// date_default_timezone_set("Asia/Bangkok");
// header('Content-Type: application/json');

if(isset($_POST['username']) || isset($_POST['id_fb']) ){
  require_once '../../../engine/lib/connect.php';
	$db = new DB ();
	doLogin($db->objConnect);
	exit;
}

if(isset($_POST['action'])){
  require_once '../../../engine/lib/connect.php';
	$db = new DB ();
	doLogout_new($db->objConnect);
	exit;
}

function doLogout_new($objConnect)
{
       unset($_SESSION["id_facebook"],$_SESSION['user_id'],$_SESSION['permission'],$_SESSION['user_member'],$_SESSION['task_view'],$_SESSION['task_authen'],$_SESSION['id_customer'],$_SESSION['id_partner'],$_SESSION['id_tutor']);
}

function doLogin($objConnect){

 //require_once '../../engine/lib/connect.php';
date_default_timezone_set("Asia/Bangkok");
header('Content-Type: application/json');
	$db = new DB ();

if(isset($_POST["username"]) && isset($_POST["password"]) ){
  $username = $_POST["username"];
  $password = $_POST["password"];
	
    $username = $db->clear($username);
    $password = $db->clear($password);	
  // require 'config.php';
  $str = "SELECT users.*,roles.name,roles.tag 
    FROM users 
    LEFT JOIN roles ON users.id_role = roles.id_role  WHERE user_name = '" . $username . "' AND users.delete_datetime IS NULL";
  $query = $db->Query($str);
  $result = mysqli_fetch_array($query);
  $row = mysqli_num_rows($query);
	
  if(!$result) {
    echo json_encode(array('status' => '0','message'=> 'Error login data!'));
  }
  else
  {  
  /*$strroles = "SELECT * FROM roles WHERE id_role = '".$result['id_data_role']."' ";
  $queryroles = $db->Query($strroles);
  $resultroles = mysqli_fetch_array($queryroles);
  $rowroles = mysqli_num_rows($queryroles);  */
	  
	    if($result['tag']!='mod_customer' && $result['tag']!='partner' && $result['tag']!='tutor'  &&  $password != ''){ //ไปหลังบ้าน

		$hash = $result['user_password'];
		if(password_verify($password,$hash)){

      $str_employee = 'SELECT * FROM mod_employee WHERE id_employee = "'.$result['id_data_role'].'"';
        $query_employee = $db->Query($str_employee);
        $_SESSION["user_id"] = session_id();
        $_SESSION["user_member"] = $result['id_user'];
        if($query_employee){
          if($result['admin']=='1'){
            $_SESSION['permission'] = 'Super_admin';
            $_SESSION['task_view'] = '';
            $_SESSION['task_authen'] = '';
          }else{
            $fetch_employee = mysqli_fetch_array($query_employee);
            $_SESSION['permission'] = 'user';
            $_SESSION["task_view"] = $fetch_employee ["task_view"];
            $_SESSION["task_authen"] = $fetch_employee ["task_authen"];
          }
        }else{
          $_SESSION['permission'] = 'Super_admin';
          $_SESSION['task_view'] = '';
          $_SESSION['task_authen'] = '';
        }

} //------------

      $sql = "UPDATE users
            SET last_login = NOW()
              ,token = '".$_SESSION['user_id']."'
            WHERE id_user = '{$result['id_user']}'";
        $db->Query($sql);

      echo json_encode(array('status' => '2','message'=> $_SESSION['user_id']));

    }else if ($result['tag']=='mod_customer' &&  $password != ''){ // ไปหน้าบ้าน /*$resultroles['name']!='mod_customer' &&  */
      $hash = $result['user_password'];
      if(password_verify($password,$hash)){
          $str_customer = 'SELECT * FROM mod_customer WHERE id_customer = "'.$result['id_data_role'].'"';
          $query_customer = $db->Query($str_customer);
          $_SESSION["user_id"] = session_id();
          $_SESSION["user_member"] = $result['id_user'];
          $_SESSION["id_customer"] = $result['id_data_role'];
		  $_SESSION["uname_customer"] = $result['user_name'];
          $_SESSION['permission'] = 'customer';
          /*$_SESSION["task_view"] = '';
          $_SESSION["task_authen"] = '';*/
		  
		    $token = bin2hex(random_bytes(16));

            $sql = "UPDATE users
                    SET last_login = NOW()
                   	,token = '" . $token . "'    
                    WHERE id_user = '{$result['id_user']}'";

            $query = $db->Query($sql);
            $_SESSION["token"] = $token;  

        echo json_encode(array('status' => '1','message'=> $_SESSION['permission']));
      }else{
        echo json_encode(array('status' => '0','message'=> $password));
      }
    }
	else if ($result['tag']=='partner' &&  $password != ''){ // ไปหน้าบ้าน /*$resultroles['name']!='mod_customer' &&  */
      $hash = $result['user_password'];
      if(password_verify($password,$hash)){
          $str_partner = 'SELECT * FROM partner WHERE id_partner = "'.$result['id_data_role'].'"';
          $query_partner = $db->Query($str_partner);
		  $result_partner = mysqli_fetch_array($query_partner);
		  $_SESSION["user_id"] = $result['id_user'];
          $_SESSION["user_session"] = session_id();
          $_SESSION["id_partner"] = $result['id_data_role'];
		  $_SESSION["uname_partner"] = $result['user_name'];
		  $_SESSION['admin'] = $result['admin'];
          $_SESSION['role_name'] = $result['name'];
          $_SESSION['role_tag'] = $result['tag'];
          $_SESSION['permission'] = 'partner';
		  
		  $name = $result_partner["name_th"] ;
		  $_SESSION['position'] = "";
          $_SESSION['email'] = $result_partner["email"];
          $_SESSION['name'] = $name;
		  
		                    $str    = "SELECT * FROM user_images WHERE 	id_user = '" . $result['id_data_role'] . "' and type = 4";
                            $query = $db->Query($str);
                            $row    = mysqli_num_rows($query);
                            
                            if ($row > 0) {
                                $result_img = mysqli_fetch_array($query);
                                $date_img  = $result_img['date'];
                                $date_img = explode("-", $date_img);
                                $image = "../../uploads/$date_img[0]/mod_partner/" . $result_img['name'];
                                if (@getimagesize($image)) {
                                    $_SESSION['avatar'] = $image;
                                }
                            }
		  
		  $result_perm = getUserPermissions($result['id_user']);
		  
		  	$task_view = array();
            $task_authen = array();
            $permissions = array();
            while ($obResult = mysqli_fetch_array($result_perm)) {
                array_push($permissions, array("id"=>$obResult['id_system'],"permissions"=>$obResult['permissions'],"link"=>$obResult['link_system']));
                array_push($task_view, $obResult['id_system']);
                array_push($task_authen, $obResult['permissions']);
            }
		  
		    $_SESSION["permissions"] = $permissions;
            $_SESSION["task_view"] = $task_view;
            $_SESSION["task_authen"] = $task_authen;
          /*$_SESSION["task_view"] = '';
          $_SESSION["task_authen"] = '';*/
		  
		    $token = bin2hex(random_bytes(16));

            $sql = "UPDATE users
                    SET last_login = NOW()
                   	,token = '" . $token . "'    
                    WHERE id_user = '{$result['id_user']}'";

            $query = $db->Query($sql);
            $_SESSION["token"] = $token; 

        echo json_encode(array('status' => '1','message'=> $_SESSION['permission']));
      }else{
        echo json_encode(array('status' => '0','message'=> $password));
      }
    }
	  else if ($result['tag']=='tutor' &&  $password != ''){ // ไปหน้าบ้าน /*$resultroles['name']!='mod_customer' &&  */
      $hash = $result['user_password'];
      if(password_verify($password,$hash)){
          $str_tutor = 'SELECT * FROM tutor WHERE id_tutor = "'.$result['id_data_role'].'"';
          $query_tutor = $db->Query($str_tutor);
		  $result_tutor = mysqli_fetch_array($query_tutor);
		  $_SESSION["user_id"] = $result['id_user'];
          $_SESSION["user_session"] = session_id();
          $_SESSION["id_tutor"] = $result['id_data_role'];
		  $_SESSION["uname_tutor"] = $result['user_name'];
		  $_SESSION['admin'] = $result['admin'];
          $_SESSION['role_name'] = $result['name'];
          $_SESSION['role_tag'] = $result['tag'];
          $_SESSION['permission'] = 'tutor';
		  
		  $name = $result_tutor["forename_th"] . " " . $result_tutor["surename_th"];
          $_SESSION['position'] = "";
          $_SESSION['email'] = $result_tutor["email"];
          $_SESSION['name'] = $name;
		  
		                    $str    = "SELECT * FROM user_images WHERE 	id_user = '" . $result['id_data_role'] . "' and type = 2";
                            $query = $db->Query($str);
                            $row    = mysqli_num_rows($query);
                            
                            if ($row > 0) {
                                $result_img = mysqli_fetch_array($query);
                                $date_img  = $result_img['date'];
                                $date_img = explode("-", $date_img);
                                $image = "../../uploads/$date_img[0]/mod_tutor/" . $result_img['name'];
                                if (@getimagesize($image)) {
                                    $_SESSION['avatar'] = $image;
                                }
                            }
		  
		  $result_perm = getUserPermissions($result['id_user']);
		  
		  	$task_view = array();
            $task_authen = array();
            $permissions = array();
            while ($obResult = mysqli_fetch_array($result_perm)) {
                array_push($permissions, array("id"=>$obResult['id_system'],"permissions"=>$obResult['permissions'],"link"=>$obResult['link_system']));
                array_push($task_view, $obResult['id_system']);
                array_push($task_authen, $obResult['permissions']);
            }
		  
		    $_SESSION["permissions"] = $permissions;
            $_SESSION["task_view"] = $task_view;
            $_SESSION["task_authen"] = $task_authen;
          /*$_SESSION["task_view"] = '';
          $_SESSION["task_authen"] = '';*/
		  
		    $token = bin2hex(random_bytes(16));

            $sql = "UPDATE users
                    SET last_login = NOW()
                   	,token = '" . $token . "'    
                    WHERE id_user = '{$result['id_user']}'";

            $query = $db->Query($sql);
            $_SESSION["token"] = $token; 

        echo json_encode(array('status' => '1','message'=> $_SESSION['permission']));
      }else{
        echo json_encode(array('status' => '0','message'=> $password));
      }
    }

  }
	//mysqli_close($db->objConnect);
}else{

  $username = $_POST["username"];
  $password = $_POST["password"];
  $id_facebook = $_POST["id_fb"];
  // require 'config.php';

  $str = "SELECT * FROM mod_customer WHERE id_facebook = '".$id_facebook."' ";
  $query = mysqli_query($objConnect, $str);
  $result = mysqli_fetch_array($query);
  if(!$result) {
    echo json_encode(array('status' => '0','message'=> 'Error login data!'));
  }
  else
  {
          //$_SESSION["user_id"] = session_id();
          $_SESSION["id_facebook"] = $result['id_facebook'];
          $_SESSION["id_customer"] = $result['id_customer'];
          $_SESSION['permission'] = 'customer';
          $_SESSION["task_view"] = '';
          $_SESSION["task_authen"] = '';

        echo json_encode(array('status' => '1','message'=> $_SESSION['permission']));
      
    
  
  mysqli_close($objConnect);
  }


  echo json_encode(array('status' => '1','message'=> "login"));
}
  
}


function checkAdminUser2($objConnect){
    // ถ้าไม่มีการกำหนดค่า session id ก็จะ Redirect ไปยังหน้า Login อีกครั้ง
    // if (!isset($_SESSION["user_id"])) {

    // } else {
        if(!isset($_SESSION["id_facebook"])){

            doLogout_new($objConnect);
            header('Location: login.php');
            exit();

        }else if(!isset($_SESSION["user_id"])){

        $str = "SELECT * FROM tbl_member WHERE id_member = '".$_SESSION['user_member']."' AND data_role = 'mod_customer'";
        $query = mysqli_query($objConnect, $str);
        $result = mysqli_fetch_array($query);

        if($_SESSION["user_id"]!=$result['member_session_update']){
        	doLogout($objConnect);

    
                header('Location: login.php');
                exit();

        }

        }

}


function getCurrentUser()
{
    $db = new DB();
    $user_id = $db->clear($_SESSION["user_id"]);
    $str_user = "SELECT * FROM users WHERE id_user = '" . $user_id . "' and delete_datetime is NULL";
    $query_user = $db->Query($str_user);
    $result_user = mysqli_fetch_array($query_user);
    return $result_user;
}

function checkTable($table)
{
    $db = new DB();
    $str_tbl = "SHOW TABLES LIKE '" . $table . "'";
    $query_tbl = $db->Query($str_tbl);
    return $query_tbl;
}

function getEmployeeInfo($id)
{
    $db = new DB();
    $id = $db->clear($id);
    $str_em = "SELECT * FROM mod_employee WHERE id_employee = '" . $id . "'";

    $query_em = $db->Query($str_em);
    $result_em = mysqli_fetch_array($query_em);

    return  $result_em;
}

function getEmployeeImage($id)
{
    $db = new DB();
    $id = $db->clear($id);
    $str_image = "SELECT * FROM mod_employee_image WHERE id_employee = '" . $id . "'";
    $query_image = $db->Query($str_image);
    return $query_image;
}

function getLinkSystem($local)
{
    $db = new DB();
    $local = $db->clear($local);
    $str_local = "SELECT link_system,type FROM `system` WHERE link_system = '" . $local . "'";
    $result_local = $db->QueryFetchArray($str_local);
    return $result_local;
}

function getUserInfo($user_id)
{
    $db = new DB();
    $user_id = $db->clear($user_id);
    $str_user = "SELECT * FROM users WHERE id_user = '" . $user_id . "'";
    $query_user = $db->Query($str_user);
    $result_user = mysqli_fetch_array($query_user);
    return $result_user;
}

function getUserPermissions($user_id)
{
    $db = new DB();
    $user_id = $db->clear($user_id);
    $str_em = "SELECT user_permissions.*,`system`.`link_system` FROM user_permissions,`system` WHERE user_permissions.id_system = `system`.`id_system` AND id_user = '" . $user_id . "'";
    $result_em = $db->Query($str_em);
    return $result_em;
}

function getSystemMenu($type, $level, $groups)
{
    $db = new DB();
    $level = $db->clear($level);
    $type = $db->clear($type);
    $groups = $db->clear($groups);
    $strSQL = "SELECT * FROM `system` WHERE level = '" . $level . "' AND type = '" . $type . "' ";
    if (isset($groups) && $groups != null) {
        $strSQL .= " AND groups = '" . $groups . "' ";
    }
    $strSQL .= " ORDER BY sort";
    //echo $strSQL;
    $objQuery = $db->Query($strSQL);
    return $objQuery;
}

function searchByValue($id, $array)
{
    foreach ($array as $key => $val) {
        if ($val['id'] === $id) {
            $resultSet['permissions'] = $val['permissions'];
            $resultSet['key'] = $key;
            $resultSet['id'] = $val['id'];
            return $resultSet;
        }
    }
    return null;
}

function getSetting($name)
{
    $db = new DB();

    $strSQL = "SELECT `id`,`value` FROM `settings` WHERE `name` = '".$name."'";
    $objQuery = $db->Query($strSQL);
    $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
    
    if (isset($objResult) && isset($objResult["id"]) && $objResult["id"] !='') {
        return $objResult["value"];
    } else {
        return "";
    }
}

function getHeading($tag)
{
    $db = new DB();

    $strSQL = "SELECT * FROM `heading` WHERE `delete_datetime` IS NULL AND tag = '".$tag."' LIMIT 1;";
    $objQuery = $db->QueryFetchArray($strSQL);
    return $objQuery;
}


function getFreedomPage($link)
{
    $db = new DB();

    $strSQL = "SELECT * FROM `freedom_page` LEFT JOIN link_page ON freedom_page.id_link = link_page.id_link WHERE link_page.link = '".$link."'";
    $objQuery = $db->QueryFetchArray($strSQL);
    return $objQuery;
}






?>


