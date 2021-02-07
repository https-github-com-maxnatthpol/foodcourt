<?php
require_once 'connect.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// ถ้าผู้ใช้ต้องการ login
if (isset($_POST['username'])) {
    doLogin();
} elseif (isset($_POST['username_admin'])) {
    doCreatetbl();
} elseif (isset($_POST['actionlogout'])){
  require_once 'connect.php';
	$db = new DB ();
	doLogout($db->objConnect);
	exit;
}


function checkAdminUser()
{
	
	//กำหนดเวลาที่สามารถอยู่ในระบบ
$sessionlifetime = 30; //กำหนดเป็นนาที
	
    $db = new DB();
    /*if (isset($_SESSION["admin"])) {
        if ($_SESSION['admin'] == '0') {
            header('Location: ../../index.php');
        }
    }*/
    // ถ้าไม่มีการกำหนดค่า session id ก็จะ Redirect ไปยังหน้า Login อีกครั้ง
    if (!isset($_SESSION["user_id"])) {
        header('Location: ../login.php');
        exit();
    } else {
		
	if(isset($_SESSION["timeLasetdActive"])){
	$seclogin = (time()-$_SESSION["timeLasetdActive"])/60;
	//หากไม่ได้ Active ในเวลาที่กำหนด
	if($seclogin>$sessionlifetime){
		//goto logout page
		doLogout();
		exit;
	}else{
		$_SESSION["timeLasetdActive"] = time();
	}
}else{
	$_SESSION["timeLasetdActive"] = time();
}
		
        $user_id = $db->clear($_SESSION["user_id"]);
        $str = "SELECT users.*,roles.tag FROM `users`
        LEFT JOIN roles ON roles.id_role = users.id_role WHERE users.id_user = '" . $user_id . "' and users.delete_datetime is NULL and roles.tag != 'mod_customer'";
        $result = $db->QueryFetchArray($str);
        
        if (!isset($result) || (isset($result) && $_SESSION["token"] != $result['token'])) {
            header('Location: ../login.php');
            exit();
        }
    }
    // ถ้าผู้ใช้ต้องการ logout
    if (isset($_GET['logout'])) {
        doLogout();
    }
}


function checkCustomerUser()
{
    $db = new DB();
    if (!isset($_SESSION["id_customer"])) {

    } else if(isset($_SESSION["id_customer"])) {
        $id_customer = $db->clear($_SESSION["id_customer"]);
        $str = "SELECT * FROM `users` WHERE `id_data_role`= '" . $id_customer . "' ";
        $result = $db->QueryFetchArray($str);
        
        if (!isset($result) || (isset($result) && $_SESSION["token"] != $result['token'])) {
            header('Location: ../login_register/');
			doLogoutcustomer();
            exit();
        }
    }
//	else if(isset($_SESSION["id_partner"])) {
//        $id_partner = $db->clear($_SESSION["id_partner"]);
//        $str = "SELECT * FROM `users` WHERE `id_data_role`= '" . $id_partner . "' ";
//        $result = $db->QueryFetchArray($str);
//        
//        if (!isset($result) || (isset($result) && $_SESSION["token"] != $result['token'])) {
//            header('Location: ../login_register/');
//			doLogoutcustomer();
//            exit();
//        }
//    }
//	else if(isset($_SESSION["id_tutor"])) {
//        $id_tutor = $db->clear($_SESSION["id_tutor"]);
//        $str = "SELECT * FROM `users` WHERE `id_data_role`= '" . $id_tutor . "' ";
//        $result = $db->QueryFetchArray($str);
//        
//        if (!isset($result) || (isset($result) && $_SESSION["token"] != $result['token'])) {
//            header('Location: ../login_register/');
//			doLogoutcustomer();
//            exit();
//        }
//    }
    // ถ้าผู้ใช้ต้องการ logout
//    if (isset($_GET['logout'])) {
//        doLogoutcustomer();
//    }
}

function checkpartnerUser()
{
    $db = new DB();
    if (!isset($_SESSION["id_partner"])) {
		
    } 
	else if(isset($_SESSION["id_partner"])) {
        $id_partner = $db->clear($_SESSION["id_partner"]);
        $str = "SELECT * FROM `users` WHERE `id_data_role`= '" . $id_partner . "' ";
        $result = $db->QueryFetchArray($str);
        
        if (!isset($result) || (isset($result) && $_SESSION["token"] != $result['token'])) {
            header('Location: ../login_register/');
			doLogoutcustomer();
            exit();
        }
    }
}

