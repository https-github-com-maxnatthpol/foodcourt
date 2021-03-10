<?php
require_once '../lib/connect.php';
require_once '../lib/functions.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['_method'])) {
    switch ($_POST['_method']) {
        case "ADD_PERMISSION":
            ADD_PERMISSION();
            break;
        case "EDIT_PERMISSION_ADD":
            EDIT_PERMISSION_ADD();
            break;
        case "SELECTOR_USER_TYPE":
            SELECTOR_USER_TYPE();
        break;
        case "SELECTOR_PER_LIST":
            SELECTOR_PER_LIST();
        break;
        case "DELETE_LIST_PER":
            DELETE_LIST_PER();
        break;
        case "check_user_ex":
            check_user_ex();
        break;
        case "check_user_ex_ed":
            check_user_ex_ed();
        break;

    }
}

function check_user_ex_ed()
{
$db = new DB();
$username = $_POST['username'];
$id_user = $_POST['id_user'];
$strSQL = "SELECT * FROM `users` WHERE `user_name`='$username' AND id_user != '$id_user' ";
$objQuery = $db->Query($strSQL);
$num_rows = mysqli_num_rows($objQuery);

    header('Content-Type: application/json');
    if ($num_rows > 0) {
        echo json_encode(array('status' => '0','message'=> "ซ้ำ"));
    } else {
        echo json_encode(array('status' => '1','message'=> "ไม่ซ้ำ"));
    }
}
function check_user_ex()
{
$db = new DB();
$username = $_POST['username'];
$strSQL = "SELECT * FROM `users` WHERE `user_name`='$username' AND `delete_datetime` IS null";
$objQuery = $db->Query($strSQL);
$num_rows = mysqli_num_rows($objQuery);

    header('Content-Type: application/json');
    if ($num_rows > 0) {
        echo json_encode(array('status' => '0','message'=> "ซ้ำ"));
    } else {
        echo json_encode(array('status' => '1','message'=> "ไม่ซ้ำ"));
    }
}

/**Add User and Permission */
function ADD_PERMISSION()
{
    header('Content-Type: application/json');
    date_default_timezone_set("Asia/Bangkok");
    $date_regdate = date("Y-m-d H:i:s");
    $db = new DB();

    $id_extends = $_POST['user'];
    $pass = password_hash($_POST['employee-pass'], PASSWORD_DEFAULT);

    if (!isset($_POST['user'])) {
        echo json_encode(array('status' => '0','message'=> "ERROR: user is null."));
    } elseif (!isset($_POST['employee-pass'])) {
        echo json_encode(array('status' => '0','message'=> "ERROR: employee-pass is null."));
    } elseif (!isset($_POST['user_type'])) {
        echo json_encode(array('status' => '0','message'=> "ERROR: user_type is null."));
    } elseif (!isset($_POST['role_id_og'])) {
        echo json_encode(array('status' => '0','message'=> "ERROR: role_id_og is null."));
    }

    $id_user = setMD5();
    
    $strSQL_customer = "SELECT id_customer
    FROM `mod_customer` 
    WHERE id_customer = '".$id_extends."' ";
	$objQuery_customer = $db->Query($strSQL_customer);
    $num = mysqli_num_rows($objQuery_customer);
	if($num>0)
    {
       $str_cus_up = "UPDATE `mod_customer` SET `status`='1' WHERE `id_customer`='".$id_extends."' ";
	   $objQuery_cus_up = $db->Query($str_cus_up);
    }
    

    $strSQL_member = "INSERT INTO users";
    $strSQL_member .= "(id_user,
                        user_name,
                        user_password,
                        create_datetime,
                        last_login,
                        last_logout,
                        token,
                        id_role,
                        id_data_role)";

    $strSQL_member .= "VALUES";
    $strSQL_member .= "('".$id_user."',
                      '".$_POST['employee-user']."',
                      '".$pass."',
                      '".$date_regdate."',
                      '0000-00-00 00:00:00',
                      '0000-00-00 00:00:00',
                      '',
                      '".$_POST['user_type']."',
                      '".$id_extends."'
    );";

    // echo $strSQL_member;
    for ($i=1;$i<=$_POST['count_general'];$i++) {
        if (!empty($_POST['general'.$i])) {
            $permissions = implode(", ", $_POST['general'.$i]);
            $id_system = $_POST['general_id'.$i];

            $strSQL_member .= "INSERT INTO user_permissions";
            $strSQL_member .= "(id_user ,id_system ,permissions)";
            $strSQL_member .= "VALUES ";
            $strSQL_member .= "('".$id_user."','".$id_system."','".$permissions."');";
        }
    }

    for ($i=1;$i<=$_POST['count_system'];$i++) {
        if (!empty($_POST['system'.$i])) {
            $permissions = implode(", ", $_POST['system'.$i]);
            $id_system = $_POST['system_id'.$i];

            $strSQL_member .= "INSERT INTO user_permissions";
            $strSQL_member .= "(id_user ,id_system ,permissions)";
            $strSQL_member .= "VALUES ";
            $strSQL_member .= "('".$id_user."','".$id_system."','".$permissions."');";
        }
    }

    $memberquery = $db->MultipleQueries($strSQL_member);

    if ($memberquery) {
        echo json_encode(array('status' => '1','message'=> "SUCCESS NEW RECORD. "));
    } else {
        echo json_encode(array('status' => '0','message'=> "ERROR: ".$strSQL_member));
    }
}

