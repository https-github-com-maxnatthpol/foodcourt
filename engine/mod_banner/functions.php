<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';


if (isset($_POST['form'])) {
    if ($_POST['form']=="form_add") {
        form_add();
    } elseif ($_POST['form']=="form_edit") {
        form_edit();
    } elseif ($_POST['form']=="del_one") {
        del_one();
    } elseif ($_POST['form']=="Multi_del") {
        Multi_del();
    }
} else {
    if ($_GET['form']=="order_chanhe") {
        order_chanhe();
    }
}


function Multi_del()
{
    $db = new DB();

    if (isset($_SESSION["id_data"])) {
        $id_data = $_SESSION["id_data"];
    } else {
        $id_data = '';
    }

    header('Content-Type: application/json');
    date_default_timezone_set("Asia/Bangkok");
    $date_regdate = date("Y-m-d H:i:s");
    
    for ($i=0; $i < count($_POST["Chk"]); $i++) {
        $id_category_edit = $db->clear($_POST["Chk"][$i]);

        $str = "DELETE FROM `slide` WHERE `id_slide`='".$id_category_edit."' ";
        $objQuery = $db->Query($str);
    }
    if ($objQuery) {
        echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
    } else {
        echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
    }
}

function del_one()
{
    $db = new DB();

    if (isset($_SESSION["id_data"])) {
        $id_data = $_SESSION["id_data"];
    } else {
        $id_data = '';
    }

    header('Content-Type: application/json');
    date_default_timezone_set("Asia/Bangkok");
    $date_regdate = date("Y-m-d H:i:s");
    

    $id_category_edit = $db->clear($_POST["id"]);

    $str = "DELETE FROM `slide` WHERE `id_slide`='".$id_category_edit."' ";
    $objQuery = $db->Query($str);
    if ($objQuery) {
        echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
    } else {
        echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
    }
}

function order_chanhe()
{
    $db = new DB();

    if (isset($_SESSION["id_data"])) {
        $id_data = $_SESSION["id_data"];
    } else {
        $id_data = '';
    }

    header('Content-Type: application/json');
    date_default_timezone_set("Asia/Bangkok");
    $date_regdate = date("Y-m-d H:i:s");
    
    $order = $db->clear($_GET["order"]);
    $id_category_edit = $db->clear($_GET["id"]);

    $str = "UPDATE `slide` SET `level`='".$order."',`date`='".$date_regdate."' WHERE `id_slide`='".$id_category_edit."' ";
    $objQuery = $db->Query($str);
    if ($objQuery) {
        echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
    } else {
        echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
    }
}