function checktutorUser()
{
    $db = new DB();
    if (!isset($_SESSION["id_tutor"])) {

    } 	else if(isset($_SESSION["id_tutor"])) {
        $id_tutor = $db->clear($_SESSION["id_tutor"]);
        $str = "SELECT * FROM `users` WHERE `id_data_role`= '" . $id_tutor . "' ";
        $result = $db->QueryFetchArray($str);
        
        if (!isset($result) || (isset($result) && $_SESSION["token"] != $result['token'])) {
            header('Location: ../login_register/');
			doLogoutcustomer();
            exit();
        }
    }
}


function doLogin()
{
    $db = new DB();
    header('Content-Type: application/json');
    if (isset($_POST['username_admin'])) {
        $username = $_POST['username_admin'];
    } else {
        $username = $_POST["username"];
    }
    $password = $_POST["password"];

    $username = $db->clear($username);
    $password = $db->clear($password);

    $str = "SELECT users.*,roles.name,roles.tag 
    FROM users 
    LEFT JOIN roles ON users.id_role = roles.id_role  WHERE user_name = '" . $username . "' AND users.delete_datetime IS NULL";
    $result = $db->QueryFetchArray($str);
    //var_dump($str);


    if (!$result) {
        echo json_encode(array('status' => '0', 'message' => 'ชื่อผู้ใช้งานไม่ถูกต้อง'));
    } else {
        $hash = $result['user_password'];
        $_SESSION["user_id"] = session_id();
        $name = "";
        $_SESSION['avatar'] = "../images/user.png";
        $_SESSION['position'] = "";
        $_SESSION['email'] = "";
        $_SESSION['name'] = "GUEST";
        $_SESSION['admin'] = 0;
        if (password_verify($password, $hash)) {
            $_SESSION["user_id"] = $result['id_user'];
            $_SESSION["user_session"] = session_id();
            $_SESSION["id_data"] = $result['id_data_role'];
            $_SESSION['admin'] = $result['admin'];
            $_SESSION['role_name'] = $result['name'];
            $_SESSION['role_tag'] = $result['tag'];
            

            $result_perm = getUserPermissions($result['id_user']);
            //$fetch_perm = mysqli_fetch_array($result_perm, MYSQLI_ASSOC);
            
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

            if (isset($_POST['username_admin'])) {
                $_SESSION["user_id"] = $result['id_user'];
                $_SESSION['admin'] = '1';
                $_SESSION["id_data"] = '';
                $_SESSION['name'] = "Super Admin";
            } else {
                switch ($result['tag']) {
                    case "mod_employee":
                        $str_employee = 'SELECT * FROM `mod_employee` WHERE `id_employee` = "' . $result['id_data_role'] . '" ';
                        $query_employee = $db->Query($str_employee);
                        
                        if ($query_employee) {
                            $fetch_employee = mysqli_fetch_array($query_employee);
                            if (isset($fetch_employee)) {
                                $name = $fetch_employee["username"] . " " .$fetch_employee["surname"] ;
                                $_SESSION['position'] = $fetch_employee["position"];
                                $_SESSION['email'] = $fetch_employee["email"];
                                $_SESSION['name'] = $name;
        
                                $str    = "SELECT * FROM mod_employee_image WHERE id_employee = '" . $result['id_data_role'] . "'";
                                $query = $db->Query($str);
                                $row    = mysqli_num_rows($query);
                                
                                if ($row > 0) {
                                    $result_img = mysqli_fetch_array($query);
                                    $date_img  = $result_img['date_image'];
                                    $date_img = explode("-", $date_img);
                                    $image = "../../uploads/$date_img[0]/employee/" . $result_img['name_image'];
                                
                                    if (@getimagesize($image)) {
                                        $_SESSION['avatar'] = $image;
                                    }
                                }
                            } else {
                                $name =  $result['admin'] == 1?"Super Admin":"";
                                $_SESSION['name'] = $name;
                            }
                        } else {
                            $name =  $result['admin'] == 1?"Super Admin":"";
                            $_SESSION['name'] = $name;
                        }

                    break;

                    case "mod_customer":
                        $str_customer = 'SELECT * FROM `mod_customer` WHERE `id_customer` = "' . $result['id_data_role'] . '" ';
                        $query_customer = $db->Query($str_customer);
                        if ($query_customer) {
                            $fetch_customer = mysqli_fetch_array($query_customer);
                            $name = $fetch_customer["forename"] . " " . $fetch_customer["surename"];
                            $_SESSION['position'] = "";
                            $_SESSION['email'] = $fetch_customer["email"];
                            $_SESSION['name'] = $name;

                            $str    = "SELECT * FROM user_images WHERE 	id_user = '" . $result['id_data_role'] . "' and type = 1";
                            $query = $db->Query($str);
                            $row    = mysqli_num_rows($query);
                            
                            if ($row > 0) {
                                $result_img = mysqli_fetch_array($query);
                                $date_img  = $result_img['date'];
                                $date_img = explode("-", $date_img);
                                $image = "../../uploads/$date_img[0]/customer/" . $result_img['name'];
                                if (@getimagesize($image)) {
                                    $_SESSION['avatar'] = $image;
                                }
                            }
                        }
                        

                    break;

                    case "mod_company":
                            $str_company = 'SELECT * FROM `mod_company` WHERE `id_company` = "' . $result['id_data_role'] . '" ';
                            $query_company = $db->Query($str_company);
                            if ($query_customer) {
                                $fetch_customer = mysqli_fetch_array($query_customer);
                                $name = $fetch_customer["fname"] . " " . $fetch_customer["lname"];
                                $_SESSION['position'] = "";
                                $_SESSION['email'] = $fetch_customer["email"];
                                $_SESSION['name'] = $name;
    
                                $str    = "SELECT * FROM mod_company_image WHERE id_company = '" . $result['id_data_role'] . "'";
                                $query = $db->Query($str);
                                $row    = mysqli_num_rows($query);
                                
                                if ($row > 0) {
                                    $result_img = mysqli_fetch_array($query);
                                    $date_img  = $result_img['date_image'];
                                    $date_img = explode("-", $date_img);
                                    $image = "../../uploads/$date_img[0]/company/" . $result_img['name_image'];
                                    if (@getimagesize($image)) {
                                        $_SESSION['avatar'] = $image;
                                    }
                                }
                            }

                    break;

                    case "tutor":
                        $str_tutor = 'SELECT * FROM `tutor` WHERE `id_tutor` = "' . $result['id_data_role'] . '" ';
                        $query_tutor = $db->Query($str_tutor);
                        if ($query_tutor) {
                            $fetch_tutor = mysqli_fetch_array($query_tutor);
                            $name = $fetch_tutor["forename_th"] . " " . $fetch_tutor["surename_th"];
                            $_SESSION['position'] = "";
                            $_SESSION['email'] = $fetch_tutor["email"];
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
                        }

                    break;

                    case "partner":
                        $str_partner = 'SELECT * FROM `partner` WHERE `id_partner` = "' . $result['id_data_role'] . '" ';
                        $query_partner = $db->Query($str_partner);
                        if ($query_partner) {
                            $fetch_partner = mysqli_fetch_array($query_partner);
                            $name = $fetch_partner["name_th"] ;
                            $_SESSION['position'] = "";
                            $_SESSION['email'] = $fetch_partner["email"];
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
                        }

                    break;

                    default:
                        $str_employee = 'SELECT * FROM `mod_employee` WHERE `id_employee` = "' . $result['id_data_role'] . '" ';
                            $query_employee = $db->Query($str_employee);
                            if ($query_employee) {
                                $fetch_employee = mysqli_fetch_array($query_employee);
                                $name = $fetch_employee["username"] . " " .$fetch_employee["surname"] ;
                                $_SESSION['position'] = $fetch_employee["position"];
                                $_SESSION['email'] = $fetch_employee["email"];
                                $_SESSION['name'] = $name;
        
                                $str    = "SELECT * FROM mod_employee_image WHERE id_employee = '" . $result['id_data_role'] . "'";
                                $query = $db->Query($str);
                                $row    = mysqli_num_rows($query);
                                
                                if ($row > 0) {
                                    $result_img = mysqli_fetch_array($query);
                                    $date_img  = $result_img['date_image'];
                                    $date_img = explode("-", $date_img);
                                    $image = "../../uploads/$date_img[0]/employee/" . $result_img['name_image'];
                                
                                    if (@getimagesize($image)) {
                                        $_SESSION['avatar'] = $image;
                                    }
                                }
                            } else {
                                $name =  $result['admin'] == 1?"Super Admin":"";
                            }
                        
                        break;

                }
            }

            $token = bin2hex(random_bytes(16));

            $sql = "UPDATE users
                    SET last_login = NOW()
                   	,token = '" . $token . "'    
                    WHERE id_user = '{$result['id_user']}'";

            $query = $db->Query($sql);
            $_SESSION["token"] = $token;



            echo json_encode(array('status' => '1', 'message' => 'ยินดีต้อนรับ ' . $name ));
        } else {
            echo json_encode(array('status' => '0', 'message' => 'รหัสผ่านไม่ถูกต้อง'));
        }
    }
}