/**Edit User and Permission */
function EDIT_PERMISSION_ADD()
{
    header('Content-Type: application/json');
    date_default_timezone_set("Asia/Bangkok");
    $date_regdate = date("Y-m-d H:i:s");
    $db = new DB();

    //var_dump($_POST);

    $id_user = $db->clear($_POST['per_id_og']);
    $user_name = $db->clear($_POST['employee-user_ed']);

    if ($_POST['employee-pass_ed']!=='') {
        $pass = password_hash($_POST['employee-pass_ed'], PASSWORD_DEFAULT);
    } else {
        $str_member = "SELECT * FROM users WHERE id_user = '".$id_user."' ";
        $query_member = $db->Query($str_member);
        $result_member = mysqli_fetch_array($query_member);
  
        $pass = $result_member['user_password'];
    }

    $str_member_u = "UPDATE users SET";
    $str_member_u .= " user_name = '".$user_name."' ";
    $str_member_u .= ",user_password = '".$pass."' ";
    $str_member_u .= "WHERE id_user = '".$id_user."'; ";

    $str_member_u .= "Delete from user_permissions WHERE id_user = '".$id_user."';" ;

    for ($i=1;$i<=$_POST['count_general'];$i++) {
        if (!empty($_POST['general'.$i])) {
            $permissions = implode(", ", $_POST['general'.$i]);
            $id_system = $_POST['general_id'.$i];

            $str_member_u .= "INSERT INTO user_permissions";
            $str_member_u .= "(id_user ,id_system ,permissions)";
            $str_member_u .= "VALUES ";
            $str_member_u .= "('".$id_user."','".$id_system."','".$permissions."');";
        }
    }

    for ($i=1;$i<=$_POST['count_system'];$i++) {
        if (!empty($_POST['system'.$i])) {
            $permissions = implode(", ", $_POST['system'.$i]);
            $id_system = $_POST['system_id'.$i];

            $str_member_u .= "INSERT INTO user_permissions";
            $str_member_u .= "(id_user ,id_system ,permissions)";
            $str_member_u .= "VALUES ";
            $str_member_u .= "('".$id_user."','".$id_system."','".$permissions."');";
        }
    }

    $memberquery = $db->MultipleQueries($str_member_u);

    if ($memberquery) {
        echo json_encode(array('status' => '1','message'=> "SUCCESS NEW RECORD. "));
    } else {
        echo json_encode(array('status' => '0','message'=> "ERROR: ".$str_member_u));
    }
}

/** Select user type*/
function SELECTOR_USER_TYPE()
{
    $db = new DB();
    header('Content-Type: application/json');

    if ($_POST['option'] == 'admin') {
        $str = "SELECT * FROM mod_employee  ";
    } elseif ($_POST['option'] == 'agent') {
        $str = "SELECT * FROM mod_company  ";
    } elseif ($_POST['option'] == 'customer') {
        $str = "SELECT * FROM mod_customer  ";
    }

    //echo $str;
  
    $resultArray = array();
    $query = $db->Query($str);
    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        array_push($resultArray, $result);
    }
    echo json_encode(['data'=> $resultArray]);
}

/** */
function SELECTOR_PER_LIST()
{
    $db = new DB();
    header('Content-Type: application/json');
  
    $str = "SELECT * FROM roles  ";
    $resultArray = array();
    $query = $db->Query($str);
    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        array_push($resultArray, $result);
    }
    echo json_encode(['data'=> $resultArray]);
}

/** */
function DELETE_LIST_PER()
{
    $db = new DB();
    header('Content-Type: application/json');
    $date = date("Y-m-d H:i:s");
  
  
    $str = "UPDATE users SET ";
    
    $str .= "delete_datetime = '".$date."' ";
    $str .= "WHERE id_user = '".$_GET['per_id']."'";
  
    $query = $db->Query($str);
  
    if ($query) {
        echo json_encode(array('status' => '1','message'=> "Delete SUCCESS. "));
    } else {
        echo json_encode(array('status' => '0','message'=> "ERROR: ".$str));
    }
}
