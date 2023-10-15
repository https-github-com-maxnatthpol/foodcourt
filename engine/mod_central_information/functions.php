<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';

$db = new DB();

header('Content-Type: application/json');
date_default_timezone_set("Asia/Bangkok");
$date_regdate = date("Y-m-d H:i:s");
$year = date("Y");

$nQuery = 0;

if (isset($_SESSION["id_data"])) {
    $id_data = $_SESSION["id_data"];
} else {
    $id_data = '';
}

if (file_exists("../../uploads/".$year)) {
    if (file_exists("../../uploads/".$year."/logo")) {
    } else {
        mkdir("../../uploads/".$year."/logo");
    }
} else {
    mkdir("../../uploads/".$year);

    if (file_exists("../../uploads/".$year."/logo")) {
    } else {
        mkdir("../../uploads/".$year."/logo");
    }
}

$directory = "../../uploads/".$year."/logo/";

if (isset($_FILES['logo_img']) && $_FILES['logo_img']['name']!='') {
    $fieldname = $_FILES['logo_img']['name'];
    // Get filename.
    $filename = explode(".", $_FILES['logo_img']['name']);
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $tmpName = $_FILES['logo_img']['tmp_name'];

    // Get mime type.
    $mimeType = finfo_file($finfo, $tmpName);

    // Get extension. You must include fileinfo PHP extension.
    $extension = end($filename);

    // Allowed extensions.
    $allowedExts = array("gif", "jpeg", "jpg", "png", "svg", "blob");

    // Allowed mime types.
    $allowedMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/x-png", "image/png", "image/svg+xml");

    // Validate image.
    if (!in_array(strtolower($mimeType), $allowedMimeTypes) || !in_array(strtolower($extension), $allowedExts)) {
        //type ไม่ผ่าน
    } else {
        $namefile = $_FILES["logo_img"]["name"];
        $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
            $name = "logo-".(Date("dmy").rand('1000', '9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
            $target = $directory.$name;
        $newname = $name;

        if (file_exists($target)) {
            $oldname = pathinfo($name, PATHINFO_FILENAME);
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            $newname = $oldname;
            do {
                $r = rand(1000, 9999);
                $newname = $oldname."-".$r.".$ext";
                    
                $target = $directory.$newname;
            } while (file_exists($target));
        }

        copy($_FILES["logo_img"]["tmp_name"], iconv('UTF-8', 'windows-874', $directory.$newname));
        if (file_exists($_POST["name_img_ed"])) {
            unlink($_POST["name_img_ed"]);
        }
            
        $newname_logo_img = $newname;
        
        if (checkSetting('logo_img')) {
            $str = "UPDATE `settings` SET `value`='../../uploads/".$year."/logo/".$newname_logo_img."',`updated_datetime`='".$date_regdate."' WHERE  `name`='logo_img' ";
            $objQuery = $db->Query($str);
        } else {
            $str_logo = "INSERT INTO `settings`( `name`,  `value`, `updated_datetime`) VALUES ('logo_img','../../uploads/".$year."/logo/".$newname_logo."','".$date_regdate."')";
            $objQuery_logo = $db->Query($str_logo);
        }
    }
}

if (isset($_FILES['logo_img2']) && $_FILES['logo_img2']['name']!='') {
    $fieldname = $_FILES['logo_img2']['name'];
    // Get filename.
    $filename = explode(".", $_FILES['logo_img2']['name']);
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $tmpName = $_FILES['logo_img2']['tmp_name'];

    // Get mime type.
    $mimeType = finfo_file($finfo, $tmpName);

    // Get extension. You must include fileinfo PHP extension.
    $extension = end($filename);

    // Allowed extensions.
    $allowedExts = array("gif", "jpeg", "jpg", "png", "svg", "blob");

    // Allowed mime types.
    $allowedMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/x-png", "image/png", "image/svg+xml");

    // Validate image.
    if (!in_array(strtolower($mimeType), $allowedMimeTypes) || !in_array(strtolower($extension), $allowedExts)) {
        //type ไม่ผ่าน
    } else {
        $namefile = $_FILES["logo_img2"]["name"];
        $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
            $name = "logo-".(Date("dmy").rand('1000', '9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
            $target = $directory.$name;
        $newname = $name;

        if (file_exists($target)) {
            $oldname = pathinfo($name, PATHINFO_FILENAME);
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            $newname = $oldname;
            do {
                $r = rand(1000, 9999);
                $newname = $oldname."-".$r.".$ext";
                    
                $target = $directory.$newname;
            } while (file_exists($target));
        }

        copy($_FILES["logo_img2"]["tmp_name"], iconv('UTF-8', 'windows-874', $directory.$newname));
        if (file_exists($_POST["name_img_ed2"])) {
            unlink($_POST["name_img_ed2"]);
        }
            
        $newname_logo_img = $newname;
        
        if (checkSetting('logo_img2')) {
            $str = "UPDATE `settings` SET `value`='../../uploads/".$year."/logo/".$newname_logo_img."',`updated_datetime`='".$date_regdate."' WHERE  `name`='logo_img2' ";
            $objQuery = $db->Query($str);
        } else {
            $str_logo = "INSERT INTO `settings`( `name`,  `value`, `updated_datetime`) VALUES ('logo_img2','../../uploads/".$year."/logo/".$newname_logo."','".$date_regdate."')";
            $objQuery_logo = $db->Query($str_logo);
        }
    }
}


if (isset($_POST['form'])) {
    if ($_POST['form']=="form_add") {
        $name_arr = ['keyworde_en','description_en','title_en','address_en','name_en','logo_img','email','keyworde_th','description_th','title_th'
        ,'address_th','name_th','random_banner','head_title','head_title_mini','google_map_key','telephone','telephone2','detail_th','detail_en','logo_img2'];

        
        foreach ($name_arr as $name) {
            if (($name != 'logo_img') && ($name != 'logo_img2')) {
                if ($name == 'random_banner') {
                    if (isset($_POST["".$name])) {
                        $value_data = '1';
                    } else {
                        $value_data = '0';
                    }
                } else {
                    $value_data = $db->clear($_POST["".$name]);
                }
                
                if (checkSetting($name)) {
                    $str = "UPDATE `settings` SET `value`='".$value_data."',`updated_datetime`='".$date_regdate."' WHERE  `name`='".$name."' ";
                    $objQuery = $db->Query($str);
                } else {
                    $str = "INSERT INTO `settings`( `name`,  `value`, `updated_datetime`) VALUES ('".$name."','".$value_data."','".$date_regdate."')";
                    $objQuery = $db->Query($str);
                }
                if ($objQuery) {
                    $nQuery++;
                }
            }
        }
        
        header('Content-Type: application/json');
        if ($nQuery > 0) {
            echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
        } else {
            echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
        }
    } else {
    }
}

//======================================
function checkSetting($name)
{
    $db = new DB();

    $strSQL = "SELECT `id`,`value` FROM `settings` WHERE `name` = '".$name."'";
    $objQuery = $db->Query($strSQL);
    $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
    
    if (isset($objResult) && isset($objResult["id"]) && $objResult["id"] !='') {
        return true;
    } else {
        return false;
    }
}

//======================================