/*
    Logout a user admin
*/
function doLogout()
{
//    $db = new DB();
//    if (isset($_SESSION['user_id'])) {
//        $user_id = $db->clear($_SESSION["user_id"]);
//        $sql = "UPDATE users SET last_logout = NOW() WHERE id_user = '" . $user_id . "' ";
//        $query = $db->Query($sql);
//    }
//
//    //กลับไปยังหน้าล็อกอินอีกครั้ง
//    if ($_GET['logout'] == 'main') {
//        unset($_SESSION['user_id'], $_SESSION['user_id'], $_SESSION['permission'], $_SESSION['user_id_session'],$_SESSION['token']);
//        header('Location: ../index.php');
//        exit;
//    }
	
	    $db = new DB();
		session_destroy();
		if (isset($_SESSION['user_id'])){
		$user_id = $db->clear($_SESSION["user_id"]);
	    $sql = "UPDATE users SET last_logout = NOW() WHERE id_user = '" . $user_id . "' ";
        $query = $db->Query($sql);
			echo json_encode(array('status' => '1', 'message' => 'ออกจากระบบสำเร็จ' ));
			unset($_SESSION["id_facebook"],$_SESSION['user_id'],$_SESSION['permission'],$_SESSION['admin'],$_SESSION['user_member'],$_SESSION['task_view'],$_SESSION['task_authen'],$_SESSION['id_customer'],$_SESSION['id_partner']);
			
					header('Location: ../index.php');
        			exit;
		}		
}


