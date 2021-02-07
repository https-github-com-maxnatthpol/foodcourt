<?php
    require_once '../lib/connect.php';
    $db = new DB();

    //error_reporting(E_ALL & ~E_NOTICE);
    header('Content-Type: application/json');
    date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-m-d");

    $cut_post = explode("-", $_POST['sub_system']);

    if ($_POST['form-system']==1) {
        $level = '1';
        $group = '0';
        $type = $_POST['form-type'];
    } else {
        if ($_POST['sub_system'] ==0) {
            $level = '1';
            $group = "0";
            $type = $_POST['form-system'];
        } elseif ($cut_post[0] == 1) {
            $level = '2';
            $group = $cut_post[1];
            $type = $cut_post[2];
        } else {
            $level = '3';
            $group = $cut_post[1];
            $type = $cut_post[2];
        }
    }

    

    if (isset($_POST['name_file'])) {
        $name_file = $_POST['name_file'];
    } else {
        $name_file = '#';
    }

    $strSQL = "INSERT INTO system";
    $strSQL .= "(name_system,name_system_en,link_system,type,level,groups,sort,icon,create_date,update_date)";
    $strSQL .= "VALUES ";
    $strSQL .= "('".$_POST['name']."','".$_POST['name_en']."','".$name_file."','".$type."','".$level."','".$group."','0','".$_POST['icon']."','".$date."','".$date."')";
    
    $objQuery = $db->Query($strSQL);

    $id_insert = mysqli_insert_id($objConnect);

    $pathtb = explode("/", $name_file);
    if ($pathtb[0] != '#') {
        require "../".$pathtb[0]."/createtb.php";
    }

    if ($objQuery) {
        echo json_encode(array('status' => '0','message'=> $id_insert));
    } else {
        echo json_encode(array('status' => '1','message'=> $id_insert));
    }