function form_edit()
{
    $db = new DB();

    if (isset($_SESSION["id_data"])) {
        $id_data = $_SESSION["id_data"];
    } else {
        $id_data = '';
    }

    $year = date("Y");
    if (file_exists("../../uploads/".$year)) {
        if (file_exists("../../uploads/".$year."/mod_banner")) {
        } else {
            mkdir("../../uploads/".$year."/mod_banner");
        }
    } else {
        mkdir("../../uploads/".$year);
        if (file_exists("../../uploads/".$year."/mod_banner")) {
        } else {
            mkdir("../../uploads/".$year."/mod_banner");
        }
    }
    $directory = "../../uploads/".$year."/mod_banner/";

    header('Content-Type: application/json');
    date_default_timezone_set("Asia/Bangkok");
    $date_regdate = date("Y-m-d");
    
    $name_th = $db->clear($_POST["name_th_edit"]);
    $name_en = $db->clear($_POST["name_en_edit"]);
    $id_edit = $db->clear($_POST["id_edit"]);

    $text = $db->clear($_POST["text"]);
    $text_en = $db->clear($_POST["text_en"]);

    $str = "UPDATE `slide` SET `name_slide`='".$name_th."',`name_slide_en`= '".$name_en."',`text`='".$text."',`text_en`= '".$text_en."',`date`= '".$date_regdate."'  WHERE `id_slide`= '".$id_edit."' ";
    $objQuery = $db->Query($str);
    if ($objQuery) {
        if (isset($_FILES['name_img']) && $_FILES['name_img']['name']!='') {
            $fieldname = $_FILES['name_img']['name'];
            // Get filename.
            $filename = explode(".", $_FILES['name_img']['name']);
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $tmpName = $_FILES['name_img']['tmp_name'];

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
                $namefile = $_FILES["name_img"]["name"];
                $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
                $name = "banner-".(Date("dmy").rand('1000', '9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
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

                copy($_FILES["name_img"]["tmp_name"], iconv('UTF-8', 'windows-874', $directory.$newname));
                if ($_POST["name_img_ed"] !='') {
$strSQL = "SELECT  slide.name_slide,slide.name_slide_en,slide.text,slide.text_en, slide_image.name_image,slide_image.id_image
FROM `slide` 
LEFT JOIN slide_image ON slide_image.id_slide=slide.id_slide
WHERE slide.id_slide = '".$id_edit."' ";
	$objQuery = $db->Query($strSQL);
	$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
                    if (file_exists($objResult["name_image"])) {
                        unlink($objResult["name_image"]);
                    }
                }
                
        
                $id_image = $db->clear($_POST["id_image"]);
                $sql = "";
                $sql .="UPDATE `slide_image` SET ";
                $sql .="  `name_image` = '".$directory.$newname."' ";
                $sql .=",`size`='".$_FILES["name_img"]["size"]."' ";
                $sql .=",`date`='".$date_regdate."' ";
                $sql .=" WHERE `id_image`= '".$id_image."'  ";
                $query = $db->Query($sql);
            }
        }

        echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
    } else {
        echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
    }
}

function form_add()
{
    $db = new DB();

    if (isset($_SESSION["id_data"])) {
        $id_data = $_SESSION["id_data"];
    } else {
        $id_data = '';
    }

    $year = date("Y");
    if (file_exists("../../uploads/".$year)) {
        if (file_exists("../../uploads/".$year."/mod_banner")) {
        } else {
            mkdir("../../uploads/".$year."/mod_banner");
        }
    } else {
        mkdir("../../uploads/".$year);
        if (file_exists("../../uploads/".$year."/mod_banner")) {
        } else {
            mkdir("../../uploads/".$year."/mod_banner");
        }
    }

    $directory = "";

    header('Content-Type: application/json');
    date_default_timezone_set("Asia/Bangkok");
    $date_regdate = date("Y-m-d");
    
    $name_th = $db->clear($_POST["name_th"]);
    $name_en = $db->clear($_POST["name_en"]);

    $text = $db->clear($_POST["text"]);
    $text_en = $db->clear($_POST["text_en"]);

    $select_sql = "SELECT MAX(`level`) AS num_order  FROM `slide` ";
    $select_query = $db->Query($select_sql);
    $select_result = mysqli_fetch_array($select_query, MYSQLI_ASSOC);
    if (isset($select_result["num_order"])) {
        $num_order = intval($select_result["num_order"])+1;
    } else {
        $num_order = 1;
    }


    $str = "INSERT INTO `slide`( `name_slide`, `name_slide_en`, `text`, `text_en`, `date`, `level`) VALUES ('".$name_th."','".$name_en."','".$text."','".$text_en."','".$date_regdate."','".$num_order."')";
    $objQuery = $db->Query($str);
    $id_slide = $db->lastInsertId();
    if ($objQuery) {
        if (isset($_FILES['name_img']) && $_FILES['name_img']['name']!='') {
            $fieldname = $_FILES['name_img']['name'];
            // Get filename.
            $filename = explode(".", $_FILES['name_img']['name']);
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $tmpName = $_FILES['name_img']['tmp_name'];

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
                $newname_img = "";
                $tmp_size = '';
            } else {
                $namefile = $_FILES["name_img"]["name"];
                $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
                $name = "banner-".(Date("dmy").rand('1000', '9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
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

                $newname_img = $newname;
                $tmp_size = $_FILES["name_img"]["size"];
                $directory = "../../uploads/".$year."/mod_banner/";
                copy($_FILES["name_img"]["tmp_name"], iconv('UTF-8', 'windows-874', $directory.$newname));
            }
        } else {
            $newname_img = "";
            $tmp_size = '';
        }


        $sql = "
INSERT INTO `slide_image`( `name_image`, `size`, `date`, `id_slide`) VALUES ('".$directory.$newname_img."','".$tmp_size."','".$date_regdate."','".$id_slide."')";
        $query = $db->Query($sql);
    
        if ($query) {
            echo json_encode(array('status' => '0','message'=> 'สำเร็จ'));
        } else {
            echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
        }
    } else {
        echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
    }
}