function doLogoutcustomer()
{
    $db = new DB();
    if (isset($_SESSION['id_customer'])) {
        $id_customer = $db->clear($_SESSION["id_customer"]);
        $sql = "UPDATE users SET last_logout = NOW() WHERE id_data_role = '" . $id_customer . "' ";
        $query = $db->Query($sql);
    }
	else if (isset($_SESSION['id_partner'])) {
        $id_partner = $db->clear($_SESSION["id_partner"]);
        $sql = "UPDATE users SET last_logout = NOW() WHERE id_data_role = '" . $id_partner . "' ";
        $query = $db->Query($sql);
    }
	else if (isset($_SESSION['id_tutor'])) {
        $id_tutor = $db->clear($_SESSION["id_tutor"]);
        $sql = "UPDATE users SET last_logout = NOW() WHERE id_data_role = '" . $id_tutor . "' ";
        $query = $db->Query($sql);
    }
    //กลับไปยังหน้าล็อกอินอีกครั้ง
//    if ($_GET['logout'] == 'main') {
  unset($_SESSION["id_facebook"],$_SESSION['user_id'],$_SESSION['permission'],$_SESSION['user_member'],$_SESSION['task_view'],$_SESSION['task_authen'],$_SESSION['id_customer'],$_SESSION['id_partner'],$_SESSION['id_tutor'], $_SESSION['user_id'], $_SESSION['permission'], $_SESSION['user_id_session'],$_SESSION['token']);
        header('Location: ../login_register/');
        exit;
//    }
}

/*
 * Current user function
 *
 * @return void
 */
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

    $strSQL = "SELECT freedom_page.`name_th`,freedom_page.`name_en`,freedom_page.`text_th`,freedom_page.`text_en`,freedom_page.`id_link`, link_page.link 
	FROM `freedom_page` 
	LEFT JOIN link_page ON link_page.id_link=freedom_page.id_link 
	WHERE link_page.link = '".$link."'
	AND freedom_page.delete_datetime IS NULL";
//	echo $strSQL;
    $objQuery = $db->QueryFetchArray($strSQL);
    return $objQuery;
	
	
}
