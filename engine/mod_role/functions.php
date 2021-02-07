<?php
require_once '../lib/connect.php';
require_once '../lib/functions.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['_method'])) {
    switch ($_POST['_method']) {
        case "SELECTOR_LIST":
            SELECTOR_LIST();
            break;
        case "ADD_ROLE":
            ADD_ROLE();
            break;
        case "EDIT_ROLE_ADD":
            EDIT_ROLE_ADD();
            break;
        case "DELETE_LIST":
            DELETE_LIST();
            break;

    }
}

/**Select list of Role */
function SELECTOR_LIST()
{
    header('Content-Type: application/json');

    $db = new DB();
    $str = "SELECT * FROM roles where delete_datetime is null ";
    //$query = $db->QueryFetchArray($str);
    $query = $db->Query($str);
    $resultArray = array();
    if ($query) {
        while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            array_push($resultArray, $result);
        }
    }
    echo json_encode(['data'=> $resultArray]);
}

/**Add Role and Permission */
function ADD_ROLE()
{
    header('Content-Type: application/json');
    date_default_timezone_set("Asia/Bangkok");
    $date_regdate = date("Y-m-d H:i:s");
    $db = new DB();

    $role_id = setMD5();
    $role_tag = $_POST['role_tag'];
    $role_name = $_POST['role_name'];

    $role_tag = $db->clear($role_tag);
    $role_name = $db->clear($role_name);
  
    $strSQL = "INSERT INTO roles";
    $strSQL .= "(id_role ,name ,tag,update_datetime)";
    $strSQL .= "VALUES ";
    $strSQL .= "('".$role_id."','".$role_name."','".$role_tag."','".$date_regdate."');";
    

    for ($i=1;$i<=$_POST['count_general'];$i++) {
        if (!empty($_POST['general'.$i])) {
            $permissions = implode(", ", $_POST['general'.$i]);
            $id_system = $_POST['general_id'.$i];

            $strSQL .= "INSERT INTO role_permissions";
            $strSQL .= "(id_role ,id_system ,permissions)";
            $strSQL .= "VALUES ";
            $strSQL .= "('".$role_id."','".$id_system."','".$permissions."');";
        }
    }

    for ($i=1;$i<=$_POST['count_system'];$i++) {
        if (!empty($_POST['system'.$i])) {
            $permissions = implode(", ", $_POST['system'.$i]);
            $id_system = $_POST['system_id'.$i];

            $strSQL .= "INSERT INTO role_permissions";
            $strSQL .= "(id_role ,id_system ,permissions)";
            $strSQL .= "VALUES ";
            $strSQL .= "('".$role_id."','".$id_system."','".$permissions."');";
        }
    }

    $objQuery = $db->MultipleQueries($strSQL);

    if ($objQuery) {
        echo json_encode(array('status' => '1','message'=> "SUCCESS NEW RECORD. "));
    } else {
        echo json_encode(array('status' => '0','message'=> "ERROR: ".$strSQL));
    }
}

/**Edit Role and Permission */
function EDIT_ROLE_ADD()
{
    if (!isset($_POST['role_id_og'])) {
        return;
    }

    header('Content-Type: application/json');
    date_default_timezone_set("Asia/Bangkok");
    $date_regdate = date("Y-m-d H:i:s");
    $db = new DB();

    $role_tag = $db->clear($_POST['role_tag']);
    $role_name = $db->clear($_POST['role_name']);
    $role_id = $db->clear($_POST['role_id_og']);

    $strSQL = "UPDATE roles SET";
    $strSQL .= " update_datetime = '".$date_regdate."' ";
    $strSQL .= ",name = '".$role_name."' ";
    $strSQL .= ",tag = '".$role_tag."' ";
    $strSQL .= " WHERE id_role = '".$role_id."';" ;

    $strSQL .= "Delete from role_permissions WHERE id_role = '".$role_id."';" ;

    for ($i=1;$i<=$_POST['count_general'];$i++) {
        if (!empty($_POST['general'.$i])) {
            $permissions = implode(", ", $_POST['general'.$i]);
            $id_system = $_POST['general_id'.$i];

            $strSQL .= "INSERT INTO role_permissions";
            $strSQL .= "(id_role ,id_system ,permissions)";
            $strSQL .= "VALUES ";
            $strSQL .= "('".$role_id."','".$id_system."','".$permissions."');";
        }
    }

    for ($i=1;$i<=$_POST['count_system'];$i++) {
        if (!empty($_POST['system'.$i])) {
            $permissions = implode(", ", $_POST['system'.$i]);
            $id_system = $_POST['system_id'.$i];

            $strSQL .= "INSERT INTO role_permissions";
            $strSQL .= "(id_role ,id_system ,permissions)";
            $strSQL .= "VALUES ";
            $strSQL .= "('".$role_id."','".$id_system."','".$permissions."');";
        }
    }

    $objQuery = $db->MultipleQueries($strSQL);

    if ($objQuery) {
        echo json_encode(array('status' => '1','message'=> "SUCCESS Update RECORD. "));
    } else {
        echo json_encode(array('status' => '0','message'=> "ERROR: ".$strSQL));
    }
}

/**Delete Role and Permission */
function DELETE_LIST()
{
    if (!isset($_GET['role_id'])) {
        return;
    }

    header('Content-Type: application/json');
    date_default_timezone_set("Asia/Bangkok");
    $date_regdate = date("Y-m-d H:i:s");
    $db = new DB();

    $id_role = $db->clear($_GET['role_id']);

    $strSQL = "DELETE FROM `roles` WHERE id_role = '".$id_role."'; ";
    $strSQL .= "Delete from role_permissions WHERE id_role = '".$id_role."';" ;

    $objQuery = $db->MultipleQueries($strSQL);

    if ($objQuery) {
        echo json_encode(array('status' => '1','message'=> "SUCCESS Delete RECORD. "));
    } else {
        echo json_encode(array('status' => '0','message'=> "ERROR: ".$strSQL));
    }
}
